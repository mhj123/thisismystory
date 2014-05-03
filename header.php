<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_enqueue_script("jquery"); ?>
<?php 
wp_enqueue_script( tinymcescript, get_template_directory_uri() . '/jscripts/tiny_mce/tiny_mce.js' ); 
wp_enqueue_script( tinymcescriptinclude, get_template_directory_uri() . '/jscripts/tiny_mce/tiny_mce_include.js' ); 

 ?>
 <?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/jscripts/jquery.backstretch.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.js"></script>
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css" media="screen">
    html { margin-top: 0px !important; }
  * html body { margin-top: 0px !important; }
    body.home { background: url("<?php echo site_url(); ?>/wp-content/uploads/2014/03/texturetastic_gray.png") repeat 0 0; }
</style>
</head>

<body <?php body_class(); ?> role="application">

  <?php 
 function add_or_change_parameter($parameter, $value) 
 { 
  $params = array(); 
  $output = "?"; 
  $firstRun = true; 
  foreach($_GET as $key=>$val) 
  { 
   if($key != $parameter) 
   { 
    if(!$firstRun) 
    { 
     $output .= "&"; 
    } 
    else 
    { 
     $firstRun = false; 
    } 
    $output .= $key."=".urlencode($val); 
   } 
  } 
  if(!$firstRun) 
   $output .= "&"; 
  $output .= $parameter."=".urlencode($value); 
  return htmlentities($output); 
 }
?> 
  
<?php if(!is_home()) { ?>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <ul class="nav">
        <a class="brand" href="<?php echo home_url(); ?>/storylist">story<b>competition</b></a>
    </div>
  </div>
</div>
<?php } ?>

