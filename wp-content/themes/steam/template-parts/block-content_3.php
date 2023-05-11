    
<?php
    $title_team = get_sub_field('title_team');
    $member = get_sub_field('member');
?>

<div class="p-8 lg:px-24 4xl:px-96" data-aos="fade-up">
  <h1 class="text-xl text-lsc-orange"><?php echo $title_team ?></h1>
  <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 lg:gap-16 mt-8">
    <?php if( esc_html('member') ): ?>    
      <?php while( the_repeater_field('member') ): ?> 
          <div class="mb-8">
            <div class="h-40 w-40 shadow rounded-3xl" style="background-image: url('<?php echo the_sub_field('member_image'); ?>'); background-size: cover;"></div>
            <h2 class="text-lg mt-4 font-bold"><?php echo the_sub_field('member_name'); ?></h2>
            <p><?php echo the_sub_field('member_role'); ?></p>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <hr>
</div>