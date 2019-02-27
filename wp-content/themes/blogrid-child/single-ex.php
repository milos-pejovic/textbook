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

$templates_folder = 'templates/';
$exercise_templates = $templates_folder . 'exercise-templates/';
$question_templates = $templates_folder . 'question-templates/';

get_header(); ?>

	<div id="primary" class="featured-content content-area">
		<main id="main" class="site-main">

                    <div class="answer-controllers">
                        <button id="check-answer-button">Check</button>  
                        <button id="show-answer-button">Show</button>  
                        <button id="clear-all-button">Clear</button>
                    </div>
                    
		<?php
                
                echo '<div class="single-exercise">';
                echo '<div class="exercise-instructions">';
                
                $post = get_post();
                $content = $post->post_content;
                $content = json_decode($content, true);

                foreach($content['data']['html'] as $segment_type => $segment_data) {
                    require $exercise_templates . $segment_type . '.php';
                }
                
                echo '</div> <!-- END exercise-instructions -->';
                
                // Exercise description
                
                echo '<div class="exercise-description">' . $content['data']['text'] . '</div>';
                echo '<hr />';
                
                // Questions
                
                echo '<div class="exercise">';
                
                // Items
                
                for ($i = 0; $i < count($content['data']['items']); $i++) {
                    require $question_templates . $content['data']['items'][$i]['type'] . '.php';
                }
                echo '</div>';  
                echo '</div><!-- Single exercise end -->';
                
                ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
