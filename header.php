<?php
/**
 * The template for displaying the header
 *
 * @author Maine <maine@cainiaofly.com>
 * @license GPL-3.0
 */
?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title( '-', true, 'right' ); ?></title>
    <?php wp_head();?>
    <?php
        if(of_get_option("cus_style")) {
            echo '<style>';
            echo of_get_option("cus_style");
            echo '</style>';
        }
    ?>
    
</head>

<body>
    <div id="elsa-wrapper">
        <div id="elsa-page">
            <!-- Navbar side menu -->
            <?php
                if ( has_nav_menu( 'header_menu' ) ) {
                    wp_nav_menu( array(
                        'container_class'   => '',
                        'container_id'      => 'elsa-navbar-side-menu',
                        'theme_location'	=> 'header_menu',
                        'menu_class'     	=> 'navbar-nav',
                        'depth'          	=> 2,
                    ) );
                }
            ?>
            <!-- Navbar side menu -->

            <!-- Navbar -->
            <?php
                if (is_404() || !of_get_option("fix-nav", true)) {
                    echo '<nav id="elsa-navbar" class="navbar navbar-expand-md navbar-light navbar-nofixed">';
                }else {
                    echo '<nav id="elsa-navbar" class="navbar navbar-expand-md navbar-light">';
                }
            ?>
                <div class="container">
                    <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                    <span id="elsa-navbar-toggler" class="fa fa-navicon d-md-none"></span>
                        <?php
                            if ( has_nav_menu( 'header_menu' ) ) {
                                wp_nav_menu( array(
                                    'container_class'   => 'flex-row-reverse d-none d-md-block',
                                    'container_id'      => 'elsa-navbar-menu',
                                    'theme_location'	=> 'header_menu',
                                    'menu_class'     	=> 'nav navbar-nav',
                                    'depth'          	=> 2,
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'			=> new wp_bootstrap_navwalker(),
                                ) );
                            }
                        ?>
                </div>
            </nav>
            <!-- Navbar -->

            <!-- Header -->
            <?php
            if(is_home() || is_page()) {
                echo '<header id="elsa-header" class="d-flex flex-column">';
            } elseif (is_404()) {
                echo '<header id="elsa-header" class="elsa-full-header d-flex flex-column">';
            } else {
                echo '<header id="elsa-header" class="elsa-min-header d-flex flex-column">';
            }
            ?>
                <!-- banner -->
                <div class="elsa-overlay"></div>
                <?php
                    $bg_url = of_get_option('background_image');
                    $v_align = of_get_option('background_v_align', 'center');
                    if(is_category() && of_get_option("use_cat_image") && function_exists('z_taxonomy_image_url')) {
                        global $wp_query;
                        $cat = get_category( get_query_var( 'cat' ) );
                        $cat_thumb = z_taxonomy_image_url($cat->term_id);
                        if ($cat_thumb) {
                            $bg_url = $cat_thumb;
                            $v_align = of_get_option("cat_background_v_align") ? of_get_option("cat_background_v_align") : $v_align;
                        }
                    }
                    if (is_404()) {
                        $bg_url = of_get_option("404_header") ? of_get_option("404_header") : $bg_url;
                    }
                    $style = "background-position: {$v_align} center; background-image: url('{$bg_url}')";
                ?>
                <div class="elsa-cover flex-grow-1 d-flex justify-content-center align-items-center" style="<?php echo $style; ?>">
                    <div class="elsa-post-title d-flex flex-column align-items-center">
                        <?php
                            if(is_single() || is_page()) {
                                the_post();
                                echo '<h1>'.get_the_title().'</h1>';
                                ?>
                                <div class="elsa-post-meta">
                                    <a href="#"><i class="fa fa-calendar"></i> <?php the_date('Y/m/d'); ?></a>
                                    <a href="#"><i class="fa fa-commenting-o"></i> <?php comments_number('0', '1', '%'); ?> Comment</a>
                                    <a href="#"><i class="fa fa-eye"></i> 23 Views</a>
                                    <a href="#"><i class="fa fa-thumbs-o-up"></i> 0 Times</a>
                                </div>
                                <?php
                            } elseif (is_category()) {
                                global $wp_query;
                                $cat_info = get_category( get_query_var( 'cat' ) );
                                echo '<h1>'.$cat_info->cat_name.'</h1>';
                            }elseif ( is_archive() ){
                                echo '<h1>'.get_the_archive_title().'</h1>';
                            }elseif (is_404()) {
                                echo '<h1>'.of_get_option('404_title').'</h1>';
                                echo '<span>'.of_get_option('404_desc').'</span>';
                                echo '<a class="elsa-header-link" href="'.home_url().'">'.__( '返回首页', 'elsa' ).'</a>';
                            } else {
                                echo '<h1>'.of_get_option('header-main-text').'</h1>';
                                echo '<span>'.of_get_option('header-sub-text').'</span>';
                            }
                        ?>
                    </div>
                </div>
                <!-- /Banner -->
            </header>
            <!-- /Header -->

            <!-- Content -->
            <div id="elsa-body" class="container">
                <div class="row">
                    <?php
                        if (!is_404()) {
                    ?>
                        <div class="col-12 crumb">
                            <?php the_crumbs(); ?>
                        </div>
                    <?php
                        }
                    ?>
