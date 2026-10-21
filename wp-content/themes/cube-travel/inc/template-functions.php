<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cube_travel
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cube_travel_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'has-sidebar';
	}

	if( is_page() ) {
		$cube_travel_page_sidebar = get_theme_mod( 'cube_travel_page_sidebar', 'no-sidebar' );
		$classes[] = esc_attr( $cube_travel_page_sidebar );
	}

	if( is_single() ) {
		$cube_travel_single_post_sidebar = get_theme_mod( 'cube_travel_single_post_sidebar' , 'right-sidebar' );
		$classes[] = esc_attr( $cube_travel_single_post_sidebar );
	}

	if ( is_home() ) {
		$cube_travel_blog_sidebar = get_theme_mod( 'cube_travel_blog_sidebar' , 'no-sidebar' );
		$classes[] = esc_attr( $cube_travel_blog_sidebar );
	}

	if( is_archive() || is_search() || is_404() ) {
		$cube_travel_archive_sidebar = get_theme_mod( 'cube_travel_archive_sidebar' , 'no-sidebar' );
		$classes[] = esc_attr( $cube_travel_archive_sidebar );
	}

	return $classes;
}
add_filter( 'body_class', 'cube_travel_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cube_travel_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cube_travel_pingback_header' );

/**
 * cube_travel Excerpt Length
 *
 * @since cube_travel 1.0.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'cube_travel_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function cube_travel_excerpt_length( $length ) {

		if ( is_admin() ) {
			return $length;
		}

		$cube_travel_excerpt_length = get_theme_mod( 'cube_travel_excerpt_length', 28 );

		if ( absint( $cube_travel_excerpt_length ) > 0 ) {
			$length = absint( $cube_travel_excerpt_length );
		}

		return $length;
	}

endif;

add_filter( 'excerpt_length', 'cube_travel_excerpt_length', 999 );

if ( ! function_exists( 'cube_travel_get_post_categories' ) ) {
	/**
	* Get post categories by by term id
	* 
	* @return array
	*/
	function cube_travel_get_post_categories(){

		$terms = get_terms( array(
		    'taxonomy' => 'category',
		    'hide_empty' => true,
		) );

		if( empty($terms) || !is_array( $terms ) ){
			return array();
		}

		$data = array();
		foreach ( $terms as $key => $value) {
			$term_id = absint( $value->term_id );
			$data[$term_id] =  esc_html( $value->name );
		}
		return $data;

	}
}

if (!function_exists('cube_travel_get_posts_list')) :

	/**
	 * Returns published posts as an ID => title array for the Customizer select.
	 */
	function cube_travel_get_posts_list() {

		$choices = array('' => __('Select a post', 'cube-travel'));

		$posts = get_posts(array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => 100,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		));

		foreach ($posts as $post) {
			$title = get_the_title($post);
			$choices[$post->ID] = $title ? $title : sprintf(__('(no title) #%d', 'cube-travel'), $post->ID);
		}

		return $choices;
	}

endif;