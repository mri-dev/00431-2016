<?php
define('IFROOT', get_stylesheet_directory_uri() );
define('DEVMODE', true);
define('RESOURCES', IFROOT.'/assets' );
define('IMAGES', IFROOT.'/images' );

// Includes
require_once "includes/include.php";

function theme_enqueue_styles() {
    wp_enqueue_style( 'avada-parent-stylesheet', get_template_directory_uri() . '/style.css?' . ( (DEVMODE === true) ? time() : '' )  );
    wp_enqueue_style( 'avada-child-stylesheet', IFROOT . '/style.css?' . ( (DEVMODE === true) ? time() : '' ) );
    wp_enqueue_style( 'jquery-ui-str', RESOURCES . '/vendor/jquery-ui-1.12.1/jquery-ui.structure.min.css');
    wp_enqueue_style( 'jquery-ui', RESOURCES . '/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css');

    wp_enqueue_script('jquery-ui', RESOURCES . '/vendor/jquery-ui-1.12.1/jquery-ui.min.js', array('jquery'));
    // AngularJS
    wp_enqueue_style( 'angular-material', 'http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css');
    wp_enqueue_script('angular-base', 'http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js' );
    wp_enqueue_script('angular-animate', 'http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js' );
    wp_enqueue_script('angular-aria', 'http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js' );
    wp_enqueue_script('angular-messages', 'http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js' );
    wp_enqueue_script('angular-material', 'http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js' );
    wp_enqueue_script('angular-functions', IFROOT . '/assets/js/angulars.js?t=' . ( (DEVMODE === true) ? time() : '' ), true  );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function ao_enqueue_styles() {
    wp_enqueue_style( 'alphenhotel-ozon', IFROOT . '/assets/css/alphenhotel-ozon.css?' . ( (DEVMODE === true) ? time() : '' ) );
}
add_action( 'wp_enqueue_scripts', 'ao_enqueue_styles', 100 );

/**
* AJAX REQUESTS
*/
function ajax_requests()
{
  $ajax = new AjaxRequests();
  $ajax->send_room_request();
}
add_action( 'init', 'ajax_requests' );

// AJAX URL
function get_ajax_url( $function )
{
  return admin_url('admin-ajax.php?action='.$function);
}

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

function flag_lang_selector()
{
  $local = get_locale();
  $domain = str_replace(array('en.', 'de.'), '',get_option('siteurl',''));
  ?>
  <div class="lang-selector">
    <a class="<?=($local == 'hu_HU')?'selected':''?>" href="<?=$domain?>"><img src="<?=IMAGES?>/flags/hu.png" alt="HU"></a>
    <a class="<?=($local == 'en_US')?'selected':''?>"  href="<?=($local == 'en_US')?get_option('siteurl',''):str_replace('http://','http://en.',$domain)?>"><img src="<?=IMAGES?>/flags/en.png" alt="EN"></a>
    <a class="<?=($local == 'de_DE')?'selected':''?>"  href="<?=($local == 'de_DE')?get_option('siteurl',''):str_replace('http://','http://de.',$domain)?>"><img src="<?=IMAGES?>/flags/de.png" alt="DE"></a>
  </div>
  <?
}
add_action('avada_logo_append', 'flag_lang_selector');
