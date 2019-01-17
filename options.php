<?php

function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'elsa-settings';
}


function optionsframework_options() {

	// site 
	$options[] = array(
		'name' => __( '站点设置', 'elsa' ),
		'type' => 'heading');
	$options[] = array(
		'name' => __( '站点 logo', 'elsa' ),
		'desc' => __( '不添加则显示文字标题，推荐 50px x 50px', 'elsa' ),
		'id' => 'site_logo',
		'type' => 'upload');
	$options[] = array(
		'name' => '关键词',
		'desc' => '关键词用英文逗号分隔',
		'id' => 'site_keywords',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => '网站描述',
		'id' => 'site_desc',
		'std' => '',
		'type' => 'textarea');
	
	

	// summary
	$options[] = array(
		'name' => __( '文章摘要', 'elsa' ),
		'type' => 'heading');
	$options[] = array(
		'name' => __( '默认文章摘要缩略图', 'elsa' ),
		'desc' => __( '文章摘要显示的默认缩略图，如果所属分类有分类图则使用分类图，如果文章有特色图片则使用特色图片。优先级：特色图 > 分类图 > 默认', 'elsa' ),
		'id' => 'summary_thumb',
		'std' => get_template_directory_uri() . '/images/cover.jpg',
		'type' => 'upload');
	$options[] = array(
		'name' => '',
		'desc' => __( '使用文章内容图片作为摘要图（优先级小于特色图，大于分类图）', 'elsa' ),
		'id' => 'use_post_image',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'name' => '摘要缩略词',
		'desc' => '输入您需要的文章摘要字数',
		'id' => 'summary_trim',
		'std' => '140',
		'type' => 'text');
	

	// Header setting	
    $options[] = array(
        'name' => __( '头部设置', 'elsa' ),
        'type' => 'heading');
	$options[] = array(
		'name' => __( '固定导航', 'elsa' ),
		'desc' => __( '滚动页面始终显示导航栏', 'elsa' ),
		'id' => 'fix-nav',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'name' => __( '图片样式', 'elsa' ),
		'desc' => __( '头部区域显示的大图', 'elsa' ),
		'id' => 'background_image',
		'std' => get_template_directory_uri() . '/images/bg.jpg',
		'type' => 'upload');
	$options[] = array(
		'name' => __( '使用分类图', 'elsa' ),
		'desc' => __( '使用分类图片作为顶部图片', 'elsa' ),
		'id' => 'use_cat_image',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'name' => __( '主页图片垂直对齐方式', 'elsa' ),
		'desc' => __( '请设置图片对齐方式以最佳效果展示头部图片', 'elsa' ),
		'id' => 'background_v_align',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini',
		'options' => array(
			'center' => __( '居中', 'elsa' ),
			'top' => __( '顶部', 'elsa' ),
			'bottom' => __( '底部', 'elsa' )));
	$options[] = array(
		'name' => __( '分类图片垂直对齐方式', 'elsa' ),
		'desc' => __( '请设置图片对齐方式以最佳效果展示头部图片', 'elsa' ),
		'id' => 'cat_background_v_align',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini',
		'options' => array(
			'center' => __( '居中', 'elsa' ),
			'top' => __( '顶部', 'elsa' ),
			'bottom' => __( '底部', 'elsa' )));
	$options[] = array(
		'name' => __( '头部主标语', 'elsa' ),
		'desc' => __( '网站头部图片区域的主标语', 'elsa' ),
		'id' => 'header-main-text',
		'std' => 'Elsa',
		'type' => 'text'
    );
	$options[] = array(
		'name' => __( '头部副标语', 'elsa' ),
		'desc' => __( '网站头部图片区域的副标语', 'elsa' ),
		'id' => 'header-sub-text',
		'std' => 'An elegant responsive theme for wordpress.',
		'type' => 'text'
	);
	
	// Footer settings
    $options[] = array(
        'name' => __( '页脚设置', 'elsa' ),
        'type' => 'heading');
	$options[] = array(
		'name' => __( '工信部备案信息', 'elsa' ),
		'desc' => __( '工信部备案号', 'elsa' ),
		'id' => 'icp_num',
		'type' => 'text');	
	$options[] = array(
		'name' => __( '公安网备案信息', 'elsa' ),
		'desc' => __( '输入您的公安网备案号', 'elsa' ),
		'id' => 'gov_num',
		'type' => 'text');	
	$options[] = array(
		'name' => __( '公安网备案连接', 'elsa' ),
		'desc' => __( '公安网备案的链接地址', 'elsa' ),
		'id' => 'gov_link',
		'type' => 'text');
	$options[] = array(
		'name' => __( '站点统计', '站点统计' ),
		'id' => 'site_statistics',
		'std' => '',
		'type' => 'textarea');
	
	// Social component
	$options[] = array(
		'name' => __( '社交组件', 'elsa' ),
		'type' => 'heading');
	$options[] = array(
		'name' => __( 'GitHub', 'elsa' ),
		'desc' => __( '连接前要带有 http:// 或者 https:// ', 'elsa' ),
		'id' => 'social_github',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __( '新浪微博', 'elsa' ),
		'desc' => __( '连接前要带有 http:// 或者 https:// ', 'elsa' ),
		'id' => 'social_weibo',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __( '腾讯微博', 'elsa' ),
		'desc' => __( '连接前要带有 http:// 或者 https:// ', 'elsa' ),
		'id' => 'social_tweibo',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __( 'Twitter', 'elsa' ),
		'desc' => '连接前要带有 http:// 或者 https:// ',
		'id' => 'social_twitter',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __( 'FaceBook', 'elsa' ),
		'desc' => __( '连接前要带有 http:// 或者 https:// ', 'elsa' ),
		'id' => 'social_facebook',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __( 'Google+', 'elsa' ),
		'desc' => __( '连接前要带有 http:// 或者 https:// ', 'elsa' ),
		'id' => 'social_google_plus',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __( 'WhatsApp', 'elsa' ),
		'desc' => __( '连接前要带有 http:// 或者 https:// ', 'elsa' ),
		'id' => 'social_whatsapp',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __( 'skype', 'elsa' ),
		'desc' => __( '连接前要带有 http:// 或者 https:// ', 'elsa' ),
		'id' => 'social_skype',
		'std' => '',
		'type' => 'text');

	// 404
	$options[] = array(
		'name' => __( '404', 'elsa' ),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __( '默认404背景图', 'elsa' ),
		'desc' => __( '404界面的默认背景图', 'elsa' ),
		'id' => '404_header',
		'std' => get_template_directory_uri() . '/images/cover.jpg',
		'type' => 'upload');
	$options[] = array(
		'name' => __( '404 标题', 'elsa' ),
		'id' => '404_title',
		'std' => '你找的页面丢失了，喝杯咖啡等等吧！',
		'type' => 'text');
	$options[] = array(
		'name' => __( '404 描述', 'elsa' ),
		'id' => '404_desc',
		'std' => 'That page can not be found',
		'type' => 'text');

	// advanced
	$options[] = array(
		'name' => __( '高级主题', 'elsa' ),
		'type' => 'heading');
	$options[] = array(
		'name' => __( '添加自定义函数', 'elsa' ),
		'id' => 'cus_fns',
		'desc' => __( '这个功能相当于将函数直接添加到 functions.php，请不要在右边的代码中添加 “&lt;?php ?>”，另外，需要注意：此操作比较危险，请谨慎操作。', 'elsa' ),
		'type' => 'textarea');
	$options[] = array(
		'name' => __( '添加自定义样式', 'elsa' ),
		'id' => 'cus_style',
		'desc' => __( '函数都添加了，样式怎么能没有呢？', 'elsa' ),
		'type' => 'textarea');
	
    return $options;
}
?>