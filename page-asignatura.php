<?php
/**
 *
 * Estudio de casos: Plantilla Home asignatura.
 * Template Name: Página Home asignatura
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

	add_action( 'wp_enqueue_scripts', 'maki_queue_asignatura', 900 );

	function maki_queue_asignatura(){

		wp_enqueue_style( 'estudiodecasos-asignatura', get_template_directory_uri() . '/css/asignatura.css', array(), null, 'all' );
		//wp_enqueue_script( 'estudiodecasos-asignatura', get_template_directory_uri() . '/js/asignatura.js', array(), '', true );

	};

?>
<?php get_header(); ?>

		<section class="container">
		<?php if ( have_posts() ): ?>
			<?php while( have_posts() ): the_post(); ?>
			<?php $casos_pages = get_pages( array( 'child_of' => get_the_ID(), 'parent' => get_the_ID() ) ); ?>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-facultad-de-farmacia-blanco.svg" alt="Logo Facultad de Farmacia">
				<h1>
					Estudio de Casos
					<small><?php the_title(); ?></small>
				</h1>
				<a class="waves-effect waves-light btn-large" href="<?php echo get_permalink( $casos_pages[0]->ID ); ?>">Ingresar<i class="material-icons right">arrow_forward_ios</i></a>
			</div>
			<?php endwhile; ?>
		<?php else: ?>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-facultad-de-farmacia-blanco.svg" alt="Logo Facultad de Farmacia">
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
			</div>
		<?php endif; ?>
		</section>

<?php get_footer(); ?>