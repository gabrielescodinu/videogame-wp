    
<?php
  $title = get_sub_field('title');
  $content = get_sub_field('content');
?>

<div class="p-8 lg:px-24 4xl:px-96 bg-lsc-gray py-24">
  <h2 data-aos="fade-up" class="font-bold text-lsc-orange mb-8 text-2xl"><?php echo $title ?></h2>
  <div data-aos="fade-up" class="mt-8 list-disc">
    <?php echo $content ?>
  </div>
</div>