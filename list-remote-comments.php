<?php
/**
 * Plugin Name: List Remote Comments (FeedWordPress Addon)
 * Plugin URI: 
 * Description: This plugin works with FeedWordPress and Display Posts Shortcode to display comments on the "host" content provider.
 * Version: 1.0	
 * Author: Mark Luetke
 * Author URI: http://luetkemj.github.io/
 * License: GPL2
 */

// add_filter('get_comments_number', 'rc_comment_count', 10, 2);

function list_remote_comments( $comment = false, $title = true, $date = true, $link = true, $max_number = null, $dispay_list_title = true ){
	global $id;
	$count = '';
	
	if (is_syndicated()) { 
		
		if (get_post_meta($id, 'wfw:commentRSS')) { 
			$count = get_post_meta($id, 'rc_comment_count', true);
			$rc_last_count_stamp = get_post_meta($id, 'rc_comment_count_stamp', true);
			$current_stamp = date('U');
			$stamp_difference = $current_stamp - $rc_last_count_stamp[0];		
			if ($stamp_difference > '600'){
				$comments_url = get_post_meta($id, 'wfw:commentRSS', true);  
				$comments_rss = fetch_feed($comments_url);
				
					if (!is_wp_error($comments_rss)) { 
						$lrc_output = "<ul>";
						
						if ( $dispay_list_title ){ $lrc_output .= "<strong>Comments: </strong>"; }

						$max = $comments_rss->get_item_quantity($max_number);
						for ($x = 0; $x < $max; $x++):
							$item = $comments_rss->get_item($x);
							
							$lrc_output .= "<li>";
							if ( $link ) { $lrc_output .= "<a href='".$item->get_permalink()."'>"; }
								if ( $title ) { $lrc_output .= $item->get_title(); }
							if ( $link ) { $lrc_output .= "</a>"; }
							if ( $date ){ $lrc_output .= " <small>&#9755; ".$item->get_date('F j, Y | g:i a')."</small>"; }
							if ( $comment ){ $lrc_output .= "<p>".$item->get_description()."</p>"; }
							$lrc_output .= "</li>";

						endfor;
						$lrc_output .= "</ul>";
					}
		    } 
		
		}
	} 
    
    return $lrc_output;
}

/**
 * Append list_remote_comments to display-posts-shortcode
 * @author Mark Luetke
 *
 * @param $output string, the original output
 * @return $output string, the modified output 
 */
function append_to_be_posts( $output ) {
	$output .= list_remote_comments();
	return $output;
}

add_shortcode( 'list-remote-comments', 'append_remote_comments_to_be_posts_shortcode', 9 );

function append_remote_comments_to_be_posts_shortcode(){
	
	add_filter( 'display_posts_shortcode_output', 'append_to_be_posts', 9 );

}
	
?>