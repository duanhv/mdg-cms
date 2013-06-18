<?php
	add_theme_support('post-thumbnails',array('post'));
	set_post_thumbnail_size(340,180,true);
	//Register a sidebar
	if(function_exists('register_sidebar')){
		register_sidebar(array(
			'name' => 'Main Sidebar',
			'id'   => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
		}
	//get first images to thumbnail
	function get_first_image() { 
	global $post, $posts; $first_img = ''; 
	ob_start(); ob_end_clean(); 
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0]; 
	if(empty($first_img)){ 
		$first_img = "http://localhost/blog/wp-content/themes/dudoan/images/img-f.jpg";
	}
	return $first_img;
	}		
	//register one menu
	if(function_exists('wp_nav_menu')){
		
		function wp_igolf_menus(){
			//regsiter menu
			register_nav_menus(array('primary-menu' => __('main menu'),
									 'second-menu'	=>	__('Menu 2')));
			}
		add_action('init','wp_igolf_menus');
	}
		
?>
