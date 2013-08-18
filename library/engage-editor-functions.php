<?php

/*   ====================================================================================================================

	WYSYWIG EDITOR 
	 
========================================================================================================================= */

//Define button defaults http://codex.wordpress.org/TinyMCE

function engageTinyMCE($in)
{
 $in['remove_linebreaks']=false;
 $in['gecko_spellcheck']=false;
 $in['keep_styles']=true;
 $in['accessibility_focus']=true;
 $in['tabfocus_elements']='major-publishing-actions';
 $in['media_strict']=false;
 $in['paste_remove_styles']=false;
 $in['paste_remove_spans']=false;
 $in['paste_strip_class_attributes']='none';
 $in['paste_text_use_dialog']=false;
 $in['wpeditimage_disable_captions']=true;
 $in['plugins']='inlinepopups,tabfocus,paste,media,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpfullscreen';
 $in['content_css']=get_template_directory_uri() . "/editor-style.css";
 $in['wpautop']=true;
 $in['apply_source_formatting']=false;
 $in['theme_advanced_buttons1']='formatselect,|,bold,italic,underline,hr,|,bullist,numlist,blockquote,|,link,unlink';
 $in['theme_advanced_buttons2']='pastetext,pasteword,removeformat,|,undo,redo';
 $in['theme_advanced_buttons3']='';
 $in['theme_advanced_buttons4']='';
 return $in; 
 
}

add_filter('tiny_mce_before_init', 'engageTinyMCE' );




// Modifying TinyMCE editor to remove items from the format dropdown.

function engage_format_TinyMCE($init) {
	// Add block format elements you want to show in dropdown
	$init['theme_advanced_blockformats'] = 'h2,h3,h4';

	return $init;
}

add_filter('tiny_mce_before_init', 'engage_format_TinyMCE' );

	

/* Following code converts Post/Page(and all Custom Post Types) Editor to MetaBox and so it’s possible to put
others metaboxes above the editor. http://software.troydesign.it/php/wordpress/move-wp-visual-editor.html */


 
 add_action( 'add_meta_boxes', 'action_add_meta_boxes', 0 );
function action_add_meta_boxes() {
	global $_wp_post_type_features;
	foreach ($_wp_post_type_features as $type => &$features) {
		if (isset($features['editor']) && $features['editor']) {
			unset($features['editor']);
			add_meta_box(
				'description',
				__('Main page content'),
				'content_metabox',
				$type, 'normal', 'high'
			);
		}
	}
	add_action( 'admin_head', 'action_admin_head'); //white background
}
function action_admin_head() {
	?>
	<style type="text/css">
		.wp-editor-container{background-color:#fff;}
	</style>
	<?php
}


function content_metabox( $post ) {
	echo '<div class="wp-editor-wrap">';
	//the_editor is deprecated in WP3.3, use instead:
	//wp_editor($post->post_content, 'content', array('dfw' => true, 'tabindex' => 1) );
	the_editor($post->post_content);
	echo '</div>';
}


