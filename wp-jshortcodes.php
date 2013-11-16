<?php
/**
 * Plugin Name: WP JShortcodes
 * Plugin URI: http://webmasterninja.wordpress.com/
 * Description: Custom Shortcodes
 * Version: 1.0.1
 * Author: Jayson Antipuesto
 * Author URI: http://webmasterninja.wordpress.com/
 */
 
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );
function register_plugin_styles() {
	wp_register_style( 'wp-jshortcodes', plugins_url( 'wp-jshortcodes/css/shortcode-style.css' ) );
	wp_enqueue_style( 'wp-jshortcodes' );
	}
 
// Shortcode functions.

// Shortcode for title.
add_shortcode('title','custom_title_font');
function custom_title_font($atts,$content) {
	extract(shortcode_atts(array('type' => 'small left'), $atts));
	$output = "<p class='title {$type}'>";
	$output .= do_shortcode($content);
	$output .= "</p>";
	return $output;
	}

//Shortcode for text.
add_shortcode('text','custom_text_font');
function custom_text_font($atts,$content) {
	$output = "<div class='text'>";
	$output .= do_shortcode($content);
	$output .= "</div>";
	return $output;
	}
	
// HTML editor quicktags for shortcodes.
add_action('admin_print_footer_scripts','jshortcodes_quicktags');
function jshortcodes_quicktags() {
?>
<script type="text/javascript" charset="utf-8">
buttonTitle = edButtons.length;
edButtons[edButtons.length] = new edButton('js_title','jstitle','[title type="small left"]','[/title]','jstitle');
buttonText = edButtons.length;
edButtons[edButtons.length] = new edButton('js_text','jstext','[text]','[/text]','jstext');

jQuery(document).ready(function($){
    jQuery("#ed_toolbar").append('<input type="button" value="jstitle" id="js_title" class="js_button" onclick="edInsertTag(edCanvas, buttonTitle);" title="jstitle" />');
	jQuery("#ed_toolbar").append('<input type="button" value="jstext" id="js_text" class="js_button" onclick="edInsertTag(edCanvas, buttonText);" title="jstext" />');
}); 
</script>
<?php
}
?>