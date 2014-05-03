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
$ttag = $_GET["ttag"];
$pclass = $_GET["type"]; 
$catname=get_cat_name($cat);
?>

<p>
<?php echo (($ttag!="") ? "Tag: <b>" . $ttag . '</b> <a href="' . remove_parameter("ttag") . '">X</a> ' :"") . (($ttag!="" && $pclass!="") ? "  |  " : "") . (($pclass!="") ? " Post type: <b>" . $pclass . '</b> <a href="' . remove_parameter("type") . '">X</a>' :""); ?></p>

<h1><?php echo $catname; ?></h1>

<?php
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query( array( 'cat' => $cat, 'showposts' => 25, 'paged' => $paged, 'tag' => $ttag, 'postclass' => $pclass ) );
?>

<?php 
$catarray =array(); 
$tagarray=array();
$postcarray=array();
while ( have_posts() ) : the_post(); 
include('newloop.php');
$catls = get_the_category_list(); 
$catt = trim( strip_tags( get_the_category_list() ) ); if($catt != "" && !in_array($catt, $catarray)) { $catarray[] = $catt; } 
$tgarray = explode( ",",strip_tags( get_the_tag_list('', ',',',')) );
foreach($tgarray as $tagt) { 
	if($tagt != "" && $tagt != "[empty]" && !in_array($tagt, $tagarray)) { 
		$tagarray[] =$tagt; 
		} 
	} 
$pcarray = explode( ",",strip_tags( get_the_term_list($post->ID, 'postclass', '', ',',',')) );
foreach($pcarray as $tagt) {
if($tagt != "" && $tagt != "[empty]" && !in_array($tagt, $postcarray)) { $postcarray[] =$tagt; } } 
?>

<?php endwhile; // End the loop. Whew. ?>


</div><!-- span9-->
<?php include('newsidebar.php'); ?>


</div><!-- row-->
</div><!-- container -->



