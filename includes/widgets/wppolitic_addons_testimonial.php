<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPP_Elementor_Widget_Testimonial extends Widget_Base {

    public function get_name() {
        return 'wppolitic-testimonial';
    }
    
    public function get_title() {
        return __( 'WP - Politic Testimonial', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'testimonial-setting',
            [
                'label' => esc_html__( 'Testimonial', 'wppolitic' ),
            ]
        );

        $repeater = new Repeater();

            $repeater->add_control(
                'climage',
                [
                    'label' => __( 'Testimonial Image', 'wppolitic' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'climagesize',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );
            
            $repeater->add_control(
                'clname',
                [
                    'label' => __( 'Client Name', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Enter client name', 'wppolitic' ),
                ]
            );
            $repeater->add_control(
                'cldesignation',
                [
                    'label' => __( 'Designation', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => 'true',
                    'title' => __( 'Enter Designation', 'wppolitic' ),
                ]
            );

            $repeater->add_control(
                'clsay',
                [
                    'label' => __( 'Client say', 'wppolitic' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => __( 'Client say', 'wppolitic' ),
                    'title' => __( 'Enter client say', 'wppolitic' ),
                ]
            );

            $this->add_control(
                'testimonial_list',
                [
                    'label' => __( 'Testimonial', 'wppolitic' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'clname' => __( 'Christopher Fox', 'wppolitic' ),
                            'cldesignation' => __( 'Author', 'wppolitic' ),
                            'clsay' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'wppolitic' ),
                        ],
                    ],
                    'title_field' => '{{{ clname }}}',
                ]
            );
            
        $this->end_controls_section();
        // content tab

        // Slider Option
        $this->start_controls_section(
            'slider_option_setting',
            [
                'label' => esc_html__( 'Carousel Option', 'wppolitic' ),
            ]
        );
            $this->add_control(
                'caselarrows',
                [
                    'label' => esc_html__( 'Arrow', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );     
            $this->add_control(
                'arrow_icon_next',
                [
                    'label' => __( 'Icon Next', 'wppolitic' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-angle-right',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'caselarrows' => 'yes',
                    ]
                ]
            );
            $this->add_control(
                'arrow_icon_prev',
                [
                    'label' => __( 'Icon Prev', 'wppolitic' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-angle-left',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'caselarrows' => 'yes',
                    ]
                ]
            );           
            
            $this->add_control(
                'caseldots',
                [
                    'label' => esc_html__( 'Dots', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'caselautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'caselautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 100000,
                    'step' => 100,
                    'default' => 5000,
                    'condition' => [
                        'caselautoplay' => 'yes',

                    ]
                ]
            );


            $this->add_control(
                'showitem',
                [
                    'label' => __( 'Show Item', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' =>10,
                    'step' => 1,
                    'default' => 1,
                ]
            );
            $this->add_control(
                'showitemtablet',
                [
                    'label' => __( 'Show Item (Tablet)', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 1,
                ]
            );
            $this->add_control(
                'showitemmobile',
                [
                    'label' => __( 'Show Item (Large Mobile)', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 1,
                ]
            );


        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'testimonial_style',
            [
                'label' => __( 'Content Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );         
            $this->add_control(
                'clname-heading',
                [
                    'label' => __( 'Client Name Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'clname_color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content h6,{{WRAPPER}} .clientsay-content h6' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'clnametypography',
                    'selector' => '{{WRAPPER}} .single-testimonial .testimonial-content h6,{{WRAPPER}} .clientsay-content h6',
                ]
            );
            $this->add_responsive_control(
                'test_name_margin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content h6,{{WRAPPER}} .clientsay-content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'test_name_border',
                    'label' => __( 'Name Title Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .testimonial-content > h6::after',
                ]
            );            
            $this->add_control(
                'cldesignation-heading',
                [
                    'label' => __( 'Designation', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_control(
                'cldesignation-color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'cldesignationtypography',
                    'selector' => '{{WRAPPER}} .single-testimonial .testimonial-content span',
                ]
            );

            $this->add_control(
                'cldescription-heading',
                [
                    'label' => __( 'Client Say', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );


            $this->add_control(
                'clsay-color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#555',
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content p,{{WRAPPER}} .clientsay-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'clsaytypography',
                    'selector' => '{{WRAPPER}} .single-testimonial .testimonial-content p,{{WRAPPER}} .clientsay-content p',
                ]
            );
            
        $this->end_controls_section();
        // Carousel Style
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                    'wppolitic_blog_carousel_style_tabs'
                );
                $this->start_controls_tab(
                    'wppolitic_blog_carouse_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wppolitic' ),
                    ]
                );
                    $this->add_control(
                        'slider_arrow_button_heading',
                        [
                            'label' => __( 'Arrow Button', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'condition' => [        
                                            'caselarrows' => 'yes',
                            ]
                        ]
                    );   
                    $this->add_control(
                        'carousel_nav_color',
                        [
                            'label' => __( 'Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#000',
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav [class*="owl-"]' => 'color: {{VALUE}};',
                            ],
                            'condition' => [        
                                            'caselarrows' => 'yes',
                            ]
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color',
                        [
                            'label' => __( 'BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav [class*="owl-"]' => 'background: {{VALUE}};',
                            ],
                            'condition' => [        
                                            'caselarrows' => 'yes',
                            ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .owl-nav [class*="owl-"]',
                            'condition' => [        
                                            'caselarrows' => 'yes',
                                ]
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav [class*="owl-"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [        
                                            'caselarrows' => 'yes',
                                ]

                        ]
                    );

                    $this->add_responsive_control(
                        'carousel_navicon_width',
                        [
                            'label' => __( 'Width', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav [class*="owl-"]' => 'width: {{VALUE}}px;',
                            ],
                            'condition' => [        
                                            'caselarrows' => 'yes',
                                ]
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_height',
                        [
                            'label' => __( 'Height', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .owl-nav [class*="owl-"]' => 'height: {{VALUE}}px;',
                            ],
                            'condition' => [
                                            'caselarrows' => 'yes',
                                ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'selector' => '{{WRAPPER}} .owl-nav [class*="owl-"]',
                            'condition' => [        
                                            'caselarrows' => 'yes',
                                ]
                        ]
                    );

                    $this->add_responsive_control(
                        'carousel_navicon_Position',
                        [
                            'label' => __( 'Position', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => '',
                            'max' => 500,
                            'default' => 0,
                            'step' => 1,

                           'selectors' => [
                                '{{WRAPPER}} .owl-nav [class*="owl-prev"]' => 'left: {{VALUE}}px;',
                                '{{WRAPPER}} .owl-nav [class*="owl-"]' => 'right: {{VALUE}}px;',
                            ],
                            'condition' => [
                                            'caselarrows' => 'yes',
                                ]
                        ]
                    );



            // Pagination
                $this->add_control(
                    'pagination_button_heading',
                    [
                        'label' => __( 'Pagination Button', 'wppolitic' ),
                        'type' => Controls_Manager::HEADING,
                        'condition' => [        
                            'caseldots' => 'yes',
                            ]
                    ]
                ); 

                    $this->add_responsive_control(
                        'carousel_pagination_width',
                        [
                            'label' => __( 'Width', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .owl-dot span' => 'width: {{VALUE}}px;',
                            ],
                            'condition' => [        
                                            'caseldots' => 'yes',
                                ]
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_pagination_height',
                        [
                            'label' => __( 'Height', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .owl-dot span' => 'height: {{VALUE}}px;',
                            ],
                            'condition' => [        
                                            'caseldots' => 'yes',
                                ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'pagination_border',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .owl-dot span',
                            'condition' => [        
                                            'caseldots' => 'yes',
                                ]
                        ]
                    ); 
                    $this->add_control(
                        'carousel_pagination_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [        
                                            'caseldots' => 'yes',
                                ]

                        ]
                    );                    
                    $this->add_control(
                        'carousel_pagination_bg_color',
                        [
                            'label' => __( 'BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .owl-dot span' => 'background: {{VALUE}};',
                            ],
                            'condition' => [        
                                            'caseldots' => 'yes',
                            ]                            
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_pagination_Position',
                        [
                            'label' => __( 'Position', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => '',
                            'max' => 500,
                            'default' => 0,
                            'step' => 1,

                           'selectors' => [
                                '{{WRAPPER}} .owl-dots' => 'margin: {{VALUE}}px;',
                            ],
                            'condition' => [
                                            'caselarrows' => 'yes',
                                ]
                        ]
                    );
            // Pagination
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'wppolitic_blog_carouse_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wppolitic' ),
                    ]
                );
                  $this->add_control(
                        'carousel_nav_color_hover',
                        [
                            'label' => __( 'Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#ea000d',
                            'selectors' => [
                                '{{WRAPPER}} .indicator3 .owl-nav [class*="owl-"]:hover' => 'color: {{VALUE}};',
                            ],
                            'condition' => [        
                                            'caselarrows' => 'yes',
                                ]
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color_hover',
                        [
                            'label' => __( 'BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .indicator3 .owl-nav [class*="owl-"]:hover' => 'background: {{VALUE}};',
                            ],
                            'condition' => [        
                                            'caselarrows' => 'yes',
                                ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .indicator3 .owl-nav [class*="owl-"]:hover',

                            'condition' => [        
                                            'caselarrows' => 'yes',
                                ]
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .indicator3 .owl-nav [class*="owl-"]:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [        
                                            'caselarrows' => 'yes',
                                ]

                        ]
                    );
                $this->add_control(
                    'pagination_button_heading_hover',
                    [
                        'label' => __( 'Pagination Hover', 'wppolitic' ),
                        'type' => Controls_Manager::HEADING,
                        'condition' => [        
                            'caseldots' => 'yes',
                            ]
                    ]
                );
                    $this->add_responsive_control(
                        'carousel_pagination_width_active',
                        [
                            'label' => __( 'Width', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .owl-dot span' => 'width: {{VALUE}}px;',
                            ],
                            'condition' => [        
                                            'caseldots' => 'yes',
                                ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'pagination_border_hover',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .owl-dot.active span',
                            'condition' => [        
                                            'caseldots' => 'yes',
                                ]
                        ]
                    );

                     $this->add_control(
                        'carousel_pagination_bg_color_hover',
                        [
                            'label' => __( 'BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .owl-dot.active span' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                            'caseldots' => 'yes',
                            ]
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        // Slider Option
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caseldots = $settings['caseldots'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];
        $sectionid =  $this-> get_id();



        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');

        ?>
            <div class="wppolitic_testimonial_active text-center owl-carousel <?php echo esc_attr( $sectionid ); if( $caselarrows =='yes'){ echo ' indicator3';} ?>">

                <?php foreach ( $settings['testimonial_list'] as $item ) :
                    ?>
                    <div class="single-testimonial">
                        <?php
                            echo '<div class="testimonial-image">'.Group_Control_Image_Size::get_attachment_image_html( $item, 'climagesize', 'climage' ).'</div>';
                        ?>
                        <div class="testimonial-content">
                            <?php
                                if(!empty($item['clsay'])){ echo '<p>' . wp_kses_post( $item['clsay'] ) . '</p>'; }

                                if( !empty( $item['clname'] ) ){
                                echo '<h6>'. esc_html( $item['clname'] ) . '</h6>';
                                }

                                if( !empty( $item['cldesignation'] ) ){
                                    echo '<span>' . esc_html( $item['cldesignation'] ) . '</span>';
                                }
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <script type="text/javascript">
                (function($){


                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(1000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(1); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(1); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(1); }; ?>;
                    var _dots_set = <?php echo esc_js( $caseldots ) == 'yes' ? 'true': 'false'; ?>;

                    $('.wppolitic_testimonial_active.<?php echo esc_attr( $sectionid );?>').owlCarousel({
                        items:_showitem_set,
                        autoHeight:true,
                        dots: _dots_set,
                        loop:true,
                        nav: _arrows_set,
                        autoplay: _autoplay_set,
                        autoplayTimeout: _autoplay_speed,
                        animateIn: 'flipInX',
                        navText:['<?php \Elementor\Icons_Manager::render_icon( $arrow_icon_prev, [ 'aria-hidden' => 'true' ] );?>','<?php \Elementor\Icons_Manager::render_icon( $arrow_icon_next, [ 'aria-hidden' => 'true' ] );?>'],
                          responsive: {
                            0: {
                              items: 1
                            },
                            575:{
                                items: _showitemmobile_set
                            },
                            768:{
                                items: _showitemtablet_set
                            },
                            1000:{
                                items: _showitem_set
                            },
                          }

                    }); 

                })(jQuery);

            </script>

        <?php

    }


}

wppolitic_widget_register_manager( new WPP_Elementor_Widget_Testimonial() );