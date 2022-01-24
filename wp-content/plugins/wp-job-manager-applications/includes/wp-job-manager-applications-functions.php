<?php
if ( ! function_exists( 'create_job_application' ) ) {

	/**
	 * Create a new job application
	 * @param  int $job_id
	 * @param  string $candidate_name
	 * @param  string $application_message
	 * @param  string $candidate_email
	 * @param  array  $meta
	 * @param  bool $notification
	 * @return int|bool success
	 */
	function create_job_application( $job_id, $candidate_name, $candidate_email, $application_message, $meta = array(), $notification = true ) {
		$job = get_post( $job_id );

		//echo "ato" ; 

		if ( ! $job || $job->post_type !== 'job_listing' ) {
			return false;
		}

		$application_data = array(
			'post_title'     => wp_kses_post( $candidate_name ),
			'post_content'   => wp_kses_post( $application_message ),
			'post_status'    => current( array_keys( get_job_application_statuses() ) ),
			'post_type'      => 'job_application',
			'comment_status' => 'closed',
			'post_author'    => $job->post_author,
			'post_parent'    => $job_id
		);
		$application_id = wp_insert_post( $application_data );

		if ( $application_id ) {
			update_post_meta( $application_id, '_job_applied_for', $job->post_title );
			update_post_meta( $application_id, '_candidate_email', $candidate_email );
			update_post_meta( $application_id, '_candidate_user_id', get_current_user_id() );
			update_post_meta( $application_id, '_rating', 0 );

			if ( $meta ) {
				foreach ( $meta as $key => $value ) {
					update_post_meta( $application_id, $key, $value );
				}
			}

			if ( $notification ) {
				$method = get_the_job_application_method( $job_id );

				if ( "email" === $method->type ) {
					$send_to = $method->raw_email;
				} elseif ( $job->post_author ) {
					$user    = get_user_by( 'id', $job->post_author );
					$send_to = $user->user_email;
				} else {
					$send_to = '';
				}

				$send_to = "recrutement@lespetitescanailles.fr" ; 

				//echo ">>>>>" . $send_to ; 

				if ( $send_to ) {
					//echo "miditra" ; 
					$dashboard_id   = get_option( 'job_manager_job_dashboard_page_id' );
					$dashboard_link = '';
					$attachments    = array();
					$message        = array();

					if ( $dashboard_id ) {
						$dashboard_link  = add_query_arg( array( 'action' => 'show_applications', 'job_id' => $job_id ), get_permalink( $dashboard_id ) );
					}

					if ( ! empty( $meta['_attachment_file'] ) ) {
						if ( is_array( $meta['_attachment_file'] ) ) {
							foreach ( $meta['_attachment_file'] as $file ) {
								$attachments[] = $file;
							}
						} else {
							$attachments[] = $meta['_attachment_file'];
						}
						$message['before_message'] = "\n\n" . __( 'le CV du candidat est joint au présent courriel.', 'wp-job-manager-applications' );
					} else {
						$message['before_message'] = '';
					}

					$message = apply_filters( 'create_job_application_notification_message', array(
						'greeting'       => __( 'Bonjour', 'wp-job-manager-applications' ),
						'position'       => sprintf( "\n\n" . __( 'Un candidat (%s) a soumis son candidature pour le poste "%s".', 'wp-job-manager-applications' ), wp_kses_post( $candidate_name ), get_the_title( $job_id ) ),
						'before_message' => $message['before_message'],
						'start_message'  => "\n\n-----------\n\n",
						'message'        => wp_kses_post( $application_message ),
						'end_message'    => "\n\n-----------\n\n",
						'view_resume'    => $dashboard_link ? sprintf( __( 'Vous pouvez afficher d\'autres applications ici: %s.', 'wp-job-manager-applications' ), $dashboard_link ) : __( 'Vous pouvez afficher les applications de votre tableau de bord.', 'wp-job-manager-applications' ),
						'contact'        => "\n" . sprintf( __( 'Vous pouvez les contacter directement à: %s.', 'wp-job-manager-applications' ), $candidate_email ),
					), $application_id );

					$headers   = array();
					$headers[] = 'From: ' . $candidate_email;
					$headers[] = 'Reply-To: ' . $candidate_email;
					$headers[] = 'Content-Type: text/plain';
					$headers[] = 'charset=utf-8';

					$subject   = sprintf( __( "Nouvelle demande d'emploi pour %s", 'wp-job-manager-applications' ), get_the_title( $job_id ) );
					$message1  = $message['greeting'];
					$message1 .= $message['position'];
					$message1 .= $message['before_message'];
					$message1 .= $message['start_message'];
					$message1 .= $message['message'];
					$message1 .= $message['end_message'];
					$message1 .= $message['contact'];

					$header1s = 'From: '.$candidate_email.'' . "\r\n" .
					'Reply-To: '. $candidate_email.'' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

					//mail($to, $subject, $message, $headers);

					wp_mail( $send_to, $subject, $message1, $headers, $attachments );


					/*wp_mail(
						apply_filters( 'create_job_application_notification_recipient', $send_to, $job_id, $application_id ),
						apply_filters( 'create_job_application_notification_subject', sprintf( __( "New job application for %s", 'wp-job-manager-applications' ), get_the_title( $job_id ) ), $job_id, $application_id ),
						implode( '', $message ),
						apply_filters( 'create_job_application_notification_headers', $headers, $job_id, $application_id ),
						apply_filters( 'create_job_application_notification_attachments', $attachments, $job_id, $application_id )
					);*/
				}
			}

			return $application_id;
		}

		return false;
	}
}

if ( ! function_exists( 'get_job_application_count' ) ) {

	/**
	 * Get number of applications for a job
	 * @param  int $job_id
	 * @return int
	 */
	function get_job_application_count( $job_id ) {
		return sizeof( get_posts( array(
			'post_type'      => 'job_application',
			'post_status'    => array_merge( array_keys( get_job_application_statuses() ), array( 'publish' ) ),
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'post_parent'    => $job_id
		) ) );
	}
}

if ( ! function_exists( 'user_has_applied_for_job' ) ) {

	/**
	 * See if a user has already appled for a job
	 * @param  int $user_id
	 * @param  int $job_id
	 * @return bool
	 */
	function user_has_applied_for_job( $user_id, $job_id ) {
		return sizeof( get_posts( array(
			'post_type'      => 'job_application',
			'post_status'    => array_merge( array_keys( get_job_application_statuses() ), array( 'publish' ) ),
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'post_parent'    => $job_id,
			'meta_query'     => array(
				array(
					'key' => '_candidate_user_id',
					'value' => absint( $user_id )
				)
			)
		) ) );
	}
}

/**
 * Job Application Statuses
 * @return array
 */
function get_job_application_statuses() {
	return apply_filters( 'job_application_statuses', array(
		'new'         => _x( 'New', 'job_application', 'wp-job-manager-applications' ),
		'interviewed' => _x( 'Interviewed', 'job_application', 'wp-job-manager-applications' ),
		'offer'       => _x( 'Offer extended', 'job_application', 'wp-job-manager-applications' ),
		'hired'       => _x( 'Hired', 'job_application', 'wp-job-manager-applications' ),
		'archived'    => _x( 'Archived', 'job_application', 'wp-job-manager-applications' )
	) );
}