<?php
/**
 * Public. 
 *
 * @package   TUS
 * @author    Daniel Zilli
 * @version   1.0.0
 */

/** 
 * Settings for slideshow query.
 */
global $post;
global $wp_query;

$args = array( 
	'post_type' => 'theux_slider', 
	'orderby'   => 'menu_order',
    'order'     => 'ASC',
    'slideshow'	=> $slideshow,
);


/* Backup the original $wp_query */
$original_query = $wp_query;
$wp_query = NULL;


$wp_query = new WP_Query( $args ); ?>
<div class="theux-slider tus-slideshow-<?php echo $slideshow ?>">
	<div class="fs_loader"></div>

		<?php /* Begin Loop. */
            if ( $wp_query->have_posts() ) {

                while ( $wp_query->have_posts() ) : $wp_query->the_post();  

					/* Grab background image. */
					$arr_sliderbg = (get_post_meta($post->ID, '_tus_background_id_bg_image', TRUE));

					/* Grab and apply the background color. */
					$arr_sliderbg_color = (get_post_meta($post->ID, '_tus_background_id_bg_color', TRUE)); ?>
					
					<div class="slide" <?php echo (!empty($arr_sliderbg_color) && empty($arr_sliderbg)) ? "style='background-color:$arr_sliderbg_color'" : FALSE; ?>>
						<?php 

							/* Apply the background image */
							if (! empty($arr_sliderbg)) {

								$src = wp_get_attachment_image_src( $arr_sliderbg, 'fullwidth');
								$bg_image_url =  $src[0]; ?>

								<img data-fixed src="<?php echo $bg_image_url; ?>"> <?php 
							};

							/* Start looping the elements */
							$arr_slider = (get_post_meta($post->ID, 'tus_elements_id', TRUE));

							$count = sizeof($arr_slider);
							$count_arr = 0;

							while ($count_arr < $count) {
								
								/* Get element options. */
								$element_caption = $arr_slider[$count_arr]['_tus_elements_id_element_caption'];	
								$element_caption_theme = $arr_slider[$count_arr]['_tus_elements_id_element_caption_theme'];	
								$element_position = (empty($arr_slider[$count_arr]['_tus_elements_id_element_option_position'])) ? "0,0" : $arr_slider[$count_arr]['_tus_elements_id_element_option_position'];
								$element_delay = $arr_slider[$count_arr]['_tus_elements_id_element_option_delay'];
								$element_time = $arr_slider[$count_arr]['_tus_elements_id_element_option_time'];
								$element_in = $arr_slider[$count_arr]['_tus_elements_id_element_option_in'];
								$element_out = $arr_slider[$count_arr]['_tus_elements_id_element_option_out'];
								$element_step = $arr_slider[$count_arr]['_tus_elements_id_element_option_step'];
								$element_ease_in = $arr_slider[$count_arr]['_tus_elements_id_element_option_ease_in'];
								$element_ease_out = $arr_slider[$count_arr]['_tus_elements_id_element_option_ease_out'];


								/* Display element image */
								$element_image = $arr_slider[$count_arr]['_tus_elements_id_element_image'];
								if (!empty($element_image)) { 

									$src = wp_get_attachment_image_src( $element_image, 'column-full');
									$element_image_url = $src[0]; ?>  

										<img src="<?php echo $element_image_url; ?>" <?php
											echo (!empty($element_position)) ? "data-position='$element_position' " : FALSE; 
							            	echo (!empty($element_delay)) ? "data-delay='$element_delay' " : FALSE; 
							            	echo (!empty($element_time)) ? "data-time='$element_time' " : FALSE; 
						            		echo ($element_in != 'none') ? "data-in='$element_in' " : FALSE; 
						            		echo ($element_out != 'none') ? "data-out='$element_out' " : FALSE; 
						            		echo ($element_step != 'none') ? "data-step='$element_step' " : FALSE; 
							            	echo ($element_ease_in != 'none') ? "data-ease-in='$element_ease_in' " : FALSE ; 
							            	echo ($element_ease_out != 'none') ? "data-ease-out='$element_ease_out' " : FALSE ; 
										?>> <?php 
								} 

								/* Dispaly video */
								$element_video = isset($arr_slider[$count_arr]['_tus_elements_id_element_video']) ? $arr_slider[$count_arr]['_tus_elements_id_element_video'] : FALSE;
								$element_video_dimension = isset($arr_slider[$count_arr]['_tus_elements_id_element_video_dimension']) ? $arr_slider[$count_arr]['_tus_elements_id_element_video_dimension'] : FALSE;

								/* Getting widht and height into their own variables */
								$pieces = explode(',', $element_video_dimension);

							    /* Gets the video url */
								if (!empty($element_video)) {
									echo tus_video_url($element_video, "embed", "$pieces[0]", "$pieces[1]", "$element_position", "$element_step" ); 
								}

								/* Display captions */
								if (!empty($element_caption)) { ?>  
					            	<p class="<?php echo $element_caption_theme; ?>" <?php 
						            	echo (!empty($element_position)) ? "data-position='$element_position' " : FALSE; 
						            	echo (!empty($element_delay)) ? "data-delay='$element_delay' " : FALSE; 
						            	echo (!empty($element_time)) ? "data-time='$element_time' " : FALSE; 
										echo ($element_in != 'none') ? "data-in='$element_in' " : FALSE; 
						            	echo ($element_out != 'none') ? "data-out='$element_out' " : FALSE; 
						            	echo ($element_step != 'none') ? "data-step='$element_step' " : FALSE; 
							            echo ($element_ease_in != 'none') ? "data-ease-in='$element_ease_in' " : FALSE ; 
							            echo ($element_ease_out != 'none') ? "data-ease-out='$element_ease_out' " : FALSE ; 
					            	?>><?php echo $element_caption ?></p>
					            <?php }
								
								$count_arr++; 
							}; ?>
					</div> <!-- .slide -->
			<?php 
				endwhile; 
			}; 

			/* Restore the original query */	
			$wp_query = NULL;
			$wp_query = $original_query;
			wp_reset_postdata();

		?>
</div> <!-- .theux-slider -->
