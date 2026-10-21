<?php
$cube_travel_latest_stories_section_subtitle = get_theme_mod( 'cube_travel_latest_stories_section_subtitle', 'Fresh From The Road' );
$cube_travel_latest_stories_section_title    = get_theme_mod( 'cube_travel_latest_stories_section_title', 'Latest Stories' );
$cube_travel_latest_stories_id               = get_theme_mod( 'cube_travel_latest_stories_category', absint( get_option( 'default_category' ) ) );
$cube_travel_number_of_latest_stories_items  = get_theme_mod( 'cube_travel_number_of_latest_stories_items', 3 );
$cube_travel_latest_stories_button_text = get_theme_mod('cube_travel_latest_stories_button_text', __('Read', 'cube-travel'));

$query = new WP_Query( apply_filters( 'cube_travel_latest_stories_args', array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => absint( $cube_travel_number_of_latest_stories_items ),
	'cat' 				  => absint( $cube_travel_latest_stories_id ),
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => true,
)));

$cube_travel_show_latest_stories = $query->have_posts() && ( is_home() || is_front_page() ) && ! is_paged();

if( get_theme_mod( 'cube_travel_latest_stories', true ) && $cube_travel_show_latest_stories ){
	?>
	<section id="section-latest-stories">
		<div class="section-header">
			<?php if ( $cube_travel_latest_stories_section_subtitle ) : ?>
				<span class="section-subtitle"><?php echo esc_html( $cube_travel_latest_stories_section_subtitle ); ?></span>
			<?php endif; ?>
			<h2 class="section-title"><?php echo esc_html( $cube_travel_latest_stories_section_title ); ?></h2>
		</div><!-- .section-header -->

		<div class="columns-3 clear">
			<?php
			while ( $query->have_posts() ) : $query->the_post();

				$cube_travel_story_cats      = get_the_category();
				$cube_travel_story_read_time = max( 1, (int) ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ) );
				?>

				<article>
					<div class="latest-story-wrapper">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="featured-image">
								<a href="<?php echo esc_url( get_permalink() ); ?>">
									<?php the_post_thumbnail( 'medium_large', array(
										'alt' => esc_attr( get_the_title() )
									) ); ?>
								</a>

								<?php if ( ! empty( $cube_travel_story_cats ) ) : ?>
									<a class="story-category" href="<?php echo esc_url( get_category_link( $cube_travel_story_cats[0]->term_id ) ); ?>"><?php echo esc_html( $cube_travel_story_cats[0]->name ); ?></a>
								<?php endif; ?>
							</div><!-- .featured-image -->
						<?php endif; ?>

						<div class="entry-container">
							<header class="entry-header">
								<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
							</header>

							<div class="entry-content">
								<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
							</div><!-- .entry-content -->

							<div class="entry-meta">
								<span class="story-date"><?php echo esc_html( get_the_date() ); ?></span>
								<span class="story-read-time"><?php echo esc_html( sprintf( __( '%d min read', 'cube-travel' ), $cube_travel_story_read_time ) ); ?></span>
								<a class="story-read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($cube_travel_latest_stories_button_text); ?> <span aria-hidden="true">&rarr;</span></a>
							</div><!-- .entry-meta -->
						</div><!-- .entry-container -->
					</div><!-- .latest-story-wrapper -->
				</article>

			<?php
			endwhile;
			wp_reset_postdata(); ?>
		</div><!-- .columns-3 -->
	</section><!-- #section-latest-stories -->
<?php } ?>
