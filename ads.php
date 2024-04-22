<?php
 /**
 *
 * ECOE: despliegue de una página (por defecto).
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage Ecoe
 * @author Pablo Masquiarán <pablo.masquiaran@osborn.cl>
 * @since ECOE 1.0
 * ================================================================================
 */
?>
<?php

add_action( 'wp_enqueue_scripts', 'maki_page_queue', 100 );

function maki_page_queue(){

	if( is_home() || is_front_page() ):
		wp_enqueue_script( 'ecoe-lottie-svg', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.2/lottie_svg.min.js', array(), false, true );
		wp_enqueue_script( 'ecoe-frontpage', get_template_directory_uri() . '/js/frontpage.js', array(), false, true );
		wp_enqueue_style( 'ecoe-frontpage', get_template_directory_uri() . '/css/frontpage.css', array(), null, 'all' );
	elseif( is_page( 'personaje' ) ):
		wp_enqueue_script( 'ecoe-personaje', get_template_directory_uri() . '/js/personaje.js', array(), false, true );
		wp_enqueue_style( 'ecoe-personaje', get_template_directory_uri() . '/css/personaje.css', array(), null, 'all' );
	elseif( is_page( 'puerta' ) ):
		wp_enqueue_script( 'ecoe-lottie-svg', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.2/lottie_svg.min.js', array(), false, true );
		wp_enqueue_script( 'ecoe-puerta', get_template_directory_uri() . '/js/puerta.js', array(), false, true );
		wp_enqueue_style( 'ecoe-puerta', get_template_directory_uri() . '/css/puerta.css', array(), null, 'all' );
	elseif( is_page( 'ficha' ) ):
		wp_enqueue_script( 'ecoe-ficha', get_template_directory_uri() . '/js/ficha.js', array(), false, true );
		wp_enqueue_style( 'ecoe-ficha', get_template_directory_uri() . '/css/ficha.css', array(), null, 'all' );
	elseif( is_page( 'escenario' ) ):
		//wp_enqueue_script( 'ecoe-custom-scrollbar', 'https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js', array(), false, true );
		//wp_enqueue_script( 'ecoe-snap-svg', 'https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js', array(), false, true );
		wp_enqueue_script( 'ecoe-lottie-svg', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.2/lottie_svg.min.js', array(), false, true );
		wp_enqueue_script( 'ecoe-easytimer', get_template_directory_uri() . '/js/easytimer.min.js', array(), false, true );
		wp_enqueue_script( 'ecoe-escenario', get_template_directory_uri() . '/js/escenario.js', array(), false, true );
		//wp_enqueue_style( 'ecoe-custom-scrollbar', 'https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css', array(), null, 'all' );
		wp_enqueue_style( 'ecoe-escenario', get_template_directory_uri() . '/css/escenario.css', array(), null, 'all' );
	endif;
}

?>
	<?php get_header(); ?>
		<?php while( have_posts() ): ?>
			<?php the_post(); ?>
			<div class="animsition">
			<?php
				
				if( is_home() || is_front_page() ):
					get_template_part( 'templates/page', 'frontpage' );
				elseif( is_page ( 'personaje' ) ):
					get_template_part( 'templates/page', 'personaje' );
				elseif( is_page ( 'puerta' ) ):
					get_template_part( 'templates/page', 'puerta' );
				elseif( is_page ( 'ficha' ) ):
					get_template_part( 'templates/page', 'ficha' );
				elseif( is_page ( 'escenario' ) ):
					get_template_part( 'templates/page', 'escenario' );
				endif;
				
			?>
			</div>
		<?php endwhile; ?>
	<?php get_footer(); ?>