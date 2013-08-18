<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
?>
<?php get_header(); ?>

<div id="content" class="row clearfix">
      <div id="main" class="span9" role="main">

<?php if ( have_posts() ): ?>
<header>
<?php if ( is_day() ) : ?>
<h1>Day: <?php echo  get_the_date( 'D M Y' ); ?></h1>							
<?php elseif ( is_month() ) : ?>
<h1>Month: <?php echo  get_the_date( 'M Y' ); ?></h1>	
<?php elseif ( is_year() ) : ?>
<h1>Year: <?php echo  get_the_date( 'Y' ); ?></h1>								
<?php else : ?>
<h1>Archive</h1>	
<?php endif; ?>
</header>

<?php while ( have_posts() ) : the_post(); ?>

<!-- View template content -->

<?php endwhile; ?>

<?php else: ?>
<h1>No posts to display</h1>
<?php endif; ?>

     </div><!-- /#main -->

<footer>
<?php engage_pagination();?>
</footer>

<div id="sidebar" class="span3" >
<?php dynamic_sidebar('blog'); ?>
</div>


    </div><!-- /#content -->

<?php get_footer(); ?>