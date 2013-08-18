<?php
/**
 * The Template for displaying all single posts
 *
 */
?>
<?php get_header(); ?>

<?php if ( 'post' == get_post_type() ){?>

		<div id="content" class="row clearfix">
		      <div id="main" class="span9" role="main">	
		      
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
		<?php the_content(); ?>	
		
		<hr/>



		<?php comments_template( '', true ); ?>
		
		<hr>
		

		
		<div class="navigation clearfix">
<div class="alignleft">
<?php previous_post('<i class="icon-long-arrow-left icon-large"></i> %', '', 'yes'); ?>
</div>
<div class="alignright">
<?php next_post('% <i class="icon-long-arrow-right icon-large"></i>', '', 'yes'); ?>
</div>
</div> <!-- end navigation -->
		
		<?php endwhile; ?>

  </div><!-- /#main -->
		
		<div id="sidebar" class="span3" >
		<?php dynamic_sidebar('blog'); ?>
		</div>
		
		    </div><!-- /#content -->
		    
		    
		<?php get_footer(); ?>
		
<?php } ?>

<?php if ( 'post' != get_post_type() ){?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
		<?php the_content(); ?>			

		<?php endwhile; ?>
		
		<?php get_footer(); ?>

<?php } ?>

		