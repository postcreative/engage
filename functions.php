<?php
	/**
	 * engage functions and definitions v1
	 *
	 */


/*====================================================================================================================

	Requires from the library - use for larger functions
	 
=========================================================================================================================
*/


     
 require_once('library/wp_bootstrap_navwalker.php');
 
 require_once('library/pagination.php');



   
/*====================================================================================================================

	CONTENT WIDTHS
	 
=========================================================================================================================
*/

if ( ! isset( $content_width ) )
    $content_width = 770;
 
function engage_adjust_content_width() {
    global $content_width;
 
    if ( is_page_template( 'page-fullwidth.php' ) )
        $content_width = 1170;
}
add_action( 'template_redirect', 'engage_adjust_content_width' );

/*====================================================================================================================

	THUMBNAILS
	 
=========================================================================================================================
*/	
    // full-width thumbnails - adjust sizes in child theme to add sizes that allow for your any padding your theme requires.

	add_theme_support('post-thumbnails');
	

/*   ====================================================================================================================

	MENUES
	 
=========================================================================================================================
*/	
	
    function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
    }
    add_action( 'init', 'register_my_menu' );
    
    
      

/*   ====================================================================================================================

	UTILITIES
	 
=========================================================================================================================
*/


		//Add page slug to body class

		function add_body_class( $classes )
		{
		    global $post;
		    if ( isset( $post ) ) {
		        $classes[] = $post->post_type . '-' . $post->post_name;
		    }
		    return $classes;
		}
		add_filter( 'body_class', 'add_body_class' );





/*   ====================================================================================================================

	SCRIPTS
	 
=========================================================================================================================
*/

	function engage_script_enqueuer() {
	
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );
		
		
		 wp_register_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css', '', '', 'screen' );
		wp_enqueue_style( 'bootstrap');
		
		wp_enqueue_style( 'awesome', '//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css' ) ;
				
		
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
		wp_enqueue_style( 'screen' );
		
		wp_register_style( 'responsive', get_template_directory_uri().'/css/bootstrap-responsive.css', '', '', 'screen' );
		wp_enqueue_style( 'responsive' ); 
		
		
		}	

add_action( 'wp_enqueue_scripts', 'engage_script_enqueuer', 5 );





	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>" class="comment clearfix">
				<div class="alignleft"><?php echo get_avatar( $comment ); ?></div>
				<div class="comment-body">
				<h4 class="comment-heading"><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
				</div>
				
			</article>
		<?php endif;
	}
	
		


/*   ====================================================================================================================

	WOOCOMMERCE
	 
=========================================================================================================================
*/

	/**
	 * Support for Woocommerce
	 * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
	 */


//unhook wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'engage_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'engage_wrapper_end', 10);


//
function engage_wrapper_start() {
  echo '<div id="content" class="row clearfix">';
  echo '<div id="main" class="span12" role="main">';
}

function engage_wrapper_end() {
  echo '</div>';
  echo '</div>';
}

//add theme support
add_theme_support( 'woocommerce' );


//show 4 thumbnails in product gallery

add_filter ( 'woocommerce_product_thumbnails_columns', 'xx_thumb_cols' );
 function xx_thumb_cols() {
     return 4; // .last class applied to every 4th thumbnail
 }


/*   ====================================================================================================================

	LIMIT WHO CAN A NEW USER, OR DELETE A USER WITH THE ROLE OF ADMINISTRATOR
	 
=========================================================================================================================
*/

class engage_User_Caps {

  // Add our filters
  function engage_User_Caps(){
    add_filter( 'editable_roles', array(&$this, 'editable_roles'));
    add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
  }

  // Remove 'Administrator' from the list of roles if the current user is not an admin
  function editable_roles( $roles ){
    if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
      unset( $roles['administrator']);
    }
    return $roles;
  }

  // If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
  function map_meta_cap( $caps, $cap, $user_id, $args ){

    switch( $cap ){
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if( isset($args[0]) && $args[0] == $user_id )
                break;
            elseif( !isset($args[0]) )
                $caps[] = 'do_not_allow';
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if( !isset($args[0]) )
                break;
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
  }

}

$engage_user_caps = new engage_User_Caps();