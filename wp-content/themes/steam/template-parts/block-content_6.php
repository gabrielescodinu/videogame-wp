    
<?php
  $title = get_sub_field('title');
  $content = get_sub_field('content');
  $icons = get_sub_field('icons');
?>

<!-- section 3 -->
<div class="p-8 lg:px-24 4xl:px-96 bg-white py-24">
  <h2 data-aos="fade-up" class="font-bold text-lsc-orange mb-8 text-2xl"><?php echo $title ?></h2>
  <div data-aos="fade-up" class="mt-8"><?php echo $content ?></div>

  <div data-aos="fade-up" class="lg:grid grid-cols-5 gap-12 mt-16">

    <?php if( esc_html('icons') ): ?>    
      <?php while( the_repeater_field('icons') ): ?> 
          <div class="shadow mt-8 p-8 text-center rounded-3xl">
            <img class="w-16 h-16 mx-auto" src="<?php echo the_sub_field('icon_image'); ?>" alt="">
            <p class="mt-8"><?php echo the_sub_field('icon_content'); ?></p>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>