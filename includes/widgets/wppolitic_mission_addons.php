<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPPolitic_Elementor_Widget_Mission extends Widget_Base {

    public function get_name() {
        return 'wppolitic_missions-post';
    }
    
    public function get_title() {
        return __( 'WP Politic : Mission', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-review';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'mission_setting',
            [
                'label' => esc_html__( 'Mission', 'wppolitic' ),
            ]
        );
        $this->start_controls_tabs(
                'wppolitic_tabs'
            );
                $this->start_controls_tab(
                    'wppolitic_content_tab',
                    [
                        'label' => __( 'Content', 'wppolitic' ),
                    ]
                );

            $this->add_control(
                'content_show_ttie',
                [
                    'label' => __( 'Content Source Option', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'wppolitic_categories',
                [
                    'label' => esc_html__( 'Select Mission Category', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wppolitic_mission_categories(),                   
                ]
            );                     
                     
            $this->add_control(
                'title_length',
                [
                    'label' => __( 'Title Length', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 3,
                ]
            );
            $this->add_control(
                'read_more_btn_show_hide',
                [
                    'label' => esc_html__( 'Read More Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'read_more_btn_txt',
                [
                    'label' => __( 'Read More Text', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Read More',
                    'title' => __( 'Enter button text', 'wppolitic' ),
                    'condition' => [
                        'read_more_btn_show_hide' => 'yes',
                    ]
                ]
            );
            $this->add_control(
                'mission_progress_show_hide',
                [
                    'label' => esc_html__( 'Progressbar Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );                       
            $this->add_control(
                'content_length',
                [
                    'label' => __( 'Content Length', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                    'default' => 15,                    
                ]
            );
            $this->add_control(
                'video_title',
                [
                    'label' => __( 'Video WATCH Title', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'WATCH THE VIDEO', 'wppolitic' ),
                ]
            );
            $this->add_control(
                'mission_title_permalink_hide',
                [
                    'label' => esc_html__( 'Hide Title Permalink?', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );  
            $this->end_controls_tab();

                $this->start_controls_tab(
                    'wppolitic_option_tab',
                    [
                        'label' => __( 'Option', 'wppolitic' ),
                    ]
                );

            $this->add_control(
                'item_show_ttie',
                [
                    'label' => __( 'Item Show Option', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );              
            $this->add_control(
                'post_per_page',
                [
                    'label' => __( 'Show Total Item', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10000,
                    'step' => 1,
                    'default' => 6,
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
                    'max' => 500000,
                    'step' => 100,
                    'default' => 5000,
                    'condition' => [
                        'caselautoplay' => 'yes',
                    ]
                ]
            );
            $this->add_control(
                'caselarrows',
                [
                    'label' => esc_html__( 'Arrow', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'slarrowsstyle',
                [
                    'label' => esc_html__( 'Arrow Style Middle/Top', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        1 => esc_html__( 'Arrow Middle', 'wppolitic' ),
                        2 => esc_html__( 'Arrow Top', 'wppolitic' ),
                    ],
                     'condition' => [
                        'caselarrows' => 'yes',
                    ]
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
                'showitem',
                [
                    'label' => __( 'Show Item', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 2,
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
                    'default' => 2,
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
          



        
            $this->add_control(
                'playiconty',
                [
                    'label' => esc_html__( 'Play Icon type', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Icon', 'wppolitic' ),
                        '2' => esc_html__( 'image', 'wppolitic' ),
                    ],
                ]
            );

            $this->add_control(
                'iconiamge',
                [
                    'label' => __( 'Play Icon image', 'wppolitic' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'playiconty' => '2',
                    ]
                ]
            );
            $this->add_control(
                'playicon',
                [
                    'label' => __( 'Play icon', 'wppolitic' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-play-circle-o',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'playiconty' => '1',
                    ]
                ]
            );



            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_title_style1s',
            [
                'label' => __( 'Content Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
                'wppolitic_style_tabs'
            );
                $this->start_controls_tab(
                    'wppolitic_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wppolitic' ),
                    ]
                );
            $this->add_control(
                'item_title_heading_tabe',
                [
                    'label' => __( 'Tabe Category Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            // Title Style
            $this->add_control(
                'title_color_tab',
                [
                    'label' => __( 'Category color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-category span' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .slick-active .wppolitic-mission-category:before' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography_tabe',
                    'selector' => '{{WRAPPER}} .wppolitic-mission-category span',
                ]
            );

            $this->add_responsive_control(
                'margin_category_tabe',
                [
                    'label' => __( 'Tab Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .slider.wppolitic_mission_slider_nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'item_title_heading',
                [
                    'label' => __( 'Title Color', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            // Title Style
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-content h2' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .wppolitic-mission-content h2',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Title Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
 

            $this->add_control(
                'item_content_heading',
                [
                    'label' => __( 'Content Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'item_content_color',
                [
                    'label' => __( 'Content color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',                    
                    'selector' => '{{WRAPPER}} .wppolitic-mission-content p',
                ]
            );


            //start title
            $this->add_control(
                'title_options_progress',
                [
                    'label'     => __( 'Progressbar Style', 'wppolitic' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color_progress',
                [
                    'label'     => __( 'Progress Title Color', 'wppolitic' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-single-skill .wppolitic-title' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .wppolitic-single-skill .wppolitic-percent' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography_progress',
                    'selector' => '{{WRAPPER}} .wppolitic-single-skill .wppolitic-title,{{WRAPPER}} .wppolitic-single-skill .wppolitic-percent',
                ]
            );
            $this->add_control(
                'title_color_per',
                [
                    'label'     => __( 'Percent Color', 'wppolitic' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-single-skill span.wppolitic-percent' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography_per',
                    'selector' => '{{WRAPPER}} .wppolitic-single-skill span.wppolitic-percent',
                ]
            );


            $this->add_control(
                'item_read_more_heading',
                [
                    'label' => __( 'Read More Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );             
            $this->add_control(
                'item_read_more_color',
                [
                    'label' => __( 'Read More color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-readmore > a' => 'color: {{VALUE}};',
                    ],
                ]
            );            
            $this->add_control(
                'item_read_more_color_bg',
                [
                    'label' => __( 'Read More BG color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#051b33',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-readmore > a' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'read_more_typhography',                    
                    'selector' => '{{WRAPPER}} .wppolitic-mission-readmore > a',
                ]
            );     

            $this->add_control(
                'item_video_popupheading',
                [
                    'label' => __( 'Video Popup Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            ); 

            $this->add_responsive_control(
                'video_popup_height',
                [
                    'label' => __( 'Video Height', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 2000,
                    'step' => 1,
                    'default' =>485,
                    'selectors' => [
                        '{{WRAPPER}} .aboutus-video' => 'height: {{VALUE}}px;',
                    ],
                ]
            );
            $this->add_control(
                'video_overlay_color',
                [
                    'label' => __( 'Video Overlay Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(0,0,0,0.0)',
                    'selectors' => [
                        '{{WRAPPER}} .aboutus-video::before' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'play_icon_color',
                [
                    'label' => __( 'Play Icon Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_popup-youtube' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'play_icon_color_hover',
                [
                    'label' => __( 'Play Icon Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_popup-youtube:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'video_title_color',
                [
                    'label' => __( 'Video Paly Caption Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-video-content h5' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'video_title_color_bg',
                [
                    'label' => __( 'Video Paly Caption BG', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#e03927',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-video-content h5' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'video_title_typography',
                    'selector' => '{{WRAPPER}} .wppolitic-mission-video-content h5',
                ]
            );


            $this->end_controls_tab();

            $this->start_controls_tab(
                'wppolitic_style_hover_tab',
                [
                    'label' => __( 'Hover', 'wppolitic' ),
                ]
            );
            $this->add_control(
                'title_color_tab_hover',
                [
                    'label' => __( 'Category Active Color ', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#e03927',
                    'selectors' => [
                        '{{WRAPPER}} .slick-current.slick-active .wppolitic-mission-category span' => 'color: {{VALUE}};',
                        
                    ],
                ]
            );            
            $this->add_control(
                'item_title_heading_hover',
                [
                    'label' => __( 'Title Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color_hover_link',
                [
                    'label' => __( 'Title Hover Link color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#e03927',
                    'selectors' => [
                        '{{WRAPPER}} .wp-mission-box h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );            

            $this->add_control(
                'item_read_more_color_hover',
                [
                    'label' => __( 'Read More Hover color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-readmore > a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_read_more_bg_hover',
                [
                    'label' => __( 'Read More Hover BG', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-mission-readmore > a:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );



            $this->end_controls_tab();
        $this->end_controls_tabs();
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
                    'wppolitic_carousel_style_tabs'
                );
                $this->start_controls_tab(
                    'wppolitic_carouse_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wppolitic' ),
                    ]
                );
                    $this->add_control(
                        'slider_arrow_button_heading',
                        [
                            'label' => __( 'Arrow Button', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );   
                    $this->add_control(
                        'carousel_nav_color',
                        [
                            'label' => __( 'COlor', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#000',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color',
                        [
                            'label' => __( 'BG COlor', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow, {{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

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
                                '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'width: {{VALUE}}px;',
                            ],
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
                                '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'selector' => '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow',
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_top_margin',
                        [
                            'label' => __( 'Button Top Position', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => -200,
                            'max' => 200,
                            'step' => 1,
                            'default' => -87,
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'top: {{VALUE}}px;',
                            ],
                        ]
                    );                    
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'wppolitic_carouse_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wppolitic' ),
                    ]
                );
                  $this->add_control(
                        'carousel_nav_color_hover',
                        [
                            'label' => __( 'COlor', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#e03927',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow:hover, {{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color_hover',
                        [
                            'label' => __( 'BG COlor', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow:hover, {{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_indicator1 .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                
        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];        
        $read_more_btn_show_hide = $settings['read_more_btn_show_hide'];
        $mission_progress_show_hide = $settings['mission_progress_show_hide'];
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $slarrowsstyle = $settings['slarrowsstyle'];

        $get_item_categories = $settings['wppolitic_categories'];
        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $titlelength    = ! empty( $settings['title_length'] ) ? $settings['title_length'] : 2;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $sectionid =  $this-> get_id();

        $playiconty      = $this->get_settings_for_display('playiconty');
        $playicon        = $this->get_settings_for_display('playicon');
        $iconiamge  =   (isset($settings['iconiamge']['url']) ? $settings['iconiamge']['url'] : '');
        $video_title = $this->get_settings_for_display('video_title');

        ?>
                <!-- Mission New Style Start -->
                <div class="mission_new_style">
                    <div class="slider wppolitic_mission_slider_nav <?php if($slarrowsstyle==2){ echo ' wppolitic_indicator-style-two ';}else{echo ' wppolitic_indicator1 ';}   echo esc_attr( $sectionid );?>">
                    <?php
                     $item_cates = str_replace(' ', '', $get_item_categories);
                        $htsargs = array(
                            'post_type'            => 'wppolitic_mission',
                            'posts_per_page'       => $per_page, 
                            'ignore_sticky_posts'  => 1,
                            'order'                => 'DESC',
                        );

                        if ( "0" != $get_item_categories) {
                            if( is_array($item_cates) && count($item_cates) > 0 ){
                                $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                $htsargs['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'wppolitic_mission_cat',
                                        'terms' => $item_cates,
                                        'field' => $field_name,
                                        'include_children' => false
                                    )
                                );
                            }
                        }
                        $htspost = new \WP_Query($htsargs);
                        while($htspost->have_posts()):$htspost->the_post();
                         $terms = get_the_terms(get_the_id(),'wppolitic_mission_cat');
                              ?>

                            <div class="wppolitic-mission-category">
                                <span>
                                <?php
                                if ( $terms && !is_wp_error( $terms ) ) :
                                    ?><?php
                                        foreach ( $terms as $term ) { ?>
                                             <?php echo esc_html( $term->name ); ?>
                                        <?php } ?>

                                      <?php endif;?>
                                    </span>
                            </div>

                        <?php endwhile; ?>
                    </div>


                    <div class="slider wppolitic_mission_slider_for <?php echo esc_attr( $sectionid );?>">
                    <?php
                     $item_cates = str_replace(' ', '', $get_item_categories);
                        $htsargs = array(
                            'post_type'            => 'wppolitic_mission',
                            'posts_per_page'       => $per_page, 
                            'ignore_sticky_posts'  => 1,
                            'order'                => 'DESC',
                        );

                        if ( "0" != $get_item_categories) {
                            if( is_array($item_cates) && count($item_cates) > 0 ){
                                $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                $htsargs['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'wppolitic_mission_cat',
                                        'terms' => $item_cates,
                                        'field' => $field_name,
                                        'include_children' => false
                                    )
                                );
                            }
                        }
                        $htspost = new \WP_Query($htsargs);
                        while($htspost->have_posts()):$htspost->the_post();
                        $terms = get_the_terms(get_the_id(),'wppolitic_mission_cat');

                        $mission_short_des  = get_post_meta( get_the_ID(),'_wppolitic_mission_short_des', true );

                        $names  = get_post_meta( get_the_ID(),'_wppolitic_target_list_mission', true );  

                        $wppolitic_mission_video  = get_post_meta( get_the_ID(),'_wppolitic_mission_video', true ); 
                         $wppolitic_mission_video_thumbnail  = get_post_meta( get_the_ID(),'_wppolitic_mission_video_thumbnail', true );  

                              ?> 
                            <div class="wppolitic-mission-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="wppolitic-mission-content">
                                        <?php if( get_the_title() ){ 
                                            if($settings['mission_title_permalink_hide'] != 'yes'){ ?>
                                        <h2>
                                            <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $titlelength , '' );?></a>
                                        </h2>
                                        <?php } else{ ?>
                                        <h2>
                                            <?php echo wp_trim_words( get_the_title(), $titlelength , '' );?>
                                        </h2>
                                        
                                        <?php }} ?>

                                            <?php if( $mission_short_des ){ ?>
                                                <?php echo '<p>'.wp_trim_words( $mission_short_des, $contetnlength, '' ).'</p>';?>
                                             <?php } ?>

                                                <?php if(is_array( $names ) && 'yes' == $mission_progress_show_hide){ ?>

                                                    <div class="wppolitic-mission-progress">
                                                    <?php foreach( $names as $name_a ){

                                                    $mission_progresse = $name_a['mission_percent'] ?? 70;
                                                      if(!empty($name_a['mission_name'])):  
                                                     ?>   
                                                    <div class="wppolitic-single-skill clearfix">
                                                        <?php if(!empty($name_a['mission_name'])){ ?>
                                                        <span class="wppolitic-title"><?php echo esc_html($name_a['mission_name']); ?></span>
                                                    <?php } if(!empty($name_a['mission_percent'])){ ?> 
                                                        <span class="wppolitic-percent">(<?php echo esc_html( $name_a['mission_percent'] ); ?>%)</span>
                                                    <?php } ?>
                                                        <div class="wppolitic-progress progress"><div class="wow fadeInLeft bar bg-dark" style="width: <?php echo esc_html($mission_progresse);?>%; background-color: <?php echo esc_attr( $name_a['mission_color'] ); ?>!important;"></div></div>
                                                    </div>
                                                    <?php endif;  } ?>
                                               

                                            </div>
                                            <?php }?>
                                            <div class="wppolitic-mission-readmore">
                                            <?php if( $read_more_btn_show_hide == 'yes' && !empty($btntext)){ ?>
                                                <a class="mission-redmore" href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $btntext ); ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wppolitic-mission-video-content">
                                            <div class="wppolitic-mission-video">
                                                <div class="aboutus-video" style="background: rgba(0, 0, 0, 0) url(<?php echo esc_url( $wppolitic_mission_video_thumbnail ); ?> ) no-repeat scroll;">
                                                    <div class="video-content wppolitic">
                                                        <?php if(!empty($wppolitic_mission_video)){ ?>
                                                            <a href="<?php echo $wppolitic_mission_video; ?>" class="wppolitic_popup-youtube">
                                                                <?php if( $playiconty == 2 ){
                                                                    ?>
                                                                    <img src="<?php echo esc_url( $iconiamge ); ?>" alt="<?php echo esc_attr('wppolitic'); ?>" />
                                                                    <?php
                                                                }else{
                                                                    \Elementor\Icons_Manager::render_icon( $settings['playicon'], [ 'aria-hidden' => 'true' ] );
                                                                } ?>
                                                            </a>
                                                        <?php } ?>
                                                    </div>                    
                                                </div>  

                                            </div>
                                            <?php if(!empty($video_title)){ 
                                                        echo '<h5>'. esc_html( $video_title ) .'</h5>';
                                                    } ?> 
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php endwhile; ?>
                    </div>
                            
                </div>



            <script type="text/javascript">
               jQuery(document).ready(function($) {

                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;



            $('.wppolitic_mission_slider_for.<?php echo esc_attr( $sectionid );?>').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
              asNavFor: '.wppolitic_mission_slider_nav'
            });
            $('.wppolitic_mission_slider_nav.<?php echo esc_attr( $sectionid );?>').slick({
              slidesToShow: _showitem_set,
              slidesToScroll: 1,
              asNavFor: '.wppolitic_mission_slider_for.<?php echo esc_attr( $sectionid );?>',
              dots: false,
              arrows:_arrows_set,
              autoplay: _autoplay_set,
              autoplaySpeed: _autoplay_speed,
             centerPadding:0,
              vertical: false,
              centerMode: true,
              focusOnSelect: true,
              focusOnSelect: true,
            prevArrow: '<div class="btn-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_prev'], [ 'aria-hidden' => 'true' ] );?></div>',
            nextArrow: '<div><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_next'], [ 'aria-hidden' => 'true' ] );?></div>',
            responsive: [
                    {
                      breakpoint: 991,
                      settings: {
                        slidesToShow: _showitemtablet_set
                      }
                    },
                    {
                      breakpoint: 768,
                      settings: {
                        slidesToShow: _showitemmobile_set
                      }
                    },
                    {
                      breakpoint: 575,
                      settings: {
                        slidesToShow: 2
                      }
                    }
                  ]
            });
                    
                });

            </script>

        <?php

        wp_reset_query(); wp_reset_postdata();

    }


}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Mission() );