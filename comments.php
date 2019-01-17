<?php
    /**
     * The default comments template
     * 
     * @author Maine <maine@cainiaofly.com>
     * @license GPL-3.0
     */

    if ( post_password_required() ) {
        return;
    }
?>

<section id="elsa_comments" class="comments-area">
	<?php
		wp_enqueue_script( 'comment-reply' );
		include(TEMPLATEPATH . '/emoji.php');
		$fields =  array(
				'author' => '
				<div class="comment-form-author form-group has-feedback">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text input-group-text-prepend justify-content-center"><i class="fa fa-user"></i></span>
						</div>
						<input class="form-control input-group-append" placeholder="昵称" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />
						<div class="input-group-append">
							<span class="input-group-text input-group-text-append form-control-feedback required">*</span>
						</div>
					</div>
				</div>',
				'email'  => '
				<div class="comment-form-email form-group has-feedback">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text input-group-text-prepend justify-content-center"><i class="fa fa-envelope-o"></i></span>
						</div>
						<input class="form-control input-group-append" placeholder="邮箱" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />
						<div class="input-group-append">
							<span class="input-group-text input-group-text-append form-control-feedback required">*</span>
						</div>
					</div>
				</div>',
   			 'url'  => '<div class="comment-form-url form-group has-feedback"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text input-group-text-prepend justify-content-center"><i class="fa fa-link"></i></span></div><input class="form-control" placeholder="网站" id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" size="30" /></div></div>',
		);
		$args = array(
			'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h4>',
			'fields' =>  $fields,
			'class_submit' => 'btn btn-primary elsa-submit',
			'comment_field' =>  '<div class="comment form-group has-feedback"><div class="input-group"><p class="elsa-emoji">'.$smilies.'</p><textarea class="form-control" id="comment" placeholder=" " name="comment" rows="5" aria-required="true" required  onkeydown="if(event.ctrlKey){if(event.keyCode==13){document.getElementById(\'submit\').click();return false}};"></textarea></div></div>',
		);
	?>

	<?php
		if( get_comments_number() > 0 ) :
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
			<h3 class="elsa-comment-title">文章恒久远，评论早关闭</h3>
			<?php
				else:
			?>
			<h3 class="elsa-comment-title"><?php echo get_comments_number(); ?>个回复 </h3>
			<?php endif; ?>
	<ol class="comment-list">
    <?php
        wp_list_comments( array(
            'style'         => 'ol',
            'type'          => 'comment',
            'callback'      => 'elsa_comment',
            'max_depth'     => '5',
        ) );
    ?>
	</ol>
	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div id="elsa-comments-nav" class="d-flex justify-content-center">
			<?php paginate_comments_links('prev_text=上一页&next_text=下一页');?>
		</div>
		<?php endif; ?>
	<?php
		comment_form($args);
		else:
			$args['title_reply'] = '暂无评论，快抢沙发！';
			comment_form($args);
		endif;
	?>
</section>
