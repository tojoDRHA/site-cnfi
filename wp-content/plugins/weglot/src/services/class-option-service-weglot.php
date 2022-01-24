<?php

namespace WeglotWP\Services;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Morphism\Morphism;
use Weglot\Util\Regex;
use WeglotWP\Helpers\Helper_Is_Admin;
use WeglotWP\Models\Schema_Option_V3;
use WeglotWP\Helpers\Helper_Flag_Type;
use WeglotWP\Helpers\Helper_API;


/**
 * Option services
 *
 * @since 2.0
 */
class Option_Service_Weglot {
	protected $options_cdn = null;

	protected $options_from_api = null;

	/**
	 * @var array
	 */
	protected $options_default = array(
		'api_key_private'         => '',
		'api_key'                 => '',
		'language_from'           => 'en',
		'languages'               => array(),
		'auto_switch'             => false,
		'auto_switch_fallback'    => null,
		'excluded_blocks'         => array(),
		'excluded_paths'          => array(),
		'custom_settings'         => array(
			'translate_email'  => false,
			'translate_amp'    => false,
			'translate_search' => false,
			'button_style'     => array(
				'full_name'   => true,
				'with_name'   => true,
				'is_dropdown' => true,
				'with_flags'  => true,
				'flag_type'   => Helper_Flag_Type::RECTANGLE_MAT,
				'custom_css'  => '',
			),
			'rtl_ltr_style'    => '',
			'active_wc_reload' => true,
			'flag_css'         => '',
		),
		'allowed'                 => true,
		'has_first_settings'      => true,
		'show_box_first_settings' => false,
	);

	/**
	 * @var array
	 */
	protected $options_bdd_default = array(
		'has_first_settings'      => true,
		'show_box_first_settings' => false,
		'menu_switcher'           => array(),
		'custom_urls'             => array(),
		'flag_css'                => '',
		'active_wc_reload'        => true,
	);

	/**
	 * @since 3.0.0
	 */
	public function __construct() {
		Morphism::setMapper( 'WeglotWP\Models\Schema_Option_V3', Schema_Option_V3::get_schema_options_v3_compatible() );
	}


	/**
	 * Get options default
	 *
	 * @since 2.0
	 * @return array
	 */
	public function get_options_default() {
		return $this->options_default;
	}

	/**
	 * @since 3.0.0
	 * @param string $api_key
	 * @return array
	 */
	protected function get_options_from_cdn_with_api_key( $api_key ) {
		if ( $this->options_cdn ) {
			return array(
				'success' => true,
				'result'  => $this->options_cdn,
			);
		}

		$cache_transient = apply_filters( 'weglot_get_options_from_cdn_cache', true );

		if ( $cache_transient ) {
			$options = get_transient( 'weglot_cache_cdn', false );
			if ( $options ) {
				$this->options_cdn = $options;
				return array(
					'success' => true,
					'result'  => $this->options_cdn,
				);
			}
		}

		$key = str_replace( 'wg_', '', $api_key );
		$url = sprintf( '%s%s.json', Helper_API::get_cdn_url(), $key );

		$response = wp_remote_get(
			$url,
			array(
				'timeout' => 15,
			)
		);

		try {
			if ( is_wp_error( $response ) ) {
				$response = $this->get_options_from_api_with_api_key( $this->get_api_key_private() );
				$body     = $response['result'];
			} else {
				$body = json_decode( $response['body'], true );
			}
			$this->options_cdn = $body;

			set_transient( 'weglot_cache_cdn', $body, apply_filters( 'weglot_get_options_from_cdn_cache_duration', 300 ) );

			return array(
				'success' => true,
				'result'  => $body,
			);
		} catch ( \Exception $th ) {
			return array(
				'success' => false,
			);
		}
	}

	/**
	 * @since 3.0.0
	 * @param string $api_key
	 * @return array
	 */
	public function get_options_from_api_with_api_key( $api_key ) {
		if ( $this->options_from_api ) {
			return array(
				'success' => true,
				'result'  => $this->options_from_api,
			);
		}

		$url = sprintf( '%s/projects/settings?api_key=%s', Helper_API::get_api_url(), $api_key );

		$response = wp_remote_get(
			$url,
			array(
				'timeout' => 15,
			)
		);

		if ( is_wp_error( $response ) ) {
			return array(
				'success' => false,
				'result'  => $this->options_default,
			);
		}

		try {
			$body = json_decode( $response['body'], true );

			if ( null === $body ) {
				return array(
					'success' => false,
					'result'  => $this->options_default,
				);
			}

			$options                    = apply_filters( 'weglot_get_options', array_merge( $this->get_options_bdd_v3(), $body ) );
			$options['api_key_private'] = $this->get_api_key_private();
			if ( empty( $options['custom_settings']['menu_switcher'] ) ) {
				$menu_options_services                       = weglot_get_service( 'Menu_Options_Service_Weglot' );
				$options['custom_settings']['menu_switcher'] = $menu_options_services->get_options_default();
			}
			$this->options_from_api = $options;

			return array(
				'success' => true,
				'result'  => $options,
			);
		} catch ( \Exception $e ) {
			return array(
				'success' => false,
			);
		}
	}

	/**
	 * @since 3.0.0
	 * @return array
	 */
	public function get_options_from_v2() {
		$options_v2 = get_option( WEGLOT_SLUG );
		// $options_v2 = json_decode( file_get_contents(WEGLOT_DIR . '/settings-example.json'), true);

		if ( $options_v2 ) {
			if ( array_key_exists( 'api_key', $options_v2 ) ) {
				$options_v2['api_key_private'] = $options_v2['api_key'];
			}
			if ( ! array_key_exists( 'custom_urls', $options_v2 ) || ! $options_v2['custom_urls'] ) {
				$options_v2['custom_urls'] = array();
			}
			return $options_v2;
		}

		return (array) Morphism::map( 'WeglotWP\Models\Schema_Option_V3', $this->get_options_default() );
	}

	/**
	 * @since 3.0.0
	 * @param bool $compatibility
	 * @return string
	 */
	public function get_api_key( $compatibility = false ) {
		$api_key = get_option( sprintf( '%s-%s', WEGLOT_SLUG, 'api_key' ), false );

		if ( ! $compatibility || $api_key ) {
			return apply_filters( 'weglot_get_api_key', $api_key );
		}

		$options = $this->get_options_from_v2();
		return apply_filters( 'weglot_get_api_key', $options['api_key'] );
	}

	/**
	 * @since 3.0.0
	 * @param bool $compatibility
	 * @return bool
	 */
	public function get_has_first_settings( $compatibility = false ) {
		$options = $this->get_options();

		if ( ! $compatibility || array_key_exists( 'has_first_settings', $options ) ) {
			return $options['has_first_settings'];
		}

		$options = $this->get_options_from_v2();

		return $options['has_first_settings'];
	}

	/**
	 * @since 2.0
	 * @version 3.0.0
	 * @return array
	 */
	public function get_options() {
		$api_key         = $this->get_api_key();
		$api_key_private = $this->get_api_key_private();

		if ( Helper_Is_Admin::is_wp_admin() && $api_key_private ) {
			$response = $this->get_options_from_api_with_api_key(
				$api_key_private
			);
		} else {
			if ( ! Helper_Is_Admin::is_wp_admin() && $api_key ) {
				$response = $this->get_options_from_cdn_with_api_key(
					$api_key
				);
			} else {
				return $this->get_options_from_v2();
			}
		}
		$options = $response['result'];

		if ( $api_key_private ) {
			$options['api_key_private'] = $api_key_private;
		}

		$options = apply_filters( 'weglot_get_options', array_merge( $this->options_bdd_default, $this->get_options_bdd_v3(), $options ) );

		return (array) Morphism::map( 'WeglotWP\Models\Schema_Option_V3', $options );
	}

	/**
	 * @since 3.0.0
	 * @return string
	 */
	public function get_api_key_private() {
		return get_option( sprintf( '%s-%s', WEGLOT_SLUG, 'api_key_private' ) );
	}


	/**
	 * @since 3.0.0
	 * @param array $options
	 * @return array
	 */
	public function save_options_to_weglot( $options ) {
		$response = wp_remote_post(
			sprintf( '%s/projects/settings?api_key=%s', Helper_API::get_api_url(), $options['api_key_private'] ),
			array(
				'body'    => json_encode( $options ), //phpcs: ignore
				'headers' => array(
					'technology'   => 'wordpress',
					'Content-Type' => 'application/json; charset=utf-8',
				),
			)
		);

		if ( is_wp_error( $response ) ) {
			return array(
				'success' => false,
			);
		}

		return array(
			'success' => true,
			'result'  => json_decode( $response['body'], true ),
		);
	}

	/**
	 * @since 3.0.0
	 * @param string $key
	 * @return string|null
	 */
	public function get_option_custom_settings( $key ) {
		$options = $this->get_options();

		if ( ! array_key_exists( 'custom_settings', $options ) ) {
			return $this->get_option( $key );
		}

		if ( ! array_key_exists( $key, $options['custom_settings'] ) ) {
			return null;
		}

		return $options['custom_settings'][ $key ];
	}

	/**
	 * @since 2.0
	 * @param string $key
	 * @return array
	 */
	public function get_option( $key ) {
		$options = $this->get_options();

		if ( ! array_key_exists( $key, $options ) ) {
			return null;
		}

		return apply_filters( 'weglot_get_option', $options[ $key ], $key, $options );
	}

	/**
	 * @since 3.0.0
	 * @param string $key
	 * @return string|boolean|int
	 */
	public function get_option_button( $key ) {
		$options = $this->get_options();
		if (
			array_key_exists( 'custom_settings', $options ) &&
			is_array( $options['custom_settings'] ) &&
			array_key_exists( $key, $options['custom_settings']['button_style'] )
		) {
			return $options['custom_settings']['button_style'][ $key ];
		}

		// Retrocompatibility v2
		if ( ! array_key_exists( $key, $options ) ) {
			return null;
		}

		return $options[ $key ];
	}

	/**
	 * @since 2.0
	 * @return array
	 */
	public function get_exclude_blocks() {
		$exclude_blocks = $this->get_option( 'exclude_blocks' );

		// WordPress
		$exclude_blocks[] = '#wpadminbar';

		// Weglot Switcher
		$exclude_blocks[] = '.menu-item-weglot';
		$exclude_blocks[] = '.menu-item-weglot a';

		// Material Icons
		$exclude_blocks[] = '.material-icons';

		// Font Awesome
		$exclude_blocks[] = '.fas';
		$exclude_blocks[] = '.far';
		$exclude_blocks[] = '.fad';

		// Plugin Query Monitor
		$exclude_blocks[] = '#query-monitor';
		$exclude_blocks[] = '#query-monitor-main';

		// Plugin Woocommerce
		$exclude_blocks[] = '.mini-cart-counter';
		$exclude_blocks[] = '.amount'; //Added to prevent prices to pass
		$exclude_blocks[] = 'address';

		// Plugin SecuPress
		$exclude_blocks[] = '#secupress-donttranslate';

		// Plugin Gamipress
		$exclude_blocks[] = '.gamipress-share-button';

		return apply_filters( 'weglot_exclude_blocks', $exclude_blocks );
	}

	/**
	 * @since 2.0.4
	 * @version 3.0.0
	 * @return array
	 */
	public function get_destination_languages( $formated = false ) {
		$destination_languages = $this->get_option( 'destination_language' );

		if ( ! $formated ) {
			$language_code_rewrited = apply_filters( 'weglot_language_code_replace', array() );
			$destination_languages  = array_map(
				function ( $v ) use ( $language_code_rewrited ) {
					return isset( $language_code_rewrited[ $v ] ) ? $language_code_rewrited[ $v ] : $v;
				},
				$destination_languages
			);
		}

		return apply_filters( 'weglot_destination_languages', $destination_languages );
	}


	/**
	 * @since 3.2.0
	 * @return array
	 */
	public function get_current_destination_languages( $current_url = null ) {
		$destination_languages = $this->get_destination_languages();
		$request_url_service   = weglot_get_request_url_service();

		if ( is_null( $current_url ) ) {
			$current_url = $request_url_service->get_full_url_no_language();
		}

		$current_url               = $request_url_service->url_to_relative( $current_url );
		$exclude_urls_by_languages = $this->get_exclude_urls_by_languages();
		$custom_urls               = $request_url_service->option_services->get_option( 'custom_urls' );
		$current_language          = $request_url_service->get_current_language();
		$language_code_rewrited    = apply_filters( 'weglot_language_code_replace', array() );
		$current_language_iso      = ( $key = array_search( $current_language, $language_code_rewrited ) ) ? $key : $current_language;

		// Add final slash if not set
		$end_with_slash = false;
		if ( trailingslashit( $current_url ) === $current_url ) {
			$end_with_slash = true;
		} else {
			$current_url = trailingslashit( $current_url );
		}

		if ( isset( $custom_urls[ $current_language_iso ] ) ) {
			foreach ( $custom_urls[ $current_language_iso ] as $slug_translated => $slug_original ) {
				if ( empty( $slug_translated ) || empty( $slug_original ) ) {
					continue;
				}
				$current_url = str_replace( '/' . $slug_translated . '/', '/' . $slug_original . '/', $current_url );
			}
		}

		foreach ( $exclude_urls_by_languages as $item ) {
			if ( preg_match( '#' . $item['value'] . '#', $current_url ) != 0 ) {
				$destination_languages = array_diff( $destination_languages, $item['excluded_languages'] );
			}
		}

		// Remove final slash if not set before
		if ( false === $end_with_slash ) {
			$current_url = untrailingslashit( $current_url );
		}

		return apply_filters( 'weglot_current_destination_languages', $destination_languages, $current_url );
	}

	/**
	 * @since 2.0
	 * @return array
	 */
	public function get_exclude_urls() {
		$list_exclude_urls     = $this->get_option( 'exclude_urls' );
		$request_url_services  = weglot_get_service( 'Request_Url_Service_Weglot' );
		$destination_languages = $this->get_destination_languages( true );
		$exclude_urls          = array();
		if ( ! empty( $list_exclude_urls ) ) {
			foreach ( $list_exclude_urls as $item ) {
				if ( is_array( $item ) ) {
					if ( ! empty( $item['excluded_languages'] ) ) {

						if ( ! is_array( $item['excluded_languages'] ) ) {
							continue;
						}

						$not_exclude = array_diff( $destination_languages, $item['excluded_languages'] );
						if ( empty( $not_exclude ) ) {
							$exclude_urls[] = $item;
						} else {
							continue;
						}
					}
					$regex          = new Regex( $item['type'], $request_url_services->url_to_relative( $item['value'] ) );
					$exclude_urls[] = $regex->getRegex();
				} else {
					$exclude_urls[] = $item;
				}
			}
		}
		$exclude_urls[] = '/wp-login.php';
		$exclude_urls[] = '/sitemaps_xsl.xsl';
		$exclude_urls[] = '/sitemaps.xml';
		$exclude_urls[] = '/wp-cron.php';
		$exclude_urls[] = '/wp-comments-post.php';
		$exclude_urls[] = '/ct_template'; // Compatibility Oxygen
		$exclude_urls[] = '/main-sitemap.xsl'; // SEO by Rank Math

		$translate_amp = weglot_get_translate_amp_translation();
		if ( ! $translate_amp ) {
			$exclude_urls[] = weglot_get_service( 'Amp_Service_Weglot' )->get_regex();
		}

		// array_map : Need only for those who use the filter
		return apply_filters(
			'weglot_exclude_urls',
			array_map(
				function( $value ) use ( $request_url_services ) {
					return $request_url_services->url_to_relative( $value );
				},
				$exclude_urls
			)
		);
	}


	/**
	 * @since 3.2.0
	 * @return array
	 */
	public function get_exclude_urls_by_languages() {
		$list_exclude_urls = $this->get_option( 'exclude_urls' );
		$exclude_urls      = array();

		if ( ! empty( $list_exclude_urls ) ) {

			$request_url_services   = weglot_get_service( 'Request_Url_Service_Weglot' );
			$language_code_rewrited = apply_filters( 'weglot_language_code_replace', array() );

			foreach ( $list_exclude_urls as $item ) {
				if (
					is_array( $item )
					&& ! empty( $item['excluded_languages'] )
					&& is_array( $item['excluded_languages'] )
				) {

					$item['excluded_languages'] = array_map(
						function ( $v ) use ( $language_code_rewrited ) {
							return isset( $language_code_rewrited[ $v ] ) ? $language_code_rewrited[ $v ] : $v;
						},
						$item['excluded_languages']
					);

					$regex          = new Regex( $item['type'], $request_url_services->url_to_relative( $item['value'] ) );
					$exclude_urls[] = array(
						'value'              => $regex->getRegex(),
						'excluded_languages' => $item['excluded_languages'],
					);

				} else {
					continue;
				}
			}
		}

		apply_filters( 'weglot_exclude_urls_by_languages', $exclude_urls );

		// Need only for those who use the filter
		foreach ( $exclude_urls as $exclude_url ) {
			$exclude_url['value'] = $request_url_services->url_to_relative( $exclude_url['value'] );
		}

		return $exclude_urls;
	}

	/**
	 * @since 2.0
	 *
	 * @return string
	 */
	public function get_css_custom_inline() {
		return apply_filters( 'weglot_css_custom_inline', $this->get_option( 'override_css' ) );
	}

	/**
	 * @since 2.0
	 *
	 * @return string
	 */
	public function get_flag_css() {
		return apply_filters( 'weglot_flag_css', $this->get_option( 'flag_css' ) );
	}

	/**
	 * @since 3.0.0
	 * @return int
	 */
	public function get_translation_engine() {
		return apply_filters( 'weglot_get_translation_engine', $this->get_option( 'translation_engine' ) );
	}


	/**
	 * @since 2.0
	 * @param array $options
	 * @return Option_Service_Weglot
	 */
	public function set_options( $options ) {
		$key = sprintf( '%s-%s', WEGLOT_SLUG, 'v3' );
		update_option( $key, $options );
		wp_cache_delete( $key );

		return $this;
	}

	/**
	 * @since 3.0.0
	 * @return array|false
	 */
	public function get_options_bdd_v3() {
		return get_option( sprintf( '%s-%s', WEGLOT_SLUG, 'v3' ), $this->options_bdd_default );
	}

	/**
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return Option_Service_Weglot
	 */
	public function set_option_by_key( $key, $value ) {
		$options         = $this->get_options_bdd_v3();
		$options[ $key ] = $value;
		$this->set_options( $options );
		return $this;
	}
	/**
	 * @param string $key
	 * @return any
	 */
	public function get_option_by_key_v3( $key ) {
		$options = $this->get_options_bdd_v3();

		if ( ! array_key_exists( $key, $options ) ) {
			return null;
		}

		return $options[ $key ];
	}
}
