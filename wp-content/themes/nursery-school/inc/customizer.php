<?php
/**
 * Nursery School Theme Customizer
 *
 * @package Nursery School
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Nursery_School_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Nursery_School_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Nursery_School_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Nursery School Pro', 'nursery-school' ),
					'pro_text' => esc_html__( 'Go Pro', 'nursery-school' ),
					'pro_url'  => esc_url( 'https://www.logicalthemes.com/themes/nursery-school-wordpress-template/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'nursery-school-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'nursery-school-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Nursery_School_Customize::get_instance();

function nursery_school_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'nursery_school_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'LT Settings', 'nursery-school' ),
	) );

	//Layout Setting
	$wp_customize->add_section( 'nursery_school_left_right' , array(
    	'title'      => esc_html__( 'General Settings', 'nursery-school' ),
		'priority'   => null,
		'panel' => 'nursery_school_panel_id'
	) );

	$wp_customize->add_setting('nursery_school_theme_options',array(
        'default' => 'One Column',
        'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control('nursery_school_theme_options',array(
        'type' => 'radio',
        'description' => __( 'Choose sidebar between different options', 'nursery-school' ),
        'label' => esc_html__( 'Post Sidebar Layout.', 'nursery-school' ),
        'section' => 'nursery_school_left_right',
        'choices' => array(
            'One Column' => esc_html__('One Column ','nursery-school'),
            'Three Columns' => esc_html__('Three Columns','nursery-school'),
            'Four Columns' => esc_html__('Four Columns','nursery-school'),
            'Right Sidebar' => esc_html__('Right Sidebar','nursery-school'),
            'Left Sidebar' => esc_html__('Left Sidebar','nursery-school'),
            'Grid Layout' => esc_html__('Grid Layout','nursery-school')
        ),
	));

	$nursery_school_font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'nursery_school_typography', array(
    	'title'      => __( 'Typography', 'nursery-school' ),
		'priority'   => null,
		'panel' => 'nursery_school_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'nursery_school_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_paragraph_color', array(
		'label' => __('Paragraph Color', 'nursery-school'),
		'section' => 'nursery_school_typography',
		'settings' => 'nursery_school_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('nursery_school_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control(
	    'nursery_school_paragraph_font_family', array(
	    'section'  => 'nursery_school_typography',
	    'label'    => __( 'Paragraph Fonts','nursery-school'),
	    'type'     => 'select',
	    'choices'  => $nursery_school_font_array,
	));

	$wp_customize->add_setting('nursery_school_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','nursery-school'),
		'section'	=> 'nursery_school_typography',
		'setting'	=> 'nursery_school_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'nursery_school_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_atag_color', array(
		'label' => __('"a" Tag Color', 'nursery-school'),
		'section' => 'nursery_school_typography',
		'settings' => 'nursery_school_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('nursery_school_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control(
	    'nursery_school_atag_font_family', array(
	    'section'  => 'nursery_school_typography',
	    'label'    => __( '"a" Tag Fonts','nursery-school'),
	    'type'     => 'select',
	    'choices'  => $nursery_school_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'nursery_school_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_li_color', array(
		'label' => __('"li" Tag Color', 'nursery-school'),
		'section' => 'nursery_school_typography',
		'settings' => 'nursery_school_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('nursery_school_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control(
	    'nursery_school_li_font_family', array(
	    'section'  => 'nursery_school_typography',
	    'label'    => __( '"li" Tag Fonts','nursery-school'),
	    'type'     => 'select',
	    'choices'  => $nursery_school_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'nursery_school_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_h1_color', array(
		'label' => __('H1 Color', 'nursery-school'),
		'section' => 'nursery_school_typography',
		'settings' => 'nursery_school_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('nursery_school_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control(
	    'nursery_school_h1_font_family', array(
	    'section'  => 'nursery_school_typography',
	    'label'    => __( 'H1 Fonts','nursery-school'),
	    'type'     => 'select',
	    'choices'  => $nursery_school_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('nursery_school_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_h1_font_size',array(
		'label'	=> __('H1 Font Size','nursery-school'),
		'section'	=> 'nursery_school_typography',
		'setting'	=> 'nursery_school_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'nursery_school_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_h2_color', array(
		'label' => __('H2 Color', 'nursery-school'),
		'section' => 'nursery_school_typography',
		'settings' => 'nursery_school_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('nursery_school_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control(
	    'nursery_school_h2_font_family', array(
	    'section'  => 'nursery_school_typography',
	    'label'    => __( 'H2 Fonts','nursery-school'),
	    'type'     => 'select',
	    'choices'  => $nursery_school_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('nursery_school_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_h2_font_size',array(
		'label'	=> __('H2 Font Size','nursery-school'),
		'section'	=> 'nursery_school_typography',
		'setting'	=> 'nursery_school_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'nursery_school_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_h3_color', array(
		'label' => __('H3 Color', 'nursery-school'),
		'section' => 'nursery_school_typography',
		'settings' => 'nursery_school_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('nursery_school_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control(
	    'nursery_school_h3_font_family', array(
	    'section'  => 'nursery_school_typography',
	    'label'    => __( 'H3 Fonts','nursery-school'),
	    'type'     => 'select',
	    'choices'  => $nursery_school_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('nursery_school_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_h3_font_size',array(
		'label'	=> __('H3 Font Size','nursery-school'),
		'section'	=> 'nursery_school_typography',
		'setting'	=> 'nursery_school_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'nursery_school_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_h4_color', array(
		'label' => __('H4 Color', 'nursery-school'),
		'section' => 'nursery_school_typography',
		'settings' => 'nursery_school_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('nursery_school_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control(
	    'nursery_school_h4_font_family', array(
	    'section'  => 'nursery_school_typography',
	    'label'    => __( 'H4 Fonts','nursery-school'),
	    'type'     => 'select',
	    'choices'  => $nursery_school_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('nursery_school_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_h4_font_size',array(
		'label'	=> __('H4 Font Size','nursery-school'),
		'section'	=> 'nursery_school_typography',
		'setting'	=> 'nursery_school_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'nursery_school_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_h5_color', array(
		'label' => __('H5 Color', 'nursery-school'),
		'section' => 'nursery_school_typography',
		'settings' => 'nursery_school_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('nursery_school_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control(
	    'nursery_school_h5_font_family', array(
	    'section'  => 'nursery_school_typography',
	    'label'    => __( 'H5 Fonts','nursery-school'),
	    'type'     => 'select',
	    'choices'  => $nursery_school_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('nursery_school_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_h5_font_size',array(
		'label'	=> __('H5 Font Size','nursery-school'),
		'section'	=> 'nursery_school_typography',
		'setting'	=> 'nursery_school_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'nursery_school_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_h6_color', array(
		'label' => __('H6 Color', 'nursery-school'),
		'section' => 'nursery_school_typography',
		'settings' => 'nursery_school_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('nursery_school_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'nursery_school_sanitize_choices'
	));
	$wp_customize->add_control(
	    'nursery_school_h6_font_family', array(
	    'section'  => 'nursery_school_typography',
	    'label'    => __( 'H6 Fonts','nursery-school'),
	    'type'     => 'select',
	    'choices'  => $nursery_school_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('nursery_school_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_h6_font_size',array(
		'label'	=> __('H6 Font Size','nursery-school'),
		'section'	=> 'nursery_school_typography',
		'setting'	=> 'nursery_school_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('nursery_school_topbar',array(
		'title'	=> esc_html__('Topbar','nursery-school'),
		'priority'	=> null,
		'panel' => 'nursery_school_panel_id',
	));

	$wp_customize->add_setting( 'nursery_school_sticky_header',array(
		'default'	=> false,
      	'sanitize_callback'	=> 'nursery_school_sanitize_checkbox'
    ) );
    $wp_customize->add_control('nursery_school_sticky_header',array(
    	'type' => 'checkbox',
    	'description' => __( 'Click on the checkbox to enable sticky header.', 'nursery-school' ),
        'label' => __( 'Sticky Header','nursery-school' ),
        'section' => 'nursery_school_topbar'
    ));


	$wp_customize->add_setting('nursery_school_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_phone',array(
		'label'	=> __('Add Phone Number','nursery-school'),
		'section' => 'nursery_school_topbar',
		'type'	 => 'text'
	));

	$wp_customize->add_setting('nursery_school_btn_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_btn_text',array(
		'label'	=> __('Add Button Text','nursery-school'),
		'section' => 'nursery_school_topbar',
		'type'	 => 'text'
	));

	$wp_customize->add_setting('nursery_school_btn_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_btn_link',array(
		'label'	=> __('Button Link','nursery-school'),
		'section' => 'nursery_school_topbar',
		'type'	 => 'text'
	));

    $wp_customize->add_setting( 'nursery_school_topbar_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_topbar_text_color', array(
		'label' => __('Topbar Text Color', 'nursery-school'),
		'section' => 'nursery_school_topbar',
		'settings' => 'nursery_school_topbar_text_color',
	)));

    $wp_customize->add_setting( 'nursery_school_social_icons_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_social_icons_color', array(
		'label' => __('Topbar Icons Color', 'nursery-school'),
		'section' => 'nursery_school_topbar',
		'settings' => 'nursery_school_social_icons_color',
	)));

	$wp_customize->add_setting( 'nursery_school_topbar_btntext_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_topbar_btntext_color', array(
		'label' => __('Button Text Color', 'nursery-school'),
		'section' => 'nursery_school_topbar',
		'settings' => 'nursery_school_topbar_btntext_color',
	)));

	$wp_customize->add_setting( 'nursery_school_topbar_btnbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_topbar_btnbg_color', array(
		'label' => __('Button Bg Color', 'nursery-school'),
		'section' => 'nursery_school_topbar',
		'settings' => 'nursery_school_topbar_btnbg_color',
	)));

	//Menu Settings
	$wp_customize->add_section( 'nursery_school_menu_settings' , array(
    	'title'      => esc_html__( 'Menu Settings', 'nursery-school' ),
		'priority'   => null,
		'panel' => 'nursery_school_panel_id'
	) );

    $wp_customize->add_setting( 'nursery_school_menu_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_menu_color', array(
		'label' => __('Menu Color', 'nursery-school'),
		'section' => 'nursery_school_menu_settings',
		'settings' => 'nursery_school_menu_color',
	)));

    $wp_customize->add_setting( 'nursery_school_menu_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_menu_hover_color', array(
		'label' => __('Menu Hover Color', 'nursery-school'),
		'section' => 'nursery_school_menu_settings',
		'settings' => 'nursery_school_menu_hover_color',
	)));

    $wp_customize->add_setting( 'nursery_school_submenu_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_submenu_color', array(
		'label' => __('Submenu Color', 'nursery-school'),
		'section' => 'nursery_school_menu_settings',
		'settings' => 'nursery_school_submenu_color',
	)));

    $wp_customize->add_setting( 'nursery_school_submenu_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_submenu_hover_color', array(
		'label' => __('Submenu Hover Color', 'nursery-school'),
		'section' => 'nursery_school_menu_settings',
		'settings' => 'nursery_school_submenu_hover_color',
	)));

	$wp_customize->add_setting( 'nursery_school_submenubdr_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_submenubdr_color', array(
		'label' => __('Submenu Border Color', 'nursery-school'),
		'section' => 'nursery_school_menu_settings',
		'settings' => 'nursery_school_submenubdr_color',
	)));

	$wp_customize->add_setting( 'nursery_school_submenu_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_submenu_bg_color', array(
		'label' => __('Submenu Background Color', 'nursery-school'),
		'section' => 'nursery_school_menu_settings',
		'settings' => 'nursery_school_submenu_bg_color',
	)));

	$wp_customize->add_setting( 'nursery_school_submenu_bghvr_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_submenu_bghvr_color', array(
		'label' => __('Submenu Background Hover Color', 'nursery-school'),
		'section' => 'nursery_school_menu_settings',
		'settings' => 'nursery_school_submenu_bghvr_color',
	)));

	//home page slider
	$wp_customize->add_section( 'nursery_school_slidersettings' , array(
    	'title'      => esc_html__( 'Slider Settings', 'nursery-school' ),
		'priority'   => null,
		'panel' => 'nursery_school_panel_id'
	) );

	$wp_customize->add_setting('nursery_school_slider_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'nursery_school_sanitize_checkbox'
	));
	$wp_customize->add_control('nursery_school_slider_hide_show',array(
	   'type' => 'checkbox',
	   'description' => __( 'Click on the checkbox to enable slider.', 'nursery-school' ),
	   'label' => esc_html__('Show / Hide slider','nursery-school'),
	   'section' => 'nursery_school_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'nursery_school_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'nursery_school_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'nursery_school_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'nursery-school' ),
			'description' => __( 'Take slider image size 1920px*877px.', 'nursery-school' ),
			'section'  => 'nursery_school_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}


	$wp_customize->add_setting( 'nursery_school_slider_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_slider_title_color', array(
		'label' => __('Title Color', 'nursery-school'),
		'section' => 'nursery_school_slidersettings',
		'settings' => 'nursery_school_slider_title_color',
	)));

	$wp_customize->add_setting( 'nursery_school_slider_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_slider_text_color', array(
		'label' => __('Text Color', 'nursery-school'),
		'section' => 'nursery_school_slidersettings',
		'settings' => 'nursery_school_slider_text_color',
	)));

	$wp_customize->add_setting( 'nursery_school_slider_btn_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_slider_btn_text_color', array(
		'label' => __('Button Text Color', 'nursery-school'),
		'section' => 'nursery_school_slidersettings',
		'settings' => 'nursery_school_slider_btn_text_color',
	)));

	$wp_customize->add_setting( 'nursery_school_slider_btn_border_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_slider_btn_border_color', array(
		'label' => __('Button Border Color', 'nursery-school'),
		'section' => 'nursery_school_slidersettings',
		'settings' => 'nursery_school_slider_btn_border_color',
	)));

	$wp_customize->add_setting( 'nursery_school_slider_btn_text_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_slider_btn_text_hover_color', array(
		'label' => __('Button Text Hover Color', 'nursery-school'),
		'section' => 'nursery_school_slidersettings',
		'settings' => 'nursery_school_slider_btn_text_hover_color',
	)));

	$wp_customize->add_setting( 'nursery_school_slider_btnbg_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_slider_btnbg_hover_color', array(
		'label' => __('Button Background Hover Color', 'nursery-school'),
		'section' => 'nursery_school_slidersettings',
		'settings' => 'nursery_school_slider_btnbg_hover_color',
	)));

	$wp_customize->add_setting( 'nursery_school_slider_btn_border_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_slider_btn_border_hover_color', array(
		'label' => __('Button Border Hover Color', 'nursery-school'),
		'section' => 'nursery_school_slidersettings',
		'settings' => 'nursery_school_slider_btn_border_hover_color',
	)));

	$wp_customize->add_setting( 'nursery_school_slider_npbtn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_slider_npbtn_color', array(
		'label' => __('Next/Pre Button Color', 'nursery-school'),
		'section' => 'nursery_school_slidersettings',
		'settings' => 'nursery_school_slider_npbtn_color',
	)));

	$wp_customize->add_setting( 'nursery_school_slider_npbtnbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_slider_npbtnbg_color', array(
		'label' => __('Next/Pre Button Background Color', 'nursery-school'),
		'section' => 'nursery_school_slidersettings',
		'settings' => 'nursery_school_slider_npbtnbg_color',
	)));

	// Services Section
	$wp_customize->add_section('nursery_school_services_section',array(
		'title'	=> __('Services Section','nursery-school'),
		'panel' => 'nursery_school_panel_id',
	));

	$wp_customize->add_setting('nursery_school_btn_serviceheading',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nursery_school_btn_serviceheading',array(
		'label'	=> __('Heading','nursery-school'),
		'section' => 'nursery_school_services_section',
		'type'	 => 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('nursery_school_service_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'nursery_school_sanitize_choices',
	));
	$wp_customize->add_control('nursery_school_service_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category To Display Post','nursery-school'),
		'section' => 'nursery_school_services_section',
	));

	//footer
	$wp_customize->add_section('nursery_school_footer_section',array(
		'title'	=> esc_html__('Footer Text','nursery-school'),
		'panel' => 'nursery_school_panel_id'
	));
		
	$wp_customize->add_setting('nursery_school_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('nursery_school_footer_copy',array(
		'label'	=> esc_html__('Copyright Text','nursery-school'),
		'section'	=> 'nursery_school_footer_section',
		'type'		=> 'text'
	));

	//Wocommerce Shop Page
	$wp_customize->add_section('nursery_school_woocommerce_shop_page',array(
		'title'	=> __('Woocommerce Shop Page','nursery-school'),
		'panel' => 'nursery_school_panel_id'
	));

	$wp_customize->add_setting( 'nursery_school_products_per_column' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'nursery_school_sanitize_choices',
	) );
	$wp_customize->add_control( 'nursery_school_products_per_column', array(
		'label'    => __( 'Product Per Columns', 'nursery-school' ),
		'description'	=> __('How many products should be shown per Column?','nursery-school'),
		'section'  => 'nursery_school_woocommerce_shop_page',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	)  );

	$wp_customize->add_setting('nursery_school_products_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'nursery_school_sanitize_float',
	));	
	$wp_customize->add_control('nursery_school_products_per_page',array(
		'label'	=> __('Product Per Page','nursery-school'),
		'description'	=> __('How many products should be shown per page?','nursery-school'),
		'section'	=> 'nursery_school_woocommerce_shop_page',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'nursery_school_product_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_product_title_color', array(
		'label' => __('Product Title Color', 'nursery-school'),
		'section' => 'nursery_school_woocommerce_shop_page',
		'settings' => 'nursery_school_product_title_color',
	)));

	$wp_customize->add_setting( 'nursery_school_product_price_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_product_price_color', array(
		'label' => __('Product Price Color', 'nursery-school'),
		'section' => 'nursery_school_woocommerce_shop_page',
		'settings' => 'nursery_school_product_price_color',
	)));

	$wp_customize->add_setting( 'nursery_school_product_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_product_btn_color', array(
		'label' => __('Product Button Color', 'nursery-school'),
		'section' => 'nursery_school_woocommerce_shop_page',
		'settings' => 'nursery_school_product_btn_color',
	)));

	$wp_customize->add_setting( 'nursery_school_product_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_product_btn_color', array(
		'label' => __('Button Color', 'nursery-school'),
		'section' => 'nursery_school_woocommerce_shop_page',
		'settings' => 'nursery_school_product_btn_color',
	)));

	$wp_customize->add_setting( 'nursery_school_product_btn_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_product_btn_bg_color', array(
		'label' => __('Button Background Color', 'nursery-school'),
		'section' => 'nursery_school_woocommerce_shop_page',
		'settings' => 'nursery_school_product_btn_bg_color',
	)));

	$wp_customize->add_setting( 'nursery_school_product_btn_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_product_btn_hover_color', array(
		'label' => __('Button Hover Color', 'nursery-school'),
		'section' => 'nursery_school_woocommerce_shop_page',
		'settings' => 'nursery_school_product_btn_hover_color',
	)));

	$wp_customize->add_setting( 'nursery_school_product_btn_hover_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_product_btn_hover_bg_color', array(
		'label' => __('Button Hover Background Color', 'nursery-school'),
		'section' => 'nursery_school_woocommerce_shop_page',
		'settings' => 'nursery_school_product_btn_hover_bg_color',
	)));

	$wp_customize->add_setting( 'nursery_school_product_sale_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_product_sale_color', array(
		'label' => __('Sale Badge Color', 'nursery-school'),
		'section' => 'nursery_school_woocommerce_shop_page',
		'settings' => 'nursery_school_product_sale_color',
	)));

	$wp_customize->add_setting( 'nursery_school_product_sale_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_product_sale_bg_color', array(
		'label' => __('Sale Badge Background Color', 'nursery-school'),
		'section' => 'nursery_school_woocommerce_shop_page',
		'settings' => 'nursery_school_product_sale_bg_color',
	)));

	// logo site title
	$wp_customize->add_setting('nursery_school_site_title_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'nursery_school_sanitize_checkbox'
    ));
    $wp_customize->add_control('nursery_school_site_title_tagline',array(
       'type' => 'checkbox',
       'label' => __('Display Site Title and Tagline in Header','nursery-school'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting( 'nursery_school_site_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_site_title_color', array(
		'label' => __('Site Title Color', 'nursery-school'),
		'section' => 'title_tagline',
		'settings' => 'nursery_school_site_title_color',
	)));

    $wp_customize->add_setting( 'nursery_school_site_tagline_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nursery_school_site_tagline_color', array(
		'label' => __('Site Tagline Color', 'nursery-school'),
		'section' => 'title_tagline',
		'settings' => 'nursery_school_site_tagline_color',
	)));
}
add_action( 'customize_register', 'nursery_school_customize_register' );