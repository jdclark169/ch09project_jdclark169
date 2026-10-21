<?php
/**
 * Theme Options.
 *
 * @package cube_travel
 */

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'cube-travel' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Full Width Banner section
$wp_customize->add_section('cube_travel_full_width_banner_section', array(
	'title'       => __('Full Width Banner', 'cube-travel'),
	'panel'       => 'theme_option_panel'
));

$wp_customize->add_setting('cube_travel_enable_full_width_banner',
	array(
		'default'           => true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_travel_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_enable_full_width_banner',
	array(
		'label'    => __('Enable Full Width Banner', 'cube-travel'),
		'section'  => 'cube_travel_full_width_banner_section',
		'settings' => 'cube_travel_enable_full_width_banner',
		'type'     => 'checkbox',
	)
);

$wp_customize->add_setting('cube_travel_full_width_banner_post',
	array(
		'default'           => '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_travel_sanitize_select',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_full_width_banner_post',
	array(
		'label'    => __('Select Post', 'cube-travel'),
		'section'  => 'cube_travel_full_width_banner_section',
		'settings' => 'cube_travel_full_width_banner_post',
		'type'     => 'select',
		'choices'  => cube_travel_get_posts_list(),
	)
);

$wp_customize->add_setting('cube_travel_full_width_banner_button_text',
	array(
		'default'           => __('Read the story', 'cube-travel'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_full_width_banner_button_text',
	array(
		'label'    => __('Button Text', 'cube-travel'),
		'section'  => 'cube_travel_full_width_banner_section',
		'settings' => 'cube_travel_full_width_banner_button_text',
		'type'     => 'text',
	)
);

$wp_customize->add_setting('cube_travel_full_width_banner_height',
	array(
		'default'           => 600,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_travel_sanitize_number_range',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_full_width_banner_height',
	array(
		'label'       => __('Banner Height in px (Min: 300, Max: 1000)', 'cube-travel'),
		'section'     => 'cube_travel_full_width_banner_section',
		'settings'    => 'cube_travel_full_width_banner_height',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 300,
			'max'  => 1000,
			'step' => 10,
		),
	)
);

// Latest Stories Section
$wp_customize->add_section('cube_travel_latest_stories_section', array(
	'title'       => __('Latest Stories', 'cube-travel'),
	'panel'       => 'theme_option_panel'
));

$wp_customize->add_setting('cube_travel_latest_stories',
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_travel_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_latest_stories',
	array(
		'label' 	=> __('Enable Latest Stories', 'cube-travel'),
		'section' 	=> 'cube_travel_latest_stories_section',
		'settings'  => 'cube_travel_latest_stories',
		'type' 		=> 'checkbox',
	)
);

$wp_customize->add_setting('cube_travel_latest_stories_section_subtitle',
	array(
		'default'           => 'Fresh From The Road',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('cube_travel_latest_stories_section_subtitle',
	array(
		'label'       => __('Section Subtitle', 'cube-travel'),
		'section'     => 'cube_travel_latest_stories_section',
		'settings'    => 'cube_travel_latest_stories_section_subtitle',
		'type'        => 'text'
	)
);

$wp_customize->add_setting('cube_travel_latest_stories_section_title',
	array(
		'default'           => 'Latest Stories',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('cube_travel_latest_stories_section_title',
	array(
		'label'       => __('Section Title', 'cube-travel'),
		'section'     => 'cube_travel_latest_stories_section',
		'settings'    => 'cube_travel_latest_stories_section_title',
		'type'        => 'text'
	)
);

$wp_customize->add_setting('cube_travel_number_of_latest_stories_items',
	array(
	'default' 			=> 3,
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'cube_travel_sanitize_number_range'
	)
);

$wp_customize->add_control('cube_travel_number_of_latest_stories_items',
	array(
	'label'       => __('Number of Items (Max: 50)', 'cube-travel'),
	'section'     => 'cube_travel_latest_stories_section',
	'settings'    => 'cube_travel_number_of_latest_stories_items',
	'type'        => 'number',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 50,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('cube_travel_latest_stories_category',
	array(
		'default' 			=> absint( get_option( 'default_category' ) ), // Uncategorized,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_travel_sanitize_select',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_latest_stories_category',
	array(
		'label' 	=> __('Select Categories', 'cube-travel'),
		'section' 	=> 'cube_travel_latest_stories_section',
		'settings'  => 'cube_travel_latest_stories_category',
		'type' 		=> 'select',
		'choices' 	=> cube_travel_get_post_categories(),
	)
);

$wp_customize->add_setting('cube_travel_latest_stories_button_text',
	array(
		'default'           => __('Read', 'cube-travel'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_latest_stories_button_text',
	array(
		'label'    => __('Button Text', 'cube-travel'),
		'section'  => 'cube_travel_latest_stories_section',
		'settings' => 'cube_travel_latest_stories_button_text',
		'type'     => 'text',
	)
);


// Latest Articles Section
$wp_customize->add_section('cube_travel_latest_articles_section', array(    
	'title'       => __('Latest Articles', 'cube-travel'),
	'panel'       => 'theme_option_panel'    
));

$wp_customize->add_setting('cube_travel_latest_articles', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_travel_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_latest_articles', 
	array(		
		'label' 	=> __('Enable Latest Articles Title', 'cube-travel'),
		'section' 	=> 'cube_travel_latest_articles_section',
		'settings'  => 'cube_travel_latest_articles',
		'type' 		=> 'checkbox',
	)
);

$wp_customize->add_setting('cube_travel_latest_articles_section_title', 
	array(
		'default'           => 'Latest Articles',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('cube_travel_latest_articles_section_title', 
	array(
		'label'       => __('Latest Articles Title', 'cube-travel'),
		'section'     => 'cube_travel_latest_articles_section',   
		'settings'    => 'cube_travel_latest_articles_section_title',	
		'type'        => 'text'
	)
);

// Sidebar section
$wp_customize->add_section('cube_travel_section_sidebar', array(
	'title'       => __('Sidebar Options', 'cube-travel'),
	'panel'       => 'theme_option_panel'
));

// Blog Sidebar Option
$wp_customize->add_setting('cube_travel_blog_sidebar',
	array(
	'default' 			=> 'no-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'cube_travel_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_blog_sidebar',
	array(
	'label' 	=> __('Blog Sidebar', 'cube-travel'),
	'section' 	=> 'cube_travel_section_sidebar',
	'settings'  => 'cube_travel_blog_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(
		'left-sidebar' 	=> __( 'Left Sidebar', 'cube-travel'),
		'right-sidebar' => __( 'Right Sidebar', 'cube-travel'),
		'no-sidebar' 	=> __( 'No Sidebar', 'cube-travel'),
		),
	)
);

// Single Post Sidebar Option
$wp_customize->add_setting('cube_travel_single_post_sidebar',
	array(
	'default' 			=> 'right-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'cube_travel_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_single_post_sidebar',
	array(
	'label' 	=> __('Single Post Sidebar', 'cube-travel'),
	'section' 	=> 'cube_travel_section_sidebar',
	'settings'  => 'cube_travel_single_post_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(
		'left-sidebar' 	=> __( 'Left Sidebar', 'cube-travel'),
		'right-sidebar' => __( 'Right Sidebar', 'cube-travel'),
		'no-sidebar' 	=> __( 'No Sidebar', 'cube-travel'),
		),
	)
);

// Archive Sidebar Option
$wp_customize->add_setting('cube_travel_archive_sidebar',
	array(
	'default' 			=> 'no-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'cube_travel_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_archive_sidebar',
	array(
	'label' 	=> __('Archive Sidebar', 'cube-travel'),
	'section' 	=> 'cube_travel_section_sidebar',
	'settings'  => 'cube_travel_archive_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(
		'left-sidebar' 	=> __( 'Left Sidebar', 'cube-travel'),
		'right-sidebar' => __( 'Right Sidebar', 'cube-travel'),
		'no-sidebar' 	=> __( 'No Sidebar', 'cube-travel'),
		),
	)
);

// Page Sidebar Option
$wp_customize->add_setting('cube_travel_page_sidebar',
	array(
	'default' 			=> 'no-sidebar',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'cube_travel_sanitize_select',
	'transport'         => 'refresh',
	)
);

$wp_customize->add_control('cube_travel_page_sidebar',
	array(
	'label' 	=> __('Page Sidebar', 'cube-travel'),
	'section' 	=> 'cube_travel_section_sidebar',
	'settings'  => 'cube_travel_page_sidebar',
	'type' 		=> 'radio',
	'choices' 	=> array(
		'left-sidebar' 	=> __( 'Left Sidebar', 'cube-travel'),
		'right-sidebar' => __( 'Right Sidebar', 'cube-travel'),
		'no-sidebar' 	=> __( 'No Sidebar', 'cube-travel'),
		),
	)
);

// Excerpt Length
$wp_customize->add_section('cube_travel_section_excerpt_length',
	array(
	'title'       => __('Excerpt Length', 'cube-travel'),
	'panel'       => 'theme_option_panel'
	)
);

$wp_customize->add_setting( 'cube_travel_excerpt_length', array(
	'default'           => '28',
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'cube_travel_sanitize_number_range',
	'transport'         => 'refresh',
) );

$wp_customize->add_control( 'cube_travel_excerpt_length', array(
	'label'       => __( 'Excerpt Length', 'cube-travel' ),
	'description' => __( 'Note: Min 5 & Max 100.', 'cube-travel' ),
	'section'     => 'cube_travel_section_excerpt_length',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 5, 'max' => 100, 'style' => 'width: 55px;' ),
) );
