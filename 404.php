<?php
/**
 * The template for displaying 404 pages (Not Found)
 *

 */
?>
<?php get_header(); ?>
<article>

<header class="page-header">
<h1>Opps we don't have the page you're looking for <i class="icon-frown"></i></h1>
</header>
<p>You may have followed a bad link or mis-typed a url.</p>
 <p>Or the website fairies have been up to their old tricks again!</p>
<p>Worry not... </p>
<p>Below you will find links to everything we have on our website (we're not shy) or you might find it easier to try a search.</p>
<div class="search">
		<?php get_search_form(); ?>
	</div>
</article>	

<hr>

	<h2>Sitemap <i class="icon-sitemap"></i></h2>
<div class="row clearfix">
	<div class="span6">
	
<h3 id="posts">Blog posts</h3>
<ul class="unstyled">
<?php
// Add categories you'd like to exclude in the exclude here
$cats = get_categories('exclude=');
foreach ($cats as $cat) {
  echo "<li><h4>".$cat->cat_name."</h4>";
  echo "<ul class='unstyled'>";
  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
  while(have_posts()) {
    the_post();
    $category = get_the_category();
    // Only display a post link once, even if it's in multiple categories
    if ($category[0]->cat_ID == $cat->cat_ID) {
      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
    }
  }
  echo "</ul>";
  echo "</li>";
}
?>
</ul>
<?php
foreach( get_post_types( array('public' => true) ) as $post_type ) {
  if ( in_array( $post_type, array('post','page','attachment') ) )
    continue;

  $pt = get_post_type_object( $post_type );

  echo '<h3>'.$pt->labels->name.'</h3>';
  echo '<ul>';

  query_posts('post_type='.$post_type.'&posts_per_page=-1');
  while( have_posts() ) {
    the_post();
    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
  }

  echo '</ul>';
}
?>
	</div>
	
	<div class="span6">
	
	<h3 id="authors">Authors</h3>
<ul class="unstyled">
<?php
wp_list_authors(
  array(
    'exclude_admin' => false,
  )
);
?>
</ul>

<h3 id="pages">Pages</h3>
<ul class="unstyled">
<?php
// Add pages you'd like to exclude in the exclude here
wp_list_pages(
  array(
    'exclude' => '',
    'title_li' => '',
  )
);
?>
</ul>

	</div>

</article>

</div><!-- /.row -->



<?php get_footer(); ?>