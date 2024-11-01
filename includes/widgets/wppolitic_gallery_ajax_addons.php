<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class WPPolitic_Elementor_Widget_Gallery_Ajax extends Widget_Base {

    public function get_name() {
        return 'wppolitic-gallery-ajax-addons';
    }
    
    public function get_title() {
        return __( 'WP Politic : Gallery Ajax', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-gallery-justified';
    }

    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'wppolitic-gallery',
            [
                'label' => esc_html__( 'Gallery', 'wppolitic' ),
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
                'filter_btn_divider',
                [
                    'label' => __( 'Filtter Divider Text', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Enter text or font', 'wppolitic' ),
                    'condition' => [
                        'filter_show_hide' => 'yes',
                    ]
                ]
            );                                
            $this->add_control(
                'wppolitic_item_categories',
                [
                    'label' => esc_html__( 'Select Item Category', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wppolitic_gallery_categories(),
                ]
            );
            $this->add_control(
                'wppolitic_item_categories_active',
                [
                    'label' => esc_html__( 'Select Active Category', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => false,
                    'options' => wppolitic_gallery_categories(),
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

            $this->add_control(
                'item_title',
                [
                    'label' => __( 'Item Options', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
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
                    'label' => esc_html__( 'Show Column(Tab)', 'wppolitic' ),
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
                    'label' => esc_html__( 'Show Column (Large Mobile)', 'wppolitic' ),
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
                'wppolitic_item_column_xm',
                [
                    'label' => esc_html__( 'Show Column (Mobile)', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( '1', 'wppolitic' ),
                        '2' => esc_html__( '2', 'wppolitic' ),
                        '3' => esc_html__( '3', 'wppolitic' ),
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
                'item_icone_option',
                [
                    'label' => __( 'Icon Options', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
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
                'link_icon_type',
                [
                    'label' => esc_html__( 'Image popup Icon', 'wppolitic' ),
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
                'video_icon_type',
                [
                    'label' => esc_html__( 'Video popup Icon', 'wppolitic' ),
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
                'show_hide_gallery_title',
                [
                    'label' => esc_html__( 'Gallery Title Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            ); 
            $this->add_control(
                'show_hide_load_more_text',
                [
                    'label' => esc_html__( 'Load More Button Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            ); 
            $this->add_control(
                'load_more_text',
                [
                    'label' => __( 'Load More Text', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Load More',
                    'title' => __( 'Enter Load More Button Text', 'wppolitic' ),
                    'condition' => [
                        'show_hide_load_more_text' => 'yes',
                    ]
                ]
            );            
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'item_style',
            [
                'label' => __( 'Style', 'wppolitic' ),
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
                            'separator' => 'after',
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_color',
                        [
                            'label' => __( 'Button Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#666',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list span' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .wppolitic-filter-menu-list span' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border',
                            'label' => __( 'Button Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list span',
                        ]
                    ); 
                    $this->add_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .wppolitic-filter-menu-list span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_margin',
                        [
                            'label' => __( 'Buttion Margin', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography_fillter',
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list span',
                        ]
                    );
                    
                    // Filtter Button Divider Style
                    $this->add_control(
                        'filter_divider_style',
                        [
                            'label' => __( 'Filtter Divider Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'after',
                            'condition' => [
                                'filter_show_hide' => 'yes',
                            ]
                        ]
                    );
                    $this->add_control(
                        'filter_divider_color',
                        [
                            'label' => __( 'Divider Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list span:not(:last-child):after' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'filter_show_hide' => 'yes',
                            ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'filter_divider_typography',
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list span:not(:last-child):after',
                            'condition' => [
                                'filter_show_hide' => 'yes',
                            ]

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_divider_margin',
                        [
                            'label' => __( 'Divider Margin', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list span:not(:last-child):after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                
                            ],
                            'condition' => [
                                'filter_show_hide' => 'yes',
                            ]
                        ]
                    );                    
                    $this->add_control(
                        'item_box_style',
                        [
                            'label' => __( 'Item Box Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'separator'=>'after',
                        ]
                    );
                    $this->add_control(
                        'item_box_bg_color',
                        [
                            'label' => __( 'Box Bg Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image2::before' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'item_box_border',
                            'label' => __( 'Item Box Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-ft_item_image2',
                        ]
                    ); 

                    $this->add_control(
                        'item_icon_style_heading',
                        [
                            'label' => __( 'Item Link Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'after',
                        ]
                    );                    
                    $this->add_control(
                        'item_link_color',
                        [
                            'label' => __( 'Link Icon Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_color',
                        [
                            'label' => __( 'Link Icon BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#ea000d',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone',
                            'label' => __( 'Icon Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link' => 'width: {{VALUE}}px;',
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
                                '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'selector' => '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link',
                            'separator'=>'after',
                        ]
                    );

                    $this->add_control(
                        'loadmore_style',
                        [
                            'label' => __( 'Load More Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'separator'=>'after',
                        ]
                    );                    
                    $this->add_control(
                        'load_more_bg',
                        [
                            'label' => __( 'Load More BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} #loadMore' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'load_more_hvr_color',
                        [
                            'label' => __( 'Load More Hover BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#ea000d',
                            'selectors' => [
                                '{{WRAPPER}} #loadMore:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'load_more_text_color',
                        [
                            'label' => __( 'Load More Text Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} #loadMore' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'load_more_text_hover',
                        [
                            'label' => __( 'Load More Text Hover Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} #loadMore:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'load_more_text_border',
                            'label' => __( 'Box Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} #loadMore',
                        ]
                    ); 
                    $this->add_control(
                        'load_more_text_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} #loadMore' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'load_more',
                            'selector' => '{{WRAPPER}} #loadMore',
                        ]
                    );
                    $this->add_control(
                        'caption_style',
                        [
                            'label' => __( 'Title/Caption Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'separator'=>'before',
                            'condition' => [
                                'show_hide_gallery_title' => 'yes',
                            ]
                        ]
                    ); 
                    $this->add_control(
                        'caption_text_color',
                        [
                            'label' => __( 'Text Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} span.wppolitic-gallery-title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'show_hide_gallery_title' => 'yes',
                            ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'caption_typography',
                            'selector' => '{{WRAPPER}} span.wppolitic-gallery-title',
                            'condition' => [
                                'show_hide_gallery_title' => 'yes',
                            ]
                        ]
                    ); 
                    $this->add_responsive_control(
                        'caption_margin',
                        [
                            'label' => __( 'Margin', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} span.wppolitic-gallery-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                
                            ],
                            'condition' => [
                                'show_hide_gallery_title' => 'yes',
                            ]
                        ]
                    );
                    $this->add_responsive_control(
                        'caption_alignment',
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
                            'default' => 'left',
                            'selectors' => [
                                '{{WRAPPER}} span.wppolitic-gallery-title' => 'text-align: {{VALUE}};',
                            ],
                            'condition' => [
                                'show_hide_gallery_title' => 'yes',
                            ]
                        ]
                    );                                                                              
                $this->end_controls_tab();

                // Hover Style tab
                $this->start_controls_tab(
                    'style_hover_tab',
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
                            'default' =>'#ea000d',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-filter-menu-list span:hover, {{WRAPPER}} .wppolitic-filter-menu-list span.is-checked ' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .wppolitic-filter-menu-list span:hover,{{WRAPPER}} .wppolitic-filter-menu-list span.is-checked' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border_hover',
                            'label' => __( 'Button Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list span:hover,{{WRAPPER}} .wppolitic-filter-menu-list span.is-checked',
                        ]
                    ); 

                    $this->add_control(
                        'item_box_style_hover',
                        [
                            'label' => __( 'Item Box Hover Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'after',
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
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'item_box_border_hover',
                            'label' => __( 'Item Box Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-grid-item:hover .wppolitic-ft_item_image',
                        ]
                    ); 
                    $this->add_control(
                        'item_icon_style',
                        [
                            'label' => __( 'Item Link Hover Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'after',
                        ]
                    );                    
                    $this->add_control(
                        'item_link_hover_color',
                        [
                            'label' => __( 'Link Icon Hover Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_hover_color',
                        [
                            'label' => __( 'Link Icon Hover BG Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#ea000d',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone_hover',
                            'label' => __( 'Icon Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-ft_item_image2 a.icon_link:hover',
                        ]
                    ); 

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();
    }
    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $filter_show_hide        = $this->get_settings_for_display('filter_show_hide');
        $filter_btn_divider        = $this->get_settings_for_display('filter_btn_divider');
        $all_btn_show_hide        = $this->get_settings_for_display('all_btn_show_hide');
        $wppolitic_all_item        = $this->get_settings_for_display('wppolitic_all_item');
        $wppolitic_item_column        = $this->get_settings_for_display('wppolitic_item_column');
        $wppolitic_item_column_md        = $this->get_settings_for_display('wppolitic_item_column_md');
        $wppolitic_item_column_sm        = $this->get_settings_for_display('wppolitic_item_column_sm');
        $wppolitic_item_column_xm        = $this->get_settings_for_display('wppolitic_item_column_xm');
        $wppolitic_item_gutter        = $this->get_settings_for_display('wppolitic_item_gutter');
        $icon_show_hide      = $this->get_settings_for_display('icon_show_hide');
        $show_hide_load_more_text      = $this->get_settings_for_display('show_hide_load_more_text');
        $show_hide_gallery_title      = $this->get_settings_for_display('show_hide_gallery_title');
        $load_more_text      = $this->get_settings_for_display('load_more_text');
        $link_icon_type        = $this->get_settings_for_display('link_icon_type');
        $link_icon_font        = $this->get_settings_for_display('link_icon_font');
        $link_icon_iamge  =   (isset($settings['link_icon_iamge']['url']) ? $settings['link_icon_iamge']['url'] : '');
        $link_icon_image ='<img src="' . esc_url( $link_icon_iamge ) . '" alt="wppolitic" />';

        if($link_icon_type == 'icon'){
        $print_link_icon =  WPPolitic_Icon_manager::render_icon( $settings['link_icon_font'], [ 'aria-hidden' => 'true' ] );
            }else{
            $print_link_icon = $link_icon_image;
            }

        $video_icon_iamge  =   (isset($settings['video_icon_iamge']['url']) ? $settings['video_icon_iamge']['url'] : '');
        $video_icon_type        = $this->get_settings_for_display('video_icon_type');
        $video_icon_font        = $this->get_settings_for_display('video_icon_font');
        $video_icon_iamge  =   (isset($settings['video_icon_iamge']['url']) ? $settings['video_icon_iamge']['url'] : '');

        $video_icon_iamge ='<img src="' . esc_url( $video_icon_iamge ) . '" alt="wppolitic" />';

        if($video_icon_type == 'icon'){
        $print_video_icon =  WPPolitic_Icon_manager::render_icon( $settings['video_icon_font'], [ 'aria-hidden' => 'true' ] );
            }else{
            $print_video_icon = $video_icon_iamge;
            }

        $sectionid =  $this-> get_id();
        $sectionid = 'wid'.$sectionid;

        $wppolitic_item_categories_active = $settings['wppolitic_item_categories_active'];

        if($wppolitic_item_gutter==''||$wppolitic_item_gutter==0 ){
            $wppolitic_item_gutter=0;
        }else{
        $wppolitic_item_gutter = $wppolitic_item_gutter/2;
        }
        if( $wppolitic_item_column !='' ){
            $wppolitic_item_column = 100/$wppolitic_item_column;
        }

        if( $wppolitic_item_column_md !='' ){
            $wppolitic_item_column_md = 100/$wppolitic_item_column_md;
        }

        if( $wppolitic_item_column_sm !='' ){
            (float)$wppolitic_item_column_sm = 100/$wppolitic_item_column_sm;
        }
        if( $wppolitic_item_column_xm !='' ){
            (float)$wppolitic_item_column_xm = 100/$wppolitic_item_column_xm;
        }

        $get_item_categories = $settings['wppolitic_item_categories'];
        $all_btn_text = $settings['all_btn_text'];


        if(!empty($wppolitic_item_categories_active)){
            $term2 = get_term_by('slug', $wppolitic_item_categories_active, 'wppolitic_gallery_cat');
            $catagories_id = $term2->term_id;
        }else{
            $catagories_id = 'all';
        }
        ?>
            <div class="filter-area wplolitic_gallery_ars">
                <?php if($filter_show_hide=='yes'){ 

                    ?>
                   <div class="wppolitic-filter-menu-list <?php echo esc_attr( $sectionid );?>">
                        <?php  if($all_btn_show_hide=='yes'){ ?>
                            <span class="categoryname <?php if(empty($wppolitic_item_categories_active)){echo  'is-checked';} ?>" id="all"> <?php  echo  esc_html($all_btn_text); ?>  </span>
                        <?php } ?>

                        <?php  if($get_item_categories) { 

                        foreach( $get_item_categories as $selected_categorys_array_single ): 
                            $term = get_term_by('slug', $selected_categorys_array_single, 'wppolitic_gallery_cat');
                            $catagories_name = $term->name;
                        ?>

                    <span class="categoryname <?php if(!empty($wppolitic_item_categories_active) && $selected_categorys_array_single == $wppolitic_item_categories_active){ echo "is-checked "; } ?> " id="<?php echo esc_attr( $term->term_id ); ?>"> <?php echo esc_html( $catagories_name ); ?>  </span>

                        <?php endforeach; } ?>

                    </div>
                <?php } ?>
                <!-- Gallery Content -->
                <div class="ft_item-style <?php echo esc_attr( $sectionid );?>">
                    <div id="response" class="wppolitic_all_item_wrapper2 <?php echo esc_attr( $sectionid ); ?>">
                        
                        <div class="loading_text"> <img src="<?php echo esc_url( WPPOLITIC_ADDONS_PL_URL . 'assets/images/preloader.gif' ); ?>" alt="loader"></div>

                    </div>

                    <?php if($show_hide_load_more_text == 'yes' && $load_more_text !=''){  ?>
                    <div class="loadmore_button">
                        <a href="#" id="loadMore"><?php echo wp_kses_post( $load_more_text ); ?></a>
                    </div>

                    <?php } ?>
                    
                </div>
            </div>

    <style>

  <?php if(!empty( $filter_btn_divider )) { ?>
  /* New Style Filtter divider */
  .<?php echo $sectionid; ?>.wppolitic-filter-menu-list span:not(:last-child):after {
    content: "<?php echo $filter_btn_divider; ?>";
    font-size: 10px;
    margin: 0 9px;
    }
<?php } ?>


    <?php if($wppolitic_item_gutter >=0){ ?>
      .<?php echo esc_attr( $sectionid );?>.wppolitic_all_item_wrapper2{
            margin: -<?php echo esc_attr( $wppolitic_item_gutter ); ?>px;
        }
         .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box2{
            padding:<?php echo esc_attr( $wppolitic_item_gutter ); ?>px;
        }
        <?php } ?>

         .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box2{
            width:<?php echo esc_attr( $wppolitic_item_column ); ?>%;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box2{
                width:<?php echo esc_attr( $wppolitic_item_column_md ); ?>%;
            }
        }
        @media (max-width: 767px) {
           .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box2{
                width:<?php echo esc_attr( $wppolitic_item_column_sm ); ?>%;
            }
        }
        
        @media (max-width: 575px) {
            .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box2{
                width:<?php echo esc_attr( $wppolitic_item_column_xm ); ?>%;
            }
        }

    </style>

        <script type="text/javascript">
        
            jQuery(document).ready(function($) {

                 $('.wppolitic-filter-menu-list.<?php echo esc_attr( $sectionid );?> span').on('click', function(event) {

                        $(this).siblings('.is-checked').removeClass('is-checked');
                        $(this).addClass('is-checked');
                        event.preventDefault();
                    });

                // images have loaded
                $('.wppolitic_all_item_wrapper2.<?php echo esc_attr( $sectionid );?>').imagesLoaded( function() {
                  // Image Popup Fancy Active
                  $(".wppolitc_popup").fancybox();

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

        var catagories_ids = "<?php echo $catagories_id; ?>";

        ajax_contentd(catagories_ids);

        $('.<?php echo esc_attr( $sectionid );?> .categoryname').on('click', function() {

            var gid = $(this).attr('id');
            ajax_contentd(gid);
            });

            function ajax_contentd(gid){

                var wppolitic_all_item = '<?php echo $wppolitic_all_item; ?>';


               $.ajax({

                    url:"<?php echo site_url() .'/wp-admin/admin-ajax.php'; ?>",

                    data:{ categoryid:gid, action:'myfilter', nonce: <?php echo wp_create_nonce('wp_politic_nonce'); ?>},// form data
                    method : 'POST',
                    beforeSend:function(xhr){
                        $('.loading_text').css("display", "block");  //preloader
                    },
                    success:function(data){

                        var obj = JSON.parse(data);
                        var titles='';
                        obj.forEach(myFunction);
                        
                        if(titles != ''){$('#response.<?php echo esc_attr( $sectionid );?>').html(titles);}
                        
                        titles = '';
                        function myFunction(item, index) {
                            var _icon_show_hide = <?php echo esc_js( $icon_show_hide ) == 'yes' ? 'true': 'false'; ?>;
                            var icon = '<?php echo $print_video_icon; ?>';
                            var font_icon = '<?php echo $print_link_icon; ?>';
                            var show_hide_gallery_title = '<?php echo $show_hide_gallery_title; ?>';
                            var galleryTitle = '';
                            if( 'yes' == show_hide_gallery_title ){
                                galleryTitle = '<span class ="wppolitic-gallery-title">'+item.title+'</span>';
                            }
                            
                            if(item.popup_video !=''){

                                if(_icon_show_hide ==true){

                                titles += '<div class="wppolitic-filter_item_box2"><div class="wppolitic-ft_item_image2"><a class="icon_link" data-fancybox="wppolitc_popup" data-caption="Morning Godafoss (Brads5)" href="'+ item.popup_video +'">'+icon+'</a><img src="'+ item.img[0] +'" alt="">'+ galleryTitle +'</div></div>';
                                }else{

                                    titles += '<div class="wppolitic-filter_item_box2"><div class="wppolitic-ft_item_image2"><a class="icon_lnk" data-fancybox="wppolitc_popup"  data-caption="Morning Godafoss (Brads5)" href="'+ item.popup_video +'"><img src="'+ item.img[0] +'" alt=""></a>'+ galleryTitle +'</div></div>';
                                }

                            }else{

                                    if(_icon_show_hide == true ){

                                        titles += '<div class="wppolitic-filter_item_box2"><div class="wppolitic-ft_item_image2"><a class="icon_link" data-fancybox="wppolitc_popup"  data-caption="Morning Godafoss (Brads5)" href="'+ item.img[0] +'">'+font_icon+'</a><img src="'+ item.img[0] +'" alt="image">'+ galleryTitle +'</div></div>';
                                    }else{
                                        titles += '<div class="wppolitic-filter_item_box2"><div class="wppolitic-ft_item_image2"><a class="ico_link" data-fancybox="wppolitc_popup"  data-caption="Morning Godafoss (Brads5)" href="'+ item.img[0] +'"><img src="'+ item.img[0] +'" alt="image"></a>'+ galleryTitle +'</div></div>';
                                    }
                            }

                        } // loop function end

                        //load more controll
                        $(".<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box2").slice(0, wppolitic_all_item).css("display", "block");

                        if ($(".<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box2:hidden").length != 0) {
                            $(".<?php echo esc_attr( $sectionid );?> .loadmore_button").css("display", "block");
                        }else{
                            $(".<?php echo esc_attr( $sectionid );?> .loadmore_button").css("display", "none");
                        } 
                        $(".<?php echo esc_attr( $sectionid );?> #loadMore").on('click', function (e) {
                            e.preventDefault();
                            $(".<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box2:hidden").slice(0, wppolitic_all_item).slideDown();
                            if ($(".<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box2:hidden").length == 0) {
                            $(".<?php echo esc_attr( $sectionid );?> .loadmore_button").fadeOut('slow');
                            }
                        });
                        //load more controll End
                    }
                });
                return false;
            }

            });

        </script>

        <?php
    }
}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Gallery_Ajax() );