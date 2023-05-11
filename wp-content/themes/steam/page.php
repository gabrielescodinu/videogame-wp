<?php 
    if (is_shop()) {
        get_template_part( 'archive/archive-product' );
    } elseif (is_cart() )  {  
        get_template_part( 'cart' );
    } elseif (is_checkout() )  {  
        get_template_part( 'checkout' );
    } else {
        get_template_part( 'archive/archive-product' );
    }
?>