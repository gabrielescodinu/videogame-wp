<?php
    // Template Name: Home
    get_header(); 
    $categories = get_categories();
?>

    <!-- Swiper -->
    <div class="swiper mySwiper text-white h-screen">
      <div class="swiper-wrapper">
        <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => '6',
                'order' => 'ASC',
                'orderby' => 'menu_order',
                'post_status'    => 'publish',
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

                <div class="swiper-slide flex flex-col justify-end" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9)), url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-position: center;">
                    <div style="background-color: rgba(0, 0, 0, 0.5);" class="p-8 lg:px-24 4xl:px-96 lg:flex justify-between items-center">
                        <div class="card">
                        <p class="text-4xl"><?php echo get_the_title(); ?></p>
                        <p class="text-2xl mt-4 text-steam-blue">$<?php echo $product->get_price(); ?></p>
                        </div>
                        <div><a href="<?php echo get_permalink() ?>"><button style="border: 3px solid #66c0f4" class="slide uppercase font-bold text-xl px-8 py-2 mt-4 lg:mt-0 text-white">Buy Now!</button></a></div>
                    </div>
                </div>

            <?php endwhile; else: ?>
        <?php endif; wp_reset_query(); ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-scrollbar"></div>
    </div>

    <!-- search -->
    <div data-aos="fade-up" class="p-8 lg:px-24 4xl:px-96">
        <form class="w-full flex justify-between items-center" action="<?php echo home_url(); ?>" id="search-form" method="get">
            <input class="w-full px-8 py-2 rounded-lg text-white bg-steam-grey" type="text" name="s" id="s" placeholder="Search" onblur="if(this.value=='')this.value='type your search'" onfocus="if(this.value=='type your search')this.value=''" />
            <input type="hidden" value="submit" />
            <i class="fa-solid fa-magnifying-glass pl-4 text-2xl text-white"></i>
        </form>    
    </div>

    <!-- genres -->
    <div data-aos="fade-up" class="swiper mySwiper2 text-white p-8 lg:px-24 4xl:px-96">
      <p class="text-2xl font-bold mb-8">Genres</p>
        <div class="swiper-wrapper">
            <?php
                $taxonomy     = 'product_cat';
                $orderby      = 'name';  
                $show_count   = 0;      // 1 for yes, 0 for no
                $pad_counts   = 0;      // 1 for yes, 0 for no
                $hierarchical = 1;      // 1 for yes, 0 for no  
                $title        = '';  
                $empty        = 0;

                $args = array(
                    'taxonomy'     => $taxonomy,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'hide_empty'   => $empty,
                );
                $all_categories = get_categories( $args );
                foreach ($all_categories as $cat) {
                    $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                    // get the image URL for parent category
                    $image = wp_get_attachment_url($thumbnail_id);
                    if($cat->category_parent == 0) {
                        $category_id = $cat->term_id;   
                        ?>
                            <div class="swiper-slide mb-8">
                                <a href="<?php echo get_term_link($cat->slug, 'product_cat')?>"><div class="h-24 lg:h-36 flex flex-col justify-center text-white genre-card" style="border: 1px solid gray; background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $image ?>'); background-size: cover;">
                                    <p class="mx-auto uppercase text-sm"><?php echo $cat->name ?></p>
                                </div></a>
                            </div>
                        <?php
                    }       
                }
            ?>
        </div>
      <div class="swiper-pagination"></div>
    </div>

    <!-- games -->
    <div class="p-8 lg:px-24 4xl:px-96 pb-24 text-white">
        <p data-aos="fade-up" class="text-2xl font-bold mb-8">All Games</p>

        <!-- categories -->
        <div data-aos="fade-up" class="flex items-center flex-wrap">
            <?php
                $terms = get_terms( 'product_tag' );
                $term_array = array();
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    foreach ( $terms as $term ) {
                        $term_array[] = $term->name;
                        $url = get_tag_link( $term->term_id );?>
                        <div class="mr-4"><a href="<?php echo $url ?>"><button class="border-2 border-steam-blue slide rounded-xl px-4 py-2 mt-4 lg:mt-0"><?php echo $term->name ?></button></a></div>
                        <?php
                    }
                }
            ?>
        </div>

        <div data-aos="fade-up" class="mt-8 grid grid-cols-1 lg:grid-cols-4 gap-4">
            <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => '8',
                    'order' => 'DESC',
                    'orderby' =>'menu_order',
                    'post_status'    => 'publish',
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

                    <a class="videogame-card" style="border: 3px solid #121212" href="<?php echo get_permalink() ?>">
                        <div class="h-96 flex flex-col justify-end relative" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-position: center;">
                            <div style="border-bottom-right-radius: 10px;" class="bg-green-500 absolute top-0 p-2 text-xs">-20 %</div>
                            <div style="background-color: rgba(0, 0, 0, 0.5);" class="px-8 py-4">
                            <p><?php echo get_the_title(); ?></p>
                            <p class="text-sm text-steam-blue">$<?php echo $product->get_price(); ?></p>
                            </div>
                        </div>
                    </a>

                <?php endwhile; else: ?>
            <?php endif; wp_reset_query(); ?>
        </div>
        <?php $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) ); ?>
        <div data-aos="fade-up" class="mx-auto w-44 mt-8"><a href="<?php echo $shop_page_url ?>"><button style="border: 3px solid #66c0f4" class="slide uppercase font-bold text-xl px-8 py-2 mt-4 lg:mt-0 text-white">See All <i class="fa-solid fa-arrow-right"></i></button></a></div>
    </div>

<!-- get footer -->
<?php get_footer(); ?>