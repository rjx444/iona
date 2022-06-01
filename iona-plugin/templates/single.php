<?php
/**
 * Single Page Custom Template
 */
wp_head();

?>
<div id="wrapper">
    <div class="form-group">
        <a href="<?php echo $breedInfo != null ? home_url("/?breed=" . $breedInfo->breeds[0]->id) : home_url(); ?>">Back</a>
    </div>
    <?php if($breedInfo == null) { ?>
        <p>There are no data associated with the given info</p>
    <?php } else { ?>
        <img class="img-single" src="<?php echo $breedInfo->url; ?>" />
        <h2 class="breed-name">Name: <?php echo $breedInfo->breeds[0]->name; ?></h2>
        <h3 class="breed-origin">Origin: <?php echo $breedInfo->breeds[0]->origin; ?></h3>
        <h3 class="breed-temperament">Temperament: <?php echo $breedInfo->breeds[0]->temperament; ?></h3>
        <p class="breed-description"><?php echo $breedInfo->breeds[0]->description; ?></p>
    <?php }  ?>
</div>
<?php
wp_footer();
?>