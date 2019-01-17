<?php
    /**
     * The default template
     * 
     * @author Maine <maine@cainiaofly.com>
     * @license GPL-3.0
     */
    get_header();
?>

<div class="col-lg-9">
<!-- article summary -->
<?php
    if(have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part( 'summary', get_post_format() );
        }
    }
?>
<!-- article summary -->

<!-- pagination -->
<?php esla_pagination(5);?>
<!-- /pagination -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>