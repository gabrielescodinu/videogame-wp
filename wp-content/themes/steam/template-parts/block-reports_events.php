<!-- section 2 -->
<div class="p-8 lg:px-24 4xl:px-96 bg-lsc-gray py-24 lg:flex justify-between">
    <!-- part 1 -->
    <div data-aos="fade-up"  class="lg:mr-24 lg:w-1/2">
    <h2 class="font-bold text-lsc-orange mb-8 text-3xl">Ultimi report</h2>
    <?php
        $args = array(
            'post_type' => 'reports',
            'posts_per_page' => '3',
            'order' => 'DESC',
            'orderby'=>'publish_date',
            'post_status'    => 'publish',
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

            <div class="mb-8">
                <p class="text-lg font-bold"><?php echo get_the_title(); ?></p>
                <p><?php $content = substr(get_the_content(), 0, 100); echo $content ?></p>
                <p class="my-4 font-bold"><a class="text-lsc-orange hover:text-lsc-lightgray" href="<?php echo get_permalink() ?>">READ MORE <i class="fa-solid fa-arrow-right"></i></a></p>
                <hr>
            </div>

        <?php endwhile; else: ?>
    <?php endif; wp_reset_query(); ?>
    </div>

    <!-- part 2 -->
    <div data-aos="fade-up" class="lg:w-1/2">
    <h2 class="font-bold text-lsc-orange mb-8 text-3xl">Ultimi eventi</h2>
        <?php
            $args = array(
                'post_type' => 'events',
                'posts_per_page' => '3',
                'order' => 'DESC',
                'orderby'=>'publish_date',
                'post_status'    => 'publish',
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php 
                    $date = strtotime(get_field('event_date'));
                    $day = date('d', $date);
                    $month = date('M', $date);
                    $hours = date('H:i', $date);
                ?>
                <div class="mb-8 flex">
                    <div class="p-8 rounded-3xl shadow text-lsc-orange uppercase font-bold text-center h-32 w-32 mr-8"><span class="text-3xl"><?php echo $day ?></span><br><span><?php echo $month ?></span></div>
                    <div>
                        <div class="flex mb-4">
                            <p class="mr-8"><?php echo get_field('event_location') ?> <i class="fa-solid text-lsc-orange fa-location-dot"></i></p>
                            <p><?php echo $hours ?> <i class="fa-solid text-lsc-orange fa-clock"></i></p>
                        </div>
                        <p class="text-lg font-bold"><?php echo get_the_title(); ?></p>
                        <p class="mt-4 font-bold"><a class="text-lsc-orange hover:text-lsc-lightgray" href="<?php echo get_permalink() ?>">READ MORE <i class="fa-solid fa-arrow-right"></i></a></p>
                    </div>
                </div>
            <?php endwhile; else: ?>
        <?php endif; wp_reset_query(); ?>
    </div>
</div>