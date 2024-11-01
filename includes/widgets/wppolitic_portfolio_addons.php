<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class WPPolitic_Elementor_Widget_Portfolio extends Widget_Base {


    public function get_name() {
        return 'wppolitic-portfolio-addons';
    }
    
    public function get_title() {
        return __( 'WP-Politic : Portfolio', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-flip-box';
    }

    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {
        // Content section
        $this->start_controls_section(
            'item_filltter_content_section',
            [
                'label' => __( 'Filtter Content', 'wppolitic' ),
            ]
        );

            $this->add_control(
                'filttering_title',
                [
                    'label' => __( 'Filtter Options', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'filter_show_hide',
                [
                    'label' => esc_html__( 'Filter Menu Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );                    
            $this->add_control(
                'wppolitic_item_categories',
                [
                    'label' => esc_html__( 'Select Item Category', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wppolitic_portfolio_categories(),
                ]
            );
            $this->add_control(
                'all_btn_show_hide',
                [
                    'label' => esc_html__( 'All Menu Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'all_btn_text',
                [
                    'label' => __( 'All Button Text', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'All',
                    'title' => __( 'Enter All Button Text', 'wppolitic' ),
                    'condition' => [
                        'all_btn_show_hide' => 'yes',
                    ]
                ]
            );

    $this->end_controls_section();
    // End Content section   
    // Item Content section
    $this->start_controls_section(
        'item_option',
        [
            'label' => __( 'Display Option', 'wppolitic' ),
        ]
    );   
            $this->add_control(
              'wppolitic_all_item',
              [
                 'label'   => __( 'Show All Item Number', 'wppolitic' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 6,
                 'min'     => 2,
                 'max'     => 1000,
                 'step'    => 1,
              ]
            );
            $this->add_control(
                'wppolitic_item_column',
                [
                    'label' => esc_html__( 'Show Columns', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '3',
                    'options' => [
                        '1' => esc_html__( '1', 'wppolitic' ),
                        '2' => esc_html__( '2', 'wppolitic' ),
                        '3' => esc_html__( '3', 'wppolitic' ),
                        '4' => esc_html__( '4', 'wppolitic' ),
                        '5' => esc_html__( '5', 'wppolitic' ),
                        '6' => esc_html__( '6', 'wppolitic' ),
                    ],
                ]
            ); 
            $this->add_control(
                'wppolitic_item_column_md',
                [
                    'label' => esc_html__( 'Number Of Columns Displayed (Tab)', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '3',
                    'options' => [
                        '1' => esc_html__( '1', 'wppolitic' ),
                        '2' => esc_html__( '2', 'wppolitic' ),
                        '3' => esc_html__( '3', 'wppolitic' ),
                        '4' => esc_html__( '4', 'wppolitic' ),
                    ],
                ]
            );

            $this->add_control(
                'wppolitic_item_column_sm',
                [
                    'label' => esc_html__( 'Number Of Columns Displayed (Large Mobile)', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '2',
                    'options' => [
                        '1' => esc_html__( '1', 'wppolitic' ),
                        '2' => esc_html__( '2', 'wppolitic' ),
                        '3' => esc_html__( '3', 'wppolitic' ),
                        '4' => esc_html__( '4', 'wppolitic' ),
                    ],
                ]
            );
           $this->add_control(
                'wppolitic_item_order',
                [
                    'label' => esc_html__( 'Order By', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'ASC',
                    'options' => [
                        'ASC' => esc_html__( 'Ascending', 'wppolitic' ),
                        'DESC' => esc_html__( 'Descending', 'wppolitic' ),
                    ],
                ]
            );
            $this->add_control(
              'wppolitic_item_gutter',
              [
                 'label'   => __( 'Item Gutter', 'wppolitic' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 20,
                 'min'     => 0,
                 'max'     => 100,
                 'step'    => 1,
              ]
            );
             $this->add_control(
                'show_hide_portfolio_title',
                [
                    'label' => esc_html__( 'Portfolio Title Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            ); 
            $this->add_control(
                'show_hide_portfolio_category',
                [
                    'label' => esc_html__( 'Portfolio Category Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );           
    $this->end_controls_section();
    // End Content section   
    // Item Content section
    $this->start_controls_section(
        'item_option_link',
        [
            'label' => __( 'Link Button Options', 'wppolitic' ),
        ]
    );             

            $this->add_control(
                'icon_show_hide',
                [
                    'label' => esc_html__( 'Link/Popup Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'display_option_type',
                [
                    'label' => esc_html__( 'Select Option', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'popup' => esc_html__( 'Popup', 'wppolitic' ),
                        'link' => esc_html__( 'Link', 'wppolitic' ),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]  
                ]
            );            
            $this->add_control(
                'link_icon_type',
                [
                    'label' => esc_html__( 'Image popup Icon', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'wppolitic' ),
                        'image' => esc_html__( 'Image', 'wppolitic' ),
                        'link_text' => esc_html__( 'Text', 'wppolitic' ),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]  
                ]
            ); 

            $this->add_control(
                'link_btn_text',
                [
                    'label' => __( 'Link Button Text', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'View Details',
                    'title' => __( 'Enter All Button Text', 'wppolitic' ),
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]
                ]
            );


            $this->add_control(
                'link_icon_iamge',
                [
                    'label' => __( 'Icon image', 'wppolitic' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'link_icon_font',
                [
                    'label' => __( 'Icon', 'wppolitic' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-search-plus',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'icon',
                    ]
                ]
            );

            $this->add_control(
                'item_video_option',
                [
                    'label' => __( 'Video Popup Options', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]
                ]
            );
           $this->add_control(
                'video_icon_type',
                [
                    'label' => esc_html__( 'Video popup Icon', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'wppolitic' ),
                        'image' => esc_html__( 'Image', 'wppolitic' ),
                        'vd_text' => esc_html__( 'Text', 'wppolitic' ),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]                    
                ]
            );
            $this->add_control(
                'video_icon_iamge',
                [
                    'label' => __( 'Icon image', 'wppolitic' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'video_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'video_icon_font',
                [
                    'label' => __( 'Icon', 'wppolitic' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-video-camera',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'video_icon_type' => 'icon',
                    ]
                ]
            );
            $this->add_control(
                'video_btn_text',
                [
                    'label' => __( 'Video Button Text', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'View Details',
                    'title' => __( 'Enter All Button Text', 'wppolitic' ),
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]
                ]
            );            

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'item_style',
            [
                'label' => __( 'Filter Menu Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs(
                'style_tabs'
            );

                // Normal style tab
                $this->start_controls_tab(
                    'style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wppolitic' ),
                    ]
                );
                    $this->add_control(
                        'filter_box_style',
                        [
                            'label' => __( 'Filter Box  Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                    $this->add_control(
                        'filter_box_bg_color',
                        [
                            'label' => __( 'Filter Box BG COlor', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'filter_box_border',
                            'label' => __( 'Box Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list',
                        ]
                    ); 
                    $this->add_control(
                        'filter_box_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_padding',
                        [
                            'label' => __( 'Padding', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_margin',
                        [
                            'label' => __( 'Margin', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_alignment',
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
                                '{{WRAPPER}} .wppolitic-filter-menu-list' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );

                    // Filtter Button Style
                    $this->add_control(
                        'filter_style',
                        [
                            'label' => __( 'Filter Button Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_color',
                        [
                            'label' => __( 'Button Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#666',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list button' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_bg_color',
                        [
                            'label' => __( 'Button BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list button' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border',
                            'label' => __( 'Button Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list button',
                        ]
                    ); 
                    $this->add_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_padding',
                        [
                            'label' => __( 'Button Padding', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_margin',
                        [
                            'label' => __( 'Buttio Margin', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography_fillter',
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list button',
                        ]
                    );
                $this->end_controls_tab();

                //Filtter Hover Style tab
                $this->start_controls_tab(
                    'filter_menu_hover_tab',
                    [
                        'label' => __( 'Hover', 'wppolitic' ),
                    ]
                );
                    $this->add_control(
                        'filter_style_hover',
                        [
                            'label' => __( 'Filter Button Hover/Acitive Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_hover_color',
                        [
                            'label' => __( 'Button Hover Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#e03927',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list button:hover, {{WRAPPER}} .wppolitic-filter-menu-list button.is-checked ' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_hover_bg_color',
                        [
                            'label' => __( 'Button Hover BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list button:hover,{{WRAPPER}} .wppolitic-filter-menu-list button.is-checked' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border_hover',
                            'label' => __( 'Button Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list button',
                        ]
                    );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'item_box_filtter_style',
            [
                'label' => __( 'Item Box Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                'style_tabs_item_box'
            );

                // Normal style tab
                $this->start_controls_tab(
                    'item_boxt_normal_tabs',
                    [
                        'label' => __( 'Normal', 'wppolitic' ),
                    ]
                );
                    $this->add_control(
                        'item_box_bg_color',
                        [
                            'label' => __( 'Box Bg Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image::before' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->end_controls_tab();
                // Hover Box tab
                $this->start_controls_tab(
                    'item_box_bg_color_hover',
                    [
                        'label' => __( 'Hover', 'wppolitic' ),
                    ]
                );

                    $this->add_control(
                        'item_box_style_hover',
                        [
                            'label' => __( 'Item Box Hover Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_box_bg_hover_color',
                        [
                            'label' => __( 'Box Bg Hover Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0.4)',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-grid-item:hover .wppolitic-ft_item_image::before' => 'background: {{VALUE}};',
                            ],
                        ]
                    );  
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->end_controls_section();

        // Box tab section
        $this->start_controls_section(
            'item_box_link_style',
            [
                'label' => __( 'Link Icon Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                'style_link_icon_item'
            );

            // Normal style tab
            $this->start_controls_tab(
                'item_link_normal_tabs',
                [
                    'label' => __( 'Normal', 'wppolitic' ),
                ]
            );
                    $this->add_control(
                        'item_icon_style_heading',
                        [
                            'label' => __( 'Item Link Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'item_link_color',
                        [
                            'label' => __( 'Link Icon Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_color',
                        [
                            'label' => __( 'Link Icon BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#e03927',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone',
                            'label' => __( 'Icon Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'icon_width',
                        [
                            'label' => __( 'Icon Width', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => 65,
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'icon_height',
                        [
                            'label' => __( 'Icon Height', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => 65,
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'selector' => '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link',
                        ]
                    );
                    $this->add_responsive_control(
                        'link_button_margin',
                        [
                            'label' => __( 'Margin', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
            $this->end_controls_tab();
            // Link Hover style tab
            $this->start_controls_tab(
                'item_link_tabs_hover',
                [
                    'label' => __( 'Hover', 'wppolitic' ),
                ]
            );
                    $this->add_control(
                        'item_icon_style',
                        [
                            'label' => __( 'Item Link Hover Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'item_link_hover_color',
                        [
                            'label' => __( 'Link Icon Hover Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_hover_color',
                        [
                            'label' => __( 'Link Icon Hover BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#e03927',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone_hover',
                            'label' => __( 'Icon Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link:hover',
                        ]
                    );      
                $this->end_controls_tab();       
            $this->end_controls_tabs();
    $this->end_controls_section();

        // Box Content Tab section
        $this->start_controls_section(
            'item_box_content_style',
            [
                'label' => __( 'Content Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                'style_content_item'
            );

            //Content Normal style tab
            $this->start_controls_tab(
                'item_content_normal_tabs',
                [
                    'label' => __( 'Normal', 'wppolitic' ),
                ]
            );
                    $this->add_control(
                        'category_style',
                        [
                            'label' => __( 'Item Contnet Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'title_link_color',
                        [
                            'label' => __( 'Title Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-cat-wrapper h5 a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'title_typography',
                            'selector' => '{{WRAPPER}} .wppolitic-cat-wrapper h5',
                        ]
                    );
                   
                    $this->add_control(
                        'category_link_color',
                        [
                            'label' => __( 'Category Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-cat-wrapper h6' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'category_typography',
                            'selector' => '{{WRAPPER}} .wppolitic-cat-wrapper h6',
                        ]
                    );
            $this->end_controls_tab();
            // Content Hover style tab
            $this->start_controls_tab(
                'item_content_normal_tabs_hover',
                [
                    'label' => __( 'Hover', 'wppolitic' ),
                ]
            );
                $this->add_control(
                    'title_link_color_hover',
                    [
                        'label' => __( 'Title Hover Color', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'default' =>'#fff',
                        'selectors' => [
                            '{{WRAPPER}} .wppolitic-cat-wrapper h5:hover a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
            $this->end_controls_tab();
            $this->end_controls_tabs();
    $this->end_controls_section();
    }
    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $filter_show_hide        = $this->get_settings_for_display('filter_show_hide');
        $display_option_type      = $this->get_settings_for_display('display_option_type');
        $all_btn_show_hide        = $this->get_settings_for_display('all_btn_show_hide');
        $wppolitic_all_item        = $this->get_settings_for_display('wppolitic_all_item');
        $wppolitic_item_column        = $this->get_settings_for_display('wppolitic_item_column');
        $wppolitic_item_column_md        = $this->get_settings_for_display('wppolitic_item_column_md');
        $wppolitic_item_column_sm        = $this->get_settings_for_display('wppolitic_item_column_sm');
        $wppolitic_item_order        = $this->get_settings_for_display('wppolitic_item_order');
        $wppolitic_item_gutter        = $this->get_settings_for_display('wppolitic_item_gutter');
        $icon_show_hide      = $this->get_settings_for_display('icon_show_hide');
        $show_hide_portfolio_title      = $this->get_settings_for_display('show_hide_portfolio_title');
        $show_hide_portfolio_category      = $this->get_settings_for_display('show_hide_portfolio_category');
        $link_btn_text        = $this->get_settings_for_display('link_btn_text');
        $video_btn_text        = $this->get_settings_for_display('video_btn_text');
        $link_icon_type        = $this->get_settings_for_display('link_icon_type');
        $link_icon_font        = $this->get_settings_for_display('link_icon_font');
        $link_icon_iamge  =   (isset($settings['link_icon_iamge']['url']) ? $settings['link_icon_iamge']['url'] : '');
        $video_icon_type        = $this->get_settings_for_display('video_icon_type');
        $video_icon_font        = $this->get_settings_for_display('video_icon_font');
        $video_icon_iamge  =   (isset($settings['video_icon_iamge']['url']) ? $settings['video_icon_iamge']['url'] : '');
        $sectionid =  $this-> get_id();
        $sectionid ='wid'.$sectionid;


        if($wppolitic_item_gutter > 0){
        $wppolitic_item_gutter = $wppolitic_item_gutter/2;
        }else{
            $wppolitic_item_gutter = 0;
        }

        if( $wppolitic_item_column !='' ){
            $wppolitic_item_column = 100/$wppolitic_item_column;
        }

        if( $wppolitic_item_column_md !='' ){
            $wppolitic_item_column_md = 100/$wppolitic_item_column_md;
        }

        if( $wppolitic_item_column_sm !='' ){
            $wppolitic_item_column_sm = 100/$wppolitic_item_column_sm;
        }

        $args = array(
            'post_type'             => 'wppolitic_portfolio',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $wppolitic_all_item,
        );
        $get_item_categories = $settings['wppolitic_item_categories'];
        $all_btn_text = $settings['all_btn_text'];


        $portfolio_cats = str_replace(' ', '', $get_item_categories);

        if ( "0" != $get_item_categories) {
            if( is_array($portfolio_cats) && count($portfolio_cats) > 0 ){
                $field_name = is_numeric($portfolio_cats[0])?'term_id':'slug';
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'wppolitic_portfolio_cat',
                        'terms' => $portfolio_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }

        ?>
            <div class="filter-area <?php echo esc_attr( $sectionid );?>">
                <?php if($filter_show_hide=='yes'){ ?>
                    <div class="wppolitic-filter-menu-list <?php echo esc_attr( $sectionid );?>">
                        <?php  if($all_btn_show_hide=='yes'){ ?>
                            <button class="is-checked " data-filter="*"><?php  echo  esc_html($all_btn_text); ?></button>
                        <?php } ?>
                        <?php  if($get_item_categories) { 

                        foreach( $get_item_categories as $selected_categorys_array_single ): ?>
                        <?php $catagories_name = str_replace('-', ' ', $selected_categorys_array_single);?>
                        <button data-filter=".<?php echo  esc_attr( $selected_categorys_array_single ); ?>"><?php echo esc_html( $catagories_name ); ?></button>
                        <?php endforeach; } ?>
                    </div>
                <?php } ?>
                <div class="ft_item-style">
                    <div class="all_item_wrapper grid-active <?php echo esc_attr( $sectionid );?>">
                        <?php 
                            $args = new \WP_Query(array(
                                'post_type'  => 'wppolitic_portfolio',
                                'posts_per_page' =>$wppolitic_all_item,
                                'wppolitic_portfolio_cat' => $get_item_categories,
                                'order' => $wppolitic_item_order,
                            ));
                            while($args->have_posts()):$args->the_post();
                            $terms = get_the_terms(get_the_id(),'wppolitic_portfolio_cat');
                            $popup_video = get_post_meta( get_the_ID(),'_wppolitic_por_video', true ); 
                         $full_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()),'full',true); 

                        ?>
                        <div class="wppolitic-filter_item_box wppolitic-grid-item <?php if( $terms ){  foreach($terms as $term ){ echo $term->slug .' ';} } ?>">
                            <?php if(has_post_thumbnail() ){?>  
                            <div class="wppolitic-ft_item_image">

                               <?php if($icon_show_hide != 'yes' || $show_hide_portfolio_title != 'yes' || $show_hide_portfolio_category != 'yes'){ ?>
                                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail();?> </a> <?php }else{ the_post_thumbnail(); }?>

                                <?php if( $show_hide_portfolio_title == 'yes' || 
                                    $show_hide_portfolio_category == 'yes' || $icon_show_hide == 'yes'  ){?>

                                  <div class="wppolitic-cat-wrapper">
                                <?php if( $show_hide_portfolio_title == 'yes' || $show_hide_portfolio_category == 'yes'|| $icon_show_hide == 'yes' ){ ?>
                                        <div class="wppolitic_filter_content">
                                            <?php if( $show_hide_portfolio_title == 'yes'){?>
                                            <h5>
                                            <a href="<?php the_permalink(); ?>"><?php the_title();
                                             ?></a>
                                            </h5>
                                            <?php } ?>
                                            <?php if( $terms && $show_hide_portfolio_category == 'yes'){
                                            foreach( $terms as $single_slugs ){?>
                                                <h6>
                                                   <?php echo $single_slugs->name ;?>
                                                </h6>
                                            <?php }} 
                                            ?>
                                        </div>

                                <?php } 

                                 if($icon_show_hide == 'yes'){   
                                    if( $popup_video !=''){
                                 ?>
                                 <a class="icon_link various fancybox.iframe?" href="<?php echo esc_url( $popup_video ) ; ?>">
                                    <?php
                                        if( $video_icon_type == 'image' ){
                                           ?>
                                            <img src="<?php echo $video_icon_iamge; ?>" alt="" />
                                            <?php
                                        }elseif( $video_icon_type == 'icon' ){
                                            \Elementor\Icons_Manager::render_icon( $settings['video_icon_font'], [ 'aria-hidden' => 'true' ] );
                                        }else{
                                            echo $video_btn_text;
                                        }
                                    ?>
                                </a>
                                <?php //the_post_thumbnail();?>
                                <?php  } else{ ?>

                                <?php if( $display_option_type == 'yes' ){ ?>
                                <a class="icon_link"  data-fancybox="wppolitic_pro_popup"  href="<?php echo esc_url( $full_image[0] ) ; ?>">
                                <?php } else{?> <a  class="icon_link" href="<?php the_permalink(); ?>"><?php } ?>



                                    <?php 
                                        if( $link_icon_type == 'image' ){
                                           ?>
                                            <img src="<?php echo $link_icon_iamge; ?>" alt="" />
                                            <?php
                                        }elseif($link_icon_type == 'icon'){
                                            \Elementor\Icons_Manager::render_icon( $settings['link_icon_font'], [ 'aria-hidden' => 'true' ] );
                                        }else{

                                            echo $link_btn_text;
                                        }
                                        ?>
                                </a>
                                <?php //the_post_thumbnail();?>
                                <?php } }?>
                                </div>
                                 <?php }?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php endwhile; 
                        ?>
                    </div>
                </div>
            </div>

    <style>
    <?php if($wppolitic_item_gutter >=0){ ?>
      .<?php echo esc_attr( $sectionid );?>.all_item_wrapper{
            margin: -<?php echo esc_attr( $wppolitic_item_gutter ) ?>px;
        }
         .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
            padding:<?php echo esc_attr( $wppolitic_item_gutter ) ?>px;
        }
        <?php } ?>
         .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
            width:<?php echo esc_attr( $wppolitic_item_column )?>%;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
                width:<?php echo esc_attr( $wppolitic_item_column_md ) ?>%;
            }
        }
        @media (max-width: 767px) {
            .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
                width:<?php echo esc_attr( $wppolitic_item_column_sm ) ?>%;
            }
        }
        @media (max-width: 575px) {
           .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
                width: 100%;
            }
        }    
    </style>

        <script type="text/javascript">
        
            jQuery(document).ready(function($) {

                // images have loaded
                $('.filter-area.<?php echo esc_attr( $sectionid );?>').imagesLoaded( function() {

                  // Isotop Active
                  $('.wppolitic-filter-menu-list.<?php echo esc_attr( $sectionid );?>').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                  });

                  // Isotop Full Grid
                  var $grid = $('.grid-active.<?php echo esc_attr( $sectionid );?>').isotope({
                    itemSelector: '.wppolitic-grid-item',
                    percentPosition: true,
                    masonry: {
                    columnWidth: 1
                    }
                  });
                  // Isotop Menu Active
                  $('.wppolitic-filter-menu-list button').on('click', function(event) {
                        $(this).siblings('.is-checked').removeClass('is-checked');
                        $(this).addClass('is-checked');
                        event.preventDefault();
                    });
                  // Image Popup Fancy Active
                  $(".wppolitic_pro_popup").fancybox();

                    $(".various").fancybox({
                        maxWidth    : 800,
                        maxHeight   : 600,
                        fitToView   : false,
                        width       : '70%',
                        height      : '70%',
                        autoSize    : false,
                        closeClick  : false,
                        openEffect  : 'none',
                        closeEffect : 'none'
                    });
                });
                
            });

        </script>

        <?php

    }


}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Portfolio() );