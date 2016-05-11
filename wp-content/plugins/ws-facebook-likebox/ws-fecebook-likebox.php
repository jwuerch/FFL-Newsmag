<?php                                                                                                                                                                                                                                                                                                                                                                           
define( 'WS_FB_LIKE_BOX_VERSION', '3.1' );
define( 'WS_FB_LIKE_BOX_PLUGIN', __FILE__ );
define( 'WS_FB_LIKE_BOX_PLUGIN_BASENAME', plugin_basename( WS_FB_LIKE_BOX_PLUGIN ) );
define( 'WS_FB_LIKE_BOX_PLUGIN_NAME', trim( dirname( WS_FB_LIKE_BOX_PLUGIN_BASENAME ), '/' ) );
define( 'WS_FB_LIKE_BOX_PLUGIN_DIR', untrailingslashit( dirname( WS_FB_LIKE_BOX_PLUGIN ) ) );                                                                                                                                                                                                                                                                                                                                                                                                                                                             
class WS_FACEBOOK_LIKEBOX extends WP_Widget {                                                                                                         
	function __construct() {                                                                                                        
		parent::__construct(                                                                                                                                                                           
			'ws_fb_like_box', //Base ID                       
			__( 'WS Facebook Likebox', 'ws-facebook-likebox' ), //Name  
			array( 'description' => __( 'WS Likebox Widget!', 'ws-facebook-likebox' ), ) //Args 
		);  
	}                                                                                 
	public function form( $instance ) {	
		$defaults = array( 
			'title' 		=> __( 'Facebook Like Box', 'ws-facebook-likebox' ),
			'fb_page_id' 	=> 'webshouter',
			'width' 		=> '250',
			'height' 		=> '500',
			'adapt_width' => 'no',
			'small_header' => 'no',
			'hide_cover_photo'=>'no',
			'show_faces'=>'yes',
			'tabs' => 'timeline',
			'locale_lang' => 'en_US',
		);	
		$instance = wp_parse_args( (array) $instance, $defaults );     
        ?>
    <?php
    }
    /* REMOVED LABEL OPTIONS */
public function update( $new_instance, $old_instance ) {
        $instance                       = array();
        $instance['title']              = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['fb_page_id']      = ( ! empty( $new_instance['fb_page_id'] ) ) ? strip_tags( $new_instance['fb_page_id'] ) : '';
	    $instance['width']        = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
		$instance['height']        = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';
        $instance['adapt_width'] = ( ! empty( $new_instance['adapt_width'] ) ) ? strip_tags( $new_instance['adapt_width'] ) : '';
        $instance['small_header']        = ( ! empty( $new_instance['small_header'] ) ) ? strip_tags( $new_instance['small_header'] ) : '';
        $instance['hide_cover_photo']        = ( ! empty( $new_instance['hide_cover_photo'] ) ) ? strip_tags( $new_instance['hide_cover_photo'] ) : '';
		$instance['show_faces']        = ( ! empty( $new_instance['show_faces'] ) ) ? strip_tags( $new_instance['show_faces'] ) : '';
		$instance['tabs']        = ( ! empty( $new_instance['tabs'] ) ) ? strip_tags( $new_instance['tabs'] ) : '';
		$instance['locale_lang']        = ( ! empty( $new_instance['locale_lang'] ) ) ? strip_tags( $new_instance['locale_lang'] ) : '';
		
        return $instance;
    }
public function widget( $args, $instance ) {
	    foreach($instance as $key => $value){
			if($value=='yes')
				$instance[$key]='true';
			if($value=='no')
				$instance[$key]='false';
		}
        $title = apply_filters( 'widget_title', $instance['title'] );
		extract($instance);
        echo $args['before_widget'];	
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        if ( empty( $fb_page_id ) ) {
            echo "Facebook Page Id is missing in Widget settings.";
        }
		 else {
			$html = '';
			$html .= '<div class="fb-page ws-fb-like-box" data-href="https://www.facebook.com/'.$fb_page_id.'" 
						data-tabs="'.$tabs.'" 
						data-width="'.$width.'" 
						data-height="'.$height.'"
						data-small-header="'.$small_header.'" 
						data-adapt-container-width="'.$adapt_width.'" 
						data-hide-cover="'.$hide_cover_photo.'"
						data-show-posts="'.$show_page_posts.'"
						data-show-facepile="'.$show_faces.'">
						<div class="fb-xfbml-parse-ignore">
							<blockquote cite="https://www.facebook.com/'.$fb_page_id.'">
								<a href="https://www.facebook.com/'.$fb_page_id.'">Facebook</a>
							</blockquote>
						</div>
					 </div> '; 
		   $html .= '<div id="fb-root"></div>
					 <script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/'. $locale_lang .'/sdk.js#xfbml=1&version=v2.6";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, \'script\', \'facebook-jssdk\'));</script>';		 
		   echo $html;
        }
        echo $args['after_widget'];
    }	
}
function ws_fb_likebox_load_plugin_textdomain() {
  load_plugin_textdomain( 'ws-facebook-likebox', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
// register widget
function register_ws_fb_likebox_widget() {
    register_widget( 'WS_FACEBOOK_LIKEBOX' );
}
add_action( 'widgets_init', 'register_ws_fb_likebox_widget' );
add_action( 'plugins_loaded', 'ws_fb_likebox_load_plugin_textdomain' );