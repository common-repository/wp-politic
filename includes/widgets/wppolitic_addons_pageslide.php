<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPP_Elementor_Widget_PageSlide extends Widget_Base {

    public function get_name() {
        return 'wppolitic-pageslide';
    }
    
    public function get_title() {
        return __( 'WP - Politic PageSlide', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-slider-vertical';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'scroll_navigation_content',
            [
                'label' => __( 'Page Slide', 'wppolitic' ),
            ]
        );
            
            $repeater = new Repeater();

            $repeater->add_control(
                'content_source',
                [
                    'label'   => esc_html__( 'Content Source', 'wppolitic' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'custom',
                    'options' => [
                        'custom'    => esc_html__( 'Custom', 'wppolitic' ),
                        "elementor" => esc_html__( 'Elementor Template', 'wppolitic' ),
                    ],
                ]
            );

            $repeater->add_control(
                'navigation_content_title',
                [
                    'label'      => __( 'Slide Title', 'wppolitic' ),
                    'type'       => Controls_Manager::TEXTAREA,
                    'default'    => __( 'KERRRYY JONSHON', 'wppolitic' ),
                ]
            );      

            $repeater->add_control(
                'navigation_content',
                [
                    'label'      => __( 'Content', 'wppolitic' ),
                    'type'       => Controls_Manager::WYSIWYG,
                    'default'    => __( 'Content', 'wppolitic' ),
                    'condition' => [
                        'content_source' =>'custom',
                    ],
                ]
            );

            $repeater->add_control(
                'template_id',
                [
                    'label'       => __( 'Content', 'wppolitic' ),
                    'type'        => Controls_Manager::SELECT,
                    'default'     => '0',
                    'options'     => wppolitic_elementor_template(),
                    'condition'   => [
                        'content_source' => "elementor"
                    ],
                ]
            );

            $this->add_control(
                'navigator_content_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => array_values( $repeater->get_controls() ),
                    'default' => [

                        [
                            'navigation_content'    => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'wppolitic' ),
                        ],

                    ],
                    'title_field' => '{{{ content_source }}}',
                ]
            );

        $this->end_controls_section(); // Content Section End

        // Slider Options Section Start
        $this->start_controls_section(
            'scroll_navigation_slider_options',
            [
                'label' => __( 'Slider Options', 'wppolitic' ),
            ]
        );

            // $this->add_control(
            //     'slider_direction',
            //     [
            //         'label' => __( 'Slider Direction', 'wppolitic' ),
            //         'type' => Controls_Manager::SELECT,
            //         'default' => 'vertical',
            //         'options' => [
            //             'horizontal' => __( 'Horizontal', 'wppolitic' ),
            //             'vertical'  => __( 'Vertical', 'wppolitic' ),
            //         ],
            //     ]
            // );

            $this->add_control(
                'slider_height',
                [
                    'label' => __( 'Height', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'full_screen',
                    'options' => [
                        'full_screen'    => __( 'Full Screen', 'wppolitic' ),
                        'custom_height'  => __( 'Custom', 'wppolitic' ),
                    ],
                ]
            );

            $this->add_responsive_control(
                'slider_container_height',
                [
                    'label' => __( 'Custom Height', 'wppolitic' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 10000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 300,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .swiper-container' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'slider_height' =>'custom_height',
                    ],
                ]
            );

            $this->add_control(
                'slider_speed',
                [
                    'label' => __('Speed', 'wppolitic'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 500,
                ]
            );

            $this->add_control(
                'slider_mousewheel',
                [
                    'label' => esc_html__( 'Mouse Wheel', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'slider_dots',
                [
                    'label' => esc_html__( 'Slider Pagination', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'pagination_icon',
                [
                    'label' => __( 'Pagination Icon', 'wppolitic' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-star',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'slider_dots' => 'yes',
                    ]
                ]
            );
            $this->add_control(
                'menu_active_slide_number',
                [
                    'label' => __('Active Slide Number', 'wppolitic'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 1,
                    'min' => 0, 
                    'max' => 100,
                ]
            );
            $this->add_control(
                'slide_custom_menu',
                [
                    'label' => esc_html__( 'External Menu for Navigation', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $this->add_control(
				'slide_info_notice',
				[
					'raw'             => __( 'To integrate the external menu with the navigation slider, utilize the link structure <b>#wppolitic-scroll-slide-1</b> for navigating to a specific slide. ', 'wppolitic' ),
					'type'            => Controls_Manager::RAW_HTML,
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
					'condition'   => [
						'slide_custom_menu' => 'yes'
					],
				]
			);
            $this->add_control(
                'slide_custom_menu_class',
                [
                    'label' => __( 'Enable Active Menu', 'wppolitic' ),
                    'description' => __('Turn this on to add the "wppolitic-scroll-nav-menu-active" class to the active menu item when using an external menu.', 'wppolitic'),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition'   => [
                        'slide_custom_menu' => 'yes'
                    ],
                ]
            );
            $this->add_control(
                'custom_css_active_menu',
                [
                    'label' => esc_html__( 'Custom CSS for Active Menu', 'wppolitic' ),
                    'description' => esc_html__('Add custom CSS to be applied to the active menu class. Example: .wppolitic-scroll-nav-menu-active { color: red; }', 'wppolitic'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => '.wppolitic-scroll-nav-menu-active { /* Your custom styles here */ }',
                    'placeholder' => '.wppolitic-scroll-nav-menu-active { color: red; /* Example CSS */ }',
                    'condition' => [
                        'slide_custom_menu_class' => 'yes',
                         'slide_custom_menu' => 'yes'
                    ],
                ]
            );           

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'scroll_slide_background',
                    'label' => __( 'Slide Background', 'wppolitic' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .swiper-container',
                    'separator' => 'before',
                ]
            );      

        $this->end_controls_section(); // Slider Options Section End

        // Style tab section
        $this->start_controls_section(
            'scroll_navigation_style_section',
            [
                'label' => __( 'Custom Content', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        
            $this->add_control(
                'scroll_navigation_content_color',
                [
                    'label' => __( 'Content Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#000000',
                    'selectors' => [
                        '{{WRAPPER}} .scroll-navigation-content' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'scroll_navigation_content_typography',
                    'selector' => '{{WRAPPER}} .scroll-navigation-content',
                ]
            );

            $this->add_responsive_control(
                'scroll_navigation_content_margin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .scroll-navigation-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_responsive_control(
                'scroll_navigation_content_padding',
                [
                    'label' => __( 'Padding', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .scroll-navigation-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_control(
                'scroll_navigation_content_title_color',
                [
                    'label' => __( 'Slide Title Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .swiper_slide_title h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'scroll_navigation_content_title_typography',
                    'selector' => '{{WRAPPER}} .swiper_slide_title h2',
                ]
            );
            $this->add_responsive_control(
                'scroll_navigation_content_title_margin',
                [
                    'label' => __( 'Title Margin ', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .swiper_slide_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

        $this->end_controls_section();


        // Style Testimonial Dots style start
        $this->start_controls_section(
            'scroll_navigation_pagination_style',
            [
                'label'     => __( 'Pagination', 'wppolitic' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->start_controls_tabs( 'scroll_navigation_pagination_style_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'scroll_navigation_pagination_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wppolitic' ),
                    ]
                );
                $this->add_control(
                    'scroll_navigation_pagination_color',
                    [
                        'label' => __( 'Icon Color', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#000000',
                        'selectors' => [
                            '{{WRAPPER}} .swiper-pagination-bullet' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'scroll_navigation_pagination_font_size',
                    [
                        'label' => __( 'Font Size', 'wppolitic' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 10000,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 20,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .swiper-pagination-bullet' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],

                    ]
                );                
                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'scroll_navigation_pagination_background',
                            'label' => __( 'Background', 'wppolitic' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .swiper-pagination-bullet',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'scroll_navigation_pagination_border',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .swiper-pagination-bullet',
                        ]
                    );

                    $this->add_responsive_control(
                        'scroll_navigation_pagination_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .swiper-pagination-bullet' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'scroll_navigation_pagination_height',
                        [
                            'label' => __( 'Height', 'wppolitic' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 20,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'scroll_navigation_pagination_width',
                        [
                            'label' => __( 'Width', 'wppolitic' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 20,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'scroll_navigation_pagination_margin',
                        [
                            'label' => __( 'Bullet Margin', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .swiper-container-vertical>.swiper-pagination-bullets .swiper-pagination-bullet' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    
                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'scroll_navigation_pagination_style_hover_tab',
                    [
                        'label' => __( 'Active', 'wppolitic' ),
                    ]
                );
                $this->add_control(
                    'scroll_navigation_pagination_color_active',
                    [
                        'label' => __( 'Icon Color', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#fff',
                        'selectors' => [
                            '{{WRAPPER}} .swiper-pagination-bullet-active' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'scroll_navigation_pagination_hover_background',
                            'label' => __( 'Background', 'wppolitic' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .swiper-pagination-bullet-active',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'scroll_navigation_pagination_hover_border',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .swiper-pagination-bullet-active',
                        ]
                    );

                    $this->add_responsive_control(
                        'scroll_navigation_pagination_hover_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .swiper-pagination-bullet-active' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); 

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $this->add_render_attribute( 'swiperslider_area_attr', 'class', 'swiper-container' );
        $slider_mousewheel = $settings['slider_mousewheel'];
        $slide_custom_menu = $settings['slide_custom_menu'];
        $slide_custom_menu_class = $settings['slide_custom_menu_class'];
        $slider_speed = $settings['slider_speed'];
        $sectionid =  'sid'.$this-> get_id();
        ?>
<!-- Swiper -->
<div class="swiper-container swiper-container-vertical <?php echo esc_attr( $sectionid ) ?>">
    <div class="swiper-wrapper">
        <?php foreach ( $settings['navigator_content_list'] as  $navigatorcontent ): ?>
        <div class="swiper-slide">
            <?php 
                if (!empty( $navigatorcontent['navigation_content_title'] ) ) {
                    echo '<div class="swiper_slide_title"> <h2> '.wp_kses_post( $navigatorcontent['navigation_content_title'] ).'</h2></div>';
                }
            ?>
            <div class="scroll-navigation-inner">
                <?php 
                    if ( $navigatorcontent['content_source'] == 'custom' && !empty( $navigatorcontent['navigation_content'] ) ) {
                        echo '<div class="scroll-navigation-content">'.wp_kses_post( $navigatorcontent['navigation_content'] ).'</div>';
                    } elseif ( $navigatorcontent['content_source'] == "elementor" && !empty( $navigatorcontent['template_id'] )) {
                        echo Plugin::instance()->frontend->get_builder_content_for_display( $navigatorcontent['template_id'] );
                    }
                ?>
            </div>
        </div>
        <?php endforeach;?>
    </div>

    <!-- Add Pagination -->
    <?php if( $settings['slider_dots'] == 'yes' ){
        echo '<div class="swiper-pagination"></div>';
    } ?>

</div>
<?php
if ( $settings['slide_custom_menu_class'] === 'yes' && ! empty( $settings['custom_css_active_menu'] ) ) {
    echo '<style>' . esc_html( $settings['custom_css_active_menu'] ) . '</style>';
}
?>

<script type="text/javascript">

jQuery(document).ready(function($) {
    var slider_mousewheel = <?php echo esc_js( $slider_mousewheel ) == 'yes' ? 'true': 'false'; ?>;
    var slide_custom_menu = <?php echo esc_js( $slide_custom_menu ) == 'yes' ? 'true': 'false'; ?>;
    var slide_custom_menu_class = <?php echo esc_js( $slide_custom_menu_class ) == 'yes' ? 'true': 'false'; ?>;
    var menu_active_slide_number = <?php echo $settings['menu_active_slide_number'] ? esc_js( $settings['menu_active_slide_number'] ) : '0'; ?>;

    var _slider_speed = <?php if( isset($slider_speed) ){ echo esc_js($slider_speed); }else{ echo esc_js(500); }; ?>;

    var swiper = new Swiper('.swiper-container.<?php echo esc_js( $sectionid ) ?>', {
        direction: 'vertical',
        spaceBetween: 0,
        mousewheel: slider_mousewheel,
        speed:_slider_speed,
        
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            type: 'bullets',
            renderBullet: function (index, icon) {
                return '<div class="' + icon + '">'  + '<?php \Elementor\Icons_Manager::render_icon( $settings['pagination_icon'], [ 'aria-hidden' => 'true' ] ); ?>   </div>';
            }
        },
        on: {
            init: function () {
                if ( menu_active_slide_number ) {
                    this.slideTo( parseInt( menu_active_slide_number )-1 );
                }
            }
        }
 
    });
    if( slide_custom_menu ) {
        
        $('a[href^="#wppolitic-scroll-slide"]').on('click', function (e) {
            e.preventDefault();
            if( true == slide_custom_menu_class ){
                $('a[href^="#wppolitic-scroll-slide"]').removeClass('wppolitic-scroll-nav-menu-active');
                $(this).addClass('wppolitic-scroll-nav-menu-active');
            }

            var fullIndex = $(this).attr('href');
            var slideIndex = parseInt(fullIndex.replace('#wppolitic-scroll-slide-',''), 0);
            if( fullIndex !== slideIndex && slideIndex > 0 ){
                swiper.slideTo(slideIndex-1); 
            }
          });

          if( true ==  slide_custom_menu_class ){
            
            if ( menu_active_slide_number ) {
                $('a[href^="#wppolitic-scroll-slide"]').removeClass('wppolitic-scroll-nav-menu-active');
                $('a[href^="#wppolitic-scroll-slide-'+menu_active_slide_number+'"]').addClass('wppolitic-scroll-nav-menu-active');
            }

            swiper.on('slideChange', function () {
                var activeIndex = swiper.activeIndex + 1; // Since swiper.activeIndex is zero-based

                // Remove the class from all menu items
                $('a[href^="#wppolitic-scroll-slide"]').removeClass('wppolitic-scroll-nav-menu-active');
                
                // Add the class to the corresponding menu item
                $('a[href="#wppolitic-scroll-slide-' + activeIndex + '"]').addClass('wppolitic-scroll-nav-menu-active');
            });
        }

    }
});
</script>

<?php

    }

}

wppolitic_widget_register_manager( new WPP_Elementor_Widget_PageSlide() );