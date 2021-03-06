<?php
/**
 * The template used to display Tag Archive pages
 *
 */
?>
<?php get_header(); ?>

<div id="content" class="row clearfix">
      <div id="main" class="span8" role="main">

<?php if ( have_posts() ): ?>
<h1><?php echo single_tag_title( '', false ); ?></h1>
<?php while ( have_posts() ) : the_post(); ?>

<!-- View template content -->

<?php endwhile; ?>

<?php else: ?>
<h1>No posts to display</h1>
<?php endif; ?>
<footer>
<?php engage_pagination();?>
</footer>
     </div><!-- /#main -->

<div id="sidebar" class="span4" >
<?php dynamic_sidebar('blog'); ?>
</div>


    </div><!-- /#content -->

<?php get_footer(); ?>