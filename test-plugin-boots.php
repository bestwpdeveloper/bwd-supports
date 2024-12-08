<?php
namespace Test_plugin_ckeck;

class Class_test_plugin_ckeck {

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function bwdbh_register_widgets() {
		require_once( __DIR__ . '/widgets/test-plugin-widget.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\My_Repeater_Widget() );
	}

	// Register Category
	function bwdbh_add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'test-plugin-td-category',
			[
				'title' => esc_html__( 'Test Plugin', 'test-plugin-td' ),
				'icon' => 'eicon-person',
			]
		);
	}
	
	public function __construct() {
		add_action( 'elementor/elements/categories_registered', [ $this, 'bwdbh_add_elementor_widget_categories' ] );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'bwdbh_register_widgets' ] );
	}
}

Class_test_plugin_ckeck::instance();