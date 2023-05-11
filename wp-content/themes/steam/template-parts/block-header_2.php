<?php
        $background = get_sub_field( 'background' );
        $title = get_sub_field( 'title' );
        $subtitle = get_sub_field( 'subtitle' );
?>

<!-- hero banner -->
<div class="w-full text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url('<?php echo $background['url'] ?>'); background-size: cover; background-attachment: fixed; background-position: center;">
        <div class="flex h-full">
                <div class="lg:w-1/2 w-full flex flex-col justify-center p-8 lg:px-24 4xl:px-96 py-32" style="background-image: linear-gradient(rgba(252, 115, 51, 0.5), rgba(252, 115, 51, 0.5))">
                        <p data-aos="fade-right" data-aos-delay="200" class="text-4xl font-bold mt-28"><?php echo $title; ?></p>
                        <div data-aos="fade-right" data-aos-delay="300" class="mt-8"><?php echo $subtitle; ?></div>
                </div>
                <div class="w-1/2 hidden lg:block"></div>
        </div>
</div>