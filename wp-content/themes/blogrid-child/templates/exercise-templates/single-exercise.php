<?php

$root = $_SERVER['DOCUMENT_ROOT'];

$exercise_subtemplates = $root . '/wp-content/themes/blogrid-child/templates/exercise-subtemplates/';
$question_templates = $root . '/wp-content/themes/blogrid-child/templates/question-templates/';

$post = get_post($post_id);
$content = $post->post_content;
$content = json_decode($content, true);

echo '<div class="answer-controllers">
    <button class="check-answer-button" data-exercise-id="'.$post_id.'">Check</button>  
    <button class="show-answer-button" data-exercise-id="'.$post_id.'">Show</button>  
    <button class="clear-all-button" data-exercise-id="'.$post_id.'">Clear</button>
</div>';

echo '<div class="single-exercise">';
echo '<div class="exercise-instructions">';

foreach($content['data']['html'] as $segment_type => $segment_data) {
    require $exercise_subtemplates . $segment_type . '.php';
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