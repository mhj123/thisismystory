<?php
/**
 * The template for displaying Category Archive pages.
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
$catname = $_GET["category"];
$catid = get_cat_id($catname);



$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query( array( 'showposts' => 25, 'paged' => $paged, $term->taxonomy => $term->slug ) ); ?>

<?php 
while ( have_posts() ) : the_post(); 
include('newloop.php');
?>


<?php endwhile; // End the loop. Whew. ?>


</div><!-- span9-->

<?php include('newsidebar.php'); ?>


</div><!-- row-->
</div><!-- container -->



