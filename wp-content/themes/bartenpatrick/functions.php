<?php

class Default_Theme {
		
	function __construct() {
		add_action( 'init', array( &$this, 'theme_setup' ) );
		
		add_action( 'init', array( &$this, 'register_menus' ) );
		add_action( 'init', array( &$this, 'register_sidebars' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'register_scripts' ) );
		add_action( 'init', array( &$this, 'add_image_sizes' ) );
		
		add_image_size( 'frontpage-big', 236, 253, true );
		
		//Optional functions, comment out to use
		/*add_action( 'init', array( &$this, 'remove_blog_posttype' ), 0 );
		add_action( 'admin_menu', array( &$this, 'remove_blog_additional' ), 0 );
		add_action( 'wp_dashboard_setup', array( &$this, 'remove_dashboard_post_widgets' ) );
		add_action( 'admin_menu', array( &$this, 'remove_links' ) );*/
	}
	
	function theme_setup() {
		//Set your theme defaults
		
	}
	
	function register_menus() {
	  register_nav_menus(
	    array(
	      'main-menu' => __( 'Main Menu' ),
	    )
	  );
	}
	
	function register_scripts(){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'script', trailingslashit( get_bloginfo( 'template_directory' ) ) .'assets/js/script.js' );
	}
	
	function register_styles(){
		//Register custom styles here
		
	}
		
	function register_sidebars(){
		register_sidebar(array(
		  'name' => __( 'Insert sidebar name here' ),
		  'id' => 'sidebar_id',
		  'description' => __( 'Insert sidebar description here' ),
		  'before_title' => '<h3>',
		  'after_title' => '</h3>',
		  'before_widget' => '<div id="%1$s" class="widget %2$s">',
		  'after_widget'  => '</div>',
		));
	}
	
	function add_image_sizes(){
		//Add your image sizes here
	}
	
	//Optional functions, comment out to use
	/*function remove_blog_posttype() {
		global $wp_post_types;
		unset( $wp_post_types['post'] );
	}

	function remove_blog_additional() {
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );
	}

	function remove_dashboard_post_widgets() {
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	}

	function remove_links() {
		remove_menu_page( 'link-manager.php' );
	}*/
	
}

$default_theme = new Default_Theme;