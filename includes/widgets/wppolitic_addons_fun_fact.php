<?php

namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPPolitic_Elementor_Widget_counter extends Widget_Base {

    public function get_name() {
        return 'counter_box';
    }
    
    public function get_title() {
        return __( 'WP Politic Fun Fact Box', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'counter_title_content',
            [
                'label' => esc_html__( 'Counter Content', 'wppolitic' ),
            ]
        );
            $this->add_control(
                'counter_title',
                [
                    'label' => __( 'Counter Title', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Counter Title',
                    'title' => __( 'Enter Counter Title', 'wppolitic' ),
                ]
            );
            
            $this->add_control(
                'counter_number',
                [
                    'label' => __( 'Counter Number', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 300,
                    'title' => __( 'Counter Number', 'wppolitic' ),
                ]
            );
             $this->add_control(
                'icon_show_hide',
                [
                    'label' => esc_html__( 'Icon Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );            
           $this->add_control(
                'cournter_icon_type',
                [
                    'label' => esc_html__( 'Select Icon Type', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'wppolitic' ),
                        'image' => esc_html__( 'Image', 'wppolitic' ),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]                    
                ]
            );
            $this->add_control(
                'cournter_icon_iamge',
                [
                    'label' => __( 'Icon image', 'wppolitic' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'cournter_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'cournter_icon_font',
                [
                    'label' => __( 'Icon', 'wppolitic' ),					
					'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-trophy',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'cournter_icon_type' => 'icon',
                    ]
                ]
            );
            $this->add_control(
                'wppolitic_funfact_style',
                [
                    'label' => esc_html__( 'Select Style', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 2,
                    'options' => [
                        1 => esc_html__( 'Style One', 'wppolitic' ),
                        2 => esc_html__( 'Style Two', 'wppolitic' ),
                    ],
                ]
            ); 
        $this->end_controls_section();
        // Style tab section
        $this->start_controls_section(
            'counter_title_style',
            [
                'label' => __( 'Counter Title', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
			$this->add_control(
				'Title_colorone',
				[
					'label' => __( 'Title color', 'wppolitic' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#333',
					'selectors' => [
						'{{WRAPPER}} .wppolitic-funcfact-count h3,{{WRAPPER}} .wppolitic-counter-next h2' => 'color: {{VALUE}};',
					],
				]
			);
		
			$this->add_control(
				'title_spearator',
				[
					'label' => __( 'Title Separator color', 'wppolitic' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#333',
					'selectors' => [
						'{{WRAPPER}} .wppolitic-funcfact-count span::after,{{WRAPPER}} .wppolitic-counter-top::before' => 'background-color: {{VALUE}};',
					],
				]
			);
		
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'typography_title',
					'selector' => '{{WRAPPER}} .wppolitic-funcfact-count h3,{{WRAPPER}} .wppolitic-counter-next h2',
				]
			);
			$this->add_responsive_control(
				'margin_title',
				[
					'label' => __( 'Title margin', 'wppolitic' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .wppolitic-funcfact-count h3,{{WRAPPER}} .wppolitic-counter-next h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'padding_title',
				[
					'label' => __( 'Title Padding', 'wppolitic' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .wppolitic-funcfact-count h3,{{WRAPPER}} .wppolitic-counter-next h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'aligntitle',
				[
					'label' => __( 'Alignment', 'wppolitic' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'wppolitic' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'wppolitic' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'wppolitic' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'default' => 'center',
					'selectors' => [
						'{{WRAPPER}} .wppolitic-project-single' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();
        // Style tab section
        $this->start_controls_section(
            'icon_title_style',
            [
                'label' => __( 'Icon Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
			$this->add_control(
				'icon_colorone',
				[
					'label' => __( 'Icon color', 'wppolitic' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#333',
					'selectors' => [
						'{{WRAPPER}} .wppolitic_coutner_icon i,{{WRAPPER}} .wppolitic-counter-top i' => 'color: {{VALUE}};',
					],
				]
			);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typographyddd',
				'selector' => '{{WRAPPER}} .wppolitic_coutner_icon i,{{WRAPPER}} .wppolitic-counter-top i',
			]
		);

		$this->end_controls_section();

        // Style tab title section end

        // Description Style in Title
        $this->start_controls_section(
            'counter_number_style',
            [
                'label' => __( 'Number', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Number color', 'wppolitic' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .wppolitic-funcfact-count span,{{WRAPPER}} .cnt-one h1' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .wppolitic-funcfact-count span,{{WRAPPER}} .cnt-one',
			]
		);
		$this->add_responsive_control(
			'margin_margin',
			[
				'label' => __( 'Number margin', 'wppolitic' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wppolitic-funcfact-count span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'desc_padding',
			[
				'label' => __( 'Number Padding', 'wppolitic' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wppolitic-funcfact-count span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $title = !empty( $settings['counter_title'] ) ? $settings['counter_title'] : '';
        $number        = $this->get_settings_for_display('counter_number');
        $cournter_icon_type        = $this->get_settings_for_display('cournter_icon_type');
        $icon_show_hide        = $this->get_settings_for_display('icon_show_hide');
        $wppolitic_funfact_style        = $this->get_settings_for_display('wppolitic_funfact_style');
        $cournter_icon_font        = $this->get_settings_for_display('cournter_icon_font');
        $cournter_icon_iamge  =   (isset($settings['cournter_icon_iamge']['url']) ? $settings['cournter_icon_iamge']['url'] : '');
		?>

		<?php if($wppolitic_funfact_style == 2){?>
        <div class="wppolitic-counter-all">
            <?php if($icon_show_hide == 'yes' ){ ?>
            <div class="wppolitic-counter-top">
                <?php
                    if( $cournter_icon_type == 'image' ){
                       ?>
                        <img src="<?php echo esc_url($cournter_icon_iamge); ?>" alt="" />
                        <?php
                    }else{
                        \Elementor\Icons_Manager::render_icon( $settings['cournter_icon_font'], [ 'aria-hidden' => 'true' ] );
                    }
                ?>
            </div>				
			<?php }?>        	
	        <div class="wppolitic-counter-bottom">
			<?php	if(!empty($title)): ?>    	
	            <div class="wppolitic-counter-next">
	                <h2><?php echo esc_html( $title); ?></h2>
	            </div>
	            <?php endif; ?> 

			<?php	if(!empty($number)): ?>    	
	            <div class="counter cnt-one res">
	                <h1 class="wppolitic-counter"><?php echo esc_js( $number); ?></h1>
	            </div>
	            <?php endif; ?>  
	        </div>
   		</div>
   		<?php } else{ ?> 

		<div class="wppolitic-project-single">
			<div class="wppolitic-funcfact-count">
                <?php if($icon_show_hide == 'yes' ){ ?>
                <div class="wppolitic_coutner_icon">
                    <?php
                        if( $cournter_icon_type == 'image' ){
                           ?>
                            <img src="<?php echo esc_url($cournter_icon_iamge); ?>" alt="" />
                            <?php
                        }else{
                            \Elementor\Icons_Manager::render_icon( $settings['cournter_icon_font'], [ 'aria-hidden' => 'true' ] );
                        }
                    ?>
                </div>				
				<?php } if(!empty($number)): ?>
				<span class="wppolitic-counter"><?php echo esc_js( $number); ?></span>
				<?php endif; ?>
			<?php if(!empty($title)): ?>
				<h3><?php echo esc_html($title); ?></h3>
			<?php endif; ?>
			</div>
		</div>

	<?php }?>

		<?php
	
    }

}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_counter() );