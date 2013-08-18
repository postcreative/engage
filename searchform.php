<?php
/**
 * The template for displaying search forms in engage
 *
 * @package engage
 */
?>

<form role="search" method="get" class="input-append search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="search" class="span2 search-field" id="appendedInputButton" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'engage' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'engage' ); ?>" />
	</label>
	<input type="submit" class="btn search-submit" value="<?php echo esc_attr_x( 'Go', 'submit button', 'engage' ); ?>" />
</form>