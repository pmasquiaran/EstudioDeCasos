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