<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPPolitic_Elementor_Widget_Lastest_Blog extends Widget_Base {

    public function get_name() {
        return 'latest-blog-post';
    }
    
    public function get_title() {
        return __( 'WP Politic: Latest Blog', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-single-post';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'blog_setting',
            [
                'label' => esc_html__( 'Latest Blog', 'wppolitic' ),
            ]
        );
        
        $this->start_controls_tabs(
                'wppolitic_blog_tabs'
            );
                $this->start_controls_tab(
                    'wppolitic_blog_content_tab',
                    [
                        'label' => __( 'Content', 'wppolitic' ),
                    ]
                );

            $this->add_control(
                'content_show_ttie',
                [
                    'label' => __( 'Content Source Option', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );    
            $this->add_control(
                'iteam_layout_style',
                [
                    'label' => esc_html__( 'Select Style', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__( 'Style One', 'wppolitic' ),
                        'style2' => esc_html__( 'Style Two', 'wppolitic' ),
                        'style3' => esc_html__( 'Style Three', 'wppolitic' ),
                    ],
                ]
            );    
            $this->add_control(
                'item_categories',
                [
                    'label' => esc_html__( 'Select Blog Category', 'ftagementor' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wppolitic_blog_categories(),
                ]
            );                                     
            $this->add_control(
                'featured_img_show_hide',
                [
                    'label' => esc_html__( 'Featured Image Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );                            
            $this->add_control(
                'show_post_extara_link',
                [
                    'label' => esc_html__( 'Link Icon Show/Hide', 'wppolitic' ),
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
                        'show_post_extara_link' => 'yes',
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
                        'show_post_extara_link' => 'yes',
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
                        'value' => 'fa fa-link',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'show_post_extara_link' => 'yes',
                        'link_icon_type' => 'icon',
                    ]
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
                    'default' => 4,
                ]
            );
            $this->add_control(
                'meta_info_show_hide',
                [
                    'label' => esc_html__( 'Meta Info Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );             
            $this->add_control(
                'content_show_hide',
                [
                    'label' => esc_html__( 'Content Show/Hide', 'wppolitic' ),
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
                    'condition' => [
                        'content_show_hide' => 'yes',
                    ]
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
                    'label' => __( 'Read More Button Text', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Read More',
                    'title' => __( 'Enter button text', 'wppolitic' ),
                    'condition' => [
                        'read_more_btn_show_hide' => 'yes',
                    ]
                ]
            );
            $this->add_control(
                'read_more_border_btn_show_hide',
                [
                    'label' => esc_html__( 'Read More Border Line Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'read_more_btn_show_hide' => 'yes',
                    ]                    
                ]
            );             
            $this->end_controls_tab();

                $this->start_controls_tab(
                    'wppolitic_blog_option_tab',
                    [
                        'label' => __( 'Option', 'wppolitic' ),
                    ]
                );

            $this->add_control(
                'item_show_ttie',
                [
                    'label' => __( 'Item Show Option', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'iteam_layout',
                [
                    'label' => esc_html__( 'Select layout', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'grid',
                    'options' => [
                        'carosul' => esc_html__( 'Carousel', 'wppolitic' ),
                        'grid' => esc_html__( 'Grid', 'wppolitic' ),
                    ],
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
                'grid_row',
                [
                    'label' => __( 'Show Row', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                    'default' => 1,
                ]
            );
            $this->add_control(
                'caselautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'caselautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 10000,
                    'step' => 100,
                    'default' => 5000,
                    'condition' => [
                        'caselautoplay' => 'yes',
                        'iteam_layout' => 'carosul',
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
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'caseldots',
                [
                    'label' => esc_html__( 'Dots', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
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
                        'iteam_layout' => 'carosul',
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
                        'iteam_layout' => 'carosul',
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
                        'iteam_layout' => 'carosul',
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
                    'default' => 3,
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
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
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
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
                    'condition' => [
                        'iteam_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'grid_column_number',
                [
                    'label' => esc_html__( 'Columns', 'wppolitic' ),
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
                    'condition' => [
                        'iteam_layout' => 'grid',
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
                'wppolitic_blog_style_tabs'
            );
                $this->start_controls_tab(
                    'wppolitic_blog_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wppolitic' ),
                    ]
                );

            $this->add_control(
                'item_title_heading',
                [
                    'label' => __( 'Title Color', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            // Title Style
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => 'rgba(0, 0, 0, 0.85)',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content h4 a,{{WRAPPER}} .wppolitic_blog-content h4 a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .wppolitic-news-content h4,{{WRAPPER}} .wppolitic_blog-content h4',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Title Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content h4,{{WRAPPER}} .wppolitic_blog-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'meta_color',
                [
                    'label' => __( 'Meta Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content .wppolitic_news-meta span,
                         {{WRAPPER}} .wppolitic-news-content .wppolitic_news-meta span a,
                         {{WRAPPER}} .wppolitic_blog-meta > span,
                         {{WRAPPER}} .wppolitic_blog-meta > span a
                         '
                          => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'meta_color_icon',
                [
                    'label' => __( 'Meta Icon Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content .wppolitic_news-meta span i,
                         {{WRAPPER}} .wppolitic_blog-meta span i
                         '
                          => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'metatypography',
                    'selector' => '{{WRAPPER}} .wppolitic-news-content .wppolitic_news-meta span,{{WRAPPER}} .wppolitic_blog-meta > span',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'meta_border_single',
                    'label' => __( 'Meta Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic_blog-meta',
                    'condition' => [
                        'iteam_layout_style' => 'style2',
                    ] 
                ]
            );                         
            $this->add_control(
                'item_content_heading',
                [
                    'label' => __( 'Content Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_content_color',
                [
                    'label' => __( 'Content color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content p,{{WRAPPER}} .wppolitic_blog-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    
                    'selector' => '{{WRAPPER}} .wppolitic-news-content > p,{{WRAPPER}} .wppolitic_blog-content p',
                ]
            );
            // Icon Style
            $this->add_control(
                'item_readmore_heading',
                [
                    'label' => __( 'Read More Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_readmore_color',
                [
                    'label' => __( 'Read More color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content a.read-more,{{WRAPPER}} .wppolitic_read-more a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_readmore_color_bg',
                [
                    'label' => __( 'Read More BG Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => 'rgba(0,0,0,0.0)',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content a.read-more,{{WRAPPER}} .wppolitic_read-more a' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'readmoreypography',
                    'selector' => '{{WRAPPER}} .wppolitic-news-content a.read-more,{{WRAPPER}} .wppolitic_read-more a',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_readmore',
                    'label' => __( 'Read More Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic-news-content a.read-more,{{WRAPPER}} .wppolitic_read-more a',
                ]
            ); 
            $this->add_responsive_control(
                'icon_margin',
                [
                    'label' => __( 'Read More margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content a.read-more,{{WRAPPER}} .wppolitic_read-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'read_more_padding',
                [
                    'label' => __( 'Read More Padding', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content a.read-more,{{WRAPPER}} .wppolitic_read-more a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'read_more_border_radius',
                [
                    'label' => __( 'Read More Border Radius', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content a.read-more,{{WRAPPER}} .wppolitic_read-more a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'wppolitic_blog_style_hover_tab',
                [
                    'label' => __( 'Hover', 'wppolitic' ),
                ]
            );
            $this->add_control(
                'item_title_heading_hover',
                [
                    'label' => __( 'Title Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'title_color_hover',
                [
                    'label' => __( 'Title Hover color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content h4 a:hover,{{WRAPPER}} .wppolitic_blog-content h4 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'meta_color_hover',
                [
                    'label' => __( 'Meta Info Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => 'ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content .wppolitic_news-meta span a:hover,{{WRAPPER}} .wppolitic_blog-meta a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'item_readmore_heading_hover',
                [
                    'label' => __( 'Read More Hover Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_readmore_color_hover',
                [
                    'label' => __( 'Button Hover color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content a.read-more:hover,{{WRAPPER}} .wppolitic_read-more a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_readmore_bg_hover',
                [
                    'label' => __( 'Button Hover BG color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => ' rgba(0, 0, 0, 0)',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content a.read-more:hover,{{WRAPPER}} .wppolitic_read-more a:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_readmore_hover',
                    'label' => __( 'Read More Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic-news-content a.read-more:hover,{{WRAPPER}} .wppolitic_read-more a:hover',
                ]
            );             
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'item_box_style',
            [
                'label' => __( 'Box Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
                'wppolitic_blog_item_box_style'
            );
                $this->start_controls_tab(
                    'item_box_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wppolitic' ),
                    ]
                );
            $this->add_control(
                'overlay_style',
                [
                    'label' => __( 'Blog Item Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'image_overlay_color',
                [
                    'label' => __( 'Image Overlay Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(243,188,22,0)',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-thumbnail > a:before,
                        {{WRAPPER}} .wppolitic_blog-thumb > a::before, 
                        {{WRAPPER}} .wppolitic_blog-thumb > a::after

                        ' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'box_overlay_color',
                [
                    'label' => __( 'Background Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(255,255,255,0)',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_single_news,{{WRAPPER}} .wppolitic_blog-post' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_alignment',
                [
                    'label' => __( 'Content Alignment', 'wppolitic' ),
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
                        '{{WRAPPER}} .wppolitic_single_news,{{WRAPPER}} .wppolitic_blog-post' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_margin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_single_news,{{WRAPPER}} .wppolitic_blog-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_padding',
                [
                    'label' => __( 'Padding', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_single_news,{{WRAPPER}} .wppolitic_blog-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border_single',
                    'label' => __( 'Box Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic_single_news,{{WRAPPER}} .wppolitic_blog-post',
                ]
            );             
            $this->add_control(
                'box_border_radious',
                [
                    'label' => __( 'Box Border Radius', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_single_news,{{WRAPPER}} .wppolitic_blog-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'wppolitic_box_shadow',
                    'label' => __( 'Box Shadow', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic_single_news,{{WRAPPER}} .wppolitic_blog-post',
                ]
            );
            $this->add_control(
                'content_box_haeading',
                [
                    'label' => __( 'Content Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_responsive_control(
                'content_box_margin',
                [
                    'label' => __( 'Content Box Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content,{{WRAPPER}} .wppolitic_blog-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'content_box_padding',
                [
                    'label' => __( 'Content Box Padding', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-news-content,{{WRAPPER}} .wppolitic_blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'item_box_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wppolitic' ),
                    ]
                );
                $this->add_control(
                    'box_overlay_hover_color',
                    [
                        'label' => __( 'Overlay Hover  BG Color', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'rgba(255,255,255,0)',
                        'selectors' => [
                            '{{WRAPPER}} .wppolitic_single_news:hover' => 'background: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'box_border_single_hover',
                        'label' => __( 'Box Border Hover', 'wppolitic' ),
                        'selector' => '{{WRAPPER}} .wppolitic_single_news:hover,{{WRAPPER}} .wppolitic_blog-post:hover',
                    ]
                ); 
            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'wppolitic_box_shadow_hover',
                    'label' => __( 'Box Shadow', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic_single_news:hover,{{WRAPPER}} .wppolitic_blog-post:hover',
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
                                '{{WRAPPER}} .wppolitic_blog_extara_link a' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .wppolitic_blog_extara_link a' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone',
                            'label' => __( 'Icon Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic_blog_extara_link a',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_blog_extara_link a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            'default' => 70,
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_blog_extara_link a' => 'width: {{VALUE}}px;',
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
                            'default' => 70,
                            'selectors' => [
                                '{{WRAPPER}} .wppolitic_blog_extara_link a' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'selector' => '{{WRAPPER}} .wppolitic_blog_extara_link a',
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
                                '{{WRAPPER}} .wppolitic_blog_extara_link a:hover' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .wppolitic_blog_extara_link a:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone_hover',
                            'label' => __( 'Icon Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .wppolitic_blog_extara_link a:hover',
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
                    ]
                );   
                $this->add_control(
                    'carousel_nav_color',
                    [
                        'label' => __( 'COlor', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'default' =>'#000',
                        'selectors' => [
                            '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow' => 'color: {{VALUE}};',
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
                            '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow' => 'background: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'arrwo_border',
                        'label' => __( 'Border', 'wppolitic' ),
                        'selector' => '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow',
                    ]
                ); 
                $this->add_control(
                    'carousel_nav_border_radius',
                    [
                        'label' => __( 'Border Radius', 'wppolitic' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'selectors' => [
                            '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow' => 'width: {{VALUE}}px;',
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
                            '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow' => 'height: {{VALUE}}px;',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name' => 'carousel_nav_typography',
                        'selector' => '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow',
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
                'wppolitic_blog_carouse_style_hover_tab',
                [
                    'label' => __( 'Hover', 'wppolitic' ),
                ]
            );
                $this->add_control(
                    'carousel_nav_color_hover',
                    [
                        'label' => __( 'COlor', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'default' =>'#ea000d',
                        'selectors' => [
                            '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'carousel_nav_bg_color_hover',
                    [
                        'label' => __( 'BG COlor', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow:hover' => 'background: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'arrwo_border_hover',
                        'label' => __( 'Border', 'wppolitic' ),
                        'selector' => '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow:hover',
                    ]
                ); 
                $this->add_control(
                    'carousel_nav_border_radius_hover',
                    [
                        'label' => __( 'Border Radius', 'wppolitic' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'selectors' => [
                            '{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator1 .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],

                    ]
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();                
    $this->end_controls_section();

        // Carousel End
        // Carousel Dots Start
        $this->start_controls_section(
            'carousel_style_dots',
            [
                'label' => __( 'Carousel Dots', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                    'wppolitic_blog_carousel_style_tabs_dots'
                );
                $this->start_controls_tab(
                    'wppolitic_blog_carouse_style_normal_tab_dots',
                    [
                        'label' => __( 'Normal', 'wppolitic' ),
                    ]
                );
                    $this->add_control(
                        'slider_arrow_dots_heading',
                        [
                            'label' => __( 'Dots Style', 'wppolitic' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );   
                    $this->add_control(
                        'carousel_dots_bg_color',
                        [
                            'label' => __( 'BG COlor', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .latest-blog-area .slick-dots li button' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_dots',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .latest-blog-area .slick-dots li button',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_dots_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .latest-blog-area .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_responsive_control(
                        'carousel_dots_width',
                        [
                            'label' => __( 'Width', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .latest-blog-area .slick-dots li button' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_dots_height',
                        [
                            'label' => __( 'Height', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .latest-blog-area .slick-dots li button' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_dots_padding',
                        [
                            'label' => __( 'Padding', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .latest-blog-area .slick-dots li button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_control(
                        'carousel_dots_margin',
                        [
                            'label' => __( 'Margin', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .latest-blog-area .slick-dots li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );                         
                    $this->add_responsive_control(
                        'carousel_dot_top_margin',
                        [
                            'label' => __( 'Dot Position', 'wppolitic' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => -2000,
                            'max' => 2000,
                            'step' => 1,
                            'default' => -20,
                            'selectors' => [
                                '{{WRAPPER}} .latest-blog-area .slick-dots ' => 'bottom: {{VALUE}}px;',
                            ],
                        ]
                    );  
                    $this->add_responsive_control(
                        'dot_alignment',
                        [
                            'label' => __( 'Dot Alignment', 'wppolitic' ),
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
                                '{{WRAPPER}} .latest-blog-area .slick-dots' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    ); 
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'wppolitic_blog_carouse_style_hover_tab_dots',
                    [
                        'label' => __( 'Hover/Active', 'wppolitic' ),
                    ]
                );

                    $this->add_control(
                        'carousel_nav_bg_color_hover_dots',
                        [
                            'label' => __( 'BG COlor', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .latest-blog-area .slick-dots li.slick-active button,
                                {{WRAPPER}} .latest-blog-area .slick-dots li:hover button' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'dots_border_hover',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .latest-blog-area .slick-dots li.slick-active button,
                            {{WRAPPER}} .latest-blog-area .slick-dots li:hover button',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_dots_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .latest-blog-area .slick-dots li.slick-active button,
                                {{WRAPPER}} .latest-blog-area .slick-dots li:hover button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                
        $this->end_controls_section();
    }
    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $get_item_categories = $settings['item_categories'];
        $iteam_layout = $settings['iteam_layout'];
        $show_post_extara_link = $settings['show_post_extara_link'];
        $read_more_border_btn_show_hide = $settings['read_more_border_btn_show_hide'];
        $iteam_layout_style = $settings['iteam_layout_style'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caseldots = $settings['caseldots'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];        
        $columns = $this->get_settings_for_display('grid_column_number');
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $slarrowsstyle = $settings['slarrowsstyle'];
        $featured_img_show_hide = $settings['featured_img_show_hide'];
        $meta_info_show_hide = $settings['meta_info_show_hide'];
        $content_show_hide = $settings['content_show_hide'];
        $read_more_btn_show_hide = $settings['read_more_btn_show_hide'];
        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $grid_row       = ! empty( $settings['grid_row'] ) ? $settings['grid_row'] : 1;
        $titlelength    = ! empty( $settings['title_length'] ) ? $settings['title_length'] : 2;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $sectionid =  $this-> get_id();

        $link_icon_type        = $this->get_settings_for_display('link_icon_type');
        $link_icon_font        = $this->get_settings_for_display('link_icon_font');
        $link_icon_iamge  =   (isset($settings['link_icon_iamge']['url']) ? $settings['link_icon_iamge']['url'] : '');




        $collumval = 'col-lg-3 col-sm-6';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            if($iteam_layout_style == 'style3'){
                $collumval = 'col-lg-'.$colwidth.' col-sm-12'; 
            }else{
                 $collumval = 'col-lg-'.$colwidth.' col-sm-6';
            }
           
        }
        ?>
            <div class="latest-blog-area  <?php if( $read_more_border_btn_show_hide =='yes' ){ echo 'readmore_btrln';} ?>">
                <div class="<?php if($iteam_layout == 'carosul'){ echo 'pro-latest-news-active '.$sectionid; if($slarrowsstyle == 2){ echo ' wppolitic_indicator-style-two';} else{ echo ' wppolitic_indicator1';} } else echo 'row';?>">
                    <?php                       
                        $args = array(
                            'post_type'            => 'post',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $per_page,
                            'order'                => 'DESC',
                        );

                        if($get_item_categories){
                            $args['category_name'] = implode(',', $get_item_categories);
                        }

                        $posts = new \WP_Query($args);

                        ?>
                       <?php if($iteam_layout == 'carosul'){ echo '<div class="custom_row">'; }?>  
                        <?php
                        
                        $i= 1;
                        while($posts->have_posts()):$posts->the_post();
                    ?>
                    <?php if($iteam_layout == 'grid') { echo '<div class="'. esc_attr( $collumval ) .'">'; } ?>

                        <?php 

                    if( $iteam_layout_style == 'style3' ){ ?>

                        <div class="wppolitic_single_news wpp_b_st3">
                            <?php if( $featured_img_show_hide == 'yes' && has_post_thumbnail() ){?>
                            <div class="wppolitic-news-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('wppoliticsize_570x380');?>
                                </a>
                            </div>
                            <?php } ?>
                            <div class="wppolitic-news-content">
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                    </a>
                                </h4>
                                <?php
                                if( $meta_info_show_hide == 'yes'){
                                ?>                            
                                <div class="wppolitic_news-meta">

                                    <span>
                                        <i class="fa fa-calendar"></i>
                                        <?php echo get_the_time(get_option('date_format')); ?>
                                    </span>
                                    <span>
                                        <i class="fa fa-user"></i> 
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author();?></a>
                                    </span>
                                </div> 
                                <?php } ?>                                
                               
                                <?php if( $content_show_hide == 'yes' ){ echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>'; }
                                if( $read_more_btn_show_hide == 'yes'){
                                ?>
                                <a href="<?php the_permalink(); ?>" class="read-more"><?php if( !empty($btntext) ){echo esc_html($btntext);}else{ wppolitic_read_more(); }?></a>
                                <?php } ?>
                            </div>
                        </div>




                      <?php  }elseif( $iteam_layout_style == 'style1' ){?>
                        <div class="wppolitic_single_news">
                            <?php if( $featured_img_show_hide == 'yes' && has_post_thumbnail() ){?>
                            <div class="wppolitic-news-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('wppoliticsize_570x380');?>
                                </a>
                            </div>
                            <?php } ?>
                            <div class="wppolitic-news-content">
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                    </a>
                                </h4>
                                <?php
                                if( $meta_info_show_hide == 'yes'){
                                ?>                            
                                <div class="wppolitic_news-meta">

                                    <span>
                                        <i class="fa fa-calendar"></i>
                                        <?php echo get_the_time(get_option('date_format')); ?>
                                    </span>
                                    <span>
                                        <i class="fa fa-comment"></i> 
                                        <?php comments_number( '0', '1', '%' ); ?>
                                    </span>
                                    <span>
                                        <i class="fa fa-user"></i> 
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author();?></a>
                                    </span>
                                </div> 
                                <?php } ?>                                
                               
                                <?php if( $content_show_hide == 'yes' ){ echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>'; }
                                if( $read_more_btn_show_hide == 'yes'){
                                ?>
                                <a href="<?php the_permalink(); ?>" class="read-more"><?php if( !empty($btntext) ){echo esc_html($btntext);}else{ wppolitic_read_more(); }?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } else{?>

                            <div class="wppolitic_blog-post">
                                <div class="wppolitic_blog-thumb">
                                    <?php if( $featured_img_show_hide == 'yes' && has_post_thumbnail() ): ?>
                                        <a href="<?php echo esc_url( get_the_permalink() ); ?>"> <?php the_post_thumbnail('thumnail_size'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($show_post_extara_link=='yes'):?>
                                            <span class="wppolitic_blog_extara_link"><a href="<?php the_permalink(); ?>">
                                     <?php 
                                        if( $link_icon_type == 'image' ){
                                           ?>
                                            <img src="<?php echo $link_icon_iamge; ?>" alt="<?php echo esc_attr('wppolitic'); ?>" />
                                            <?php
                                        }else{
                                            \Elementor\Icons_Manager::render_icon( $settings['link_icon_font'], [ 'aria-hidden' => 'true' ] );
                                        }
                                        ?>

                                            </a></span>
                                        <?php endif;?>
                                </div>
                                <div class="wppolitic_blog-content">
                                    <h4>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                        </a>
                                    </h4>
                                <?php 
                                 if( $content_show_hide == 'yes' ){ echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>'; } ?>

                                    <?php
                                if($read_more_btn_show_hide=='yes'){?>
                                <div class="wppolitic_read-more">
                                    <a href="<?php the_permalink(); ?>" class="read-more htc__btn"><?php if( !empty($btntext) ){echo esc_html($btntext);}else{ wppolitic_read_more(); }?></a>
                                </div>
                                <?php } ?>
                                </div>
                              <?php if($meta_info_show_hide=='yes'){?>
                                <div class="wppolitic_blog-meta">
                                    <span class="wppolitic_post-date"> <i class="fa fa-calendar-check-o"></i> <?php echo get_the_time(get_option('date_format')); ?></span>
                                    <span><i class="fa fa-eye"></i><?php echo wppolitic_getPostViews(get_the_ID()) ?></span>
                                    <span><i class="fa fa-comment-o"></i> <?php comments_popup_link( esc_html__('No Comments','wppolitic'), esc_html__('1 Comment','wppolitic'), esc_html__('% Comments','wppolitic'), 'post-comment', esc_html__('Comments off','wppolitic') ); ?></span>
                                </div>
                                <?php } ?>  
                            </div>

                                <?php }?>

                    <?php if($iteam_layout == 'grid'){ echo '</div> '; }?>

                    <?php if ($i % $grid_row == 0 && ( $posts->post_count != $i) && $iteam_layout == 'carosul'){ ?>
                            </div>
                            
                            <div class="custom_row">
                  <?php  }   ?>
                    <?php $i++;  endwhile; ?>


                    <?php if($iteam_layout == 'carosul'){ echo '</div> '; }?>
                    
                </div>
            </div>

            <script type="text/javascript">
              jQuery(document).ready(function($) {

                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _caseldots_set = <?php echo esc_js( $caseldots ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(1000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    $('.pro-latest-news-active.<?php echo esc_attr( $sectionid ); ?>').slick({
                        slidesToShow: _showitem_set,
                        arrows:_arrows_set,
                        dots: _caseldots_set,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
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
                                    slidesToShow: 1,
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

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Lastest_Blog() );