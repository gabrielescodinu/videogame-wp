<?php
    $nested_menu_items = get_nested_menu_items('main');

    foreach($nested_menu_items as $item) {
        echo '<a class="ml-8 underline-animation" href="' . $item->url . '">' . $item->title . '</a>';
    }
?>