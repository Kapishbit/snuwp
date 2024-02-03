<?php
function stm_lms_settings_profiles_section() {
	$pages           = WPCFTO_Settings::stm_get_post_type_array( 'page' );
	$submenu_general = esc_html__( 'General', 'masterstudy-lms-learning-management-system' );
	$submenu_auth    = esc_html__( 'Authorization', 'masterstudy-lms-learning-management-system' );

	$general_fields = array(
		'pro_banner'                        => array(
			'type'    => 'pro_banner',
			'label'   => esc_html__( 'Course Pre-moderation', 'masterstudy-lms-learning-management-system' ),
			'img'     => STM_LMS_URL . 'assets/img/pro-features/course-premoderation.png',
			'desc'    => esc_html__( 'This will help you maintain quality control and student confidence. Courses from instructors will need admin approval before their publication.', 'masterstudy-lms-learning-management-system' ),
			'submenu' => $submenu_general,
			'hint'    => esc_html__( 'Enable', 'masterstudy-lms-learning-management-system' ),
		),
		'instructor_can_add_students'       => array(
			'type'    => 'checkbox',
			'label'   => esc_html__( 'Add Students to own Course', 'masterstudy-lms-learning-management-system' ),
			'hint'    => esc_html__( 'Instructor will have a tool in an account to add student by email to course', 'masterstudy-lms-learning-management-system' ),
			'submenu' => $submenu_general,
		),
		'instructors_page'                  => array(
			'type'    => 'select',
			'label'   => esc_html__( 'Instructors Archive Page', 'masterstudy-lms-learning-management-system' ),
			'options' => $pages,
			'submenu' => $submenu_general,
		),
		'cancel_subscription'               => array(
			'type'    => 'select',
			'label'   => esc_html__( 'Cancel Subscription Page', 'masterstudy-lms-learning-management-system' ),
			'options' => $pages,
			'hint'    => esc_html__( 'If you want to display link to Cancel Subscription page, choose page and add to page content shortcode [pmpro_cancel].', 'masterstudy-lms-learning-management-system' ),
			'submenu' => $submenu_general,
		),
		'float_menu'                        => array(
			'type'    => 'checkbox',
			'label'   => esc_html__( 'Side Profile Menu', 'masterstudy-lms-learning-management-system' ),
			'value'   => false,
			'submenu' => $submenu_general,
			'hint'    => esc_html__( 'Moves the Profile Menu to the left or right side.', 'masterstudy-lms-learning-management-system' ),
		),
		'float_menu_guest'                  => array(
			'type'       => 'checkbox',
			'label'      => esc_html__( 'Side Profile Menu for Guest Users', 'masterstudy-lms-learning-management-system' ),
			'value'      => true,
			'dependency' => array(
				'key'   => 'float_menu',
				'value' => 'not_empty',
			),
			'submenu'    => $submenu_general,
		),
		'float_menu_position'               => array(
			'type'       => 'select',
			'label'      => esc_html__( 'Side Profile Menu Position', 'masterstudy-lms-learning-management-system' ),
			'options'    => array(
				'left'  => esc_html__( 'Left', 'masterstudy-lms-learning-management-system' ),
				'right' => esc_html__( 'Right', 'masterstudy-lms-learning-management-system' ),
			),
			'value'      => 'left',
			'dependency' => array(
				'key'   => 'float_menu',
				'value' => 'not_empty',
			),
			'submenu'    => $submenu_general,
		),
		/*GROUP STARTED*/
		'float_background_color'            => array(
			'group'       => 'started',
			'type'        => 'color',
			'label'       => esc_html__( 'Background color', 'masterstudy-lms-learning-management-system' ),
			'columns'     => '33',
			'group_title' => esc_html__( 'Side Profile Menu Colors', 'masterstudy-lms-learning-management-system' ),
			'dependency'  => array(
				'key'   => 'float_menu',
				'value' => 'not_empty',
			),
			'submenu'     => $submenu_general,
		),
		'float_text_color'                  => array(
			'group'      => 'ended',
			'type'       => 'color',
			'label'      => esc_html__( 'Text color', 'masterstudy-lms-learning-management-system' ),
			'columns'    => '33',
			'dependency' => array(
				'key'   => 'float_menu',
				'value' => 'not_empty',
			),
			'submenu'    => $submenu_general,
		),
		'user_premoderation'                => array(
			'type'    => 'checkbox',
			'label'   => esc_html__( 'Enable Email Confirmation', 'masterstudy-lms-learning-management-system' ),
			'hint'    => esc_html__( 'All new registered users will get an e-mail for account verification', 'masterstudy-lms-learning-management-system' ),
			'submenu' => $submenu_auth,
		),
		'authorization_shortcode'           => array(
			'type'           => 'text',
			'label'          => esc_html__( 'Shortcode For Authorization Form', 'masterstudy-lms-learning-management-system' ),
			'value'          => '[masterstudy_authorization_form]',
			'hint'           => esc_html__( 'You can add type="login" or type="register" in shortcode to choose starting form', 'masterstudy-lms-learning-management-system' ),
			'submenu'        => $submenu_auth,
			'field_readonly' => 'yes',
		),
		'register_as_instructor'            => array(
			'type'    => 'checkbox',
			'label'   => esc_html__( 'Instructor Registration', 'masterstudy-lms-learning-management-system' ),
			'hint'    => esc_html__( 'By disabling the instructor registration, you remove the checkbox "I want sign up as instructor" from the registration form', 'masterstudy-lms-learning-management-system' ),
			'submenu' => $submenu_auth,
			'value'   => true,
		),
		'instructor_premoderation'          => array(
			'type'       => 'checkbox',
			'label'      => esc_html__( 'Instructor Pre-moderation', 'masterstudy-lms-learning-management-system' ),
			'hint'       => esc_html__( 'Enable this if users need to get approved by the admin to become an instructor', 'masterstudy-lms-learning-management-system' ),
			'submenu'    => $submenu_auth,
			'value'      => true,
			'dependency' => array(
				'key'   => 'register_as_instructor',
				'value' => 'not_empty',
			),
		),
		'separate_instructor_registration'  => array(
			'type'       => 'checkbox',
			'label'      => esc_html__( 'Show Instructor Registration Form On Separate Page', 'masterstudy-lms-learning-management-system' ),
			'hint'       => esc_html__( 'Choose where you want instructors to be registered: on the authorization form for students and instructors or separate page', 'masterstudy-lms-learning-management-system' ),
			'submenu'    => $submenu_auth,
			'value'      => false,
			'dependency' => array(
				'key'   => 'register_as_instructor',
				'value' => 'not_empty',
			),
		),
		'instructor_registration_page'      => array(
			'type'         => 'select',
			'label'        => esc_html__( 'Instructor Registration Page', 'masterstudy-lms-learning-management-system' ),
			'hint'         => esc_html__( 'Select a separate page with a form for instructor registration', 'masterstudy-lms-learning-management-system' ),
			'options'      => WPCFTO_Settings::stm_get_post_type_array( 'page' ),
			'submenu'      => $submenu_auth,
			'dependency'   => array(
				array(
					'key'   => 'separate_instructor_registration',
					'value' => 'not_empty',
				),
				array(
					'key'   => 'register_as_instructor',
					'value' => 'not_empty',
				),
			),
			'dependencies' => '&&',
		),
		'instructor_registration_link'      => array(
			'type'         => 'select',
			'label'        => esc_html__( 'Show A Link To A Separate Page In The Form', 'masterstudy-lms-learning-management-system' ),
			'hint'         => esc_html__( 'Enable this if you want to show a link to a separate page for instructor registration in the authorization form', 'masterstudy-lms-learning-management-system' ),
			'submenu'      => $submenu_auth,
			'options'      => array(
				'hide' => esc_html__( 'Hide', 'masterstudy-lms-learning-management-system' ),
				'show' => esc_html__( 'Show', 'masterstudy-lms-learning-management-system' ),
			),
			'value'        => 'hide',
			'dependency'   => array(
				array(
					'key'   => 'separate_instructor_registration',
					'value' => 'not_empty',
				),
				array(
					'key'   => 'register_as_instructor',
					'value' => 'not_empty',
				),
			),
			'dependencies' => '&&',
		),
		'instructor_registration_shortcode' => array(
			'type'           => 'text',
			'label'          => esc_html__( 'Shortcode For The Instructor Registration Form', 'masterstudy-lms-learning-management-system' ),
			'value'          => '[masterstudy_instructor_registration]',
			'submenu'        => $submenu_auth,
			'dependency'     => array(
				'key'   => 'register_as_instructor',
				'value' => 'not_empty',
			),
			'field_readonly' => 'yes',
		),
	);

	if ( STM_LMS_Helpers::is_pro() ) {
		$course_moderation_field = array(
			'course_premoderation' => array(
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Enable Course Pre-moderation', 'masterstudy-lms-learning-management-system' ),
				'hint'    => esc_html__( 'Course will have Pending status, until you approve it', 'masterstudy-lms-learning-management-system' ),
				'pro'     => true,
				'pro_url' => admin_url( 'admin.php?page=stm-lms-go-pro&source=pre-moderation-profile-settings' ),
				'submenu' => $submenu_general,
			),
		);

		$general_fields = array_merge( $course_moderation_field, $general_fields );
	}

	return array(
		'name'   => esc_html__( 'Profiles', 'masterstudy-lms-learning-management-system' ),
		'label'  => esc_html__( 'Profiles Settings', 'masterstudy-lms-learning-management-system' ),
		'icon'   => 'fa fa-user-circle',
		'fields' => array_merge( $general_fields, stm_lms_settings_sorting_the_menu_section() ),
	);
}
