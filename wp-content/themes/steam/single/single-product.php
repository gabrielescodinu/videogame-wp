<!-- get header -->
<?php 
  get_header(); 
  the_post();
  // Get Product ID
  global $product;  
  $product->get_id(); 
?>
    <!-- hero banner -->
    <div class="swiper-slide flex h-screen text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9)), url('<?php echo get_the_post_thumbnail_url() ?>'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div style="background-color: rgba(0, 0, 0, 0.75);" class="h-full p-8 lg:px-24 4xl:px-96 flex flex-col justify-center w-full lg:w-1/2">
            <p data-aos="fade-right" class="text-4xl font-bold"><?php echo the_title(); ?></p>
            <hr class="mt-8">
            <p data-aos="fade-right" data-aos-delay="100" class="mt-8"><?php echo limit_text(get_the_content(), 30); ?></p>
            <p class="mt-4 text-xs">Available on: PS5, Xbox, PC</p>
            <p data-aos="fade-up" data-aos-delay="200" class="text-2xl mt-8 text-steam-blue"><?php echo $product->get_price(); ?></p>
            <!-- <div data-aos="fade-up" data-aos-delay="300" class="mt-8"><a href="<?php echo get_site_url(); ?>/action/?add-to-cart=<?php echo $product->get_id(); ?>"><button style="border: 3px solid #66c0f4" class="slide uppercase font-bold text-xl px-8 py-2 text-white">Add to cart <i class="fa-solid fa-cart-shopping"></i></button></a></div> -->
            <button class="button product_type_simple add_to_cart_button ajax_add_to_cart " data-product_id="<?php echo $product->get_id(); ?>" data-quantity="1" aria-label="Add “<?php echo the_title(); ?>” to your cart">Add to cart</button>
        </div>
    </div>

    <!-- About -->
    <div data-aos="fade-up" class="mt-8 p-8 lg:px-24 4xl:px-96 text-white">
      <p class="text-2xl font-bold mb-8">About this game</p>
      <p class="mt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore saepe libero numquam consequuntur laborum ipsam voluptatem eligendi officiis, consequatur quisquam unde illum aut. Eius, fugiat maxime. Minima tempore ratione commodi? Dolore necessitatibus reiciendis possimus molestiae fuga aut facere dolorem facilis blanditiis, vel ut debitis? Dolorem debitis velit dignissimos voluptas veniam! Itaque alias animi fugit placeat, officiis corrupti inventore. Nihil, quis.</p>
      <div>
        <p class="text-sm mt-8"><span class="text-steam-blue">Developer:</span> Valve</p>
        <p class="text-sm"><span class="text-steam-blue">Publisher:</span> Valve, Lorem Ipsum</p>
        <p class="text-sm"><span class="text-steam-blue">Genre:</span> Open World, Shooter</p>
        <p class="text-sm mt-2"><span class="text-steam-blue">Release Date:</span> 20 July 2022</p>
        <p class="text-sm"><span class="text-steam-blue">Reviews:</span> Positive (2.480)</p>
        <p class="text-sm mt-2"><span class="text-steam-blue">Vote:</span> 8.9</p>
      </div>
    </div>

    <!-- Requirments -->
    <div data-aos="fade-up" class="p-8 lg:px-24 4xl:px-96 text-white">
      <p class="text-xl font-bold mb-4">System Requirments</p>
      <div class="text-sm">
        <p>OS: Windows® 7/Vista/XP</p>
        <p>Processor: Intel® Core™ 2 Duo E6600 or AMD Phenom™ X3 8750 processor or better</p>
        <p>Memory: 2 GB RAM</p>
        <p>Graphics: Video card must be 256 MB or more and should be a DirectX 9-compatible with support for Pixel</p>
      </div>
    </div>

    <!-- Reviews -->
    <div data-aos="fade-up" class="p-8 lg:px-24 4xl:px-96 pb-24 text-white">
      <p class="text-2xl font-bold mb-8">Reviews</p>

      <div class="mt-8 grid grid-cols-1 lg:grid-cols-4 gap-4">
        <div style="border: 2px solid #66c0f4" class="p-8">
          <p><span class="text-steam-blue">Author:</span> Lorem Ipsum</p>
          <p class="text-sm mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam, laboriosam exercitationem asperiores obcaecati autem natus nemo quod, dolor debitis, placeat est! Voluptatum officiis quos, laborum eaque nobis harum et amet!</p>
          <p class="text-xs mt-2 text-steam-blue"><span class="mr-4">20 July 2022</span><span>Vote: 9</span></p>
        </div>
        <div style="border: 2px solid #66c0f4" class="p-8">
          <p><span class="text-steam-blue">Author:</span> Lorem Ipsum</p>
          <p class="text-sm mt-2 overflow-y-scroll max-h-40">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia deleniti asperiores accusantium blanditiis sapiente vel quo aut dolorum culpa, officia quis maiores eos sunt. Saepe neque libero odit debitis mollitia.
          Reiciendis hic nulla reprehenderit, porro rem eius tempora? Sunt repellendus nesciunt amet repellat quam. Beatae expedita esse consequatur, magnam, sit cupiditate vero molestias, quae voluptatibus reiciendis optio dignissimos saepe exercitationem.</p>
          <p class="text-xs mt-2 text-steam-blue"><span class="mr-4">20 July 2022</span><span>Vote: 9</span></p>
        </div>
        <div style="border: 2px solid #66c0f4" class="p-8">
          <p><span class="text-steam-blue">Author:</span> Lorem Ipsum</p>
          <p class="text-sm mt-2 overflow-y-scroll max-h-40">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia deleniti asperiores accusantium blanditiis sapiente vel quo aut dolorum culpa, officia quis maiores eos sunt. Saepe neque libero odit debitis mollitia.
          Reiciendis hic nulla reprehenderit, porro rem eius tempora? Sunt repellendus nesciunt amet repellat quam. Beatae expedita esse consequatur, magnam, sit cupiditate vero molestias, quae voluptatibus reiciendis optio dignissimos saepe exercitationem.</p>
          <p class="text-xs mt-2 text-steam-blue"><span class="mr-4">20 July 2022</span><span>Vote: 9</span></p>
        </div>
        <div style="border: 2px solid #66c0f4" class="p-8">
          <p><span class="text-steam-blue">Author:</span> Lorem Ipsum</p>
          <p class="text-sm mt-2 overflow-y-scroll max-h-40">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia deleniti asperiores accusantium blanditiis sapiente vel quo aut dolorum culpa, officia quis maiores eos sunt. Saepe neque libero odit debitis mollitia.
          Reiciendis hic nulla reprehenderit, porro rem eius tempora? Sunt repellendus nesciunt amet repellat quam. Beatae expedita esse consequatur, magnam, sit cupiditate vero molestias, quae voluptatibus reiciendis optio dignissimos saepe exercitationem.</p>
          <p class="text-xs mt-2 text-steam-blue"><span class="mr-4">20 July 2022</span><span>Vote: 9</span></p>
        </div>
        <div style="border: 2px solid #66c0f4" class="p-8">
          <p><span class="text-steam-blue">Author:</span> Lorem Ipsum</p>
          <p class="text-sm mt-2 overflow-y-scroll max-h-40">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia deleniti asperiores accusantium blanditiis sapiente vel quo aut dolorum culpa, officia quis maiores eos sunt. Saepe neque libero odit debitis mollitia.
          Reiciendis hic nulla reprehenderit, porro rem eius tempora? Sunt repellendus nesciunt amet repellat quam. Beatae expedita esse consequatur, magnam, sit cupiditate vero molestias, quae voluptatibus reiciendis optio dignissimos saepe exercitationem.</p>
          <p class="text-xs mt-2 text-steam-blue"><span class="mr-4">20 July 2022</span><span>Vote: 9</span></p>
        </div>
        <div style="border: 2px solid #66c0f4" class="p-8">
          <p><span class="text-steam-blue">Author:</span> Lorem Ipsum</p>
          <p class="text-sm mt-2 overflow-y-scroll max-h-40">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia deleniti asperiores accusantium blanditiis sapiente vel quo aut dolorum culpa, officia quis maiores eos sunt. Saepe neque libero odit debitis mollitia.
          Reiciendis hic nulla reprehenderit, porro rem eius tempora? Sunt repellendus nesciunt amet repellat quam. Beatae expedita esse consequatur, magnam, sit cupiditate vero molestias, quae voluptatibus reiciendis optio dignissimos saepe exercitationem.</p>
          <p class="text-xs mt-2 text-steam-blue"><span class="mr-4">20 July 2022</span><span>Vote: 9</span></p>
        </div>
        <div style="border: 2px solid #66c0f4" class="p-8">
          <p><span class="text-steam-blue">Author:</span> Lorem Ipsum</p>
          <p class="text-sm mt-2 overflow-y-scroll max-h-40">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia deleniti asperiores accusantium blanditiis sapiente vel quo aut dolorum culpa, officia quis maiores eos sunt. Saepe neque libero odit debitis mollitia.
          Reiciendis hic nulla reprehenderit, porro rem eius tempora? Sunt repellendus nesciunt amet repellat quam. Beatae expedita esse consequatur, magnam, sit cupiditate vero molestias, quae voluptatibus reiciendis optio dignissimos saepe exercitationem.</p>
          <p class="text-xs mt-2 text-steam-blue"><span class="mr-4">20 July 2022</span><span>Vote: 9</span></p>
        </div>
        <div style="border: 2px solid #66c0f4" class="p-8">
          <p><span class="text-steam-blue">Author:</span> Lorem Ipsum</p>
          <p class="text-sm mt-2 overflow-y-scroll max-h-40">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia deleniti asperiores accusantium blanditiis sapiente vel quo aut dolorum culpa, officia quis maiores eos sunt. Saepe neque libero odit debitis mollitia.
          Reiciendis hic nulla reprehenderit, porro rem eius tempora? Sunt repellendus nesciunt amet repellat quam. Beatae expedita esse consequatur, magnam, sit cupiditate vero molestias, quae voluptatibus reiciendis optio dignissimos saepe exercitationem.</p>
          <p class="text-xs mt-2 text-steam-blue"><span class="mr-4">20 July 2022</span><span>Vote: 9</span></p>
        </div>
      </div>      
    </div>

    <!-- More like this -->
    <div class="p-8 lg:px-24 4xl:px-96 pb-24 text-white">
      <p data-aos="fade-up" class="text-2xl font-bold mb-8">More like this</p>

      <div data-aos="fade-up" class="mt-8 grid grid-cols-1 lg:grid-cols-4 gap-4">
        <a class="videogame-card" style="border: 3px solid #121212" href="">
          <div class="h-96 flex flex-col justify-end relative" style="background-image: url('../assets/images/immagini/cyberpunk_background.jpg'); background-size: cover; background-position: center;">
            <div style="border-bottom-right-radius: 10px;" class="bg-green-500 absolute top-0 p-2 text-xs">-20 %</div>
            <div style="background-color: rgba(0, 0, 0, 0.5);" class="px-8 py-4">
              <p>Cyberpunk 2077</p>
              <p class="text-sm text-steam-blue">$59.99</p>
            </div>
          </div>
        </a>
        <a href="" class="videogame-card" style="border: 3px solid #121212">
          <div class="h-96 flex flex-col justify-end relative" style="background-image: url('../assets/images/immagini/borderlands3_background.jpeg'); background-size: cover; background-position: center;">
            <div style="border-bottom-right-radius: 10px;" class="bg-red-500 absolute top-0 p-2 text-xs">New Release</div>
            <div style="background-color: rgba(0, 0, 0, 0.5);" class="px-8 py-4">
              <p>Cyberpunk 2077</p>
              <p class="text-sm text-steam-blue">$59.99</p>
            </div>
          </div>
        </a>
        <a href="" class="videogame-card" style="border: 3px solid #121212">
          <div class="h-96 flex flex-col justify-end" style="background-image: url('../assets/images/immagini/eldenring_background.jpeg'); background-size: cover; background-position: center;">
            <div style="background-color: rgba(0, 0, 0, 0.5);" class="px-8 py-4">
              <p>Cyberpunk 2077</p>
              <p class="text-sm text-steam-blue">$59.99</p>
            </div>
          </div>
        </a>
        <a href="" class="videogame-card" style="border: 3px solid #121212">
          <div class="h-96 flex flex-col justify-end" style="background-image: url('../assets/images/immagini/haloinfinite_background.webp'); background-size: cover; background-position: center;">
            <div style="background-color: rgba(0, 0, 0, 0.5);" class="px-8 py-4">
              <p>Cyberpunk 2077</p>
              <p class="text-sm text-steam-blue">$59.99</p>
            </div>
          </div>
        </a>
      </div>      
    </div>

<!-- get footer -->
<?php get_footer(); ?>


<?php
    // Get Product ID
    global $product;

    // var_dump($product);

    $product->get_id();

    // Get Product General Info
    
    $product->get_type();
    $product->get_name();
    $product->get_slug();
    $product->get_date_created();
    $product->get_date_modified();
    $product->get_status();
    $product->get_featured();
    $product->get_catalog_visibility();
    $product->get_description();
    $product->get_short_description();
    $product->get_sku();
    $product->get_menu_order();
    $product->get_virtual();
    get_permalink( $product->get_id() );
    
    // Get Product Prices
    
    $product->get_price();
    $product->get_regular_price();
    $product->get_sale_price();
    $product->get_date_on_sale_from();
    $product->get_date_on_sale_to();
    $product->get_total_sales();
    
    // Get Product Tax, Shipping & Stock
    
    $product->get_tax_status();
    $product->get_tax_class();
    $product->get_manage_stock();
    $product->get_stock_quantity();
    $product->get_stock_status();
    $product->get_backorders();
    $product->get_sold_individually();
    $product->get_purchase_note();
    $product->get_shipping_class_id();
    
    // Get Product Dimensions
    
    $product->get_weight();
    $product->get_length();
    $product->get_width();
    $product->get_height();
    $product->get_dimensions();
    
    // Get Linked Products
    
    $product->get_upsell_ids();
    $product->get_cross_sell_ids();
    $product->get_parent_id();
    
    // Get Product Variations and Attributes
    
    $product->get_children(); // get variations
    $product->get_attributes();
    $product->get_default_attributes();
    $product->get_attribute( 'attributeid' ); //get specific attribute value
    
    // Get Product Taxonomies
    
    $product->get_categories();
    $product->get_category_ids();
    $product->get_tag_ids();
    
    // Get Product Downloads
    
    $product->get_downloads();
    $product->get_download_expiry();
    $product->get_downloadable();
    $product->get_download_limit();
    
    // Get Product Images
    
    $product->get_image_id();
    $product->get_image();
    $product->get_gallery_image_ids();
    
    // Get Product Reviews
    
    $product->get_reviews_allowed();
    $product->get_rating_counts();
    $product->get_average_rating();
    $product->get_review_count();
?>
