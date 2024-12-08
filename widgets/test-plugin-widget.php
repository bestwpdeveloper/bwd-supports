<?php
namespace Test_plugin_ckeck\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class My_Repeater_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'my_repeater_widget';
    }

    public function get_title() {
        return __( 'My Repeater Widget', 'plugin-domain' );
    }

    public function get_icon() {
        return 'eicon-editor-list-ul';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Test Plugin', 'test-plugin-td' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'text',
			[
				'label' => __( 'Name', 'test-plugin-td' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'First Name', 'test-plugin-td' ),
				'default' => __( 'First Name', 'test-plugin-td' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'business_hours',
			[
				'label' => __( 'Test Plugin', 'test-plugin-td' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => __( 'First Name', 'test-plugin-td' ),
					],
					[
						'text' => __( 'Last Name', 'test-plugin-td' ),
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_2section',
			[
				'label' => esc_html__( 'Test Plugin', 'test-plugin-td' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeskeater = new Repeater();
		$repeskeater->add_control(
			'text2',
			[
				'label' => __( 'Name 2', 'test-plugin-td' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'First Name', 'test-plugin-td' ),
				'default' => __( 'First Name', 'test-plugin-td' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'business_2hours',
			[
				'label' => __( 'Test Plugin', 'test-plugin-td' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeskeater->get_controls(),
				'default' => [
					[
						'text' => __( 'First Name', 'test-plugin-td' ),
					],
					[
						'text' => __( 'Last Name', 'test-plugin-td' ),
					],
				],
				'title_field' => '{{{ text2 }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo '<ul class="test-plugin-td">';
		foreach ( $settings['business_hours'] as $index => $item ) :
			$text_key = $this->get_repeater_setting_key( 'text', 'business_hours', $index );
			$this->add_inline_editing_attributes( $text_key );
			?>
			<li class="business-hour-item">
				<span <?php $this->print_render_attribute_string( $text_key ); ?>>
					<?php echo esc_html( $item['text'] ); ?>
				</span>
			</li>
			<?php
		endforeach;
		echo '</ul>';

		echo '<ul class="test-plugin-td">';
		foreach ( $settings['business_2hours'] as $index => $item ) :
			$text_key = $this->get_repeater_setting_key( 'text2', 'business_2hours', $index );
			$this->add_inline_editing_attributes( $text_key );
			?>
			<li class="business-hour-item">
				<span <?php $this->print_render_attribute_string( $text_key ); ?>>
					<?php echo esc_html( $item['text2'] ); ?>
				</span>
			</li>
			<?php
		endforeach;
		echo '</ul>';
	}
}
