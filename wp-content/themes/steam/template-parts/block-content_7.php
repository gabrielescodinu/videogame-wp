    
<?php
  $title = get_sub_field('title');
  $content = get_sub_field('content');
  $image = get_sub_field('image');
?>

<!-- section 4 -->
<div class="p-8 lg:px-24 4xl:px-96 bg-lsc-gray py-24 lg:flex justify-between">
  <div class="lg:w-1/2">
    <h2 data-aos="fade-up" class="font-bold text-lsc-orange mb-8 text-2xl"><?php echo $title ?></h2>
    <div data-aos="fade-up"><?php echo $content ?></div>
  </div>
  <img data-aos="fade-up" class="lg:ml-24 lg:w-1/2 mt-8 lg:mt-0" src="<?php echo $image ?>" alt="">
</div>