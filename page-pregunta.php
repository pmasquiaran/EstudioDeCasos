<?php
/**
 *
 * Estudio de casos: Plantilla Pregunta de caso.
 * Template Name: Página Pregunta de caso
 *
 * @package WordPress
 * @subpackage Maki
 * @author Pablo Masquiarán <pablo.masquiaran@osborn.cl>
 * @since 1.0
 * @license https://www.gnu.org/licenses/lgpl-3.0-standalone.html Licencia Pública General Reducida de GNU
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * ================================================================================
 */
?>
<?php if( ! defined( 'ABSPATH' ) ) exit; ?>
<?php

	/**
	 * @function maki_queue_pregunta()
	 * @description función para ...
	 * ================================================================================
	 */
	add_action( 'wp_enqueue_scripts', 'maki_queue_pregunta', 900 );

	function maki_queue_pregunta(){

		wp_enqueue_style( 'estudiodecasos-pregunta', get_template_directory_uri() . '/css/pregunta.css', array(), null, 'all' );
		//wp_enqueue_script( 'estudiodecasos-pregunta', get_template_directory_uri() . '/js/pregunta.js', array(), '', true );

	};

	//global $cache_buster = '?ver=' . H5P_Plugin::VERSION;

	/**
	 * @function maki_concat_h5p_scripts()
	 * @description función para sobreescribir el diseño por defecto de H5P
	 * ================================================================================
	 */
	add_action( 'h5p_alter_library_scripts', 'maki_concat_h5p_scripts', 10, 3 );

	function maki_concat_h5p_scripts( &$scripts, $libraries, $embed_type ){

		$scripts[] = (object) array(
			'path' => get_template_directory_uri() . '/preguntas/js/h5p.js',
			//'version' => $cache_buster // Cache buster
		);

	}

	/**
	 * @function maki_concat_h5p_styles()
	 * @description función para sobreescribir el diseño por defecto de H5P
	 * ================================================================================
	 */
	add_action( 'h5p_alter_library_styles', 'maki_concat_h5p_styles', 10, 3 );

	function maki_concat_h5p_styles( &$styles, $libraries, $embed_type ){

		$styles[] = (object) array(
			'path' => 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap',
			//'version' => $cache_buster // Cache buster
		);

		$styles[] = (object) array(
			'path' => get_template_directory_uri() . '/preguntas/css/h5p.css',
			//'version' => $cache_buster // Cache buster
		);

	}

?>
<?php get_header(); ?>

		<section class="container">
		<?php if ( have_posts() ): ?>
			<?php while( have_posts() ): the_post(); ?>

			<div class="z-depth-3">
				<nav>

						<a href="#" class="brand"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/logo-facultad-de-farmacia-azul.svg" alt="Logo Facultad de Farmacia"></a>
						<ul class="right">
							<li>
								<a class="waves-effect waves-light btn dropdown-trigger" href="#!" data-target="dropdown2"><i class="material-icons left">snippet_folder</i>Documentos</a>
<ul id="dropdown2" class="dropdown-content">
	<li><a href="#!">Documento one<span class="badge">1</span></a></li>
	<li><a href="#!">Documento two<span class="new badge">1</span></a></li>
	<li><a href="#!">Documento three</a></li>
</ul>
							</li>
							<li>
								<a class="waves-effect waves-light btn sidenav-trigger" data-target="slide-out"><i class="material-icons left">assignment</i>Fichas Clínicas</a>
<ul id="slide-out" class="sidenav">
	<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
	<li><a href="#!">Second Link</a></li>
	<li><div class="divider"></div></li>
	<li><a class="subheader">Subheader</a></li>
	<li><a class="waves-effect waves-light" href="#!">Third Link With Waves</a></li>
</ul>
							</li>
							<li><a class="waves-effect waves-light btn-floating"><i class="material-icons">home_filled</i></a></li>
						</ul>

				</nav>
				<?php get_template_part( 'preguntas/page-pregunta-' . get_field( 'tipo' ) ); ?>
			</div>

			<ul class="pagination">
				<li class="waves-effect waves-light active z-depth-3"><a href="#!">1</a></li>
				<li class="waves-effect waves-light z-depth-3"><a href="#!">2</a></li>
				<li class="waves-effect waves-light z-depth-3"><a href="#!">3</a></li>
				<li class="waves-effect waves-light z-depth-3"><a href="#!">4</a></li>
				<li class="waves-effect waves-light z-depth-3"><a href="#!">5</a></li>
				<li class="waves-effect waves-light z-depth-3"><a href="#!">6</a></li>
				<li class="waves-effect waves-light z-depth-3"><a href="#!">7</a></li>
			</ul>

			<?php endwhile; ?>
		<?php else: ?>
			<div class="z-depth-3">
				<a href="https://pmasquiaran.dev/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-maki-claro.svg" alt=""></a>
				<pre>

\                               /
 \ Perdido dentro del misterio /
  \    del cuarto amarillo    /
	]           ...           [
	]                         [
	]____                 ____[
	]   ]\               /[   [
	]   ] \             / [   [
	]   ]  ]__       __[  [   [
	]   ]  ] ]\     /[ [  [   [
	]   ]  ] ]       [ [  [   [
	]   ]  ]_]/ (#) \[_[  [   [
	]   ]  ]   .nHn.   [  [   [
	]   ]  ]   HHHHH.  [  [   [
	]   ] /    `HH("N   \ [   [
	]___]/      HHH  "   \[___[
	]           NNN           [
	]           N/"           [
	]           N H           [
  /            N              \
 /             q,              \
/                               \

	Prototipo - Estudio de casos

				</pre>
				<a class="waves-effect waves-light btn-large">Ingresar <i class="material-icons right">cloud</i></a>
			</div>
		<?php endif; ?>
		</section>

<?php get_footer(); ?>