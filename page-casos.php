<?php
/**
 *
 * Estudio de casos: Plantilla Lista de casos.
 * Template Name: Página Lista de casos
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
	add_theme_support( 'post-thumbnails', array( 'page' ) );
	add_action( 'wp_enqueue_scripts', 'maki_queue_casos', 900 );

	function maki_queue_casos(){

		wp_enqueue_style( 'estudiodecasos-casos', get_template_directory_uri() . '/css/casos.css', array(), null, 'all' );
		wp_enqueue_script( 'estudiodecasos-casos', get_template_directory_uri() . '/js/casos.js', array(), '', true );

	};

?>
<?php get_header(); ?>

	
	
		<!-- Preloader -->
		<section class="preloader">
		<?php if ( have_posts() ): ?>
			<?php while( have_posts() ): the_post(); ?>
			<?php $casos_pages = get_pages( array( 'child_of' => get_the_ID(), 'parent' => get_the_ID() ) ); ?>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-facultad-de-farmacia-blanco.svg" alt="Logo Facultad de Farmacia">
				<h1>
					Estudio de Casos
					<small><?php the_title(); ?></small>
				</h1>
				
			</div>
			<?php endwhile; ?>
		<?php else: ?>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-facultad-de-farmacia-blanco.svg" alt="Logo Facultad de Farmacia">

			</div>
		<?php endif; ?>
		</section>
		<!-- Preloader -->


		<section  class="container PAGE-CASOS">
		<?php if ( have_posts() ): ?>
			<?php while( have_posts() ): the_post(); ?>
			<div>
				<nav>
					<a href="#" class="brand"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/logo-facultad-de-farmacia-blanco.svg" alt="Logo Facultad de Farmacia"></a>
				</nav>
				<div class="carousel">
				<?php $casos_pages = get_pages( array( 'child_of' => get_the_ID(), 'parent' => get_the_ID(), 'sort_column' => 'menu_order' ) ); ?>
				<?php foreach( $casos_pages as $caso ): ?>
					<div class="carousel-item card z-depth-3" href="#uno!">
						<div class="card-content">
							<span class="card-title">
								<strong><?php echo get_the_title( $caso->ID ); ?></strong>
								<small><?php echo get_field( 'nombre', $caso->ID ); ?></small>
							</span>
							<p><?php echo get_field( 'descripcion', $caso->ID ); ?></p>
							<?php if ( has_post_thumbnail() ): ?>
							<p><img src="<?php the_post_thumbnail_url(); ?>" alt=""></p>
							<?php else: ?>
							<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/related-caso-generica.jpg" alt=""></p>
							<?php endif; ?>
						</div>
						<div class="card-action">
							<a class="waves-effect waves-light btn-flat" href="<?php echo get_permalink( $caso->ID ); ?>">Ingresar<i class="material-icons right">arrow_forward_ios</i></a>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
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