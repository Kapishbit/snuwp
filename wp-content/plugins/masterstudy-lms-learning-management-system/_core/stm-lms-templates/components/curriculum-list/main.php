<?php

/**
 * @var int $course_id
 * @var string $style
 * @var boolean $udemy_curriculum
 * @var boolean $dark_mode
 *
 * masterstudy-curriculum-list_dark-mode - for dark mode
 * masterstudy-curriculum-list_classic - for classic style
 * masterstudy-curriculum-list__link_disabled - for disable click on lesson
 */

use \MasterStudy\Lms\Repositories\CurriculumRepository;

$udemy_curriculum = $udemy_curriculum ?? false;
$curriculum       = $udemy_curriculum ? get_post_meta( $course_id, 'udemy_curriculum', true ) : ( new CurriculumRepository() )->get_curriculum( $course_id, true );
if ( empty( $curriculum ) ) {
	return;
}

wp_enqueue_style( 'masterstudy-curriculum-list' );
wp_enqueue_script( 'masterstudy-curriculum-list' );

$is_enrolled = is_user_logged_in() ? STM_LMS_Course::get_user_course( get_current_user_id(), $course_id ) : false;
$trial_data  = ms_plugin_curriculum_trial_data( $course_id );
?>

<div class="masterstudy-curriculum-list <?php echo esc_attr( $dark_mode ? 'masterstudy-curriculum-list_dark-mode' : '' ); ?> <?php echo esc_attr( 'classic' === $style ? 'masterstudy-curriculum-list_classic' : '' ); ?>">
	<?php
	$template = $udemy_curriculum ? 'udemy-materials' : 'materials';
	STM_LMS_Templates::show_lms_template(
		'components/curriculum-list/' . $template,
		array(
			'course_id'   => $course_id,
			'curriculum'  => $curriculum,
			'trial_data'  => $trial_data,
			'is_enrolled' => $is_enrolled,
			'dark_mode'   => $dark_mode,
		)
	);
	?>
</div>
