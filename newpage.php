<?php
/*
Template Name: test
*/
get_header(); ?>




<?php 
wp_list_categories( array( 'depth'=>1, 'exclude'=>1 ) );

/*
$root_categories = get_categories('exclude=1');


echo '<pre>';
print_r($root_categories);
echo '</pre>';

foreach($root_categories as $value) {
if($value->parent == 0){
echo "<a href='" . site_url() . "/category/" . $value->slug . "'>" . $value->cat_name . "</a>" . $value->category_count;
}
}

*/
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
