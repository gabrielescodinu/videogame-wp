<!-- section 1 -->
<div class="p-8 lg:px-24 4xl:px-96 bg-white py-24">
    <div data-aos="fade-up" class="lg:flex items-center">
    <h1 class="text-3xl font-bold text-lsc-orange">Ultimi Progetti</h1>
    <p class="lg:px-24">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quibusdam nam? Excepturi in soluta beatae quasi magni, ducimus distinctio velit fuga sapiente nihil! Temporibus error, cupiditate adipisci exercitationem beatae quam.</p>
    <div><a href="<?php echo get_post_type_archive_link('projects'); ?>"><button class="slide uppercase text-xl rounded-3xl font-bold px-8 py-2 bg-lsc-orange mt-8 lg:mt-0 text-white">SCOPRI DI PIÙ</button></a></div>  
</div>

<div data-aos="fade-up" class="lg:grid grid-cols-3 gap-16 mt-16">
    <?php
        $args = array(
            'post_type' => 'projects',
            'posts_per_page' => '3',
            'order' => 'DESC',
            'orderby'=>'publish_date',
            'post_status'    => 'publish',
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

            <div class="mb-16">
                <div class="h-60 w-full rounded-3xl" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover;"></div>
                <h2 class="text-lg mt-4 font-bold"><?php echo get_the_title(); ?></h2>
                <p><?php $content = substr(get_the_content(), 0, 100); echo $content ?></p>
                <p class="mt-4 font-bold"><a class="text-lsc-orange hover:text-lsc-lightgray" href="<?php echo get_permalink() ?>">READ MORE <i class="fa-solid fa-arrow-right"></i></a></p>
            </div>

        <?php endwhile; else: ?>
    <?php endif; wp_reset_query(); ?>
</div>
</div>