<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Customizer blog options service.
 *
 * @package PressBook
 */

namespace PressBook\Options;

use PressBook\Options;
use PressBook\CSSRules;

/**
 * Blog options service class.
 */
class Blog extends Options {
	/**
	 * Add blog options for theme customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function customize_register( $wp_customize ) {
		$this->sec_blog( $wp_customize );

		$this->set_archive_post_layout_lg( $wp_customize );

		$this->set_archive_content( $wp_customize );

		$this->set_hide_post_meta_all( $wp_customize );
		$this->set_hide_post_meta_date( $wp_customize );
		$this->set_hide_post_meta_author( $wp_customize );
		$this->set_hide_post_meta_cat( $wp_customize );
		$this->set_hide_post_meta_tag( $wp_customize );
	}

	/**
	 * Section: Blog Options.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function sec_blog( $wp_customize ) {
		$wp_customize->add_section(
			'sec_blog',
			array(
				'title'       => esc_html__( 'Blog Options', 'pressbook' ),
				'description' => esc_html__( 'You can customize the blog options in here.', 'pressbook' ),
				'priority'    => 156,
			)
		);
	}

	/**
	 * Add setting: Archive Post Layout (Large-Screen Devices).
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_archive_post_layout_lg( $wp_customize ) {
		$wp_customize->add_setting(
			'set_archive_post_layout_lg',
			array(
				'default'           => self::get_archive_post_layout_lg( true ),
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_archive_post_layout_lg',
			array(
				'section'     => 'sec_blog',
				'type'        => 'radio',
				'choices'     => array(
					'rows'    => esc_html__( 'Thumbnail-Content - Rows', 'pressbook' ),
					'columns' => esc_html__( 'Thumbnail-Content - Columns (Contain)', 'pressbook' ),
					'cover'   => esc_html__( 'Thumbnail-Content - Columns (Cover)', 'pressbook' ),
				),
				'label'       => esc_html__( 'Blog Archive Post Layout (Large-Screen Devices)', 'pressbook' ),
				'description' => esc_html__( 'Select the layout for the blog post in archive pages. Default: Thumbnail-Content - Columns (Cover)', 'pressbook' ),
			)
		);
	}

	/**
	 * Get setting: Archive Post Layout (Large-Screen Devices).
	 *
	 * @param bool $get_default Get default.
	 * @return string
	 */
	public static function get_archive_post_layout_lg( $get_default = false ) {
		$default = apply_filters( 'pressbook_default_archive_post_layout_lg', 'cover' );
		if ( $get_default ) {
			return $default;
		}

		return get_theme_mod( 'set_archive_post_layout_lg', $default );
	}

	/**
	 * Add setting: Archive Content.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_archive_content( $wp_customize ) {
		$wp_customize->add_setting(
			'set_archive_content',
			array(
				'default'           => self::get_archive_content( true ),
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_archive_content',
			array(
				'section'     => 'sec_blog',
				'type'        => 'radio',
				'choices'     => array(
					'full'    => esc_html__( 'Full text', 'pressbook' ),
					'excerpt' => esc_html__( 'Summary', 'pressbook' ),
				),
				'label'       => esc_html__( 'Blog Archive Content', 'pressbook' ),
				'description' => esc_html__( 'Select the content to show in the blog archive pages. Default: Summary', 'pressbook' ),
			)
		);
	}

	/**
	 * Get setting: Archive Content.
	 *
	 * @param bool $get_default Get default.
	 * @return string
	 */
	public static function get_archive_content( $get_default = false ) {
		$default = apply_filters( 'pressbook_default_archive_content', 'excerpt' );
		if ( $get_default ) {
			return $default;
		}

		return get_theme_mod( 'set_archive_content', $default );
	}

	/**
	 * Add setting: Hide Post Meta: All.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_hide_post_meta_all( $wp_customize ) {
		$wp_customize->add_setting(
			'set_hide_post_meta[all]',
			array(
				'type'              => 'theme_mod',
				'default'           => self::get_hide_post_meta_default( 'all' ),
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_hide_post_meta[all]',
			array(
				'section'     => 'sec_blog',
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Post Meta: Hide All', 'pressbook' ),
				'description' => esc_html__( 'Hide all the post meta data including date, author, number of comments, etc.', 'pressbook' ),
			)
		);
	}

	/**
	 * Add setting: Hide Post Meta: Date.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_hide_post_meta_date( $wp_customize ) {
		$wp_customize->add_setting(
			'set_hide_post_meta[date]',
			array(
				'type'              => 'theme_mod',
				'default'           => self::get_hide_post_meta_default( 'date' ),
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_hide_post_meta[date]',
			array(
				'section'     => 'sec_blog',
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Post Meta: Hide Date', 'pressbook' ),
				'description' => esc_html__( 'Hide only the post date. Checking the "Post Meta: Hide All" option will override this option.', 'pressbook' ),
			)
		);
	}

	/**
	 * Add setting: Hide Post Meta: Author.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_hide_post_meta_author( $wp_customize ) {
		$wp_customize->add_setting(
			'set_hide_post_meta[author]',
			array(
				'type'              => 'theme_mod',
				'default'           => self::get_hide_post_meta_default( 'author' ),
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_hide_post_meta[author]',
			array(
				'section'     => 'sec_blog',
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Post Meta: Hide Author', 'pressbook' ),
				'description' => esc_html__( 'Hide only the post author. Checking the "Post Meta: Hide All" option will override this option.', 'pressbook' ),
			)
		);
	}

	/**
	 * Add setting: Hide Post: Hide Categories.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_hide_post_meta_cat( $wp_customize ) {
		$wp_customize->add_setting(
			'set_hide_post_meta[cat]',
			array(
				'type'              => 'theme_mod',
				'default'           => self::get_hide_post_meta_default( 'cat' ),
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_hide_post_meta[cat]',
			array(
				'section'     => 'sec_blog',
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Post: Hide Categories', 'pressbook' ),
				'description' => esc_html__( 'Hide the post categories.', 'pressbook' ),
			)
		);
	}

	/**
	 * Add setting: Hide Post: Hide Tags.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_hide_post_meta_tag( $wp_customize ) {
		$wp_customize->add_setting(
			'set_hide_post_meta[tag]',
			array(
				'type'              => 'theme_mod',
				'default'           => self::get_hide_post_meta_default( 'tag' ),
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_hide_post_meta[tag]',
			array(
				'section'     => 'sec_blog',
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Post: Hide Tags', 'pressbook' ),
				'description' => esc_html__( 'Hide the post tags.', 'pressbook' ),
			)
		);
	}

	/**
	 * Get setting: Hide Post Meta.
	 *
	 * @return array
	 */
	public static function get_hide_post_meta() {
		return wp_parse_args(
			get_theme_mod( 'set_hide_post_meta', array() ),
			self::get_hide_post_meta_default()
		);
	}

	/**
	 * Get default setting: Hide Post Meta.
	 *
	 * @param string $key Setting key.
	 * @return mixed|array
	 */
	public static function get_hide_post_meta_default( $key = '' ) {
		$default = apply_filters(
			'pressbook_default_hide_post_meta',
			array(
				'all'    => false,
				'date'   => false,
				'author' => false,
				'cat'    => false,
				'tag'    => false,
			)
		);

		if ( array_key_exists( $key, $default ) ) {
			return $default[ $key ];
		}

		return $default;
	}

	/**
	 * Get entry meta class.
	 *
	 * @return string
	 */
	public static function entry_meta_class() {
		$hide_post_meta = self::get_hide_post_meta();

		$entry_meta_class = 'entry-meta';
		if ( $hide_post_meta['all'] ) {
			$entry_meta_class .= ' hide-entry-meta';
		}
		if ( $hide_post_meta['date'] ) {
			$entry_meta_class .= ' hide-posted-on';
		}
		if ( $hide_post_meta['author'] ) {
			$entry_meta_class .= ' hide-posted-by';
		}

		return apply_filters( 'pressbook_entry_meta_class', $entry_meta_class );
	}

	/**
	 * Get entry meta categories class.
	 *
	 * @return string
	 */
	public static function entry_meta_cat_class() {
		$hide_post_meta = self::get_hide_post_meta();

		$entry_meta_cat_class = 'cat-links';
		if ( $hide_post_meta['cat'] ) {
			$entry_meta_cat_class .= ' hide-clip';
		}

		return apply_filters( 'pressbook_entry_meta_cat_class', $entry_meta_cat_class );
	}

	/**
	 * Get entry meta tags class.
	 *
	 * @return string
	 */
	public static function entry_meta_tag_class() {
		$hide_post_meta = self::get_hide_post_meta();

		$entry_meta_tag_class = 'tag-links';
		if ( $hide_post_meta['tag'] ) {
			$entry_meta_tag_class .= ' hide-clip';
		}

		return apply_filters( 'pressbook_entry_meta_tag_class', $entry_meta_tag_class );
	}
}
