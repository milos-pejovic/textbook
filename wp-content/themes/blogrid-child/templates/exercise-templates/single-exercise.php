<?php

$exercise_subtemplates =  '../exercise-subtemplates/';
$question_templates = '../question-templates/';

echo '<div class="answer-controllers">
    <button id="check-answer-button">Check</button>  
    <button id="show-answer-button">Show</button>  
    <button id="clear-all-button">Clear</button>
</div>';

echo '<div class="single-exercise">';
echo '<div class="exercise-instructions">';

$post = get_post();
$content = $post->post_content;
$content = json_decode($content, true);

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