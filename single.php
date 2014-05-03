<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>
<div class="container">
<div class="row">
<div class="span12 single">

<?php
$user_name = $current_user->user_login;

	if($_GET['storyid'] && $_GET['myvote']) { // if the admin voted, then we'll add (or update if already exists) a custom field for that post, for the admin user, with their vote (the key is the admin user's ID, the value is the vote). This is so that on the story page we can see what each person's vote was. We'll also add a custom field "votereceived" so that the posts can be filtered by which posts have not received a vote. 
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
	if($_GET['shortlist']) { // if a penguin admin shortlisted the post then update the relevant custom taxonomy accordingly
			$story_id = $_GET['storyid'];
			$shortlist = $_GET['shortlist'];
			if($shortlist=='yes'||$shortlist=='no'){
				wp_set_post_terms($story_id,$shortlist,'shortlisted');
			}
	}
?>
<?php	while ( have_posts() ) : the_post(); ?>
<h1><?php the_title(); ?></h1> 
<hr>
<?php 
$postidd = $post->ID;

the_content(); 
echo "<hr>";
echo "<b>How did these events impact you?</b>&nbsp;" . get_post_meta($post->ID, 'impact', true);
echo "<br><b>Which characters or roles were involved?</b>&nbsp;" . strip_tags(get_the_term_list( $post->ID, 'characters', '', ', ', '' )); 

echo "<br><br>Submitted on " . get_the_date() . " by <a href='mailto:" . get_post_meta($post->ID, 'emailaddress', true) . "'>" . get_post_meta($post->ID, 'firstname', true) . " " . get_post_meta($post->ID, 'surname', true)."</a>"; ?> <!-- Posted on January 8, 2013 by firstname surname -->
<br />
<?php $tags_list = get_the_tag_list( '', ', ' ); if ( $tags_list ): ?> <?php printf( __( 'Themes: %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?> <?php endif; ?> <!-- tags -->
&emsp;
<?php 
$user_name = $current_user->user_login;
$prevvotethispost = get_post_meta($post->ID, $user_name, true); 
?>

<?php echo "Shortlisted: " . strip_tags(get_the_term_list( $post->ID, 'shortlisted', '', ', ', '' )); ?>
&emsp;
<?php echo "Votes: " . ($prevvotethispost == 'yes' ? 'yes' : '<a href="' . get_permalink() . '?storyid='.$post->ID.'&myvote=yes">yes</a>' ) . ' ('.get_post_meta($post->ID, "yesvotes", true).')'; 
?>
&nbsp;
<?php echo ($prevvotethispost == 'maybe' ? 'maybe' : '<a href="' . get_permalink(). '?storyid='.$post->ID.'&myvote=maybe">maybe</a>' ) . ' ('.get_post_meta($post->ID, "maybevotes", true).')'; 
?>
&nbsp;
<?php echo ($prevvotethispost == 'no' ? 'no' : '<a href="' . get_permalink(). '?storyid='.$post->ID.'&myvote=no">no</a>' ) . ' ('.get_post_meta($post->ID, "novotes", true).')'; 
?>
<br><br>
Votes so far:
<?php $custom = get_post_custom(); 
$yesarray =array(); 
$maybearray =array(); 
$noarray =array(); 
foreach($custom as $key => $value){
foreach($value as $b => $c){
if($c=='yes'){ 
echo '<br><b>'. $key . '</b> voted <b>' . $c . '</b>';
}
if($c=='maybe'){ 
echo '<br><b>'. $key . '</b> voted <b>' . $c . '</b>';
}
if($c=='no'){ 
echo '<br><b>'. $key . '</b> voted <b>' . $c . '</b>';
}
}
} ?>

<br><br>
<?php if( current_user_can( 'manage_options' ) ) { ?>

Shortlist this story: 
<?php echo "<a class='btn btn-success' href='" . get_permalink() . "?storyid=".$post->ID."&shortlist=yes'>yes</a>"; ?>
&nbsp;
<?php echo "<a class='btn btn-danger' href='" . get_permalink() . "?storyid=".$post->ID."&shortlist=no'>no</a>"; ?>
&nbsp;
<?php echo "<a class='btn btn-warning' href='" . get_permalink() . "?storyid=".$post->ID."&shortlist=tbd'>undecided</a>"; ?>

<?php } ?>

<br>
<br>
<?php

					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					
					

					
					
	endwhile; ?>




</div>
</div>
</div>
</div>
