<?php
	add_theme_support('post-thumbnails',array('post'));
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