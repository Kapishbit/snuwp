<?php
/**
 * @var string $social_position
 * @var boolean $facebook
 * @var boolean $google
 */
?>

<div id="masterstudy-authorization-social-login" class="masterstudy-authorization__social <?php echo esc_attr( 'bottom' === $social_position ? 'masterstudy-authorization__social_bottom' : '' ); ?>">
	<?php if ( $google ) { ?>
		<span id="masterstudy-authorization-google-login" class="masterstudy-authorization__social-google">
			<img src="<?php echo esc_url( STM_LMS_URL . '/assets/icons/social/google.svg' ); ?>">
			<?php echo esc_html__( 'Google', 'masterstudy-lms-learning-management-system' ); ?>
		</span>
		<?php
	}
	if ( $facebook ) {
		?>
		<span id="masterstudy-authorization-fb-login" class="masterstudy-authorization__social-facebook">
			<img src="<?php echo esc_url( STM_LMS_URL . '/assets/icons/social/fb.svg' ); ?>">
			<?php echo esc_html__( 'Facebook', 'masterstudy-lms-learning-management-system' ); ?>
		</span>
	<?php } ?>
</div>
<div id="masterstudy-authorization-social-register" class="masterstudy-authorization__social <?php echo esc_attr( 'bottom' === $social_position ? 'masterstudy-authorization__social_bottom' : '' ); ?>">
	<?php if ( $google ) { ?>
		<span id="masterstudy-authorization-google-register" class="masterstudy-authorization__social-google">
			<img src="<?php echo esc_url( STM_LMS_URL . '/assets/icons/social/google.svg' ); ?>">
			<?php echo esc_html__( 'Google', 'masterstudy-lms-learning-management-system' ); ?>
		</span>
		<?php
	}
	if ( $facebook ) {
		?>
		<span id="masterstudy-authorization-fb-register" class="masterstudy-authorization__social-facebook">
			<img src="<?php echo esc_url( STM_LMS_URL . '/assets/icons/social/fb.svg' ); ?>">
			<?php echo esc_html__( 'Facebook', 'masterstudy-lms-learning-management-system' ); ?>
		</span>
	<?php } ?>
</div>
