<?php
/*
Template Name: storylist
*/
get_header(); ?>
<div class="container-fluid">
      <div class="row-fluid">
       <div class="span9">

<?php if($user_ID) { 

	$user_name = $current_user->user_login;
	$sortby = $_GET['sortby'];
	$voted = $_GET['voted'];
	$shortlisted = $_GET['shortlisted'];
	if($_GET['storyid']) { // if the admin voted, then we'll add (or update if already exists) a custom field for that post, for the admin user, with their vote (the key is the admin user's ID, the value is the vote). This is so that on the story page we can see what each person's vote was. We also increment the custom field which counts the number of yes, no or maybe votes.
		$story_id = $_GET['storyid'];
		$my_vote = $_GET['myvote'];
		$yesvotes = get_post_meta($story_id, 'yesvotes', true); 
		$maybevotes = get_post_meta($story_id, 'maybevotes', true); 
		$novotes = get_post_meta($story_id, 'novotes', true); 
		$myprevvote = get_post_meta($story_id, $user_name, true); 
		if($my_vote==$myprevvote){
		echo "";
		} else {
				if($my_vote == 'yes'){
					$yesvotes++;
					update_post_meta($story_id, 'yesvotes', $yesvotes); 
					if($myprevvote == 'maybe'){
						$maybevotes--;
						update_post_meta($story_id, 'maybevotes', $maybevotes); 
					}
					if($myprevvote == 'no'){
						$novotes--;
						update_post_meta($story_id, 'novotes', $novotes); 
					}
				}
				if($my_vote == 'maybe'){
					$maybevotes++;
					update_post_meta($story_id, 'maybevotes', $maybevotes); 
					if($myprevvote == 'yes'){
						$yesvotes--;
						update_post_meta($story_id, 'yesvotes', $yesvotes); 
					}
					if($myprevvote == 'no'){
						$novotes--;
						update_post_meta($story_id, 'novotes', $novotes); 
					}
				}
				if($my_vote == 'no'){
					$novotes++;
					update_post_meta($story_id, 'novotes', $novotes); 
					if($myprevvote == 'yes'){
						$yesvotes--;
						update_post_meta($story_id, 'yesvotes', $yesvotes); 
					}
					if($myprevvote == 'maybe'){
						$maybevotes--;
						update_post_meta($story_id, 'maybevotes', $maybevotes); 
					}
				}
				update_post_meta($story_id, $user_name, $my_vote); 
				update_post_meta($story_id, 'votereceived', 'y' ); 
				}
	}
	?>
	<?php
	
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$wp_query= null;
	$wp_query = new WP_Query();
	$ppp=50;
$args=array(
   'posts_per_page' => $ppp,
   'paged' => $paged 
 );
	
	if($sortby=='votes'){
	$orderargs = array(
	'meta_key' => 'yesvotes', // $sortby = votes
	'orderby' => 'meta_value', 
	'order' => 'DESC'
	);
	$args = array_merge($args, $orderargs);
	}
	if($voted=='ihavent'){
	$notmevoteargs = array( 
	 'meta_query' => array(
		      array(
		          'key'     => $user_name,
		          'compare' => 'NOT EXISTS',
		      ),
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	) );
	$args = array_merge($args, $notmevoteargs);
	}
	if($voted=='nobodyhas'){
	$nobodyvotedargs = array( 
	 'meta_query' => array(
		      array(
		          'key'     => 'votereceived',
		          'compare' => 'NOT EXISTS',
		      ),
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => -1
	) );
	$args = array_merge($args, $nobodyvotedargs);
	}
	if($shortlisted!=''){
	$shortlistedargs = array( 
	 'tax_query' => array ( // $shortlisted = yes, tbd, yes and tbd, no
		      array (
		          'taxonomy' => 'shortlisted',
		          'field' => 'slug',
		          'terms' => array($shortlisted),
		          'operator' => 'IN'
		      )
	) );
	$args = array_merge($args, $shortlistedargs);
	}


	?>
	<?php /* echo $GLOBALS['wp_query']->request; */ ?>
	<?php 
	$wp_query->query( $args );
	$countposts = $wp_query->found_posts;
	if($countposts>0) {
	echo "<h4>Showing ".((($paged-1)*$ppp)+1)." to ". ($countposts > $ppp ? $paged*$ppp : $countposts) . " of " . $countposts . " stories" . ($shortlisted!=""||$voted!="" ? " matching your filter [<a href='".site_url()."/storylist'>X</a>]" : "" ) . "</h4><hr>";
	} else {
	echo "<h4>No stories match your filter [<a href='".site_url()."/storylist'>X</a>]</h4><hr>";
	} 
	while ( have_posts() ) : the_post(); 
	include('newloop.php');
	?>

	<?php endwhile; // End the loop. Whew. ?>

<div><?php next_posts_link( 'Older posts' ); ?></div>
<div><?php previous_posts_link( 'Newer posts' ); ?></div>

	</div><!-- span9-->
	<?php include('newsidebar.php'); ?>

<?php
} else { 
 ?>
<h2>Please register as an administrator. Once your registration has been approved, you'll be able to view this page.</h2>
<p><a href="<?php echo home_url();?>/wp-login.php?action=register">Sign up</a> </p>

<h2>Already registered? Log in <a href="<?php echo home_url();?>/wp-login.php">here.</a></h2>


<?php } ?>


</div><!-- row-->
</div><!-- container -->

