<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPPolitic_Elementor_Widget_Campaign extends Widget_Base {

    public function get_name() {
        return 'campaigns-post';
    }
    
    public function get_title() {
        return __( 'WP Politic : Campaign/Event', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-date';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'campaign_setting',
            [
                'label' => esc_html__( 'Campaign', 'wppolitic' ),
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
                ]
            );
            $this->add_control(
                'wppolitic_categories',
                [
                    'label' => esc_html__( 'Select Campaign Category', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wppolitic_categories(),                   
                ]
            );                     
            $this->add_control(
                'layout_style',
                [
                    'label' => esc_html__( 'Select Style', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__( 'Style One', 'wppolitic' ),
                        'style2' => esc_html__( 'Style Two', 'wppolitic' ),
                        'style3' => esc_html__( 'Style Three', 'wppolitic' ),
                        'style4' => esc_html__( 'Style Four', 'wppolitic' ),
                        'style5' => esc_html__( 'Style Five', 'wppolitic' ),
                        'style6' => esc_html__( 'Style Six', 'wppolitic' ),
                    ],
                ]
            );  
            $this->add_control(
                'countdown_show_hide',
                [
                    'label' => esc_html__( 'Count Down Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'layout_style' => array('style1','style2'),
                    ],                
                ]
            );  
            $this->add_control(
                'meta_show_hide',
                [
                    'label' => esc_html__( 'Meta Info Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'layout_style' => array('style1','style2','style3','style4','style5'),
                    ],                    
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
                    'condition' => [
                        'layout_style' => array('style1','style2','style3'),
                    ],
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
                        'layout_style' => array('style1','style2','style3'),
                    ]
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
                        'layout_style' => array('style1','style2','style3','style6'),
                    ],                    
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
                    'default' => 1,
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
                'wppolitic_item_order',
                [
                    'label' => esc_html__( 'Order By', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'ASC' => esc_html__( 'Ascending', 'wppolitic' ),
                        'DESC' => esc_html__( 'Descending', 'wppolitic' ),
                    ],                
                ]
            );            
            $this->add_control(
              'wp_politic_campaign_item_gutter',
              [
                 'label'   => __( 'Item Gutter', 'shieldem' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 30,
                 'min'     => 0,
                 'max'     => 100,
                 'step'    => 1,
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
                    'default' => '2',
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
                        'layout_style' => array('style1','style2','style3','style4'),
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
                        '{{WRAPPER}} .wp-campaign-box h3, {{WRAPPER}} .wppolitic_single-event .wppolitic_event-desc h3 a, {{WRAPPER}} .campaign_style4 .wp_politic_content_st4 h3 a, {{WRAPPER}} .wppolitic_event_desc_5 h3, {{WRAPPER}} .wppolitic-campaign-tlmn_box h5' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .wp-campaign-box h3, {{WRAPPER}} .wppolitic_single-event .wppolitic_event-desc h3, {{WRAPPER}} .campaign_style4 .wp_politic_content_st4 h3,{{WRAPPER}} .wppolitic_event_desc_5 h3, {{WRAPPER}} .wppolitic-campaign-tlmn_box h5',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Title Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-box h3, 
                        {{WRAPPER}} .wppolitic_single-event .wppolitic_event-desc h3, 
                        {{WRAPPER}} .campaign_style4 .wp_politic_content_st4 h3, {{WRAPPER}} .wppolitic_event_desc_5 h3, {{WRAPPER}} .wppolitic-campaign-tlmn_box h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'item_category_heading',
                [
                    'label' => __( 'Category Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'condition' => [
                        'layout_style' => 'style5',
                    ],
                ]
            );
            // Category Style
            $this->add_control(
                'title_color_category',
                [
                    'label' => __( 'Category color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .campaign_style4 .wp_politic_content_st4 h3 a, {{WRAPPER}} .wppolitic_event_desc_5 h5' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'layout_style' => 'style5',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography_category',
                    'selector' => '{{WRAPPER}} .wp-campaign-box h3, {{WRAPPER}} .wppolitic_single-event .wppolitic_event-desc h3, {{WRAPPER}} .campaign_style4 .wp_politic_content_st4 h3,{{WRAPPER}} .wppolitic_event_desc_5 h5',
                    'condition' => [
                        'layout_style' => 'style5',
                    ],
                ]
            ); 

            $this->add_control(
                'item_title_heading_right',
                [
                    'label' => __( 'Style 5 Right Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'condition' => [
                        'layout_style' => 'style5',
                    ],
                ]
            );
            // Title Style
            $this->add_control(
                'title_color_right',
                [
                    'label' => __( 'Title color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .campaign_style4 .wp_politic_content_st4 h3 a, {{WRAPPER}} .wppolitic_slider_nav .wppolitic_event_desc_5 h3' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'layout_style' => 'style5',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography_right',
                    'selector' => '{{WRAPPER}} .campaign_style4 .wp_politic_content_st4 h3,{{WRAPPER}} .wppolitic_slider_nav .wppolitic_event_desc_5 h3',
                    'condition' => [
                        'layout_style' => 'style5',
                    ],                    
                ]
            );

            $this->add_control(
                'item_category_heading_right',
                [
                    'label' => __( 'Category Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'condition' => [
                        'layout_style' => 'style5',
                    ],                    
                ]
            );
            // Category Style
            $this->add_control(
                'title_color_category_right',
                [
                    'label' => __( 'Category color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .campaign_style4 .wp_politic_content_st4 h3 a, {{WRAPPER}} .wppolitic_slider_nav .wppolitic_event_desc_5 h5' => 'color: {{VALUE}};',                      
                    ],
                     'condition' => [
                        'layout_style' => 'style5',
                    ],                     
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography_category_right',
                    'selector' => '{{WRAPPER}} .campaign_style4 .wp_politic_content_st4 h3,{{WRAPPER}} .wppolitic_slider_nav .wppolitic_event_desc_5 h5',
                    'condition' => [
                        'layout_style' => 'style5',
                    ],                    
                ]
            );

            $this->add_control(
                'item_content_heading',
                [
                    'label' => __( 'Content Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );
            $this->add_control(
                'item_content_color',
                [
                    'label' => __( 'Content color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-box p,{{WRAPPER}} .wppolitic_single-event .wppolitic_event-desc p,{{WRAPPER}} .wppolitic-campaign-tlmn_box p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',                    
                    'selector' => '{{WRAPPER}} .wp-campaign-box > p,{{WRAPPER}} .wppolitic_single-event .wppolitic_event-desc p,{{WRAPPER}} .wppolitic-campaign-tlmn_box p',
                ]
            );
            // Icon Style
            $this->add_control(
                'item_coutdouwn_heading',
                [
                    'label' => __( 'Countdouwn Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                    'condition' => [
                        'layout_style' => array('style1','style2'),
                    ],
                ]
            );
            $this->add_control(
                'item_coutdouwnn_color',
                [
                    'label' => __( 'Countdouwn color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-content .cdown,{{WRAPPER}} .campaign-time i' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'layout_style' => array('style1','style2'),
                    ],
                ]
            );
             $this->add_control(
                'item_coutdouwnn_backgorund',
                [
                    'label' => __( 'Counter BG Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wpcmp_style_2 .campaign-time' => 'background: {{VALUE}};',
                    ],
                    'condition' => [
                        'layout_style' => array('style1','style2'),
                    ],
                ]
            );           
            $this->add_responsive_control(
                'coutdouwn_margin',
                [
                    'label' => __( 'Countdouwn margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'layout_style' => array('style1','style2'),
                    ],                    
                ]
            );            
            // Icon Style
            $this->add_control(
                'item_meta_heading',
                [
                    'label' => __( 'Meta Info Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            ); 
            $this->add_control(
                'item_meta_info_color',
                [
                    'label' => __( 'Meta Info color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-meta li,
                        {{WRAPPER}} .wppolitic_single-event .wppolitic_event-meta p,
                        {{WRAPPER}} .campaign_style4 .wp_politic_content_st4 ul li' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_meta_icon_color',
                [
                    'label' => __( 'Meta Info Icon color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#e03927',
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-meta li i,
                        {{WRAPPER}} .wppolitic_single-event .wppolitic_event-meta p i,
                        {{WRAPPER}} .campaign_style4 .wp_politic_content_st4 ul li i' => 'color: {{VALUE}};',

                        '{{WRAPPER}} .wppolitic-campaign-tlmn:after' => 'border-left-color: {{VALUE}};',

                        '{{WRAPPER}} .wppolitic-campaign-tlmn_box:after, {{WRAPPER}} .campaign_new_style_6:before' => 'background-color: {{VALUE}};',

                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'meta_infotyphography',
                    'selector' => '{{WRAPPER}} .wp-campaign-meta li,
                    {{WRAPPER}} .wppolitic_single-event .wppolitic_event-meta p,
                    {{WRAPPER}} .wppolitic-campaign-tlmn_box span',
                ]
            );            
            $this->add_control(
                'item_meta_info_color_date',
                [

                    'label' => __( 'Meta Date color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_single-event .wppolitic_event-meta .date,{{WRAPPER}} .wppolitic_single_event_5 span.date,{{WRAPPER}} .wppolitic-campaign-tlmn_box span' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'layout_style' => array('style3','style5','style6'),
                    ],

                ]
            );
            $this->add_control(
                'item_meta_info_bg_date',
                [
                    'label' => __( 'Meta Date Bg Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#e03927',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_single-event .wppolitic_event-meta .date,{{WRAPPER}} .wppolitic_single_event_5 span.date' => 'background: {{VALUE}};',
                    ],
                    'condition' => [
                        'layout_style' => array('style3','style5'),
                    ],                    
                ]
            );
 
            $this->add_control(
                'item_read_more_heading',
                [
                    'label' => __( 'Read More Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );             
            $this->add_control(
                'item_read_more_color',
                [
                    'label' => __( 'Read More color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .cmapaign-redmore' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'read_more_typhography',
                    
                    'selector' => '{{WRAPPER}} .cmapaign-redmore',
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
                    'default' => 'rgba(0, 0, 0, 0.85)',
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-box:hover h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color_hover_link',
                [
                    'label' => __( 'Title Hover Link color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-box h3 a:hover,{{WRAPPER}} .wppolitic-campaign-tlmn_box h5 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );            
            $this->add_control(
                'item_content_heading_hover',
                [
                    'label' => __( 'Content Hover Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_content_color_hover',
                [
                    'label' => __( 'Content Hover color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-box:hover p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_read_more_color_hover',
                [
                    'label' => __( 'Read More Hover color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .cmapaign-redmore:hover' => 'color: {{VALUE}};',
                    ],
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
                'wppolitic_item_box_style'
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
                    'label' => __( 'Overlay Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'condition' => [
                        'layout_style' => array('style1','style2','style3','style4','style5'),
                    ],
                ]
            );
            $this->add_control(
                'box_overlay_color',
                [
                    'label' => __( 'Overlay BG Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(255,255,255,0)',
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-box, {{WRAPPER}} .wppolitic_single-event, {{WRAPPER}} .wppolitic_single_event_5:before' => 'background: {{VALUE}};',
                    ],
                    'condition' => [
                        'layout_style' => array('style1','style2','style3','style5'),
                    ],
                ]
            );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'background_overlay_st4',
                        'label' => __( 'Overlay Gradient Color', 'wppolitic' ),
                        'types' => ['gradient'],
                        'selector' => '{{WRAPPER}} .campaign_style4::before',
                        'condition' => [
                        'layout_style' => array('style4'),
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
                    'default' => 'Left',
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-box, {{WRAPPER}} .wppolitic_single-event,{{WRAPPER}} .campaign_style4' => 'text-align: {{VALUE}};',
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
                        '{{WRAPPER}} .wp-campaign-box, {{WRAPPER}} .wppolitic_single-event,{{WRAPPER}} .campaign_style4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .wp-campaign-box, {{WRAPPER}} .wppolitic_single-event,{{WRAPPER}} .campaign_style4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'box_border_radious',
                [
                    'label' => __( 'Box Border Radius', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-box, {{WRAPPER}} .wppolitic_single-event,{{WRAPPER}} .campaign_style4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border_single',
                    'label' => __( 'Box Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wp-campaign-box,{{WRAPPER}} .campaign_style4',
                ]
            ); 
            $this->add_control(
                'content_box_haeading',
                [
                    'label' => __( 'Content Box Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );
            $this->add_responsive_control(
                'content_box_margin',
                [
                    'label' => __( 'Content Box Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wp-campaign-content,{{WRAPPER}} .wp_politic_content_st4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .wp-campaign-content,{{WRAPPER}} .wp_politic_content_st4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .wp-campaign-box:hover' => 'background: {{VALUE}};',
                        ],
                        'condition' => [
                            'layout_style' => array('style1','style2','style3'),
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'box_border_single_hover',
                        'label' => __( 'Box Border Hover', 'wppolitic' ),
                        'selector' => '{{WRAPPER}} .wp-campaign-box:hover',
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
                        ]
                    );   
                    $this->add_control(
                        'carousel_nav_color',
                        [
                            'label' => __( 'COlor', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#000',
                            'selectors' => [
                                '{{WRAPPER}} .campaign-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .campaign-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .campaign-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .campaign-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .campaign-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'width: {{VALUE}}px;',
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
                                '{{WRAPPER}} .campaign-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'selector' => '{{WRAPPER}} .campaign-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow',
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
                                '{{WRAPPER}} .wppolitic_indicator-style-two.campaign-active .slick-arrow,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow' => 'top: {{VALUE}}px;',
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
                                '{{WRAPPER}} .campaign-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color_hover',
                        [
                            'label' => __( 'BG COlor', 'wppolitic' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .campaign-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'wppolitic' ),
                            'selector' => '{{WRAPPER}} .campaign-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'wppolitic' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .campaign-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover,{{WRAPPER}} .wppolitic_indicator-style-two .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                
        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();
        $iteam_layout = $settings['iteam_layout'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $wp_politic_campaign_item_gutter        = $this->get_settings_for_display('wp_politic_campaign_item_gutter');
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];        
        $layout_style = $settings['layout_style'];
        $countdown_show_hide = $settings['countdown_show_hide'];
        $meta_show_hide = $settings['meta_show_hide'];
        $read_more_btn_show_hide = $settings['read_more_btn_show_hide'];
        $columns = $this->get_settings_for_display('grid_column_number');
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $slarrowsstyle = $settings['slarrowsstyle'];
        $get_item_categories = $settings['wppolitic_categories'];
        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $titlelength    = ! empty( $settings['title_length'] ) ? $settings['title_length'] : 2;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $wppolitic_item_order  = $this->get_settings_for_display('wppolitic_item_order');
        $sectionid =  $this-> get_id();
        $sectionid ='sid'.$sectionid;
        $collumval = 'col-lg-3 col-sm-12';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-sm-12';
        }

        ?>
            <div class="campaigns-area">
                <?php if( $layout_style == 'style6' ){ ?>
                    <!-- Campaign New Style Start -->
                    <div class="campaign_new_style_6">
                        <div class="wppolitic-campaign-tlmn campaign-active <?php echo esc_attr( $sectionid ); ?>">
                            <?php
                                $item_cates = str_replace(' ', '', $get_item_categories);
                                $htsargs = array(
                                    'post_type'            => 'wpcampaign',
                                    'posts_per_page'       => $per_page, 
                                    'ignore_sticky_posts'  => 1,
                                    'order'                => $wppolitic_item_order,
                                    'orderby'                => 'meta_value',
                                    'meta_key' => '_wppolitic_campaign_date',
                                );
                                if ( "0" != $get_item_categories) {
                                    if( is_array($item_cates) && count($item_cates) > 0 ){
                                        $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                        $htsargs['tax_query'] = array(
                                            array(
                                                'taxonomy' => 'campaign_category',
                                                'terms' => $item_cates,
                                                'field' => $field_name,
                                                'include_children' => false
                                            )
                                        );
                                    }
                                }

                                $htspost = new \WP_Query($htsargs);
                                while($htspost->have_posts()):$htspost->the_post();
                                $campaign_date  = get_post_meta( get_the_ID(),'_wppolitic_campaign_date', true );

                                $short_des = get_post_meta( get_the_ID(),'_wppolitic_campaign_short_des', true ); 
                            ?> 

                            <div class="wppolitic-campaign-tlmn_box">
                                
                                <span><?php echo date_i18n('j M y', strtotime($campaign_date)); ?></span>
                                <?php if( get_the_title() ){ ?>
                                <h5><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(), $titlelength , '' ) );?></a></h5>
                                <?php } ?>                                
                                <?php echo '<p>'. esc_html( wp_trim_words( $short_des, $contetnlength, '' ) ) . '</p>';?>
                            </div>

                            <?php endwhile; ?>
                        </div>
                    </div>
                    <!-- Campaign New Style Start -->
                <?php }elseif( $layout_style == 'style5' ){ ?>
                    <!-- Campaign New Style Start -->
                    <div class="campaign_new_style wppolitic_indicator-style-two">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="slider wppolitic_slider_for <?php echo esc_attr( $sectionid );?>">
                                    <?php
                                        $item_cates = str_replace(' ', '', $get_item_categories);
                                        $htsargs = array(
                                            'post_type'            => 'wpcampaign',
                                            'posts_per_page'       => $per_page, 
                                            'ignore_sticky_posts'  => 1,
                                            'order'                => $wppolitic_item_order,
                                            'orderby'                => 'meta_value',
                                            'meta_key' => '_wppolitic_campaign_date',
                                        );

                                        if ( "0" != $get_item_categories) {
                                            if( is_array($item_cates) && count($item_cates) > 0 ){
                                                $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                                $htsargs['tax_query'] = array(
                                                    array(
                                                        'taxonomy' => 'campaign_category',
                                                        'terms' => $item_cates,
                                                        'field' => $field_name,
                                                        'include_children' => false
                                                    )
                                                );
                                            }
                                        }

                                        $htspost = new \WP_Query($htsargs);
                                        while($htspost->have_posts()):$htspost->the_post();
                                        $terms = get_the_terms(get_the_id(),'campaign_category');

                                        $campaign_date  = get_post_meta( get_the_ID(),'_wppolitic_campaign_date', true );
                                    ?> 

                                    <div class="wppolitic_single_event_5">
                                        <?php if(has_post_thumbnail()): ?>
                                            <a href="<?php echo esc_url( get_the_permalink() ); ?>"> <?php the_post_thumbnail('politic_event_img_size'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($meta_show_hide == 'yes'){ ?> 
                                        <div class="wppolitic_event_meta_5">              
                                            <span class="date"><?php echo date_i18n('j', strtotime($campaign_date)); ?> <?php echo date_i18n('M', strtotime($campaign_date)); ?></span>
                                        </div>
                                        <?php } ?>
                                        <div class="wppolitic_event_desc_5">
                                            <?php if ( $terms && !is_wp_error( $terms ) ) : ?>
                                                <h5>
                                                    <?php 
                                                    foreach( $terms as $term ) { 
                                                        echo esc_html( $term->name );
                                                    } ?>
                                                </h5>
                                            <?php endif;?>
                                                    
                                            <?php if(get_the_title()){ ?>
                                                <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(), $titlelength , '' ) );?></a></h3>
                                            <?php } ?>
                                        </div>
                                    </div> 
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="slider wppolitic_slider_nav <?php echo esc_attr( $sectionid );?>">
                                    <?php
                                        $item_cates = str_replace(' ', '', $get_item_categories);
                                        $htsargs = array(
                                            'post_type'            => 'wpcampaign',
                                            'posts_per_page'       => $per_page, 
                                            'ignore_sticky_posts'  => 1,
                                            'order'                => $wppolitic_item_order,
                                            'orderby'                => 'meta_value',
                                            'meta_key' => '_wppolitic_campaign_date',
                                        );

                                        if ( "0" != $get_item_categories) {
                                            if( is_array($item_cates) && count($item_cates) > 0 ){
                                                $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                                $htsargs['tax_query'] = array(
                                                    array(
                                                        'taxonomy' => 'campaign_category',
                                                        'terms' => $item_cates,
                                                        'field' => $field_name,
                                                        'include_children' => false
                                                    )
                                                );
                                            }
                                        }

                                        $htspost = new \WP_Query($htsargs);
                                        while($htspost->have_posts()):$htspost->the_post();

                                        $terms = get_the_terms(get_the_id(),'campaign_category');
                                        $campaign_date  = get_post_meta( get_the_ID(),'_wppolitic_campaign_date', true );
                                    ?> 

                                    <div class="wppolitic_single_event_5">
                                        <?php if(has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('politic_event_img_size'); ?>
                                        <?php endif; ?>
                                        <?php if($meta_show_hide == 'yes'){?> 
                                        <div class="wppolitic_event_meta_5">              
                                            <span class="date"><?php echo date_i18n('j', strtotime($campaign_date)); ?> <?php echo date_i18n('M', strtotime($campaign_date)); ?></span>
                                        </div>
                                        <?php } ?>
                                        <div class="wppolitic_event_desc_5">
                                            <?php
                                            if ( $terms && !is_wp_error( $terms ) ) : ?>
                                            <h5>
                                                <?php foreach( $terms as $term ){
                                                    echo esc_html( $term->name );
                                                } ?>
                                            </h5>
                                            <?php endif;?>
                                            <?php if( get_the_title() ){ ?>
                                                <h3><?php echo esc_html( wp_trim_words( get_the_title(), $titlelength , '' ) );?></h3>
                                            <?php } ?>
                                        </div>
                                    </div> 
                                    <?php endwhile; ?>
                                </div>                            
                            </div>
                        </div>
                    </div>
                    <!-- Campaign New Style Start -->
                <?php }else{ ?>

                    <div class="<?php if($iteam_layout == 'carosul'){ echo 'campaign-active '.$sectionid; if($slarrowsstyle==2){ echo ' wppolitic_indicator-style-two';} } else echo 'row'; if($layout_style == 'style2'){ echo ' wpcmp_style_2';}?>">
                        <?php
                            $item_cates = str_replace(' ', '', $get_item_categories);
                            $htsargs = array(
                                'post_type'            => 'wpcampaign',
                                'posts_per_page'       => $per_page, 
                                'ignore_sticky_posts'  => 1,
                                'order'                => $wppolitic_item_order,
                                'orderby'                => 'meta_value',
                                'meta_key' => '_wppolitic_campaign_date',
                            );

                            if ( "0" != $get_item_categories) {
                                if( is_array($item_cates) && count($item_cates) > 0 ){
                                    $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                    $htsargs['tax_query'] = array(
                                        array(
                                            'taxonomy' => 'campaign_category',
                                            'terms' => $item_cates,
                                            'field' => $field_name,
                                            'include_children' => false
                                        )
                                    );
                                }
                            }
                            $htspost = new \WP_Query($htsargs);
                            while($htspost->have_posts()):$htspost->the_post();

                            $icon_images = get_post_meta(get_the_id(),'_wppolitic_campaign_icon_img',true); 
                            $servce_icon  = get_post_meta( get_the_ID(),'_wppolitic_campaign_icon', true );
                            $servce_icon_type  = get_post_meta( get_the_ID(),'_wppolitic_campaign_icon_type', true );
                            $short_des = get_post_meta( get_the_ID(),'_wppolitic_campaign_short_des', true ); 
                            $campaign_location  = get_post_meta( get_the_ID(),'_wppolitic_loaction', true );
                            $campaign_time  = get_post_meta( get_the_ID(),'_wppolitic_campaign_time', true );
                            $campaign_date  = get_post_meta( get_the_ID(),'_wppolitic_campaign_date', true );
                        ?>                    
                        <!-- Single Item --> 
                        <?php if($iteam_layout == 'grid') { echo '<div class="' . esc_attr( $collumval ) . '">'; } ?>

                        <!-- Single Item -->
                        <?php  if($layout_style == 'style2' || $layout_style == 'style1'){ ?>
                            <div class="wp-campaign-box">
                                <div class="wp-campaign-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('wppolitic_img580x436');?>
                                    </a>
                                        <?php if($countdown_show_hide == 'yes' && $layout_style == 'style2'){ ?>
                                        <div class="campaign-time">
                                            <i class="fa fa-clock-o"></i> 
                                            <span class="wppolitic_timer">
                                                <?php
                                                $count_date = date( "Y/m/j", strtotime( $campaign_date ) );
                                                ?>
                                                <span class="count_style_1" data-countdown="<?php echo esc_attr( $count_date); ?>"></span>
                                            </span>
                                        </div>
                                    <?php } ?>                               
                                </div>
                                <div class="wp-campaign-content">
                                    <?php if($countdown_show_hide == 'yes'&& $layout_style != 'style2'){ ?>
                                        <div class="campaign-time">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="wppolitic_timer">
                                                <?php $campaign_date  = get_post_meta( get_the_ID(),'_wppolitic_campaign_date', true );
                                                    $count_date = date( "Y/m/j", strtotime( $campaign_date ) );
                                                    ?>
                                                <span class="count_style_1" data-countdown="<?php echo esc_attr( $count_date); ?>"></span>
                                            </span>
                                        </div>
                                    <?php } ?>
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $titlelength, '' );?></a></h3>
                                    <?php if($meta_show_hide == 'yes'){
                                        $dateformate = get_option('date_format');
                                        $campaign_date = strtotime( $campaign_date );
                                        ?>
                                        <ul class="wp-campaign-meta">
                                            <li><i class="fa fa-calendar"></i> <?php echo esc_html( date_i18n( $dateformate, $campaign_date ) ); ?></li>
                                            <li><i class="fa fa-user"></i>  <?php the_author();?></li>
                                        </ul>
                                    <?php }?>
                                    <?php echo '<p>'.wp_trim_words( $short_des, $contetnlength, '' ).'</p>';?>
                                    <?php if( $read_more_btn_show_hide == 'yes' && !empty($btntext)){ ?>
                                        <a class="cmapaign-redmore" href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $btntext ); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php }elseif( $layout_style == 'style3' ){ ?>
                            <div class="wppolitic_single-event">
                                <?php if(has_post_thumbnail()): ?>
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"> <?php the_post_thumbnail('politic_event_img_size'); ?>
                                    </a>
                                <?php endif; ?>
                                <?php if($meta_show_hide == 'yes'){
                                    
                                    $timeformate = get_option("time_format");
                                    $campaign_time = strtotime( $campaign_time ); ?> 
                                    <div class="wppolitic_event-meta">              
                                        <span class="date"><span><?php echo date_i18n('j', strtotime($campaign_date)); ?></span><?php echo date_i18n('M', strtotime($campaign_date)); ?></span>
                                        <p><i class="fa fa-map-marker"></i> <?php echo esc_html( $campaign_location );?></p>
                                        <p><i class="fa fa-clock-o"></i> <?php echo esc_html( date_i18n( $timeformate, $campaign_time )); ?></p>
                                    </div>
                                <?php } ?>
                                <div class="wppolitic_event-desc">
                                    <?php if( get_the_title() ){ ?>
                                        <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(), $titlelength , '' ) );?></a></h3>
                                    <?php } ?>
                                    <?php if( $short_des ){ ?>
                                        <?php echo '<p>' . esc_html( wp_trim_words( $short_des, $contetnlength, '' ) ) .'</p>';?>
                                    <?php } ?>
                                    <?php if( $read_more_btn_show_hide == 'yes' && !empty($btntext)){ ?>
                                        <a class="cmapaign-redmore" href="<?php the_permalink(); ?>"><?php echo $btntext; ?></a>
                                    <?php } ?>                            
                                </div>
                            </div>                        
                        <?php } elseif( $layout_style == 'style4' ){ ?>
                            <div class="campaign_style4">

                                <!-- Image -->
                                <?php if(has_post_thumbnail()): ?>
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"> <?php the_post_thumbnail('wppolitic_img370x410'); ?>
                                    </a>
                                <?php endif; ?>

                                <!-- Content -->
                                <div class="wp_politic_content_st4">
                                    <?php if( get_the_title() ){ ?>
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( wp_trim_words( get_the_title(), $titlelength , '' ) );?></a></h3>
                                    <?php } ?>
                                    <?php if($meta_show_hide == 'yes'){ 
                                        $dateformate = get_option('date_format');
                                        $campaign_datewp = strtotime( $campaign_date );
                                        ?> 
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i> <?php echo esc_html( $campaign_location );?></li>
                                        <li><i class="fa fa-clock-o"></i> <?php echo esc_html( date_i18n( $dateformate, $campaign_datewp ) ); ?></li>
                                    </ul>
                                    <?php } ?>
                                </div>

                            </div>
                        <?php }?>

                        <?php if($iteam_layout == 'grid'){echo '</div> '; } ?>

                        <?php endwhile; ?>
                    </div>

                <?php } ?>
            </div>


        <?php if(!empty($wp_politic_campaign_item_gutter)){ ?>
            <style>
                .campaign-active.<?php echo esc_attr( $sectionid );?> .slick-list{
                    margin: 0 -<?php echo esc_attr( $wp_politic_campaign_item_gutter ); ?>px;
                }
                .<?php echo esc_attr( $sectionid );?>.campaign-active .wp-campaign-box,.<?php echo esc_attr( $sectionid );?> .slick-slide {
                    margin:0 <?php echo esc_attr( $wp_politic_campaign_item_gutter ); ?>px;
                }
                .<?php echo esc_attr( $sectionid );?> .wppolitic-campaign-tlmn_box{
                    padding: 0 <?php echo esc_attr( $wp_politic_campaign_item_gutter ); ?>px;
                }
                </style>
       <?php } ?>
    

            <script type="text/javascript">
               jQuery(document).ready(function($) {

                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    $('.campaign-active.<?php echo esc_attr( $sectionid );?>').slick({
                        slidesToShow: _showitem_set,
                        arrows:_arrows_set,
                        dots: false,
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
                                    slidesToShow: 1
                                  }
                                }
                              ]
                        });

            $('.wppolitic_slider_for.<?php echo esc_attr( $sectionid );?>').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
              asNavFor: '.wppolitic_slider_nav'
            });
            $('.wppolitic_slider_nav.<?php echo esc_attr( $sectionid );?>').slick({
              slidesToShow: _showitem_set,
              slidesToScroll: 1,
              asNavFor: '.wppolitic_slider_for.<?php echo esc_attr( $sectionid );?>',
              dots: false,
              arrows:_arrows_set,
              autoplay: _autoplay_set,
              autoplaySpeed: _autoplay_speed,
              vertical: true,
              centerMode: false,
              focusOnSelect: true,
              focusOnSelect: true,
              prevArrow: '<div class="btn-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_prev'], [ 'aria-hidden' => 'true' ] );?></div>',
                nextArrow: '<div><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_next'], [ 'aria-hidden' => 'true' ] );?></div>',
            });
                    
                });

            </script>

        <?php

        wp_reset_query(); wp_reset_postdata();

    }

}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Campaign() );