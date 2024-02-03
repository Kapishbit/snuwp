<?php
/**
 * @var int $course_id
 * @var array $trial_data
 * @var array $curriculum
 * @var boolean $is_enrolled
 * @var boolean $dark_mode
 */

$trial_index         = 0;
$shareware_settings  = get_option( 'stm_lms_shareware_settings' );
$guest_trial_enabled = false;
if ( class_exists( 'STM_LMS_Shareware' ) ) {
	$guest_trial_enabled = ( new STM_LMS_Shareware() )->is_shareware( $course_id ) ? $shareware_settings['shareware_guest_trial'] ?? true : false;
}

foreach ( $curriculum as $section ) {
	$section['materials'] = ms_plugin_curriculum_data( $course_id, $section['materials'] );
	?>
	<div class="masterstudy-curriculum-list__wrapper masterstudy-curriculum-list__wrapper_opened">
		<div class="masterstudy-curriculum-list__section">
			<h4 class="masterstudy-curriculum-list__section-title"><?php echo esc_html( $section['title'] ); ?></h4>
			<span class="masterstudy-curriculum-list__toggler"></span>
		</div>
		<ul class="masterstudy-curriculum-list__materials">
			<?php
			foreach ( $section['materials'] as $material ) {
				$trial_index++;
				$is_trial   = ! $is_enrolled && $trial_data['trial_access'] && $trial_index <= $trial_data['trial_lessons'];
				$is_preview = ! $is_enrolled && STM_LMS_Lesson::lesson_has_preview( $material['post_id'] );
				$material   = apply_filters( 'masterstudy_lms_lesson_curriculum_data', $material, $curriculum, $course_id );
				?>
				<li class="masterstudy-curriculum-list__item">
					<a href="<?php echo esc_url( STM_LMS_Lesson::get_lesson_url( $course_id, $material['post_id'] ) ); ?>"
						class="masterstudy-curriculum-list__link <?php echo esc_attr( $material['lesson_locked_by_drip'] || ( ! $material['has_access'] && ! $is_preview && ( ! $is_trial || ! $guest_trial_enabled ) ) ? 'masterstudy-curriculum-list__link_disabled' : '' ); ?>">
						<div class="masterstudy-curriculum-list__order">
							<?php echo esc_html( $trial_index ); ?>
						</div>
						<img src="<?php echo esc_url( STM_LMS_URL . "/assets/icons/lessons/{$material['icon']}.svg" ); ?>" class="masterstudy-curriculum-list__image">
						<div class="masterstudy-curriculum-list__container">
							<div class="masterstudy-curriculum-list__container-wrapper">
								<div class="masterstudy-curriculum-list__title">
									<?php echo esc_html( $material['title'] ); ?>
								</div>
								<div class="masterstudy-curriculum-list__meta-wrapper">
									<?php
									if ( $material['lesson_lock_before_start'] || $material['lesson_locked_by_drip'] ) {
										?>
										<span class="masterstudy-curriculum-list__locked">
											<?php
											STM_LMS_Templates::show_lms_template(
												'components/hint',
												array(
													'content' => $material['lesson_lock_message'],
													'side' => 'right',
													'dark_mode' => $dark_mode,
												)
											);
											?>
										</span>
										<?php
									}
									if ( $is_trial ) {
										?>
										<span class="masterstudy-curriculum-list__trial">
											<?php echo esc_html__( 'Trial', 'masterstudy-lms-learning-management-system' ); ?>
										</span>
									<?php } elseif ( $is_preview ) { ?>
										<span class="masterstudy-curriculum-list__preview">
											<?php echo esc_html__( 'Preview', 'masterstudy-lms-learning-management-system' ); ?>
										</span>
									<?php } ?>
									<span class="masterstudy-curriculum-list__meta">
										<?php
										if ( 'stm-quizzes' === $material['post_type'] ) {
											/* translators: %s: number */
											echo esc_html( ! empty( $material['questions_array'] ) ? sprintf( __( '%d questions', 'masterstudy-lms-learning-management-system' ), count( $material['questions_array'] ) ) : '' );
											echo esc_html( empty( $material['questions_array'] ) ? $material['label'] : '' );
										} else {
											echo esc_html( $material['duration'] ?? '' );
											echo esc_html( $material['meta'] ?? '' );
											echo esc_html( empty( $material['meta'] ) && empty( $material['duration'] ) ? $material['label'] : '' );
										}
										?>
									</span>
									<?php if ( ! empty( $material['lesson_excerpt'] ) ) { ?>
										<span class="masterstudy-curriculum-list__excerpt-toggler"></span>
									<?php } ?>
								</div>
							</div>
							<?php if ( ! empty( $material['lesson_excerpt'] ) ) { ?>
								<div class="masterstudy-curriculum-list__excerpt">
									<div class="masterstudy-curriculum-list__excerpt-wrapper">
										<?php echo wp_kses_post( $material['lesson_excerpt'] ); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
	<?php
}
