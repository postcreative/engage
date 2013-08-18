<?php
/**
 * Template Name: Home page
 *
 */
?>
<?php get_header(); ?>

<div id="content" class="row clearfix">
      <div id="main" class="span12" role="main">

        <?php while (have_posts()) : the_post(); ?>

<?php the_content(); ?>
     	 
  

<?php endwhile; /* End loop */ ?>
     
     </div><!-- /#main -->


    </div><!-- /#content -->

<?php get_footer(); ?>