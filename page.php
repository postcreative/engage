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

    <div id="main" class="span9" role="main">
    
        <?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; /* End loop */ ?>

    </div><!-- /#main -->

	<div id="sidebar" class="span3" >
		<?php dynamic_sidebar('page'); ?>
	</div>

</div><!-- /#content -->

<?php get_footer(); ?>