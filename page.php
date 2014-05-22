<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */
?>
<?php get_header(); ?>

	<div id="content" class="row clearfix">
		
		<article class="post-<?php the_ID(); ?>" <?post_class(); ?>>
		      <div id="main" class="span8" role="main">	
		           <header class="page-header">
              <h1><?php the_title(); ?>	</h1>
          </header>
    
        <?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; /* End loop */ ?>

    </div><!-- /#main -->
		</article>
		
	<div id="sidebar" class="span4" >
		<?php dynamic_sidebar('page'); ?>
	</div>

</div><!-- /#content -->

<?php get_footer(); ?>