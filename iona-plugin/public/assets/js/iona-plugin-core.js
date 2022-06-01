jQuery(function($) {
    var defaultPage = 1,
        htmlData = '',
        breed = '',
        isSingle = false,
        breedIds = [];

    // This will check if isSingle query string is present and if so then set isSingle to true
    // This will also check if breed query string is present (if isSingle is not present) which will be used for loading the lists of data after page loads
    function getQueryString() {
        var url = new URL(window.location.href);

        var checkIfSingle = url.searchParams.get("single");

        if(typeof checkIfSingle == "string" && checkIfSingle != null) {
            isSingle = true;
        } else {            
            var searchStr = url.searchParams.get("breed");

            if(typeof searchStr == "string" && searchStr != null) {
                breed = searchStr;
            }
        }
    }

    // This connects to the api which will load all the breeds
    function loadBreeds() {
        $.get(iona_plugin_localized.breeds_api_url, function(response) {
            if(typeof response !== "object" && response.length == 0) {
                return;
            }

            var isFoundInList = false;
            
            // We are iterating the lists we got from the api
            // This will populate the breeds in the dropdown element
            for(var i = 0; i < response.length; i++) {
                var item = response[i];
                var isSelected = '';
                if(breed != '' && item.id == breed) {
                    isSelected = ' selected';
                    isFoundInList = true;
                }

                // Populate the dropdown lists and enable it after
                $("#catBreedSelect").append('<option'+isSelected+' value="'+item.id+'">'+item.name+'</option>').prop('disabled', false);
            }

            // If query string is present for breed_id, it will proceed to loading the lists items for the selected breed
            if(breed != '') {
                if(!isFoundInList) {
                    alert("Sorry. It seems we cannot recognize the cat breed you requested.");
                    return;
                }

                $("#listArea").html('<p>Loading...</p>');
                loadSelectedBreedItems(breed, defaultPage);
            }          
        },'json').fail(function() {
            $("#listArea").html("");
            alert("Apologies but we could not load new cats for you at this time! Miau!");
        });
    }

    /**
     * This loads the images for the selected breed_id
     * 
     * @param {string} id - the selected breed_id
     * @param {number} page - the page number
     */
    function loadSelectedBreedItems(id, page) {
        $("#catBreedSelect").prop('disabled', true);

        $.get(iona_plugin_localized.breed_search_url, {page: page, limit: 10, breed_id: id}, function(response) {  
            $("#catBreedSelect").prop('disabled', false);
                     
            $("#listArea").html('');
            
            var insertedCount = 0;

            // We will iterate the response we've got from the api
            // and create the html element for each item
            for(var i = 0; i < response.length; i++) {
                var item = response[i];
                if(breedIds.indexOf(item.id) == -1) {
                    htmlData += '<div class="breed-item">';
                    htmlData += '<img class="breed-item-image" src="'+item.url+'" />';
                    htmlData += '<a href="'+iona_plugin_localized.home_url+'/?single='+item.id+'">View Details</a>';
                    htmlData += '</div>';                
                    breedIds.push(item.id);
                    insertedCount++;
                }
            }

            if(insertedCount == 0) {
                $("#btnLoadMore").addClass('hidden');
            } else {
                $("#btnLoadMore").removeClass('hidden');
            }

            $("#listArea").html(htmlData);
        },'json').fail(function() {
            $("#listArea").html("");
            alert("Apologies but we could not load new cats for you at this time! Miau!");
        });
    }

    // Change event for the dropdown items of the breeds
    // Upon change of value it will load the lists of items from the selected breed
    // If the selected breed is empty or default it will clear the result area
    $("#catBreedSelect").on('change', function() {
        var _this = $(this);

        $("#btnLoadMore").addClass('hidden');

        if(_this.val() == "") {
            $("#listArea").html("");
            return;
        }

        breed = _this.val();

        window.history.replaceState(null, null, "?breed=" + breed);

        htmlData = '';
        breedIds = [];
        
        $("#listArea").html('<p>Loading...</p>');
        loadSelectedBreedItems(breed, defaultPage);
    });
    
    // This will trigger the loading of the breed items based on the page number that is incremented
    $("#btnLoadMore").on('click', function() {
        defaultPage += 1;
        loadSelectedBreedItems(breed, defaultPage);
    });

    // Initialize the query strings from the url if present
    getQueryString();

    // Initialize the loading of breeds items if the page is not the single page
    if(!isSingle) {
        loadBreeds();
    }
});