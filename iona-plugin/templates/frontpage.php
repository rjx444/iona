<?php
/**
 * Front Page Custom Template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
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
    <?php wp_footer(); ?>
</body>
</html>