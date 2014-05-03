<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>
<div class="container-fluid">
      <div class="row-fluid">
       <div class="span9">
<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  
$denominator = $term->taxonomy; $numerator = $term->name;
$ttag = $_GET["tag"];
$ccat = $_GET["category"];
$catid = get_cat_id($ccat);
?>

<?php 
 function remove_parameter($parameter) 
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
  return htmlentities($output); 
 } 
?> 

<h1>

<?php 

echo $term->taxonomy . " - " . $term->name . (($ttag!="") ? ", tag - " . $ttag . '<a href="' . remove_parameter("tag") . '">X</a>' :""). (($ccat!="") ? ", subject - " . $ccat . '<a href="' . remove_parameter("category") . '">X</a>' :""); ?></h1>
<?php
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query( array( 'showposts' => 25, 'paged' => $paged, 'cat' => $catid, 'tag' => $ttag, $term->taxonomy => $term->slug ) ); ?>

<?php 
while ( have_posts() ) : the_post(); 
include('newloop.php');
?>
<?php endwhile; // End the loop. Whew. ?>


</div><!-- span9-->

<?php include('newsidebar.php'); ?>


</div><!-- row-->
</div><!-- container -->



