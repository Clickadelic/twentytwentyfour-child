<?php

if(!class_exists('Twenty_Twenty_Four_Child')){
    class Twenty_Twenty_Four_Child {

        function __construct(){
            add_action('wp_before_admin_bar_render', array($this, 'remove_logo'), 21);
            add_action('wp_enqueue_scripts', array($this, 'load_theme_scripts'), 21);
			add_action('after_setup_theme', array($this, 'theme_translation_setup'), 21);
        }

        function load_theme_scripts(){

            $parent_style = 'twentytwentyfour';
            wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
            
			wp_enqueue_style( 'styles',
            	get_stylesheet_directory_uri() . '/style.css',
            	array( $parent_style, 'twentytwentyfour'),
            	wp_get_theme()->get('Version')
            );
        }

		function theme_translation_setup(){
			load_theme_textdomain('twentytwentyfour-child', get_template_directory() . '/languages');
		}
    }
}

$Twenty_Twenty_Four_Child = new Twenty_Twenty_Four_Child();