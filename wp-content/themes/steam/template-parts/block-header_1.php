<?php
    $background = get_sub_field('background');
    $cta_link = get_sub_field('cta_link');
    $cta_label = get_sub_field('cta_label');
    $subtitle = get_sub_field('subtitle');
    $title = get_sub_field('title');
?>



<!-- hero banner -->
<div class="h-screen w-full text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url('<?php echo esc_url($background['url']); ?>'); background-size: cover; background-attachment: fixed;">
    <div class="flex h-full">
        <div class="lg:w-1/2 flex flex-col justify-center p-8 lg:px-24 4xl:px-96" style="background-image: linear-gradient(rgba(252, 115, 51, 0.5), rgba(252, 115, 51, 0.5))">
        <p data-aos="fade-right" data-aos-delay="200" class="text-4xl font-bold mt-28"><?php echo esc_html($title); ?></p>
        <div data-aos="fade-right" data-aos-delay="400" class="text-xl mt-8"><?php echo $subtitle; ?></div>
        <div><a href="<?php echo esc_html($cta_link); ?>" data-aos="fade-right" data-aos-delay="400"><button class="slide uppercase text-xl rounded-3xl font-bold px-8 py-2 mt-8 bg-white text-lsc-orange hover:text-white"><?php echo esc_html($cta_label); ?></button></a></div>  
        </div>
        <div class="w-1/2 hidden lg:block"></div>
    </div>
</div>