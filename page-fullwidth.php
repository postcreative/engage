<?php
/**
* Template Name: Full width page
*
*/
?>
<?php get_header(); ?>

<div id="content" class="row clearfix">

		<?php while (have_posts()) : the_post(); ?>	
		<?php the_content(); ?>	
		<?php endwhile; /* End loop */ ?>
	

</div><!-- /#content -->

<?php get_footer(); ?>