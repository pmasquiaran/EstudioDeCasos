<?php
/**
 *
 * Estudio de casos: despliegue de la plantilla pregunta dos
 *
 * @package WordPress
 * @subpackage Maki
 * @author Pablo Masquiarán <pablo.masquiaran@osborn.cl>
 * @since 1.0
 * @license https://www.gnu.org/licenses/lgpl-3.0-standalone.html Licencia Pública General Reducida de GNU
 * @link https://developer.wordpress.org/themes/basics/template-files/
 * ================================================================================
 */
?>
<?php if( ! defined( 'ABSPATH' ) ) exit; ?>
<?php

	//global $cache_buster = '?ver=' . H5P_Plugin::VERSION;

	/**
	 * @function maki_alter_h5p_scripts()
	 * @description función para sobreescribir el diseño por defecto de H5P
	 * ================================================================================
	 */
	add_action( 'h5p_alter_library_scripts', 'maki_alter_h5p_scripts', 10, 3 );

	function maki_alter_h5p_scripts( &$scripts, $libraries, $embed_type ){

		$scripts[] = (object) array(
			'path' => get_template_directory_uri() . '/preguntas/js/pregunta-' . get_field('tipo') . '.js',
			//'version' => $cache_buster // Cache buster
		);

	}

	/**
	 * @function maki_alter_h5p_styles()
	 * @description función para sobreescribir el diseño por defecto de H5P
	 * ================================================================================
	 */
	add_action( 'h5p_alter_library_styles', 'maki_alter_h5p_styles', 10, 3 );

	function maki_alter_h5p_styles( &$styles, $libraries, $embed_type ){

		$styles[] = (object) array(
			'path' => get_template_directory_uri() . '/preguntas/css/pregunta-' . get_field('tipo') . '.css',
			//'version' => $cache_buster // Cache buster
		);

	}

?>

		<!-- Iframe H5P :
		================================================================================ -->
		<?php the_content(); ?>
		<h1 id="titulo-caso" class=""><?php echo get_the_title( $post->post_parent ); ?></h1>
		<div class="row">
			<div class="col s3">
				<img style="margin-top:80px;height: 360px !important; float: right !important;" class="img-linea-tiempo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/recurso_1.png" alt="">
			</div>
			<div class="col s9">
				<div class="contenidor-interaccion">
					<?php echo do_shortcode( '[h5p id="'. get_field('id') .'"]' ); ?>
				</div>
			</div>
		</div>
		
		
		