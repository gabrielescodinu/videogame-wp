<?php
    $nested_menu_items = get_nested_menu_items('main');

    foreach($nested_menu_items as $item) {
        ?>
            <div class="mb-4 menu_item" :class="!open ? 'exit' : 'active'">
                <a href="<?php echo $item->url; ?>">
                    <p class="text-xl underline-animation"><?php echo $item->title; ?></p>
                </a>
            </div>
        <?php
    }
?>