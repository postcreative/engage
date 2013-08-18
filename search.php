<?php
/**
 * Search results page
 */
?>
<?php get_header(); ?>
<div id="content" class="row clearfix">
      <div id="main" class="span9" role="main">
      
<?php if ( have_posts() ): ?>
<h1>Search Results for '<?php echo get_search_query(); ?>'</h1>	

<?php while ( have_posts() ) : the_post(); ?>

<!-- View template content -->

<?php endwhile; ?>

<?php else: ?>
<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
<?php endif; ?>
<footer>
<?php engage_pagination();?>
</footer>
     </div><!-- /#main -->

<div id="sidebar" class="span3" >
<?php dynamic_sidebar('search'); ?>
</div>

    </div><!-- /#content -->

<?php get_footer(); ?>