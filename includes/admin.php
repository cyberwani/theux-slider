<?php
/**
 * Administration.
 *
 * @package   TUS
 * @author    Daniel Zilli
 * @version   1.0.0
 */

/**
 * Register the custom post type.
 *
 * @since	1.0.0
 */
$tus  = new Cuztom_Post_Type( 'theux_slider', 
	array(
		'menu_icon'  	=> plugins_url('assets/images/menu-icon.png',  dirname(__FILE__) ),
	    'supports' 		=> array( 'title' ),
	),
	array(
	    'name'              => _x( 'Slider', 'tus' ),
	    'singular_name'     => _x( 'Slider', 'tus' ),
	    'search_items'      => __( 'Search Slides' ),
	    'all_items'         => __( 'All Slides' ),
	    'parent_item'       => __( 'Parent Slide' ),
	    'parent_item_colon' => __( 'Parent Slides:' ),
	    'edit_item'         => __( 'Edit Slide' ),
	    'update_item'       => __( 'Update Slide' ),
	    'add_new_item'      => __( 'Add New Slide' ),
	    'new_item_name'     => __( 'New Slide Name' ),
	    'menu_name'         => __( 'Slider' ),
	) 
);


/**
 * Register taxonomy.
 *
 * @since	1.0.0
 */
$slideshow = register_cuztom_taxonomy( 'Slideshow', 'theux_slider', 
        array(
            'show_admin_column'     => TRUE,
            'admin_column_sortable' => TRUE,
            'admin_column_filter'   => TRUE,
            'hierarchical' 			=> FALSE,
        ));

/**
 * Register the meta-boxes.
 *
 * @since	1.0.0
 */


/* Background options */
$tus->add_meta_box( 
	'tus_background_id',
	'Background Slide Options', 
	array(
	        array(
	            'name'          => 'bg_image',
	            'label'         => __( 'Image', 'tus' ),
	            'description'   => __( 'Select the background image for the slide.', 'tus' ),
	            'type'          => 'image'
	        ),
	        array(
	            'name'          => 'bg_color',
	            'label'         => __( 'Color', 'tus' ),
	            'description'   => __( 'Select the background color.', 'tus' ),
	            'type'          => 'color'
	        ),
	    ),
	'normal', // context
	'high' // priority
);

/* Bundle metabox */
$tus->add_meta_box( 
	'tus_elements_id',
	'Slide Element Options', 
	array(
	        'bundle', 
	    array(
	        array(
	            'name'          => 'element_image',
	            'label'         => __( 'Image', 'tus' ),
	            'description'   => __( 'Select an image', 'tus' ),
	            'type'          => 'image'
	        ),
			array(
				'name'          => 'element_video',
				'label'         => __( 'Video Link', 'tus' ),
				'description'   => __( 'Enter your video link', 'tus' ),
				'type'          => 'text'
			),
			array(
				'name'          => 'element_video_dimension',
				'label'         => __( 'Video Dimensions', 'tus' ),
				'description'   => __( 'Enter element dimension as width,height.<br />Example: 500,300', 'tus' ),
				'type'          => 'text'
			),
	        array(
	            'name'          => 'element_caption',
	            'label'         => __( 'Caption', 'tus' ),
	            'description'   => __( 'Enter your caption', 'tus' ),
	            'type'          => 'textarea'
	        ),
	        array(
		        'name'          => 'element_caption_theme',
		        'label'         => __( 'Caption Themes', 'tus' ),
		        'description'   => __( 'Choose the color scheme for the captions.', 'tus'),
		        'type'          => 'select',
		        'options'       => array(
		        	'none'			=>  __( 'None', 'tus'),
	            	'transparent'	=>	__( 'transparent', 'tus'),		        	
	            	'white'			=>	__( 'white', 'tus'),
	            	'black'			=>	__( 'black', 'tus'),
	            	'light-green'	=>	__( 'light-green', 'tus'),
	            	'green'			=>	__( 'green', 'tus'),
	            	'orange'		=>  __( 'orange', 'tus'),
	            	'turky'			=>	__( 'turky', 'tus'),
	            	'blue'			=>	__( 'blue', 'tus'),
	            	'light-red'		=>	__( 'light-red', 'tus'),
	            	'brown'			=>	__( 'brown', 'tus'),
		        ),
		        'default_value' => 'none',
		    ),
	        array(
	            'name'          => 'element_option_position',
	            'label'         => __( 'Postion', 'tus'),
	            'description'   => __( 'Enter element position as Y,X.<br>Example: 100,10', 'tus'),
	            'type'          => 'text'
	        ),
	        array(
	            'name'          => 'element_option_delay',
	            'label'         => __( 'Delay', 'tus'),
	            'description'   => __( 'Time in ms before the <b>in</b> transition starts.', 'tus'),
	            'type'          => 'text'
	        ),
	        array(
	            'name'          => 'element_option_time',
	            'label'         => __( 'Time', 'tus'),
	            'description'   => __( 'Time after which the elements animation is complete in ms.', 'tus'),
	            'type'          => 'text'
	        ),
	        array(
		        'name'          => 'element_option_in',
		        'label'         => __( 'Data In', 'tus'),
		        'description'   => __( 'Type of the in-animation.', 'tus'),
		        'type'          => 'select',
		        'options'       => array(
		        	'none'			=>  __( 'None', 'tus'),        	
	            	'fade'			=>	__( 'fade', 'tus'),
	            	'left'			=>	__( 'left', 'tus'),
	            	'topLeft'		=>	__( 'topLeft', 'tus'),
	            	'bottomLeft'	=>	__( 'bottomLeft', 'tus'),
	            	'right'			=>  __( 'right', 'tus'),
	            	'topRight'		=>	__( 'topRight', 'tus'),
	            	'bottomRight'	=>	__( 'bottomRight', 'tus'),
	            	'top'			=>	__( 'top', 'tus'),
	            	'bottom'		=>	__( 'bottom', 'tus'),
		        ),
		        'default_value' => 'left',
		    ),
	        array(
		        'name'          => 'element_option_out',
		        'label'         => __( 'Data Out', 'tus'),
		        'description'   => __( 'Type of the out-animation.', 'tus'),
		        'type'          => 'select',
		        'options'       => array(
		        	'none'			=>  __( 'None', 'tus'),		        	
	            	'fade'			=>	__( 'fade', 'tus'),
	            	'left'			=>	__( 'left', 'tus'),
	            	'topLeft'		=>	__( 'topLeft', 'tus'),
	            	'bottomLeft'	=>	__( 'bottomLeft', 'tus'),
	            	'right'			=>  __( 'right', 'tus'),
	            	'topRight'		=>	__( 'topRight', 'tus'),
	            	'bottomRight'	=>	__( 'bottomRight', 'tus'),
	            	'top'			=>	__( 'top', 'tus'),
	            	'bottom'		=>	__( 'bottom', 'tus'),
		        ),
		        'default_value' => 'left',
		    ),
	        array(
		        'name'          => 'element_option_step',
		        'label'         => __( 'Step', 'tus'),
		        'description'   => __( 'Group elements in different steps. Elements of the next step will not start before the previous step is finished.', 'tus'),
		        'type'          => 'select',
		        'options'       => array(
		        	'none' 	=> __( 'none', 'tus'),
	            	'1'		=>	'1',
	            	'2'		=>	'2',
	            	'3'		=>	'3',
	            	'4'		=>	'4',
	            	'5'		=>  '5',
	            	'6'		=>	'6',
	            	'7'		=>	'7',
	            	'8'		=>	'8',
	            	'9'		=>	'9',
	            	'10'	=>	'10',
	            	'11'	=>	'11',
	            	'12'	=>	'12',
	            	'13'	=>	'13',
	            	'14'	=>  '14',
	            	'15'	=>	'15',
	            	'16'	=>	'16',
	            	'17'	=>	'17',
	            	'18'	=>	'18',
	            	'19'	=>	'19',
	            	'20'	=>	'20',
		        ),
		        'default_value' => 'none',
		    ),
	        array(
		        'name'          => 'element_option_ease_in',
		        'label'         => __( 'Ease In', 'tus'),
		        'description'   => __( 'Easing for the in-animations.', 'tus'),
		        'type'          => 'select',
		        'options'       =>  array(
		        	'none' 				=> __( 'none', 'tus'),
	        		'easeInQuad' 		=> __( 'easeInQuad', 'tus'),
					'easeOutQuad' 		=> __( 'easeOutQuad', 'tus'),
					'easeInOutQuad' 	=> __( 'easeInOutQuad', 'tus'),
					'easeInCubic' 		=> __( 'easeInCubic', 'tus'),
					'easeOutCubic' 		=> __( 'easeOutCubic', 'tus'),
					'easeInOutCubic' 	=> __( 'easeInOutCubic', 'tus'),
					'easeInQuart' 		=> __( 'easeInQuart', 'tus'),
					'easeOutQuart' 		=> __( 'easeOutQuart', 'tus'),
					'easeInOutQuart' 	=> __( 'easeInOutQuart', 'tus'),
					'easeInQuint' 		=> __( 'easeInQuint', 'tus'),
					'easeOutQuint' 		=> __( 'easeOutQuint', 'tus'),
					'easeInOutQuint' 	=> __( 'easeInOutQuint', 'tus'),
					'easeInSine' 		=> __( 'easeInSine', 'tus'),
					'easeOutSine' 		=> __( 'easeOutSine', 'tus'),
					'easeInOutSine' 	=> __( 'easeInOutSine', 'tus'),
					'easeInExpo' 		=> __( 'easeInExpo', 'tus'),
					'easeOutExpo' 		=> __( 'easeOutExpo', 'tus'),
					'easeInOutExpo' 	=> __( 'easeInOutExpo', 'tus'),
					'easeInCirc' 		=> __( 'easeInCirc', 'tus'),
					'easeOutCirc' 		=> __( 'easeOutCirc', 'tus'),
					'easeInOutCirc' 	=> __( 'easeInOutCirc', 'tus'),
					'easeInElastic' 	=> __( 'easeInElastic', 'tus'),
					'easeOutElastic' 	=> __( 'easeOutElastic', 'tus'),
					'easeInOutElastic' 	=> __( 'easeInOutElastic', 'tus'),
					'easeInBack' 		=> __( 'easeInBack', 'tus'),
					'easeOutBack' 		=> __( 'easeOutBack', 'tus'),
					'easeInOutBack' 	=> __( 'easeInOutBack', 'tus'),
					'easeInBounce' 		=> __( 'easeInBounce', 'tus'),
					'easeOutBounce' 	=> __( 'easeOutBounce', 'tus'),
					'easeInOutBounce' 	=> __( 'easeInOutBounce', 'tus'),
					),
		        'default_value' => 'easeInQuad',
		    ),

	        array(
		        'name'          => 'element_option_ease_out',
		        'label'         => __( 'Ease Out', 'tus'),
		        'description'   => __( 'Easing for the out-animations.', 'tus'),
		        'type'          => 'select',
			 'options'       =>  array(
		        	'none' 				=> __( 'none', 'tus'),
	        		'easeInQuad' 		=> __( 'easeInQuad', 'tus'),
					'easeOutQuad' 		=> __( 'easeOutQuad', 'tus'),
					'easeInOutQuad' 	=> __( 'easeInOutQuad', 'tus'),
					'easeInCubic' 		=> __( 'easeInCubic', 'tus'),
					'easeOutCubic' 		=> __( 'easeOutCubic', 'tus'),
					'easeInOutCubic' 	=> __( 'easeInOutCubic', 'tus'),
					'easeInQuart' 		=> __( 'easeInQuart', 'tus'),
					'easeOutQuart' 		=> __( 'easeOutQuart', 'tus'),
					'easeInOutQuart' 	=> __( 'easeInOutQuart', 'tus'),
					'easeInQuint' 		=> __( 'easeInQuint', 'tus'),
					'easeOutQuint' 		=> __( 'easeOutQuint', 'tus'),
					'easeInOutQuint' 	=> __( 'easeInOutQuint', 'tus'),
					'easeInSine' 		=> __( 'easeInSine', 'tus'),
					'easeOutSine' 		=> __( 'easeOutSine', 'tus'),
					'easeInOutSine' 	=> __( 'easeInOutSine', 'tus'),
					'easeInExpo' 		=> __( 'easeInExpo', 'tus'),
					'easeOutExpo' 		=> __( 'easeOutExpo', 'tus'),
					'easeInOutExpo' 	=> __( 'easeInOutExpo', 'tus'),
					'easeInCirc' 		=> __( 'easeInCirc', 'tus'),
					'easeOutCirc' 		=> __( 'easeOutCirc', 'tus'),
					'easeInOutCirc' 	=> __( 'easeInOutCirc', 'tus'),
					'easeInElastic' 	=> __( 'easeInElastic', 'tus'),
					'easeOutElastic' 	=> __( 'easeOutElastic', 'tus'),
					'easeInOutElastic' 	=> __( 'easeInOutElastic', 'tus'),
					'easeInBack' 		=> __( 'easeInBack', 'tus'),
					'easeOutBack' 		=> __( 'easeOutBack', 'tus'),
					'easeInOutBack' 	=> __( 'easeInOutBack', 'tus'),
					'easeInBounce' 		=> __( 'easeInBounce', 'tus'),
					'easeOutBounce' 	=> __( 'easeOutBounce', 'tus'),
					'easeInOutBounce' 	=> __( 'easeInOutBounce', 'tus'),
					),
		        'default_value' => 'easeOutQuad',
		    ),

	    )
	)
);


/**
 * Display custom messages.
 *
 * @since	1.0.0
 */
function tus_updated_messages( $messages ) {

	global $post, $post_ID;
	$messages['theux_slider'] = array (
		0  => '',
		1  => sprintf( __( 'Slide updated. <a href="%s">View slide</a>', 'tus' ), esc_url( get_permalink($post_ID) ) ),
		2  => __( 'Custom field updated.', 'tus' ),
		3  => __( 'Custom field deleted.', 'tus' ),
		4  => __( 'Slide updated.', 'tus' ),
		5  => isset($_GET['revision']) ? sprintf( __( 'Slide restored to revision from %s', 'tus' ), wp_post_revision_title( (int) $_GET['revision'], FALSE ) ) : FALSE,
		6  => sprintf( __( 'Slide published. <a href="%s">View slide</a>', 'tus' ), esc_url( get_permalink($post_ID) ) ),
		7  => __( 'Slide saved.', 'tus' ),
		8  => sprintf( __( 'Slide submitted. <a target="_blank" href="%s">Preview slide</a>', 'tus' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9  => sprintf( __( 'Slide scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview slide</a>', 'tus' ), date_i18n( __( 'M j, Y @ G:i', 'tus' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __( 'Slide draft updated. <a target="_blank" href="%s">Preview slide</a>', 'tus' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ) );

	return $messages;
}
add_filter( 'post_updated_messages', 'tus_updated_messages' );


/**
 * Parse Video.
 *
 * @author  takien, slaffko
 * @since	1.0.0
 */
function tus_video_url($url,$return='embed',$width='',$height='', $element_position='', $element_step='',$rel=0){
    $urls = parse_url($url);

    //url is http://vimeo.com/xxxx
    if($urls['host'] == 'vimeo.com'){
        $vid = ltrim($urls['path'],'/');
    }
    //url is http://youtu.be/xxxx
    else if($urls['host'] == 'youtu.be'){
        $yid = ltrim($urls['path'],'/');
    }
    //url is http://www.youtube.com/embed/xxxx
    else if(strpos($urls['path'],'embed') == 1){
        $yid = end(explode('/',$urls['path']));
    }
     //url is xxxx only
    else if(strpos($url,'/')===false){
        $yid = $url;
    }
    //http://www.youtube.com/watch?feature=player_embedded&v=m-t4pcO99gI
    //url is http://www.youtube.com/watch?v=xxxx
    else{
        parse_str($urls['query']);
        $yid = $v;
        if(!empty($feature)){
            $yid = end(explode('v=',$urls['query']));
            $arr = explode('&',$yid);
            $yid = $arr[0];
        }
    }
    if(!empty($yid)) {
    
    //return embed iframe
    if($return == 'embed'){
        return '<iframe data-position="'.($element_position).'" data-step="'.($element_step).'" width="'.($width?$width:540).'" height="'.($height?$height:300).'" src="http://www.youtube.com/embed/'.$yid.'?wmode=transparent?rel='.$rel.'" frameborder="0" ebkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
    }
    //return normal thumb
    else if($return == 'thumb' || $return == 'thumbmed'){
        return 'http://i1.ytimg.com/vi/'.$yid.'/default.jpg';
    }
    //return hqthumb
    else if($return == 'hqthumb' ){
        return 'http://i1.ytimg.com/vi/'.$yid.'/hqdefault.jpg';
    }
    // else return id
    else{
        return $yid;
    }
  }
  else if($vid) {
  $vimeoObject = json_decode(file_get_contents("http://vimeo.com/api/v2/video/".$vid.".json"));
   if (!empty($vimeoObject)) {
      //return embed iframe
      if($return == 'embed'){
      return '<iframe data-position="'.($element_position).'" data-step="'.($element_step).'" width="'.($width?$width:$vimeoObject[0]->width).'" height="'.($height?$height:$vimeoObject[0]->height).'" src="http://player.vimeo.com/video/'.$vid.'?title=0&byline=0&portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
    }
    //return normal thumb
    else if($return == 'thumb'){
      return $vimeoObject[0]->thumbnail_small;
    }
    //return medium thumb
    else if($return == 'thumbmed'){
      return $vimeoObject[0]->thumbnail_medium;
    }
    //return hqthumb
    else if($return == 'hqthumb'){
      return $vimeoObject[0]->thumbnail_large;
    }
    // else return id
    else{
      return $vid;
    }
   }
  }
}


/**
 * Remove permalink metabox (slug).
 *
 * @since	1.0.0
 */
function tus_remove_permalink_meta_box() {

    remove_meta_box( 'slugdiv', 'theux_slider', 'core' );
}
add_action( 'admin_menu', 'tus_remove_permalink_meta_box' );


/** 
 * Removing unused columns from the admin listing page.
 *
 * @since	1.0.0
 */
function remove_tus_columns($columns) {
    
    unset($columns['wps_post_thumbs']);
    return $columns;
}
add_filter('manage_theux_slider_posts_columns' , 'remove_tus_columns');
