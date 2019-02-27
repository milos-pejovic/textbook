<?php

echo '<div class="single-question">';

// Image
                        
if (isset($content['data']['items'][$i]['image']) && $content['data']['items'][$i]['image'] != false) {
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

    $html .= '/><br />';
    echo $html;
}

$questionHtml = $content['data']['items'][$i]['text'];

// Input fields

foreach($content['data']['items'][$i]['input-fields'] as $fieldIndex => $fieldData) {
    $answers = implode(" | ",$fieldData['answers']);
    $inputFieldHtml = '<div class="single-input-field"><input type="text" class="question-input" data-answers="' . $answers . '" //><i class="fas fa-check"></i><i class="fas fa-times"></i></div>';
    $questionHtml = str_replace($fieldIndex, $inputFieldHtml, $questionHtml);
}

echo $questionHtml . '</div>';
