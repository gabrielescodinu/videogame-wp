<!-- get header -->
<?php get_header(); ?>

<div class="w-full text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url('<?php echo get_template_directory_uri(); ?>/assets/images/immagini/header-hp.png'); background-size: cover; background-attachment: fixed">
    <div class="lg:w-1/2 w-full h-screen flex flex-col justify-center p-8 lg:px-24 4xl:px-96 py-32" style="background-image: linear-gradient(rgba(252, 115, 51, 0.5), rgba(252, 115, 51, 0.5))">
        <p data-aos="fade-right" data-aos-delay="200" class="text-6xl font-bold mt-28">404</p>
        <p data-aos="fade-right" data-aos-delay="300" class="text-2xl mt-8">Page not found</p>
    </div>
</div>

<!-- get footer -->
<?php get_footer(); ?>