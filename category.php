<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_header(); ?>

<div id="content" class="row clearfix">
      <div id="main" class="span9" role="main">

		<?php if ( have_posts() ): ?>
		<h1><?php echo single_cat_title( '', false ); ?></h1>
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

	<div id="sidebar" class="span3" >
		<?php dynamic_sidebar('blog'); ?>
	</div>


</div><!-- /#content -->

<?php get_footer(); ?>