<?php
/**
 * Front Page Custom Template
 */
wp_head();

?>
<div id="wrapper">
    <h1 class="page-title">Cat Browser</h1>
    <form id="frmCatBreedLoader">
        <div class="form-group">
            <label>Breed</label>
            <select id="catBreedSelect" required disabled>
                <option value="">Select Breed</option>
            </select>
        </div>
    </form>
    <div id="listArea"></div>
    <button id="btnLoadMore" class="hidden">Load More</button>
</div>
<?php
wp_footer();
?>