<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
get_header(); ?>
<div class="container-fluid">
      <div class="row-fluid">
       <div class="span12">


	<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h4 class="archive-title"><?php printf( __( 'Theme: %s', 'twentyfourteen' ), single_tag_title( '', false ) ); ?></h4>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
<hr>
			</header><!-- .archive-header -->

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
include('newloop.php');

					endwhile;
					// Previous/next page navigation.
			
				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

</div><!-- col1 -->
</div><!-- row-->
</div><!-- container -->
