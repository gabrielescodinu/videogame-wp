<?php

    if ( is_singular( 'product') ) {

        get_template_part( 'single/single-product' );

    } elseif ( is_singular('reports') ) {

        get_template_part( 'single/single-report' );

    } elseif ( is_singular('events') ) {

        get_template_part( 'single/single-event' );

    } elseif ( is_singular('observatories') ) {

        get_template_part( 'single/single-observatory' );

    } elseif ( is_singular('news') ) {

        get_template_part( 'single/single-news' );
    }

?>