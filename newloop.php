
<div class="list-title"><p><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p></div>
<!--<div class="list-post">
<?php the_content(); ?>
</div>-->
<div class="post-details">
<?php echo "Submitted on " . get_the_date() . " by <a href='mailto:" . get_post_meta($post->ID, 'emailaddress', true) . "'>" . get_post_meta($post->ID, 'firstname', true) . " " . get_post_meta($post->ID, 'surname', true)."</a>"; ?> <!-- Posted on January 8, 2013 by firstname surname -->
&emsp;
<?php $tags_list = get_the_tag_list( '', ', ' ); if ( $tags_list ): ?> <?php printf( __( 'Themes: %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?> <?php endif; ?> <!-- tags -->
<br />
<?php 
$user_name = $current_user->user_login;
$prevvotethispost = get_post_meta($post->ID, $user_name, true); 
?>

<?php echo "Votes: " . ($prevvotethispost == 'yes' ? 'yes' : '<a href="' . get_site_url() . '/storylist/?storyid='.$post->ID.'&myvote=yes">yes</a>' ) . ' ('.get_post_meta($post->ID, "yesvotes", true).')'; 
?>
&nbsp;
<?php echo ($prevvotethispost == 'maybe' ? 'maybe' : '<a href="' . get_site_url() . '/storylist/?storyid='.$post->ID.'&myvote=maybe">maybe</a>' ) . ' ('.get_post_meta($post->ID, "maybevotes", true).')'; 
?>
&nbsp;
<?php echo ($prevvotethispost == 'no' ? 'no' : '<a href="' . get_site_url() . '/storylist/?storyid='.$post->ID.'&myvote=no">no</a>' ) . ' ('.get_post_meta($post->ID, "novotes", true).')'; 
?>
&emsp;|&emsp;
<?php comments_number( '0 comments', '1 comment', '% comments' ); ?>
&emsp;|&emsp;
<?php echo "Shortlisted: <b>" . strip_tags(get_the_term_list( $post->ID, 'shortlisted', '', ', ', '' ))."</b>"; ?>
</div>
<?php echo "<hr>"; ?>


<!-- <?php echo "<a href='" . get_post_meta($post->ID, 'SourceURL', true) . "'>" . get_post_meta($post->ID, 'SourceJournal', true) . "</a>"; ?> -->
