
<?php
/*
Template Name: newhome
*/
get_header();
?>

 <div class="container-fluid">
      <div class="row-fluid">
       <div class="span12">

<?php 

echo"<pre>";
print_r($_POST);
echo"</pre>";


if( function_exists( 'cptch_check_custom_form' ) && cptch_check_custom_form() !== true ) {
echo "<p>You didn't complete the \"Prove you're human\" test. Please press the Back button in your browser and try again.</p>";
}

else if(strlen($_POST['content'])<10) {
echo "<p>You didn't post a story. Please press the Back button in your browser and try again.</p>";
} 

else if(strlen($_POST['content'])>5000) {
echo "<p>Your story was longer than 5,000 characters. Brevity is a virtue! Please press the Back button in your browser and edit your story down.</p>";
} 

else if(!filter_var($_POST['emailaddress'], FILTER_VALIDATE_EMAIL)) {
echo "<p>You didn't enter a valid email address. Please press the Back button in your browser and try again.</p>";
} 

else {
  if( !empty( $_POST['firstname'] ) ) {
      // Add the content of the form to $post as an array
      $new_post = "";
      $new_post = array(
          'post_title'    => $_POST['title'],
          'post_content'  => $_POST['content'],
          'post_category' => array($_POST['cat']),  // Usable for custom taxonomies too
          'post_status'   => 'publish'           // Choose: publish, preview, future, draft, etc.
         /* 'post_type' => $_POST['post_type']  // Use a custom post type if you want to
          */
      );
      //save the new post
      $lipid = wp_insert_post($new_post); 
      
      //insert taxonomies

  /**/
  wp_set_post_tags($lipid, $_POST['post_tags']);
  add_post_meta($lipid,'firstname',$_POST['firstname']);
  add_post_meta($lipid,'surname',$_POST['surname']);
  add_post_meta($lipid,'emailaddress',$_POST['emailaddress']);
  add_post_meta($lipid,'impact',$_POST['impact']);
  add_post_meta($lipid,'yesvotes','0');
  add_post_meta($lipid,'maybevotes','0');
  add_post_meta($lipid,'novotes','0');
  wp_set_post_terms($lipid,$_POST['characters'],'characters');
  wp_set_post_terms($lipid,'tbd','shortlisted');


  $postcat= array($_POST['cat']);
} ?>

<p>Thanks for sending us your story!</p>

<p>We've received it safely. We'll be in touch once we've read everyone's story.</p>


         
<?php
}
 ?>




</div><!-- span12 -->
</div><!-- row-->
</div><!-- container -->
<?php get_footer(); ?>