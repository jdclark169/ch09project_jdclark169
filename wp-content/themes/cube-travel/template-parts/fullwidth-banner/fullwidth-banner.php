<?php
$cube_travel_full_width_banner_id     = get_theme_mod( 'cube_travel_full_width_banner_post', '' );
$cube_travel_full_width_banner_button_text = get_theme_mod('cube_travel_full_width_banner_button_text', __('Read the story', 'cube-travel'));
$cube_travel_full_width_banner_height = get_theme_mod( 'cube_travel_full_width_banner_height', 600 );

$query = new WP_Query( apply_filters( 'cube_travel_full_width_banner_args', array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 1,
	'post__in'            => array( absint( $cube_travel_full_width_banner_id ) ),
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => true,
)));

$cube_travel_show_full_width_banner = $query->have_posts() && ( is_home() || is_front_page() ) && ! is_paged();

if( get_theme_mod( 'cube_travel_enable_full_width_banner', true ) && $cube_travel_show_full_width_banner ){
	?>
	<section id="section-full-width-banner" class="ct-full-width-banner" style="--ct-banner-height: <?php echo esc_attr( absint( $cube_travel_full_width_banner_height ) ); ?>px;">
		<?php
		while ( $query->have_posts() ) : $query->the_post();

			$cube_travel_banner_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
			$cube_travel_banner_cats  = get_the_category();
			?>

			<article class="ct-banner-item"<?php echo $cube_travel_banner_image ? ' style="background-image: url(' . esc_url( $cube_travel_banner_image ) . ');"' : ''; ?>>
				<div class="ct-banner-overlay"></div>

				<div class="ct-banner-content">
					<?php if ( ! empty( $cube_travel_banner_cats ) ) : ?>
						<a class="ct-banner-cat" href="<?php echo esc_url( get_category_link( $cube_travel_banner_cats[0]->term_id ) ); ?>"><?php echo esc_html( $cube_travel_banner_cats[0]->name ); ?></a>
					<?php endif; ?>

					<h2 class="ct-banner-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>

					<p class="ct-banner-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>

					<a class="ct-banner-btn" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($cube_travel_full_width_banner_button_text); ?></a>
				</div><!-- .ct-banner-content -->
			</article>

		<?php
		endwhile;
		wp_reset_postdata(); ?>
	</section><!-- #section-full-width-banner -->
<?php } ?>
