<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Widget service.
 *
 * @package PressBook
 */

namespace PressBook;

/**
 * Register theme widget area.
 */
class Widget implements Serviceable {
	const FOOTER_WIDGETS_COUNT = 4;

	/**
	 * Register service features.
	 */
	public function register() {
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	/**
	 * Register widget area.
	 */
	public function widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Left Sidebar', 'pressbook' ),
				'id'            => 'sidebar-2',
				'description'   => esc_html__( 'Add widgets here.', 'pressbook' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Right Sidebar', 'pressbook' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'pressbook' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		for ( $i = 1; $i <= self::FOOTER_WIDGETS_COUNT; $i++ ) {
			register_sidebar(
				array(
					/* translators: %s: footer widgets area number */
					'name'          => sprintf( esc_html__( 'Footer Widgets Area %s', 'pressbook' ), $i ),
					'id'            => 'footer-' . $i,
					'description'   => esc_html__( 'Add widgets here.', 'pressbook' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				)
			);
		}
	}

	/**
	 * Get total number of active footer widgets area.
	 * return int.
	 */
	public static function get_active_footer_widgets() {
		$total_active = 0;

		for ( $i = 1; $i <= self::FOOTER_WIDGETS_COUNT; $i++ ) {
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$total_active++;
			}
		}

		return $total_active;
	}
}
