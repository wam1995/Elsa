<?php

define('ELSA_VERSION', '1.0');
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework-theme/' );

require_once dirname( __FILE__ ) . '/inc/options-framework-theme/options-framework.php';
require_once dirname( __FILE__ ) . '/inc/wp_bootstrap_navwalker.php';
if (!function_exists('z_taxonomy_image_url')) {
    define('Z_PLUGIN_URL', get_stylesheet_directory_uri() . "/inc/categories-images");
    require_once dirname( __FILE__ ) . '/inc/categories-images/categories-images.php';
}

$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

require_once(dirname( __FILE__ ) . '/inc/cus-fn-stream.php');
include("cusfn://");

/**
 * Admin menu
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
function elsa_options_menu_filter( $menu ) {
    $menu['mode'] = 'menu';
    $menu['page_title'] = __( '网站设置', 'elsa' );
    $menu['menu_title'] = __( '网站设置', 'elsa' );
    $menu['menu_slug'] = 'elsa-admin';
    return $menu;
  }
add_filter( 'optionsframework_menu', 'elsa_options_menu_filter' );

/**
 * Theme updating
 * 
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
require_once( get_template_directory() . '/inc/version.php' );
$elsa_update_checker = new ThemeUpdateChecker(
    'Elsa', 
    'https://mirrors.cainiaofly.com/themes/elsa/upgrade.php'
);

/**
 * load all script and style
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
function elsa_theme_scripts()
{
    $dir = get_template_directory_uri();
    if (!is_admin()) {
        wp_enqueue_style('bootcss', 'https://cdn.bootcss.com/twitter-bootstrap/4.1.3/css/bootstrap.min.css', array(), '4.1.3');
        wp_enqueue_style('fa', 'https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0');
        wp_enqueue_style('elsa', get_stylesheet_uri(), array(), mt_rand());
        wp_enqueue_script('jq', 'https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js', array(), '3.3.1');
        wp_enqueue_script('bootcss', 'https://cdn.bootcss.com/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js', array(), '4.1.3');
        wp_enqueue_script('elsa', $dir . '/js/Elsa.js', array(), mt_rand());
    }
}
add_action('wp_enqueue_scripts', 'elsa_theme_scripts');

/**
 * clean the head
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
add_filter( 'show_admin_bar', '__return_false' );
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content', 'wptexturize'); 
remove_filter('comment_text', 'wptexturize');
remove_action('embed_head', 'print_emoji_detection_script');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

add_action( 'wp_enqueue_scripts', 'mt_enqueue_scripts', 1 );
function mt_enqueue_scripts() {
  wp_deregister_script('jquery');
}


/**
 * speed the emoji !!!
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
function elsa_wp_emoji_baseurl($url) {
	return set_url_scheme('//twemoji.maxcdn.com/2/72x72/');
}
add_filter('emoji_url', 'elsa_wp_emoji_baseurl');

function elsa_wp_emoji_svgurl($url) {
	return set_url_scheme('//twemoji.maxcdn.com/svg/');
}
add_filter('emoji_svg_url', 'elsa_wp_emoji_svgurl');

/**
 * the title
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
function elsa_wp_title($title, $sep)
{
    global $paged, $page;
    if (is_feed()) {
        return $title;
    }

    $title .= get_bloginfo('name');
    $description = get_bloginfo('description', 'display');
    if ($description && (is_home() || is_front_page())) {
        $title = "$title $sep $description";
    }
    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf('Page %s', max($paged, $page));
    }

    return $title;
}
add_filter('wp_title', 'elsa_wp_title', 10, 2);

/**
 * post thumbnail
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
if ( function_exists( 'add_image_size' ) ){  
    add_image_size( 'elsa-thumb', 280, 160);
}
function get_elsa_post_thumb()
{
    global $post;
    $img_id = get_post_thumbnail_id();
    $img_url = wp_get_attachment_image_src($img_id,'kratos-entry-thumb');
    $img_url = $img_url[0];
    if(has_post_thumbnail()) {
        return $img_url;
    }

    $content = $post->post_content;
    $img_preg = "/!\[(.*?)\]\((.*?)\)|<img (.*?)src=\"(.+?)\".*?>/";
    preg_match($img_preg,$content,$img_src);
    $img_count = count($img_src) - 1;
    if (isset($img_src[$img_count])) $img_val = $img_src[$img_count];
    if ($img_val) {
        return $img_val;
    }

    if( function_exists('z_taxonomy_image_url') ) {
        foreach(get_the_category($post->ID) as $c) {
            $c_thumb = z_taxonomy_image_url($c->term_id);
            if ($c_thumb) {
                return $c_thumb;
            }
            while($c->category_parent) {
                $c = get_category($c->category_parent);
                $c_thumb = z_taxonomy_image_url($c->term_id);
                if ($c_thumb) {
                    return $c_thumb;
                }
            }
        }
    }

    return of_get_option("summary_thumb");
}
add_theme_support( "post-thumbnails" );

/**
 * the pagination
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
function esla_pagination($page_show = 4)
{
    $page_show = ($page_show < 3) ? 3 : $page_show;
    global $paged, $wp_query, $page_total;
    if (!$page_total) {
        $page_total = $wp_query->max_num_pages;
    }

    if (!$paged) {
        $paged = 1;
    }

    echo '<nav aria-label="pagination"><ul class="pagination justify-content-center">';

    if ($paged > 1) {
        echo '<li class="page-item"><a class="page-link d-flex justify-content-center align-items-center" href="' . get_pagenum_link($paged - 1) . '">&laquo;</a></li>';
    } else {
        echo '<li class="page-item disabled"><span class="page-link d-flex justify-content-center align-items-center">&laquo;</span></li>';
    }

    $page_start = 1;
    $page_end = $page_total;
    if ($page_total > $page_show) {
        $page_start = ($paged - 1) < 1 ? 1 : ($paged - 1);
        $page_end = $page_start + $page_show - 1;
        if ($page_end > $page_total) {
            $page_start = $page_total - $page_show + 1;
            $page_end = $page_total;
        }
    }
    for ($i = $page_start; $i <= $page_end; $i++) {
        if ($i == $paged) {
            echo '<li class="page-item active"><span class="page-link d-flex justify-content-center align-items-center">' . $paged . '</span></li>';
        } else {
            echo '<li class="page-item"><a class="page-link d-flex justify-content-center align-items-center" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
        }
    }

    if ($page_end < $page_total) {
        echo '<li class="page-item disabled ellipsis"><span class="page-link d-flex justify-content-center align-items-center">...</span></li>';
    }

    if ($paged < $page_total) {
        echo '<li class="page-item"><a class="page-link d-flex justify-content-center align-items-center" href="' . get_pagenum_link($paged + 1) . '">&raquo;</a></li>';
    } else {
        echo '<li class="page-item disabled"><span class="page-link d-flex justify-content-center align-items-center">&raquo;</span></li>';
    }

    echo '</ul></nav>';
}

/**
 * the comment template
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
function elsa_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    ?>
    <li class="comment">
        <article class="comment-body d-flex" id="comment-<?php echo comment_id(); ?>">
            <div class="comment-meta d-flex flex-column">
                <?php echo get_avatar($comment); ?>
                <span class="comment-user"><?php echo get_comment_author_link(); ?></span>
                <a class="comment-date" href=""><time datetime="2018-07-13">2018-7-13</time></a>
            </div>
            <div class="comment-bubble-wrapper"> <!-- For IE -->
                <div class="comment-bubble d-flex flex-column justify-content-between">
                    <span class="b"></span><span class="t"></span><span class="c"></span>
                    <div class="comment-content">
                        <?php echo comment_text(); ?>
                    </div>
                    <div class="conmment-link">
                        <?php
comment_reply_link(array_merge($args, array(
        'replay_text' => '回复',
        'depth' => $depth,
        'max_depth' => $args['max_depth'],
    )));
    edit_comment_link('编辑');
    ?>
                    </div>
                </div>
            </div>
        </article>
    <?php
}

function the_crumbs()
{
    if (!is_home() && !is_front_page() || is_paged()) {
        echo '<nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-icon"><i class="fa fa-home"></i></li>';
        global $post;
        $homeLink = home_url();
        echo '<li class="breadcrumb-item"><a href="' . $homeLink . '">' . get_bloginfo('name') . '</a></li>';
        if (is_category()) { // 分类 存档
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) {
                $cat_code = get_category_parents($parentCat, true, '&');
                echo $cat_code = '<li class="breadcrumb-item">' . 
                    str_replace('&', '</li><li class="breadcrumb-item">', $cat_code);
            }else {
                echo '<li class="breadcrumb-item">';
            }
            echo single_cat_title('', false) . '</li>';
        } elseif (is_single()) { // 文章
            if (get_post_type() == 'post') { // 文章 post
                $cat = get_the_terms($id, 'category');
                $cat = $cat[0];
                $cat_code = get_category_parents($cat, true, '&');
                echo $cat_code = '<li class="breadcrumb-item">' . 
                    str_replace('&', '</li><li class="breadcrumb-item">', $cat_code) . 
                    get_the_title() . '</li>';
            }
        } elseif (is_tax()) { // 分类 存档
            $query_obj = get_queried_object();
            $term_id = $query_obj->term_id;
            $taxonomy = $query_obj->taxonomy;
            echo get_term_parents_list($term_id, $taxonomy, array('inclusive' => false, 'separator' => ' > '));
            echo $before . '' . single_cat_title('', false) . '' . $after;
        } elseif (is_page() && !$post->post_parent) { // 页面
            echo '<li class="breadcrumb-item">'.get_the_title().'</li>';
        } elseif (is_page() && $post->post_parent) { // 父级页面
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li class="breadcrumb-item"><a href="'.get_permalink($page->ID).'">'.get_the_title($page->ID).'</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) {
                echo $crumb;
            }

            echo '<li class="breadcrumb-item">'.get_the_title().'</li>';
        } elseif (is_search()) { // 搜索结果
            echo '<li class="breadcrumb-item">';
            printf(__('“ %s ” 的搜索结果: ', 'maine'), get_search_query());
            echo '</li>';
        } elseif (is_404()) { // 404 页面
            echo '<li class="breadcrumb-item">'.get_the_title().'</li>';
            _e('页面未找到', 'maine');
            echo '</li>';
        }
        if (get_query_var('paged')) { // 分页
            // if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo sprintf(__('&nbsp;( Page %s )', 'maine'), get_query_var('paged'));
            // }
        }

        echo '</ol></nav>';
    }
}

/**
 * register sidebar
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
$sidebar_args = array(
    'name' => __('Widget', 'Elsa'),
    'id' => 'elsa_sidebar',
    'description' => 'Elsa Widget',
    'class' => 'elsa_sidebar',
    'before_widget' => '<aside id="%1$s" class="sidebar-widget %2$s clearfix">',
    'after_widget' => '</aside>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
);
register_sidebar($sidebar_args);

/**
 * the nav menu registration
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
function elsa_register_nav_menu()
{
    register_nav_menus(array('header_menu' => '顶部菜单'));
}
add_action('after_setup_theme', 'elsa_register_nav_menu');


/**
 * Allow script tags to be saved in the of
 *
 * @author Maine <https://www.cainiaofly.com>
 * @license GPL-3.0
 */
add_action('admin_init','optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
        "src" => array(),
        "type" => array(),
        "allowfullscreen" => array(),
        "allowscriptaccess" => array(),
        "height" => array(),
        "width" => array()
      );
    $custom_allowedtags["script"] = array( "type" => array(),"src" => array() );
    $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
    $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}
