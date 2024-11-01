<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class WPPolitic_Elementor_Widget_Slider extends Widget_Base
{

    public function get_name()
    {
        return 'wppolitic-slider';
    }

    public function get_title()
    {
        return __('WP Politic: Slider', 'wppolitic');
    }

    public function get_icon()
    {
        return 'eicon-post-slider';
    }
    public function get_categories()
    {
        return ['wppolitic'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'slider_content_setting',
            [
                'label' => esc_html__('Slider Content', 'wppolitic'),
            ]
        );
        $this->add_control(
            'sllayout',
            [
                'label' => __('Slider Layout', 'wppolitic'),
                'type' => Controls_Manager::SELECT,
                'default' => 1,
                'options' => [
                    1 => __('Layout One', 'wppolitic'),
                    2 => __('Layout Two', 'wppolitic'),
                    3 => __('Layout Three', 'wppolitic'),
                ]
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'slimage',
            [
                'label' => __('Slider Background Image', 'wppolitic'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'sltitle',
            [
                'label' => __('Slider Title', 'wppolitic'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'title' => __('HONESTY IDEOLOGY TO THE PEOPLE', 'wppolitic'),
            ]
        );
        $repeater->add_control(
            'slsubtitle',
            [
                'label' => __('Slider Subtitle', 'wppolitic'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'label_block' => 'true',
                'title' => __('HEY! WE ARE MIATA', 'wppolitic'),
            ]
        );
        $repeater->add_control(
            'slcontent',
            [
                'label' => __('Slider Content', 'wppolitic'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'label_block' => 'true',
                'title' => __('', 'wppolitic'),
            ]
        );

        $repeater->add_control(
            'slbutton',
            [
                'label' => __('Button Text', 'wppolitic'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read More',
                'title' => __('Enter slider button text', 'wppolitic'),
            ]
        );

        $repeater->add_control(
            'slbuttonlink',
            [
                'label' => __('Link', 'wppolitic'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://example.com', 'wppolitic'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'slbuttonimage',
            [
                'label' => __('Button Image', 'wppolitic'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $repeater->add_control(
            'slbutton_video',
            [
                'label' => __('Video Button Text', 'wppolitic'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'title' => __('Enter slider video button text', 'wppolitic'),
            ]
        );

        $repeater->add_control(
            'slbuttonlink_video',
            [
                'label' => __('Video URL', 'wppolitic'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://example.com', 'wppolitic'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'slbuttonimage_video',
            [
                'label' => __('Video Button Image', 'wppolitic'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $repeater->add_control(
            'font_image',
            [
                'label' => __('Slider Fornt Image', 'wppolitic'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'sliders_list',
            [
                'label' => __('Slider', 'wppolitic'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'sltitle' => __('HONESTY IDEOLOGY TO THE PEOPLE.', 'wppolitic'),
                        'slsubtitle' => __('NHEY! WE ARE MIATA', 'wppolitic'),
                        'slcontent' => __('', 'wppolitic'),
                        'slbutton' => __('Read More', 'wppolitic'),
                        'slbuttonlink' => __('#', 'wppolitic'),
                        'slbutton_video' => __('', 'wppolitic'),
                        'slbuttonlink_video' => __('#', 'wppolitic'),
                    ],
                ],
                'title_field' => '{{{ sltitle }}}',
            ]
        );

        $this->end_controls_section();
        // content tab

        // Slider Option
        $this->start_controls_section(
            'slider_option_setting',
            [
                'label' => esc_html__('Slider Option', 'wppolitic'),
            ]
        );
        $this->add_control(
            'sl_loop',
            [
                'label' => esc_html__('Loop', 'wppolitic'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'slautoplay',
            [
                'label' => esc_html__('Auto play', 'wppolitic'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'slautoplayspeed',
            [
                'label' => __('Auto play speed', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 5000000,
                'step' => 100,
                'default' => 500000,
                'condition' => [
                    'slautoplay' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'slide_speed',
            [
                'label' => __('Slide Speed', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 500000,
                'step' => 100,
                'default' => 2000,
            ]
        );
        $this->add_control(
            'slarrows',
            [
                'label' => esc_html__('Arrow', 'wppolitic'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'slarrows_type',
            [
                'label' => esc_html__('Select Icon Type', 'wppolitic'),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => esc_html__('Icon', 'wppolitic'),
                    'image' => esc_html__('Image', 'wppolitic'),
                ],
                'condition' => [
                    'slarrows' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slarrows_iamge_next',
            [
                'label' => __('Icon image Next', 'wppolitic'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'slarrows' => 'yes',
                    'slarrows_type' => 'image',
                ]
            ]
        );
        $this->add_control(
            'slarrows_iamge_prev',
            [
                'label' => __('Icon image Prev', 'wppolitic'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'slarrows' => 'yes',
                    'slarrows_type' => 'image',
                ]
            ]
        );

        $this->add_control(
            'slarrowsicon_font_next',
            [
                'label' => __('Icon Next', 'wppolitic'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-angle-right',
                    'library' => 'solid',
                ],
                'condition' => [
                    'slarrows' => 'yes',
                    'slarrows_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'slarrowsicon_font_prev',
            [
                'label' => __('Icon Prev', 'wppolitic'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-angle-left',
                    'library' => 'solid',
                ],
                'condition' => [
                    'slarrows' => 'yes',
                    'slarrows_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'sldots',
            [
                'label' => esc_html__('Dots', 'wppolitic'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'dot_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'wppolitic'),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => esc_html__('Icon', 'wppolitic'),
                    'image' => esc_html__('Image', 'wppolitic'),
                ],
                'condition' => [
                    'sldots' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'dot_icon_iamge',
            [
                'label' => __('Icon image', 'wppolitic'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'sldots' => 'yes',
                    'dot_icon_type' => 'image',
                ]
            ]
        );
        $this->add_control(
            'dot_icon_font',
            [
                'label' => __('Icon', 'wppolitic'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-dot-circle-o',
                    'library' => 'solid',
                ],
                'condition' => [
                    'sldots' => 'yes',
                    'dot_icon_type' => 'icon',
                ],
            ]
        );
        $this->add_control(
            'dot_show_position',
            [
                'label' => esc_html__('Dots Show In', 'wppolitic'),
                'type' => Controls_Manager::SELECT,
                'default' => 'dot_right_center',
                'options' => [
                    'dot_hori_center' => esc_html__('Bottom Center', 'wppolitic'),
                    'dot_bottom_left' => esc_html__('Bottom Left', 'wppolitic'),
                    'dot_bottom_right' => esc_html__('Bottom Right', 'wppolitic'),
                    'dot_right_center' => esc_html__('Right Center', 'wppolitic'),
                    'dot_left_center' => esc_html__('Left Center', 'wppolitic'),
                ],
                'condition' => [
                    'sldots' => 'yes',
                ]
            ]
        );
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'slider_style',
            [
                'label' => __('Slider Content Style', 'wppolitic'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_slide_overlay_style'
        );
        $this->start_controls_tab(
            'slider_slide_overlay_style_normal',
            [
                'label' => __('Normal', 'wppolitic'),
            ]
        );
        $this->add_control(
            'slider_slide_overlay_heading',
            [
                'label' => __('Slider Overlay', 'wppolitic'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'slider_overlay_color',
            [
                'label' => __('Slider Overlay Color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.0)',
                'selectors' => [
                    '{{WRAPPER}} .background-video-holder::before,{{WRAPPER}} .wppolitic-slider-item::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_content_alignment',
            [
                'label' => __('Slider Content Alignment', 'wppolitic'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'wppolitic'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'wppolitic'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'wppolitic'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_seciton_height',
            [
                'label' => __('Slider Height', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 2000,
                'step' => 1,
                'default' => 800,
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content' => 'height: {{VALUE}}px;',
                ],
            ]
        );
        $this->add_control(
            'slider_title_heading',
            [
                'label' => __('Title', 'wppolitic'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_color_text',
            [
                'label' => __('Title color Text', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ea000d',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content h1 span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'titletypography',
                'selector' => '{{WRAPPER}} .wppolitic-slide-content h1',
            ]
        );
        $this->add_responsive_control(
            'title_text_margin',
            [
                'label' => __('Title Margin', 'wppolitic'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_control(
            'slider_subtitle_heading',
            [
                'label' => __('Subtitle', 'wppolitic'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Sub Title color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'subtitle_color_text',
            [
                'label' => __('Sub Title color Text', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ea000d',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitletypography',
                'selector' => '{{WRAPPER}} .wppolitic-slide-content h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'subtitlestyle_border',
                'label' => __('Subtitle Border', 'wppolitic'),
                'selector' => '{{WRAPPER}} .wppolitic-slide-content h2:after',
            ]
        );
        $this->add_responsive_control(
            'subtitle_text_padding',
            [
                'label' => __('Sub Title Padding', 'wppolitic'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'subtitle_text_margin',
            [
                'label' => __('Sub Title Margin', 'wppolitic'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_control(
            'slider_content_heading',
            [
                'label' => __('Content', 'wppolitic'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __('Content color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'contenttypography',
                'selector' => '{{WRAPPER}} .wppolitic-slide-content p',
            ]
        );

        $this->add_control(
            'slider_button_heading',
            [
                'label' => __('Button', 'wppolitic'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'slbtn_color',
            [
                'label' => __('Button color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'slbtn_bg_color',
            [
                'label' => __('Button background color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.0)',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-btn a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btntypography',
                'selector' => '{{WRAPPER}} .wppolitic-slide-btn a',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => __('Button Border', 'wppolitic'),
                'selector' => '{{WRAPPER}} .wppolitic-slide-btn a',
            ]
        );
        $this->add_control(
            'btn_border_radius',
            [
                'label' => __('Border Radius', 'wppolitic'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'btn_border_pading',
            [
                'label' => __('Button Padding', 'wppolitic'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'btn_border_margin',
            [
                'label' => __('Button Margin', 'wppolitic'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'item_box_style_hover_tab',
            [
                'label' => __('Hover', 'wppolitic'),
            ]
        );

        $this->add_control(
            'slbtn_color_hover',
            [
                'label' => __('Button Hover color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-btn a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'slbtn_bg_color_hover',
            [
                'label' => __('Button background Hover color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ea000d',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slide-btn a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border_hover',
                'label' => __('Button Border', 'wppolitic'),
                'selector' => '{{WRAPPER}} .wppolitic-slide-btn a:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __('Carousel Button', 'wppolitic'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_arrow_button_heading_tabs'
        );
        $this->start_controls_tab(
            'slider_arrow_button_heading_normal_tab',
            [
                'label' => __('Normal', 'wppolitic'),
            ]
        );
        $this->add_control(
            'slider_arrow_button_heading',
            [
                'label' => __('Arrow Button', 'wppolitic'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'carousel_nav_color',
            [
                'label' => __('COlor', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .owl-nav div' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'carousel_nav_bg_color',
            [
                'label' => __('BG COlor', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ea000d',
                'selectors' => [
                    '{{WRAPPER}} .owl-nav div' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrwo_border',
                'label' => __('Border', 'wppolitic'),
                'selector' => '{{WRAPPER}} .owl-nav div',
            ]
        );
        $this->add_control(
            'carousel_nav_border_radius',
            [
                'label' => __('Border Radius', 'wppolitic'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .owl-nav div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'carousel_navicon_width',
            [
                'label' => __('Width', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => 50,
                'selectors' => [
                    '{{WRAPPER}} .owl-nav div' => 'width: {{VALUE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'carousel_navicon_height',
            [
                'label' => __('Height', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => 50,
                'selectors' => [
                    '{{WRAPPER}} .owl-nav div' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'carousel_nav_typography',
                'selector' => '{{WRAPPER}} .owl-nav div',
            ]
        );
        $this->add_control(
            'carousel_nav_border_radius_hover',
            [
                'label' => __('Border Radius', 'wppolitic'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .owl-nav div:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'carousel_nav_margin',
            [
                'label' => __('Arrow Margin', 'wppolitic'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .owl-nav div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        $this->add_control(
            'pagination_button_heading',
            [
                'label' => __('Pagination Button', 'wppolitic'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'pagination_color',
            [
                'label' => __('Button Color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ea000d',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slider-area .owl-dots .owl-dot' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pagination_icon_size',
            [
                'label' => __('Icon Size', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slider-area .owl-dots .owl-dot' => 'font-size: {{VALUE}}px;',
                    '{{WRAPPER}} .wppolitic-slider-area .owl-dots .owl-dot img' => 'width: {{VALUE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'pagination_bottom_space',
            [
                'label' => __('Bottom Space', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => '',
                'max' => 500,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slider-area .owl-dots' => 'bottom: {{VALUE}}px;',
                ],
                'condition' => [
                    'dot_show_position' => array('dot_bottom_right', 'dot_bottom_left', 'dot_hori_center'),
                ]
            ]
        );
        $this->add_responsive_control(
            'pagination_right_space',
            [
                'label' => __('Right Space', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => '',
                'max' => 1800,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slider-area .owl-dots' => 'right: {{VALUE}}px;',
                ],
                'condition' => [
                    'dot_show_position' => array('dot_bottom_right', 'dot_right_center'),
                ]

            ]
        );
        $this->add_responsive_control(
            'pagination_left_space',
            [
                'label' => __('Left Space', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => '',
                'max' => 1800,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slider-area .owl-dots' => 'left: {{VALUE}}px;',
                ],
                'condition' => [
                    'dot_show_position' => array('dot_bottom_left', 'dot_left_center'),
                ]

            ]
        );



        $this->end_controls_tab();
        $this->start_controls_tab(
            'slider_arrow_button_heading_hovr_tab',
            [
                'label' => __('Hover', 'wppolitic'),
            ]
        );
        $this->add_control(
            'carousel_nav_color_hover',
            [
                'label' => __('Color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .owl-nav div:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'carousel_nav_bg_color_hover',
            [
                'label' => __('BG COlor', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .owl-nav div:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrwo_border_hover',
                'label' => __('Border', 'wppolitic'),
                'selector' => '{{WRAPPER}} .wppolitic-slider-area .owl-dots::after,{{WRAPPER}} .owl-nav div:hover',
            ]
        );
        $this->add_control(
            'pagination_active_heading',
            [
                'label' => __('Pagination Hover', 'wppolitic'),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'pagination_active_color',
            [
                'label' => __('Button Active Color', 'wppolitic'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slider-area .owl-dots .owl-dot.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'pagination_icon_active_size',
            [
                'label' => __('Font Size', 'wppolitic'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .wppolitic-slider-area .owl-dots .owl-dot.active' => 'font-size: {{VALUE}}px;',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        // Slider Option
        $sllayout = $settings['sllayout'];
        $sl_loop = $settings['sl_loop'];
        $slautoplay = $settings['slautoplay'];
        $slarrows = $settings['slarrows'];
        $sldots = $settings['sldots'];
        $dot_show_position = $settings['dot_show_position'];
        $slautoplayspeed = $settings['slautoplayspeed'];
        $slide_speed = $settings['slide_speed'];
        $sectionid =  $this->get_id();
        $dot_icon_type        = $this->get_settings_for_display('dot_icon_type');
        $dot_icon_font        = $settings['dot_icon_font'];
        $dot_icon_iamge  =   (isset($settings['dot_icon_iamge']['url']) ? $settings['dot_icon_iamge']['url'] : '');
        $icon_imgprint = '<img src="' . esc_url( $dot_icon_iamge ) . '" alt="' . ( isset( $settings['dot_icon_iamge']['alt'] ) ? esc_attr( $settings['dot_icon_iamge']['alt'] ): "" ) . '" />';
        $slarrows_type        = $this->get_settings_for_display('slarrows_type');
        $slarrows_iamge_next  =   (isset($settings['slarrows_iamge_next']['url']) ? $settings['slarrows_iamge_next']['url'] : '');
        $slarrows_iamge_prev  =   (isset($settings['slarrows_iamge_prev']['url']) ? $settings['slarrows_iamge_prev']['url'] : '');
        $slarrows_iamge_next = '<img src="' . esc_url( $slarrows_iamge_next ) . '" alt="' . esc_html__( 'Next', 'wppolitic' ) . '" />';
        $slarrows_iamge_prev = '<img src="' . esc_url( $slarrows_iamge_prev ) . '" alt="' . esc_html__( 'Prev', 'wppolitic' ) . '" />';
        $dot_icon_font =  WPPolitic_Icon_manager::render_icon($settings['dot_icon_font'], ['aria-hidden' => 'true']);
        if ($slarrows_type == 'icon') {

            $print_next =  WPPolitic_Icon_manager::render_icon($settings['slarrowsicon_font_next'], ['aria-hidden' => 'true']);
            $print_prev = WPPolitic_Icon_manager::render_icon($settings['slarrowsicon_font_prev'], ['aria-hidden' => 'true']);
        } else {
            $print_next = $slarrows_iamge_next;
            $print_prev = $slarrows_iamge_prev;
        }
?>
        <!-- Slider Section Start -->
        <div class="wppolitic-slider-area <?php if ($slarrows_type == 'image') { echo 'arrow_hover'; }; if (!empty($dot_show_position)) { echo esc_attr( $dot_show_position );} ?>">

            <?php if ($sllayout == 1) { ?>
                <div class="wppolitic-slider-active <?php echo esc_attr( $sectionid ); ?> owl-theme owl-carousel">
                    <?php
                    foreach ($settings['sliders_list'] as $item) :
                        // Button Link
                        $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                        $images = $item['slimage'];
                        $slbuttonimage = $item['slbuttonimage'];
                        $slbuttonimage_video = $item['slbuttonimage_video'];
                        $slbuttonimage_video = $slbuttonimage_video['url'];
                    ?>
                        <!-- Slider Single -->
                        <div class="wppolitic-slider-item" style="background-image: url(<?php echo esc_url( $images['url'] ); ?>);" data-dot="<?php if ( $dot_icon_type == 'image') { echo esc_attr( $icon_imgprint );} else { echo esc_attr( $dot_icon_font ); } ?>">

                            <div class="container">
                                <div class="row">
                                    <div class="wppolitic-slide-content col-md-12">
                                        <?php
                                        if (!empty($item['slsubtitle'])) {
                                            echo '<h2>' . wp_kses_post( $item['slsubtitle'] ) . '</h2>';
                                        }

                                        if (!empty($item['sltitle'])) {
                                            echo '<h1>' . wp_kses_post( $item['sltitle'] ) . '</h1>';
                                        }
                                        if (!empty($item['slcontent'])) {
                                            echo '<p>' . wp_kses_post( $item['slcontent'] ) . '</p>';
                                        }
                                        if (!empty($item['slbutton'])  || !empty($item['slbutton_video'])) {
                                            echo '<div class="wppolitic-slide-btn">';
                                            if (!empty($item['slbutton'])) {
                                                echo '<a class="read-more" href="' . esc_url( $item['slbuttonlink']['url'] ) . '"' . $target . $nofollow . '> ' . wp_kses_post( $item['slbutton'] ) . '</a>';
                                            }
                                            if (!empty($item['slbuttonlink_video']['url'])) {
                                                echo '<a class=" wppolitic_popup_slider" href="' . esc_url($item['slbuttonlink_video']['url']) . '"> ' . $item['slbutton_video'];

                                                if (!empty($slbuttonimage_video)) {
                                                    echo ' <img src="' . esc_url( $slbuttonimage_video ) . ' " alt="' . esc_html__( 'video', 'wppolitic' ) . '">';
                                                }
                                                echo '</a>';
                                            }

                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Single -->
                    <?php endforeach; ?>
                </div>
            <?php } elseif ($sllayout == 2) { ?>
                <div class="wppolitic-slider-active <?php echo esc_attr( $sectionid ); ?> owl-theme owl-carousel">
                    <?php
                    foreach ($settings['sliders_list'] as $item) :
                        // Button Link
                        $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                        $images = $item['slimage'];
                        $font_image = $item['font_image'];
                        $slbuttonimage = $item['slbuttonimage'];
                        $slbuttonimage = $slbuttonimage['url'];
                        $slbuttonimage_video = $item['slbuttonimage_video'];
                        $slbuttonimage_video = $slbuttonimage_video['url'];

                    ?>
                        <!-- Slider Single -->
                        <div class="wppolitic-slider-item" style="background-image: url(<?php echo esc_url( $images['url'] ); ?>);" data-dot="<?php if ( $dot_icon_type == 'image' ) { echo esc_attr( $icon_imgprint ); } else { echo esc_attr( $dot_icon_font ); } ?>">

                            <div class="container">
                                <div class="row">
                                    <div class="wppolitic-slide-content col-md-6">
                                        <?php
                                        if (!empty($item['slsubtitle'])) {
                                            echo '<h2>' . wp_kses_post( $item['slsubtitle'] ) . '</h2>';
                                        }

                                        if (!empty($item['sltitle'])) {
                                            echo '<h1>' . wp_kses_post( $item['sltitle'] ) . '</h1>';
                                        }
                                        if (!empty($item['slcontent'])) {
                                            echo '<p>' . wp_kses_post( $item['slcontent'] ) . '</p>';
                                        }
                                        if (!empty($item['slbutton'])) {
                                            echo '<div class="wppolitic-slide-btn">';
                                            if (!empty($item['slbuttonlink'])) {
                                                echo '<a class="read-more" href="' . esc_url( $item['slbuttonlink']['url'] ) . '"' . $target . $nofollow . '>';
                                                if (!empty($slbuttonimage)) {
                                                    echo ' <img src="' . esc_url( $slbuttonimage ) . ' " alt="' . esc_html__( 'image', 'wppolitic' ) . '">';
                                                }
                                                echo wp_kses_post( $item['slbutton'] ) . '</a>';
                                            }
                                            echo '</div>';
                                        }
                                        ?>

                                    </div>
                                    <div class="wppolitic-slide-frnt-img col-md-6">
                                        <div class="wppolitic-slid-img-right">
                                            <?php
                                            if (!empty($font_image)) { ?>
                                                <img src="<?php echo esc_url( $font_image['url'] ); ?>" alt="<?php echo isset( $font_image['alt'] ) ? esc_attr( $font_image['alt'] ) : ''; ?>">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Single -->
                    <?php endforeach; ?>
                </div>
            <?php } elseif ($sllayout == 3) { ?>
                <div class="wppolitic-slider-active <?php echo esc_attr( $sectionid ); ?> owl-theme owl-carousel">
                    <?php
                    foreach ($settings['sliders_list'] as $item) :
                        // Button Link
                        $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                        $images = $item['slimage'];
                        $font_image = $item['font_image'];
                    ?>
                        <!-- Slider Single -->
                        <div class="wppolitic-slider-item" style="background-image: url(<?php echo esc_url( $images['url'] ); ?>);" data-dot="<?php if ( $dot_icon_type == 'image' ) { echo esc_attr( $icon_imgprint ); } else { echo esc_attr( $dot_icon_font );  } ?>">
                            <div class="container-fluid">
                                <div class="row flex-row-reverse">
                                    <div class="wppolitic-slide-content col-md-7">
                                        <?php
                                        if (!empty($item['slsubtitle'])) {
                                            echo '<h2>' . wp_kses_post( $item['slsubtitle'] ) . '</h2>';
                                        }

                                        if (!empty($item['sltitle'])) {
                                            echo '<h1>' . wp_kses_post( $item['sltitle'] ) . '</h1>';
                                        }
                                        if (!empty($item['slcontent'])) {
                                            echo '<p>' . wp_kses_post( $item['slcontent'] ) . '</p>';
                                        }
                                        if (!empty($item['slbutton'])) {
                                            echo '<div class="wppolitic-slide-btn">';
                                            if (!empty($item['slbuttonlink'])) {
                                                echo '<a class="read-more" href="' . esc_url( $item['slbuttonlink']['url'] ) . '"' . $target . $nofollow . '> ' . wp_kses_post( $item['slbutton'] ) . '</a>';
                                            }
                                            echo '</div>';
                                        }

                                        ?>
                                    </div>
                                    <div class="wppolitic-slide-frnt-img col-md-5">
                                        <div class="wppolitic-slid-img-right">
                                        <?php
                                                if (!empty($font_image)) { ?>
                                                    <img src="<?php echo esc_url( $font_image['url'] ); ?>" alt="<?php echo isset( $font_image['alt'] ) ? esc_attr( $font_image['alt'] ) : ''; ?>">
                                                <?php
                                                }
                                                ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider Single -->
                    <?php endforeach; ?>
                </div>
            <?php } else { ?>

                <div class="wppolitic-slider-active <?php echo esc_attr( $sectionid ); ?> owl-theme owl-carousel">
                    <?php
                    foreach ($settings['sliders_list'] as $item) :
                        // Button Link
                        $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';
                        $images = $item['slimage'];
                    ?>
                        <div class="banner-area background-video-holder" data-dot="<?php if ( $dot_icon_type == 'image' ) {
                                                                                        echo esc_attr( $icon_imgprint );
                                                                                    } else {
                                                                                        echo esc_attr( $dot_icon_font );
                                                                                    } ?>">
                            <!-- Single Banner -->
                            <div class="banner fullscreen">
                                <div class="container">
                                    <div class="row">
                                        <div class="wppolitic-slide-content col-md-12">
                                            <?php
                                            if (!empty($item['slsubtitle'])) {
                                                echo '<h2>' . wp_kses_post( $item['slsubtitle'] ) . '</h2>';
                                            }

                                            if (!empty($item['sltitle'])) {
                                                echo '<h1>' . wp_kses_post( $item['sltitle'] ) . '</h1>';
                                            }
                                            if (!empty($item['slcontent'])) {
                                                echo '<p>' . wp_kses_post( $item['slcontent'] ) . '</p>';
                                            }
                                            if (!empty($item['slbutton'])) {
                                                echo '<div class="wppolitic-slide-btn">';
                                                if (!empty($item['slbuttonlink'])) {
                                                    echo '<a class="read-more" href="' . esc_url( $item['slbuttonlink']['url'] ) . '"' . $target . $nofollow . '> ' . wp_kses_post( $item['slbutton'] ) . '</a>';
                                                }
                                                echo '</div>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php } ?>
        </div>


        <!-- Slider Section End -->

        <script type="text/javascript">
            jQuery(document).ready(function($) {

                // images have loaded
                $('.wppolitic-slider-active').imagesLoaded(function() {

                    var _arrows_set = <?php echo esc_js($slarrows) == 'yes' ? 'true' : 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js($slautoplay) == 'yes' ? 'true' : 'false'; ?>;
                    var _sl_loop_set = <?php echo esc_js($sl_loop) == 'yes' ? 'true' : 'false'; ?>;
                    var _autoplay_speed = <?php if (isset($slautoplayspeed)) {
                                                echo esc_js($slautoplayspeed);
                                            } else {
                                                echo esc_js(5000);
                                            }; ?>;
                    var _slide_speed = <?php if (isset($slide_speed)) {
                                            echo esc_js($slide_speed);
                                        } else {
                                            echo esc_js(2000);
                                        }; ?>;
                    var _dots_set = <?php echo esc_js($sldots) == 'yes' ? 'true' : 'false'; ?>;

                    $('.wppolitic-slider-active.<?php echo esc_attr( $sectionid ); ?>').owlCarousel({
                        items: 1,
                        loop: _sl_loop_set,
                        margin: 0,
                        autoHeight: true,
                        dots: _dots_set,
                        dotsData: true,
                        nav: _arrows_set,
                        autoplay: _autoplay_set,
                        autoplayTimeout: _autoplay_speed,
                        smartSpeed: _slide_speed,
                        navText: ['<span>Prev</span><?php echo $print_prev; ?>', '<span>Next</span><?php echo $print_next; ?>'],

                    });

                });

            });
        </script>

<?php

    }
}

wppolitic_widget_register_manager(new WPPolitic_Elementor_Widget_Slider());
