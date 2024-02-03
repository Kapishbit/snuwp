<?php

namespace MasterStudy\Lms\Repositories;

use MasterStudy\Lms\Plugin\PostType;

final class CoursePlayerRepository {
	public static function get_main_data( string $page_path, int $lesson_id ): array {
		$course   = get_page_by_path( $page_path, OBJECT, PostType::COURSE );
		$post_id  = apply_filters( 'wpml_object_id', $course->ID, 'post' ) ?? $course->ID;
		$user     = \STM_LMS_User::get_current_user();
		$settings = get_option( 'stm_lms_settings' );
		$data     = array(
			'post_id'                  => $post_id,
			'item_id'                  => $lesson_id,
			'curriculum'               => ( new CurriculumRepository() )->get_curriculum( $post_id, true ),
			'material_ids'             => ( new CurriculumMaterialRepository() )->get_course_materials( $post_id ),
			'current_material'         => ( new CurriculumMaterialRepository() )->find_by_course_lesson( $post_id, $lesson_id ),
			'section'                  => null,
			'content_type'             => get_post_type( $lesson_id ),
			'stm_lms_question_sidebar' => apply_filters( 'stm_lms_show_question_sidebar', true ),
			'lesson_type'              => '',
			'course_title'             => get_the_title( $post_id ),
			'custom_css'               => get_post_meta( $lesson_id, '_wpb_shortcodes_custom_css', true ),
			'user'                     => $user,
			'has_access'               => \STM_LMS_User::has_course_access( $post_id, $lesson_id ),
			'has_preview'              => \STM_LMS_Lesson::lesson_has_preview( $lesson_id ),
			'is_trial_course'          => get_post_meta( $post_id, 'shareware', true ),
			'trial_lesson_count'       => 0,
			'has_trial_access'         => false,
			'is_enrolled'              => is_user_logged_in() ? \STM_LMS_Course::get_user_course( $user['id'], $post_id ) : false,
			'user_page_url'            => \STM_LMS_User::user_page_url(),
			'course_url'               => get_the_permalink( $post_id ),
			'lesson_lock_before_start' => false,
			'lesson_locked_by_drip'    => false,
			'is_scorm_course'          => false,
			'last_lesson'              => \STM_LMS_Lesson::get_last_lesson( $post_id ),
			'show_logo'                => $settings['course_player_brand_icon_navigation'] ?? false,
			'logo_url'                 => ! empty( $settings['course_player_brand_icon_navigation_image'] )
				? wp_get_attachment_image_url( $settings['course_player_brand_icon_navigation_image'], 'thumbnail' )
				: STM_LMS_URL . '/assets/img/image_not_found.png',
			'theme_fonts'              => $settings['course_player_theme_fonts'] ?? false,
			'discussions_sidebar'      => $settings['course_player_discussions_sidebar'] ?? true,
		);

		if ( is_user_logged_in() ) {
			$data['dark_mode'] = metadata_exists( 'user', $user['id'], 'masterstudy_course_player_theme_mode' )
				? get_user_meta( $user['id'], 'masterstudy_course_player_theme_mode', true )
				: $settings['course_player_theme_mode'] ?? false;
		} else {
			$data['dark_mode'] = $settings['course_player_theme_mode'] ?? false;
		}

		$content_types             = array(
			'stm-lessons'      => 'lesson',
			'stm-quizzes'      => 'quiz',
			'stm-assignments'  => 'assignments',
			'stm-google-meets' => 'google_meet',
		);
		$lesson_types              = array(
			'lesson'      => get_post_meta( $lesson_id, 'type', true ),
			'assignments' => 'assignments',
			'quiz'        => 'quiz',
			'google_meet' => 'google_meet',
		);
		$lesson_types_labels       = array(
			'text'            => __( 'Text lesson', 'masterstudy-lms-learning-management-system' ),
			'video'           => __( 'Video lesson', 'masterstudy-lms-learning-management-system' ),
			'quiz'            => __( 'Quiz', 'masterstudy-lms-learning-management-system' ),
			'assignments'     => __( 'Assignment', 'masterstudy-lms-learning-management-system' ),
			'stream'          => __( 'Stream lesson', 'masterstudy-lms-learning-management-system' ),
			'zoom_conference' => __( 'Zoom lesson', 'masterstudy-lms-learning-management-system' ),
			'google_meet'     => __( 'Google Meet webinar', 'masterstudy-lms-learning-management-system' ),
		);
		$data['content_type']      = $content_types[ $data['content_type'] ] ?? $data['content_type'];
		$data['lesson_type']       = $lesson_types[ $data['content_type'] ] ?? $data['lesson_type'];
		$data['lesson_type_label'] = $lesson_types_labels[ $data['lesson_type'] ] ?? '';

		if ( ! empty( $data['current_material'] ) ) {
			$data['section'] = ( new CurriculumSectionRepository() )->find( $data['current_material']->section_id );
		}

		if ( class_exists( '\STM_LMS_Sequential_Drip_Content' ) ) {
			$drip_settings = \STM_LMS_Sequential_Drip_Content::stm_lms_get_settings();

			if ( ! empty( $drip_settings['lock_before_start'] ) && ! \STM_LMS_Sequential_Drip_Content::is_lesson_started( $lesson_id, $post_id ) ) {
				$data['lesson_lock_before_start'] = true;
			}

			if ( \STM_LMS_Sequential_Drip_Content::lesson_is_locked( $post_id, $lesson_id ) ) {
				$data['lesson_locked_by_drip'] = true;
			}
		}

		if ( class_exists( '\STM_LMS_Scorm_Packages' ) ) {
			$data['is_scorm_course'] = \STM_LMS_Scorm_Packages::is_scorm_course( $post_id );
		}

		if ( ! empty( $data['is_trial_course'] ) && 'on' === $data['is_trial_course'] ) {
			$data['course_materials']   = ( new CurriculumMaterialRepository() )->get_course_materials( $data['post_id'], false );
			$data['shareware_settings'] = get_option( 'stm_lms_shareware_settings' );
			$data['trial_lesson_count'] = $data['shareware_settings']['shareware_count'] ?? 0;
			$data['trial_lessons']      = array_filter(
				$data['course_materials'],
				function ( $lesson ) use ( $data ) {
					return ( $data['trial_lesson_count'] >= $lesson['order'] && $lesson['post_id'] === $data['item_id'] );
				}
			);

			if ( ! empty( $data['trial_lessons'] ) ) {
				$data['has_trial_access'] = true;
			}
		}

		return $data;
	}

	public static function get_quiz_data( int $quiz_id ): array {
		$data = array();
		$quiz = get_post( $quiz_id );

		if ( ! $quiz && PostType::QUIZ !== $quiz->post_type ) {
			return $data;
		}

		$data                     = array(
			'quiz_meta'      => \STM_LMS_Helpers::parse_meta_field( $quiz_id ),
			'user'           => \STM_LMS_User::get_current_user(),
			'question_banks' => array(),
		);
		$data['last_quiz']        = ! empty( $data['user']['id'] ) ? \STM_LMS_Helpers::simplify_db_array( stm_lms_get_user_last_quiz( $data['user']['id'], $quiz_id, array( 'progress' ) ) ) : '';
		$data['progress']         = ! empty( $data['last_quiz']['progress'] ) ? $data['last_quiz']['progress'] : 0;
		$data['passing_grade']    = ! empty( $data['quiz_meta']['passing_grade'] ) ? $data['quiz_meta']['passing_grade'] : 0;
		$data['passed']           = $data['progress'] >= $data['passing_grade'] && ! empty( $data['progress'] );
		$data['duration']         = \STM_LMS_Quiz::get_quiz_duration( $quiz_id );
		$data['show_emoji']       = \STM_LMS_Options::get_option( 'assignments_quiz_result_emoji_show', true ) ?? false;
		$data['emoji_type']       = $data['progress'] < $data['passing_grade'] ? 'assignments_quiz_failed_emoji' : 'assignments_quiz_passed_emoji';
		$data['emoji_name']       = \STM_LMS_Options::get_option( $data['emoji_type'] );
		$data['duration_value']   = get_post_meta( $quiz_id, 'duration', true );
		$data['duration_measure'] = get_post_meta( $quiz_id, 'duration_measure', true );
		$data['quiz_style']       = \STM_LMS_Quiz::get_style( $quiz_id );
		$data['show_answers']     = \STM_LMS_Quiz::quiz_passed( $quiz_id ) || ( ! empty( $data['last_quiz'] ) && get_post_meta( $quiz_id, 'correct_answer', true ) );
		$data['random_questions'] = get_post_meta( $quiz_id, 'random_questions', true );

		ob_start();

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo apply_filters( 'the_content', $quiz->post_content );

		$content = ob_get_clean();
		$content = str_replace( '../../', site_url() . '/', $content );

		$data['content'] = $content;

		if ( ! empty( $data['quiz_meta']['questions'] ) ) {
			$args = array(
				'post_type'      => 'stm-questions',
				'posts_per_page' => -1,
				'post__in'       => array_map( 'stm_lms_get_wpml_binded_id', explode( ',', $data['quiz_meta']['questions'] ) ),
				'orderby'        => 'post__in',
			);

			if ( ! empty( $data['random_questions'] ) && 'on' === $data['random_questions'] ) {
				$args['orderby'] = 'rand';
			}

			$questions_query = new \WP_Query( $args );

			if ( $questions_query->have_posts() ) {
				$data['passing_grade']      = get_post_meta( $quiz_id, 'passing_grade', true );
				$data['questions_quantity'] = $questions_query->found_posts;
				$data['questions_for_nav']  = $questions_query->found_posts;
				$data['questions']          = array();
				$data['quiz_info']          = stm_lms_get_user_quizzes( $data['user']['id'], $quiz_id );

				foreach ( $questions_query->posts as $question ) {
					$question_data           = array(
						'id'      => $question->ID,
						'title'   => $question->post_title,
						'content' => str_replace( '../../', site_url() . '/', stm_lms_filtered_output( $question->post_content ) ),
					);
					$data['questions_ids'][] = $question_data['id'];
					$question_data           = array_merge( $question_data, \STM_LMS_Helpers::parse_meta_field( $question_data['id'] ) );
					$data['questions'][]     = $question_data;

					if ( 'question_bank' === $question_data['type'] ) {
						if ( ! empty( $question_data['answers'][0]['categories'] ) && ! empty( $question_data['answers'][0]['number'] ) ) {
							$questions_in_quiz = get_post_meta( $quiz_id, 'questions', true );
							$questions_in_quiz = ( ! empty( $questions_in_quiz ) ) ? explode( ',', $questions_in_quiz ) : array();
							$random            = get_post_meta( $quiz_id, 'random_questions', true );
							$bank_args         = array(
								'post_type'      => 'stm-questions',
								'posts_per_page' => $question_data['answers'][0]['number'],
								'post__not_in'   => $questions_in_quiz,
								'meta_query'     => array(
									array(
										'key'     => 'type',
										'value'   => 'question_bank',
										'compare' => '!=',
									),
								),
								'tax_query'      => array(
									array(
										'taxonomy' => 'stm_lms_question_taxonomy',
										'field'    => 'slug',
										'terms'    => wp_list_pluck( $question_data['answers'][0]['categories'], 'slug' ),
									),
								),
							);

							if ( ! empty( $random ) && 'on' === $random ) {
								$bank_args['orderby'] = 'rand';
							}

							$bank_data = new \WP_Query( $bank_args );
						}

						$data['question_banks'][ $question_data['id'] ] = $bank_data ?? array();

						if ( ! empty( $data['question_banks'] ) ) {
							$data['questions_for_nav'] += $data['question_banks'][ $question_data['id'] ]->found_posts > $question_data['answers'][0]['number']
								? $question_data['answers'][0]['number'] - 1
								: $data['question_banks'][ $question_data['id'] ]->found_posts - 1;
						}
					}
				}

				if ( ! empty( $data['quiz_info'] ) ) {
					$last_quiz_info = end( $data['quiz_info'] );
					$sequency       = json_decode( $last_quiz_info['sequency'], true );

					if ( ! empty( $sequency ) && is_array( $sequency ) ) {
						$iteration = 0;

						foreach ( $sequency as $question ) {
							if ( is_array( $question ) ) {
								$data['questions_quantity'] += count( $question );
							}

							$iteration++;
						}

						$data['questions_quantity'] -= $iteration;
					}
				}

				$data['last_answers'] = \STM_LMS_Helpers::set_value_as_key(
					stm_lms_get_quiz_latest_answers(
						$data['user']['id'],
						$quiz_id,
						$data['questions_quantity'],
						array(
							'question_id',
							'user_answer',
							'correct_answer',
						)
					),
					'question_id'
				);
			}
		}

		return $data;
	}
}
