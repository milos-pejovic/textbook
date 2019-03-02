<?php
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