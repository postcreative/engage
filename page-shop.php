<?php
/**
 * Template Name: Shop template
 *
 */
?>
<?php get_header(); ?>

<div id="content" class="row clearfix">
      <div id="main" class="span8" role="main">

        <?php while (have_posts()) : the_post(); ?>
      <header class="page page-header">
      	<h1><?php the_title(); ?></h1>
      </header>
<?php the_content(); ?>
     	 
  
 <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

<?php endwhile; /* End loop */ ?>
     
     </div><!-- /#main -->

<div id="sidebar" class="span4" >
<?php dynamic_sidebar('shop-general'); ?>
</div>

    </div><!-- /#content -->

<?php get_footer(); ?>