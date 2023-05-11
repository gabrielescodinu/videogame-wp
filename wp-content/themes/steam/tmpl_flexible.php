<?php
    // Template Name: Flexible
    get_header(); 
?>

<?php
if( have_rows('flexible_content') ):
    while ( have_rows('flexible_content') ) : the_row();
        get_template_part( 'template-parts/block', get_row_layout() );
    endwhile;
endif;
?>

<!-- get footer -->
<?php get_footer(); ?>