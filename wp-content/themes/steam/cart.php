<!-- get header -->
<?php get_header(); ?>
<?php $cart = WC()->cart; ?>
<?php $page_title = get_the_title(); ?>

<div data-aos="fade-up" class="text-white p-8 lg:px-24 4xl:px-96 py-40 pt-40 min-h-screen">
    <p class="text-2xl font-bold mb-8"><?php echo $page_title ?></p>

    <?php
        // Loop over cart items
        $total = WC()->cart->total;
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) { 
            $product = $cart_item['data'];
            $product_id = $cart_item['product_id'];
            $product_name = $product->get_title();
            $product_image = get_the_post_thumbnail_url($product_id);
            $cart_item_remove_url = wc_get_cart_remove_url( $cart_item_key );
            $subtotal = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
            $link = $product->get_permalink( $cart_item ); ?>
            <div class="lg:flex justify-between items-center mt-8 bg-gradient-to-r from-steam-darkblue to-steam-dark p-4">
                <div class="flex items-center">
                    <a class="mr-4 hover:text-red-500" href="<?php echo $cart_item_remove_url ?>"><i class="fa-solid fa-trash-can"></i></a>  
                    <a href="<?php echo $link ?>"><div class="h-60 w-52 videogame-card border-2 border-steam-grey" style="background-image: url('<?php echo $product_image ?>'); background-size: cover; background-position: center;"></div></a>
                </div>
                <p class="ml-8 lg:ml-4 mt-4 lg:mt-0"><?php echo $product_name ?></p>
                <p class="ml-8 lg:ml-4 text-steam-blue"><?php echo $subtotal ?></p>
            </div>
        
    <?php } ?>

    <?php $payment_page_url = get_permalink( wc_get_page_id( 'checkout' ) ); ?>
    
    <div data-aos="fade-up" class="lg:flex items-center justify-between">
        <div class="mt-8"><a href="<?php echo $payment_page_url ?>"><button style="border: 3px solid #66c0f4" class="slide uppercase font-bold text-xl px-8 py-2 mt-4 lg:mt-0 text-white">Checkout <i class="fa-solid fa-arrow-right"></i></button></a></div>
        <div class="text-2xl mt-4 lg:mt-0">$<?php echo $total ?></div>
    </div>


</div>

<!-- get footer -->
<?php get_footer(); ?>