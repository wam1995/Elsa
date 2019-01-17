<?php
    /**
     * The default page template
     * 
     * @author Maine <maine@cainiaofly.com>
     * @license GPL-3.0
     */
    get_header();
?>

<div class="col-lg-9">
    <div id="elsa-content">
    <?php
        the_content();
        comments_template();
    ?>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>