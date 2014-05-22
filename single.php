<?php
/**
 * The Template for displaying all single posts
 *
 */
?>
<?php get_header(); ?>

<?php if ( 'post' == get_post_type() ){?>

		<div id="content" class="row clearfix">
		
		<article class="post-<?php the_ID(); ?>" <?post_class(); ?>>
		      <div id="main" class="span8" role="main">	
		           <header class="page-header">
              <h1><?php the_title(); ?>	</h1>
          </header>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
		<?php the_content(); ?>	
		
		<hr/>



		<?php comments_template( '', true ); ?>
		
		<hr>

		<nav class="navigation clearfix">
<div class="alignleft">
<?php previous_post('<i class="icon-long-arrow-left icon-large"></i> %', '', 'yes'); ?>
</div>
<div class="alignright">
<?php next_post('% <i class="icon-long-arrow-right icon-large"></i>', '', 'yes'); ?>
</div>
</nav> <!-- end navigation -->
		
		<?php endwhile; ?>
		     
	</div><!-- /#main -->	
		      </article>

  
		
		<aside id="sidebar" class="span4" >
		<?php dynamic_sidebar('blog'); ?>
		</aside>
		
		    </div><!-- /#content -->
		    
		    
		<?php get_footer(); ?>
		
		
		
		
		
<?php } ?>

<?php if ( 'post' != get_post_type() ){?>

<div id="content" class="row clearfix">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
		<?php the_content(); ?>			

		<?php endwhile; ?>
</div>
		
		<?php get_footer(); ?>

<?php } ?>

		