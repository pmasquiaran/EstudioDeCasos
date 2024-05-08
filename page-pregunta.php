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

		$scripts[] = (object) array(
			'path' => get_template_directory_uri() . '/preguntas/js/pregunta-' . get_field( 'tipo' ) . '.js',
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

		$styles[] = (object) array(
			'path' => get_template_directory_uri() . '/preguntas/css/pregunta-' . get_field( 'tipo' ) . '.css',
			//'version' => $cache_buster // Cache buster
		);

	}

?>
<?php get_header(); ?>

<section class="container">
	<?php if ( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>
		<?php $caso_post = get_post( wp_get_post_parent_id() ); ?>
		<?php $caso_fields = get_fields( wp_get_post_parent_id() ); ?>
			<div id="ficha" class="sidenav">
				<div>
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">
								<small>Exámenes</small>
							</span>
							<div>
								<?php echo $ficha = apply_filters( 'the_content', $caso_post->post_content ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="animate__animated animate__fadeInLeft animate__slow">
				<nav>
					<a href="#" class="brand"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/logo-facultad-de-farmacia-blanco.svg" alt="Logo Facultad de Farmacia"></a>
					<ul class="right">
						<li>
							<a class="waves-effect waves-light btn-floating" href="<?php echo get_permalink( wp_get_post_parent_id() ); ?>"><i class="material-icons">home_filled</i></a>
						</li>
						<li>
							<a class="waves-effect waves-light btn sidenav-trigger" data-target="ficha"><i class="material-icons left">assignment</i>Ficha</a>
						</li>
						<?php if( count( $caso_fields['documentos'] ) > 0 ): ?>
						<li>
							<a class="waves-effect waves-light btn dropdown-trigger" data-target="documentos"><i class="material-icons left">snippet_folder</i>Documentación</a>
							<ul id="documentos" class="dropdown-content">
								<?php foreach( $caso_fields['documentos'] as $indice => $documento ): ?>
								<li>
									<a href="<?php echo $documento['url-documento']['url']; ?>" target="_blank">
										<?php

											switch( $documento['tipo-documento'] ):
												case 'PDF': echo '<i class="material-icons left">picture_as_pdf</i>'; break;
												case 'EXCEL': echo '<i class="material-icons left">table_view</i>'; break;
												case 'WORD': echo '<i class="material-icons left">text_snippet</i>'; break;
												case 'POWER POINT': echo '<i class="material-icons left">perm_media</i>'; break;
												case 'ENLACE WEB': echo '<i class="material-icons left">perm_media</i>'; break;
											endswitch;

										?>
										<?php echo $documento['nombre-documento']; ?>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
						</li>
						<?php endif; ?>
					</ul>
				</nav>
				<div class="row">
					<div class="col s4">
						<div class="card z-depth-3">
							<div class="card-content">
								<span class="card-title">
									<strong><?php echo get_the_title( wp_get_post_parent_id() ); ?></strong>
									<small><?php echo get_field( 'nombre', wp_get_post_parent_id() ); ?></small>
								</span>
								<?php if ( has_post_thumbnail( wp_get_post_parent_id() ) ): ?>
								<p><img src="<?php the_post_thumbnail_url( wp_get_post_parent_id() ); ?>" alt=""></p>
								<?php else: ?>
								<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/related-caso-generica.jpg" alt=""></p>
								<?php endif; ?>
								<p><?php echo the_content(); ?></p>
							</div>
						</div>
					</div>
					<div class="col s8">
						<div class="card z-depth-3">
							<div class="card-content">
								<h1 class="texto-vertical"><?php echo get_the_title(); ?></h1>
								<!-- Iframe H5P :
								================================================================================ -->
								<?php echo do_shortcode( '[h5p id="' . get_field('id') . '"]' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<ul class="pagination">
				<?php $preguntas_pages = get_pages( array( 'child_of' => wp_get_post_parent_id(), 'parent' => wp_get_post_parent_id(), 'sort_column' => 'menu_order' ) ); ?>
				<?php foreach( $preguntas_pages as $pregunta ): ?>
				<li class="waves-effect waves-light z-depth-3<?php echo $active = ( $pregunta->ID == get_the_ID() ) ? ' active' : ''; ?>"><a href="<?php echo get_permalink( $pregunta->ID ); ?>"><?php echo ++$cont; ?></a></li>
				<?php endforeach; ?>
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