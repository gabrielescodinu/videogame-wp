<?php get_header(); ?>

<!-- search -->
<div data-aos="fade-up" class="p-8 lg:px-24 4xl:px-96 pt-40">
    <form class="w-full flex justify-between items-center" action="<?php echo home_url(); ?>" id="search-form" method="get">
        <input class="w-full px-8 py-2 rounded-lg text-white bg-steam-grey" type="text" name="s" id="s" placeholder="Search" onblur="if(this.value=='')this.value='type your search'" onfocus="if(this.value=='type your search')this.value=''" />
        <input type="hidden" value="submit" />
        <i class="fa-solid fa-magnifying-glass pl-4 text-2xl text-white"></i>
    </form>    
</div>

<div data-aos="fade-up" class="p-8 lg:px-24 4xl:px-96 pb-24 text-white">
    <div class="flex">
        <p class="mr-2"><?php _e( 'Search results for:', 'nd_dosth' ); ?></p>
        <div class="italic font-bold"><?php echo get_search_query(); ?></div>    
    </div>
    <div class="mt-8 grid grid-cols-1 lg:grid-cols-4 gap-4">
        <?php if ( have_posts() ): ?>
            <?php while( have_posts() ): ?>
                <?php the_post(); ?>
                    <a class="videogame-card" style="border: 3px solid #121212" href="<?php echo get_permalink() ?>">
                        <div class="h-96 flex flex-col justify-end relative" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-position: center;">
                            <div style="border-bottom-right-radius: 10px;" class="bg-green-500 absolute top-0 p-2 text-xs">-20 %</div>
                            <div style="background-color: rgba(0, 0, 0, 0.5);" class="px-8 py-4">
                                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                <p><?php echo get_the_title(); ?></p>
                                <p class="text-sm text-steam-blue"><?php echo wc_price( $price ); ?></p>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php else: ?>
                <p><?php _e( 'No Search Results found', 'nd_dosth' ); ?></p>
        <?php endif; ?>
    </div>
    <div class="mx-auto flex justify-between mt-8 text-sm pagination">
        <?php the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '<i class="fa-solid fa-caret-left"></i>',
                'next_text' => '<i class="fa-solid fa-caret-right"></i>',
            )); 
        ?>
    </div>
</div>

<?php get_footer(); ?>