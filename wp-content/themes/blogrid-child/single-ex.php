<?php

// Move this function to functions.php if possible
function get_attachment_url_by_slug( $slug ) {
    $args = array(
      'post_type' => 'attachment',
      'name' => sanitize_title($slug),
      'posts_per_page' => 1,
    );
    $_header = get_posts( $args );
    $header = $_header ? array_pop($_header) : null;
    return $header ? wp_get_attachment_url($header->ID) : '';
}

get_header(); ?>

	<div id="primary" class="featured-content content-area">
		<main id="main" class="site-main">

                    <div class="answer-controllers">
                        <button id="check-answer-button">Check</button>  
                        <button id="show-answer-button">Show</button>  
                        <button id="clear-all-button">Clear</button>
                    </div>
                    
                    
		<?php
                
                echo '<div class="exercise-instructions">';
                
                $post = get_post();
                $content = $post->post_content;
                $content = json_decode($content, true);

                // TODO extract each component nto a template segment
                
                foreach($content['data']['html'] as $segment_type => $segment_data) {
                    $html;
                    
                    // Hero image section
                    
                    if ($segment_type == 'hero-image') {
                        $url = get_attachment_url_by_slug($segment_data['image-name']);
                        $html = '<div class="hero-image-wrapper"><image src="'.$url.'" class="exercise-hero-image" ';
                        
                        if (isset($segment_data['alt'])){
                            $html .= 'alt="'.$segment_data['alt'].'" ';
                        }
                        
                        if (isset($segment_data['width']) || isset($segment_data['height'])) {
                            $style_html = [];
                            
                            // width
                            
                            if (isset($segment_data['width'])){
                                array_push($style_html, ('width:'.$segment_data['width'] . (($segment_data['width'] != 'auto') ? 'px' : '')));
                            }
                            
                            // height
                            
                            if (isset($segment_data['height'])){
                                array_push($style_html, ('height:'.$segment_data['height'] . (($segment_data['height'] != 'auto') ? 'px' : '')));
                            }
                            
                            $style_html = implode(';', $style_html);
                            $style_html = 'style="'.$style_html.'" ';
                            $html .=$style_html;
                        }
                        
                        $html .= '/></div>';
                        echo $html;
                    } else if ($segment_type == 'text') {
                        echo '<div class="text-wrapper">'.$segment_data.'</div>';
                    }
                }
                
                echo '</div> <!-- END exercise-instructions -->';
                
                // Exercise description
                
                echo '<div class="exercise-description">' . $content['data']['text'] . '</div>';
                echo '<hr />';
                
                // Questions
                
                echo '<div class="exercises">';
                
                // Items
                
                for ($i = 0; $i < count($content['data']['items']); $i++) {
                    
                    if ($content['data']['items'][$i]['type'] == 'regular-question'){
                        
                        // Image
                        
                        if (isset($content['data']['items'][$i]['image'])) {
                            $image_data = $content['data']['items'][$i]['image'];

                            $url = get_attachment_url_by_slug($image_data['image-name']);
                            $html = '<image src="'.$url.'" class="question-image" ';

                            if (isset($image_data['alt'])){
                                $html .= 'alt="'.$image_data['alt'].'" ';
                            }

                            if (isset($image_data['width']) || isset($image_data['height'])) {
                                $style_html = [];

                                // width
                            
                                if (isset($image_data['width'])){
                                    array_push($style_html, ('width:'.$image_data['width'] . (($image_data['width'] != 'auto') ? 'px' : '')));
                                }

                                // height

                                if (isset($image_data['height'])){
                                    array_push($style_html, ('height:'.$image_data['height'] . (($image_data['height'] != 'auto') ? 'px' : '')));
                                }

                                $style_html = implode(';', $style_html);
                                $style_html = 'style="'.$style_html.'" ';
                                $html .=$style_html;
                            }

                            $html .= '/>';
                            echo $html;
                        }
                        
                        $questionHtml = $content['data']['items'][$i]['text'];
                    
                        // Input fields

                        foreach($content['data']['items'][$i]['input-fields'] as $fieldIndex => $fieldData) {
                            $answers = implode(" | ",$fieldData['answers']);
                            $inputFieldHtml = '<input type="text" class="example-input" data-answers="' . $answers . '" //><i class="fas fa-check"></i><i class="fas fa-times"></i>';
                            $questionHtml = str_replace($fieldIndex, $inputFieldHtml, $questionHtml);
                        }

                        echo '<div class="single-question">' . $questionHtml . '</div>';
                    }
                    
                }
                echo '</div>';  

                ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
