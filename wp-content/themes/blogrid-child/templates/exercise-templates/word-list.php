<?php
echo '<div class="word-list-wrap">';
foreach($segment_data as $word) {
    echo '<span class="word-list-item">'.$word.'</span>';
}
echo '</div>';