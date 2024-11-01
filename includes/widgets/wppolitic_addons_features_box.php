<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPPolitic_Elementor_Widget_features_box extends Widget_Base {

    public function get_name() {
        return 'wppolitic-features';
    }
    
    public function get_title() {
        return __( 'WP Politic Features Box', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'features-box-setting',
            [
                'label' => esc_html__( 'Features Box', 'wppolitic' ),
            ]
        );
            $this->add_control(
                'features_title',
                [
                    'label' => __( 'Features Title', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Our Election',
                    'title' => __( 'Features Title', 'wppolitic' ),
                ]
            );
            $this->add_control(
                'features_des',
                [
                    'label' => __( 'Features Description', 'wppolitic' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'To create a society in which an informed and active citizenry is sovereign and makes policy decisions based on the will.',
                    'title' => __( 'Features Description', 'wppolitic' ),
                ]
            );
           $this->add_control(
                'features_icon_type',
                [
                    'label' => esc_html__( 'Select Icon Type', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'wppolitic' ),
                        'image' => esc_html__( 'Image', 'wppolitic' ),
                        'cusicon' => esc_html__( 'Custom Icon', 'wppolitic' ),
                    ],
                ]
            );

            $this->add_control(
                'features_img',
                [
                    'label' => __( 'Icon image', 'wppolitic' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'features_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'features_icon',
                [
                    'label' => __( 'Icon', 'wppolitic' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-tree',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'features_icon_type' => 'icon',
                    ]
                ]
            );
            $this->add_control(
                'features_icon_text',
                [
                    'label' => __( 'Icon Text', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' =>'icon-megaphone',
                    'condition' => [
                        'features_icon_type' => 'cusicon',
                    ]
                ]
            );
            $this->add_control(
                'icon_bg_shap',
                [
                    'label' => esc_html__( 'Icon Hover Border Show/Hide', 'wppolitic' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            ); 
        $this->end_controls_section();
        // content tab
        $this->start_controls_section(
            'feature_iocn__style',
            [
                'label' => __( 'Icon Box', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'style_tabs1'
        );
            // Normal style tab
            $this->start_controls_tab(
                'style_normal_tabq',
                [
                    'label' => __( 'Normal', 'wppolitic' ),
                ]
            );        
            $this->add_control(
                'icon-heading',
                [
                    'label' => __( 'Icon Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'f_icon-color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'f_icon-color_bg_color',
                [
                    'label' => __( 'Icon Bg Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image i' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'f_icontypography',
                [
                    'label' => __( 'Font Size', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 200,
                    'step' => 1,
                    'default' => 30,
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image i' => 'font-size: {{VALUE}}px;',
                    ],
                ]
            );

            $this->add_control(
                'f_icon-colorborder_radius',
                [
                    'label' => __( 'Border Radius', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );
            $this->add_responsive_control(
                'f_icon_width',
                [
                    'label' => __( 'Width', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 300,
                    'step' => 1,
                    'default' => 60,
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image i' => 'width: {{VALUE}}px;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'f_icon_height',
                [
                    'label' => __( 'Height', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 300,
                    'step' => 1,
                    'default' => 60,
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image i' => 'height: {{VALUE}}px;',
                    ],
                ]
            );            
            $this->add_control(
                'icon-heading_box',
                [
                    'label' => __( 'Icon Box Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            ); 

            $this->add_control(
                'heading_box_bg_color',
                [
                    'label' => __( 'BG COlor', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' =>'#f6f6f6',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'heading_box_border_radius',
                [
                    'label' => __( 'Border Radius', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                ]
            );

            $this->add_responsive_control(
                'heading_boxicon_width',
                [
                    'label' => __( 'Width', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'default' => 92,
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image' => 'width: {{VALUE}}px;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'heading_boxicon_height',
                [
                    'label' => __( 'Height', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'default' => 92,
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image' => 'height: {{VALUE}}px;',
                    ],
                ]
            );
             $this->end_controls_tab();
            // Normal style tab
            $this->start_controls_tab(
                'style_hover_tabs',
                [
                    'label' => __( 'Hover', 'wppolitic' ),
                ]
            );
            $this->add_control(
                'icon-heading_hover',
                [
                    'label' => __( 'Icon Hover', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'f_icon-color_hover',
                [
                    'label' => __( 'Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image:hover i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'f_icon-color_bg_color_hover',
                [
                    'label' => __( 'Icon Bg Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image:hover i' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'icon-heading_box_hover',
                [
                    'label' => __( 'Icon Box Hover', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            ); 

            $this->add_control(
                'heading_box_bg_color_hover',
                [
                    'label' => __( 'BG Hover COlor', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' =>'#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box:hover .wppolitic-feature-image' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'heading_box_shap_border_color_hover',
                [
                    'label' => __( 'Box Shap Border COlor', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' =>'#2d3e50',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-image .shape,{{WRAPPER}} .wppolitic-feature-box .wppolitic-feature-image .shape::before,{{WRAPPER}} .wppolitic-feature-box .wppolitic-feature-image .shape::after' => 'background: {{VALUE}};',
                    ],
                    'condition' => [
                        'icon_bg_shap' => 'yes',
                    ] 
                ]
            );

            $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();        
        // Style tab section
        $this->start_controls_section(
            'feature_icon__style',
            [
                'label' => __( 'Content Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs2'
        );
            // Normal style tab
            $this->start_controls_tab(
                'content_style_normal_tab',
                [
                    'label' => __( 'Normal', 'wppolitic' ),
                ]
            );         
            $this->add_control(
                'features_title-heading',
                [
                    'label' => __( 'Title', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'features_title_color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'features_titletypography',
                    'selector' => '{{WRAPPER}} .wppolitic-feature-box h3',
                ]
            );
             $this->add_responsive_control(
                'features_title_margin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            ); 
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'features_title_border',
                    'label' => __( 'Title Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic-feature-box h3:after',
                ]
            );
            $this->add_control(
                'descripton-heading',
                [
                    'label' => __( 'Description', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );            
            $this->add_control(
                'features_des-color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#555',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box > p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'features_destypography',
                    'selector' => '{{WRAPPER}} .wppolitic-feature-box > p',
                ]
            );            
            $this->end_controls_tab();
            // Normal style tab
            $this->start_controls_tab(
                'content_style_hover_tab',
                [
                    'label' => __( 'Hover', 'wppolitic' ),
                ]
            );
            $this->add_control(
                'features_title_color_hover',
                [
                    'label' => __( 'Title Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box:hover h3' => 'color: {{VALUE}};',
                    ],
                ]
            );  
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'features_title_border_hover',
                    'label' => __( 'Title Border Hover', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic-feature-box:hover h3:after',
                ]
            );    
            $this->add_control(
                'features_des-color_hover',
                [
                    'label' => __( 'Description Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#555',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box:hover p' => 'color: {{VALUE}};',
                    ],
                ]
            );                              
            $this->end_controls_tab();
            $this->end_controls_tabs();           
        $this->end_controls_section();
        // Style tab section
        // Style tab section
        $this->start_controls_section(
            'featurecontent_style',
            [
                'label' => __( 'Feature Box', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs3'
        );
            // Normal style tab
            $this->start_controls_tab(
                'box_style_normal_tab',
                [
                    'label' => __( 'Normal', 'wppolitic' ),
                ]
            );
            $this->add_control(
                'overlay_style',
                [
                    'label' => __( 'Box Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_responsive_control(
                'align_box',
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
                        'justify' => [
                            'title' => __( 'Justified', 'wppolitic' ),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box' => 'text-align: {{VALUE}};',
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
                        '{{WRAPPER}} .wppolitic-feature-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .wppolitic-feature-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'features_box_bg-color',
                [
                    'label' => __( 'Features Box BG Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box' => 'background: {{VALUE}};',
                    ],
                ]
            ); 
            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'wppolitic_box_shadow',
                    'label' => __( 'Box Shadow', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic-feature-box',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border',
                    'label' => __( 'Box Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic-feature-box',
                ]
            );  
            $this->add_control(
                'box_border_radious',
                [
                    'label' => __( 'Box Border Radius', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            // Normal style tab
            $this->start_controls_tab(
                'featurebx_style_hover_tab',
                [
                    'label' => __( 'Hover', 'wppolitic' ),
                ]
            );   
            $this->add_control(
                'features_box_bg-color_hover',
                [
                    'label' => __( 'Features Box BG Hover', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-feature-box:hover' => 'background: {{VALUE}};',
                    ],
                ]
            ); 
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wppolitic_box_shadow_hover',
                'label' => __( 'Box Shadow', 'wppolitic' ),
                'selector' => '{{WRAPPER}} .wppolitic-feature-box:hover',
            ]
        );                          
            $this->end_controls_tab();
            $this->end_controls_tabs();                      
        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();
        $features_title = $this->get_settings_for_display('features_title');
        $features_des = $this->get_settings_for_display('features_des');
        $features_icon_type = $this->get_settings_for_display('features_icon_type');
        $features_icon = $this->get_settings_for_display('features_icon');
        $icon_bg_shap = $this->get_settings_for_display('icon_bg_shap');
        $features_icon_text = $this->get_settings_for_display('features_icon_text');
        $features_img  =   (isset($settings['features_img']['url']) ? $settings['features_img']['url'] : '');

        ?>    
            <div class="wppolitic-feature-box">
                <?php if ($features_icon_type =="image" && !empty( $features_img )): ?>
                <div class="wppolitic-feature-image">
                    <img alt="iamge" src="<?php echo esc_url($features_img);?>">
                    <?php if( $icon_bg_shap == 'yes' ){ ?>
                    <span class="shape"></span>
                <?php } ?>                    
                 </div>
                <?php endif?>

                <?php if ($features_icon_type =="icon" && !empty( $features_icon )): ?>
                <div class="wppolitic-feature-image">                  
                  <?php  \Elementor\Icons_Manager::render_icon( $settings['features_icon'], [ 'aria-hidden' => 'true' ] );?>

                    <?php if( $icon_bg_shap == 'yes' ){ ?>
                    <span class="shape"></span>
                <?php } ?>
                </div>
                <?php endif?>
                <?php if ($features_icon_type =="cusicon" && !empty( $features_icon_text )): ?>
                <div class="wppolitic-feature-image">
                    <i class="<?php echo esc_attr($features_icon_text) ?>"></i>
                    <?php if( $icon_bg_shap == 'yes' ){ ?>
                    <span class="shape"></span>
                <?php } ?>
                </div>
                <?php endif?>

                <?php  if( !empty( $features_title ) ){
                    echo '<h3>'.esc_html( $features_title ) .'</h3>';
                    }
                   if(!empty($features_des)){ echo '<p>'. wp_kses_post( $features_des ).'</p>'; }
                ?>
            </div>
        <?php

    }


}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_features_box() );