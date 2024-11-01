<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class WPPolitic_Elementor_Widget_Gallery extends Widget_Base {


    public function get_name() {
        return 'wppolitic-gallery-addons';
    }
    
    public function get_title() {
        return __( 'WP Politic : Gallery', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
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
                'wppolitic_item_order',
                [
                    'label' => esc_html__( 'Order By', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'recent-products',
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

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'wppolitic_gallery_image',
                    'default' => 'large',
                    'separator' => 'none',
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
                'show_hide_gallery_title',
                [
                    'label' => esc_html__( 'Gallery Title Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
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
                'popup_option_type',
                [
                    'label' => esc_html__( 'Select Link/Popup option', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'popup',
                    'options' => [
                        'pagelink' => esc_html__( 'Page link', 'wppolitic' ),
                        'popup' => esc_html__( 'Pop Up', 'wppolitic' ),
                    ],                 
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
                            'label' => __( 'Buttion Margin', 'wppolitic' ),
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
                                '{{WRAPPER}} .wppolitic-filter-menu-list button:not(:last-child):after' => 'color: {{VALUE}};',
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
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list button:not(:last-child):after',
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
                                '{{WRAPPER}} .wppolitic-filter-menu-list button:not(:last-child):after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                
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
                            'separator' => 'after',
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
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'item_box_border',
                            'label' => __( 'Item Box Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic-ft_item_image',
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
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link' => 'color: {{VALUE}};',
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

                    $this->add_control(
                        'category_style',
                        [
                            'label' => __( 'Item Category Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'after',
                        ]
                    );                    
                    $this->add_control(
                        'category_link_color',
                        [
                            'label' => __( 'Category Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-cat-wrapper,.wppolitic-cat-wrapper > a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'category_link_hvr_color',
                        [
                            'label' => __( 'Category Hover Color', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#ea000d',
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic-cat-wrapper > a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'category_typography',
                            'selector' => '{{WRAPPER}} .wppolitic-cat-wrapper,.wppolitic-cat-wrapper > a',
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
                            'selector' => '{{WRAPPER}} .wppolitic-filter-menu-list button:hover,{{WRAPPER}} .wppolitic-filter-menu-list button.is-checked',
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
                                '{{WRAPPER}} .wppolitic-ft_item_image a.icon_link:hover' => 'color: {{VALUE}};',
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
        $wppolitic_item_order        = $this->get_settings_for_display('wppolitic_item_order');
        $wppolitic_item_gutter        = $this->get_settings_for_display('wppolitic_item_gutter');
        $icon_show_hide      = $this->get_settings_for_display('icon_show_hide');
        $show_hide_gallery_title      = $this->get_settings_for_display('show_hide_gallery_title');
        $link_icon_type        = $this->get_settings_for_display('link_icon_type');
        $link_icon_font        = $this->get_settings_for_display('link_icon_font');
        $video_icon_iamge  =   (isset($settings['video_icon_iamge']['url']) ? $settings['video_icon_iamge']['url'] : '');
        $video_icon_type        = $this->get_settings_for_display('video_icon_type');
        $video_icon_font        = $this->get_settings_for_display('video_icon_font');
        $video_icon_iamge  =   (isset($settings['video_icon_iamge']['url']) ? $settings['video_icon_iamge']['url'] : '');
        $sectionid =  $this-> get_id();
        $sectionid = 'wid'.$sectionid;

         $wppolitic_gallery_image  = $this->get_settings_for_display('wppolitic_gallery_image_size');
        $wppolitic_item_categories_active = $settings['wppolitic_item_categories_active'];
        $popup_option_type = $settings['popup_option_type'];

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

        $args = array(
            'post_type'             => 'wppolitic_gallery',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $wppolitic_all_item,
        );
        $get_item_categories = $settings['wppolitic_item_categories'];
        $all_btn_text = $settings['all_btn_text'];

        ?>
            <div class="filter-area wplolitic_gallery_ars">
                <?php if($filter_show_hide=='yes'){ ?>
                    

                   <div class="wppolitic-filter-menu-list <?php echo esc_attr( $sectionid );?>">
                        <?php  if($all_btn_show_hide=='yes'){ ?>
                            <button <?php if(empty($wppolitic_item_categories_active)){echo  'class="is-checked"'; } ?> data-filter="*"><?php  echo  esc_html($all_btn_text); ?></button>
                        <?php } ?>

                        <?php  if($get_item_categories) { 

                        foreach( $get_item_categories as $selected_categorys_array_single ): 
                            $term = get_term_by('slug', $selected_categorys_array_single, 'wppolitic_gallery_cat');
                            $catagories_id = $term->term_id;
                            $catagories_name = $term->name;
                        ?>

                        <button  <?php if(!empty($wppolitic_item_categories_active) && $selected_categorys_array_single == $wppolitic_item_categories_active){echo  'class="is-checked"'; } ?> data-filter=".<?php echo strval($catagories_id); ?>"><?php echo esc_html( $catagories_name ); ?></button>
                        <?php endforeach; } ?>

                    </div>
                <?php } ?>
                <!-- Gallery Content -->
                <div class="ft_item-style">
                        <div class="wppolitic_all_item_wrapper grid-active <?php echo esc_attr( $sectionid );?>">

                        <?php 
                            $args = new \WP_Query(array(
                                'post_type'  => 'wppolitic_gallery',
                                'posts_per_page' =>$wppolitic_all_item,
                                'wppolitic_gallery_cat' => $get_item_categories,
                                'order' => $wppolitic_item_order,
                            ));
                            while($args->have_posts()):$args->the_post();
                            $terms = get_the_terms(get_the_id(),'wppolitic_gallery_cat');
                            $popup_video = get_post_meta( get_the_ID(),'_wppolitic_wppolitic_gallery_video', true ); 
                            $full_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()),'full',true); 

                        ?>

                        <div class="wppolitic-filter_item_box wppolitic-grid-item <?php if( $terms ){  foreach($terms as $term ){ echo strval($term->term_id) .' ';} } ?>">
                            <?php if(has_post_thumbnail() ){ ?>  
                            <div class="wppolitic-ft_item_image">
                                <?php if($icon_show_hide == 'yes'){   
                                    $video_uniqe_id = get_the_ID() . 'self_video_id';
                                    if( $popup_video !=''){   
                                        $popup_video_type = '';
                                        // check if the video is .mp4, webm,ogv 
                                        if(strpos($popup_video, '.mp4') !== false) {
                                            $popup_video_type = 'video/mp4';
                                        }
                                        elseif(strpos($popup_video, '.webm') !== false) {
                                            $popup_video_type = 'video/webm';
                                        }
                                        elseif(strpos($popup_video, '.ogv') !== false) {
                                            $popup_video_type = 'video/ogv';
                                        }

                                        if($popup_video_type){
                                            ?>
                                            <a class="icon_link" data-fancybox="wppolitc_popup" href=<?php esc_attr_e( '#' . $video_uniqe_id ) ?>> 
                                                <?php
                                                    if( $video_icon_type == 'image' ){
                                                    ?>
                                                        <img src="<?php echo esc_url( $video_icon_iamge ); ?>" alt="<?php echo esc_attr('wppolitic'); ?>" />
                                                        <?php
                                                    }else{
                                                        \Elementor\Icons_Manager::render_icon( $settings['video_icon_font'], [ 'aria-hidden' => 'true' ] );
                                                    }
                                                ?>
                                            </a>
                                            <!-- Selft hostetd video -->
                                                <video controls id="<?php esc_attr_e( $video_uniqe_id ) ?>" style="display:none;" class="wppolitic-selfhosted-video-wrapper">
                                                    <source src="<?php echo esc_url( $popup_video ); ?>" type="<?php echo esc_attr( $popup_video_type ) ; ?>">
                                                </video>
                                            <?php
                                        } else {
                                            ?>

                                            <a class="icon_link various fancybox.iframe?" href="<?php echo esc_url( $popup_video ) ; ?>"> 
                                                <?php
                                                    if( $video_icon_type == 'image' ){
                                                    ?>
                                                        <img src="<?php echo esc_url( $video_icon_iamge ); ?>" alt="<?php echo esc_attr('wppolitic'); ?>" />
                                                        <?php
                                                    }else{
                                                        \Elementor\Icons_Manager::render_icon( $settings['video_icon_font'], [ 'aria-hidden' => 'true' ] );
                                                    }
                                                ?>
                                            </a>
                                            <?php
                                        }

                                 ?>


                                <?php the_post_thumbnail( $wppolitic_gallery_image );?>
                                <?php  } else{ 

                                    if($popup_option_type =='popup' ){      
                                 ?>
                                 <a class="icon_link"  data-fancybox="wppolitc_popup"  href="<?php echo esc_url( $full_image[0] ) ; ?>">
                                 <?php
                                  }else{
                                      ?>
                                    <a class="icon_link" target="_blank" href="<?php the_permalink() ?>"> 
                                <?php
                                  }
                                        if( $link_icon_type == 'image' ){
                                           ?>
                                            <img src="<?php echo esc_url( $settings['link_icon_iamge']['url'] ); ?>" alt="<?php echo esc_attr('wppolitic'); ?>" />
                                            <?php
                                        }else{
                                            \Elementor\Icons_Manager::render_icon( $settings['link_icon_font'], [ 'aria-hidden' => 'true' ] );
                                        }
                                    ?>
                                </a>
                                <?php the_post_thumbnail( $wppolitic_gallery_image ); ?>
                                <?php } }else{ 


                                    if($popup_option_type =='popup' ){      
                                 ?>
                                 <a  data-fancybox="wppolitc_popup"  href="<?php echo esc_url( $full_image[0] ) ; ?>">
                                 <?php
                                  }else{
                                      ?>
                                    <a target="_blank" href="<?php the_permalink() ?>"> 
                                <?php
                                  }
                               ?>
                                
                                
                                <?php the_post_thumbnail( $wppolitic_gallery_image );?> </a> <?php } ?>
                                <?php if( $show_hide_gallery_title == 'yes' ){ ?>
                                    <span class="wppolitic-cat-wrapper">
                                        <?php the_title();
                                         ?>
                                    </span>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

    <style>

  <?php if(!empty( $filter_btn_divider )) { ?>
  /* New Style Filtter divider */
  .<?php echo esc_attr( $sectionid ); ?>.wppolitic-filter-menu-list button:not(:last-child):after {
    content: "<?php echo esc_html( $filter_btn_divider ); ?>";
    font-size: 10px;
    margin: 0 9px;
    }
<?php } ?>


    <?php if($wppolitic_item_gutter >=0){ ?>
      .<?php echo esc_attr( $sectionid );?>.wppolitic_all_item_wrapper{
            margin: -<?php echo esc_attr( $wppolitic_item_gutter ); ?>px;
        }
         .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
            padding:<?php echo esc_attr( $wppolitic_item_gutter ); ?>px;
        }
        <?php } ?>

         .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
            width:<?php echo esc_attr( $wppolitic_item_column ); ?>%;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
                width:<?php echo esc_attr( $wppolitic_item_column_md ); ?>%;
            }
        }
        @media (max-width: 767px) {
           .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
                width:<?php echo esc_attr( $wppolitic_item_column_sm ); ?>%;
            }
        }
        
        @media (max-width: 575px) {
            .<?php echo esc_attr( $sectionid );?> .wppolitic-filter_item_box{
                width:<?php echo esc_attr( $wppolitic_item_column_xm ); ?>%;
            }
        }    
    </style>

        <script type="text/javascript">
        
            jQuery(document).ready(function($) {

                // images have loaded
                $('.wppolitic_all_item_wrapper').imagesLoaded( function() {
                    
                  // Isotop Active
                  $('.wppolitic-filter-menu-list.<?php echo esc_attr( $sectionid );?>').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                  });

                  // Isotop Full Grid
                  var $grid = $('.grid-active.<?php echo esc_attr( $sectionid );?>').isotope({
                    itemSelector: '.wppolitic-grid-item',
                    percentPosition: true,
                    <?php if(!empty($wppolitic_item_categories_active)) {?>

                    filter: '.<?php echo esc_attr( $wppolitic_item_categories_active ); ?>',
                  <?php } ?>
                    masonry: {
                    columnWidth: '.wppolitic-grid-item',
                    }

                  });

                // Set initial active tab
                var $initialTab = $('.wppolitic-filter-menu-list.<?php echo esc_attr( $sectionid );?> button.is-checked');
                if ($initialTab.length > 0) {
                    var filterValue = $initialTab.attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                }                  

                  // Isotop Menu Active
                  $('.wppolitic-filter-menu-list button').on('click', function(event) {
                        $(this).siblings('.is-checked').removeClass('is-checked');
                        $(this).addClass('is-checked');
                        event.preventDefault();
                    });
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
                
            });

        </script>

        <?php

    }


}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Gallery() );