<?php
    /**
     * The summary template
     * 
     * @author Maine <https://www.cainiaofly.com>
     * @license GPL-3.0
     */
?>


<article class="elsa-summary">
    <div class="elsa-summary-content">
        <div class="row">
            <div class="col-lg-4 cover">
                <a class="d-flex justify-content-center align-items-center" href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_elsa_post_thumb(); ?>" alt="">
                </a>
            </div>
            <div class="col-lg-8">
                <header class="elsa-summary-header d-flex align-items-center">
                    <?php
                        $category = get_the_category();
                        $cat_show = $category[count($category) - 1];
                    ?>
                    <a class="elsa-summary-label" href="<?php echo get_category_link($cat_show->term_id); ?>"><?php echo $cat_show->cat_name; ?></a>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </header>
                <p>
                <?php echo wp_trim_words(get_the_content(), of_get_option("summary_trim", 140)); ?>
                </p>
                <div class="elsa-summary-footer d-flex justify-content-between align-items-center">
                    <div class="elsa-post-meta d-flex align-items-center">
                        <a href="<?php the_permalink() ?>"><i class="fa fa-calendar"></i> <?php the_date('Y/m/d'); ?></a>
                        <a href="<?php the_permalink() ?>"><i class="fa fa-commenting-o"></i> <?php comments_number('0', '1', '%'); ?> 评论</a>
                        <a href="<?php the_permalink() ?>"><i class="fa fa-eye"></i> 23 阅读</a>
                        <a href="<?php the_permalink() ?>"><i class="fa fa-thumbs-o-up"></i> 0 赞</a>
                    </div>
                    <a href="<?php the_permalink(); ?>" target="_blank">阅读全文 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</article>