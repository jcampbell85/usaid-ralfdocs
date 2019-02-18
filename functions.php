<?php
define('USAIDRALF_TEMPLATE_DIR', dirname(__FILE__));

add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'usaidralf_scripts', 100);
function usaidralf_scripts(){
  wp_register_script(
    'bootstrap-script', 
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 
    array('jquery'), 
    '', 
    true
  );

  wp_register_script(
    'usaidralf-scripts', 
    get_template_directory_uri() . '/js/usaidralf-scripts.js', 
    array('jquery'), 
    false, 
    true
  ); 
  
  wp_enqueue_script('bootstrap-script');
  wp_enqueue_script('usaidralf-scripts');  
}

add_action('wp_enqueue_scripts', 'usaidralf_styles');
function usaidralf_styles(){
  wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_register_style('google-fonts', '//fonts.googleapis.com/css?family=Lato:400,400i,700');
  wp_register_style('usaidralf', get_template_directory_uri() . '/style.css');
  
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('google-fonts');
  wp_enqueue_style('usaidralf');
}

add_action('after_setup_theme', 'usaidralf_theme_setup');
function usaidralf_theme_setup(){
  add_theme_support('post-thumbnails');
  load_theme_textdomain('usaidralf', get_template_directory() . '/languages');
  register_nav_menu('header-nav', esc_html__('Header Navigation', 'usaidralf'));
}

require_once USAIDRALF_TEMPLATE_DIR . '/includes/class-wp_bootstrap_navwalker.php';

function usaidralf_header_fallback_menu(){ ?>
      
  <div id="navbar" class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
      <li<?php if(is_front_page()){ echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html__('Home', 'usaidralf'); ?></a></li>
      <li<?php if(is_page('about')){ echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url('about')); ?>"><?php echo esc_html__('About', 'usaidralf'); ?></a></li>
      <li<?php if(is_page('contact')){ echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url('contact')); ?>"><?php echo esc_html__('Contact', 'usaidralf'); ?></a></li>
      <li<?php if(is_page('view-report')){ echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url('view-report')); ?>"><?php echo esc_html__('View Report', 'usaidralf'); ?></a></li>
    </ul>
  </div>

<?php }

function usaidralf_get_field_excerpt($field_name){
  global $post;
  $text = get_field($field_name);
  if($text != ''){
    $text = strip_shortcodes($text);
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $excerpt_length = 20;
    $excerpt_more = apply_filters('excerpt_more', ' ', '[...]');
    $text = wp_trim_words($text, $excerpt_length, $excerpt_more);
  }
  return apply_filters('the_excerpt', $text);
}
