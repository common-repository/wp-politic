<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPPolitic_Elementor_Widget_Section_Title extends Widget_Base {

    public function get_name() {
        return 'wppolitic-section-titel-addons';
    }
    
    public function get_title() {
        return __( 'WP Politic Section Title', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-heading';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_title_txt',
            [
                'label' => esc_html__( 'Section Title', 'wppolitic' ),
            ]
        );
        
            $this->add_control(
                'titlestyle',
                [
                    'label' => esc_html__( 'Title Style', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 1,
                    'options' => [
                        1 => esc_html__( 'Title', 'wppolitic' ),
                        'b_top' => esc_html__( 'Title With Border 1 Top', 'wppolitic' ),
                        2 => esc_html__( 'Title With Border 1 Bottom', 'wppolitic' ),
                        22 => esc_html__( 'Title With Border 2', 'wppolitic' ),
                        3 => esc_html__( 'Title width Icon 1', 'wppolitic' ),
                        33 => esc_html__( 'Title width Icon 2', 'wppolitic' ),
                        4 => esc_html__( 'Title width Border long', 'wppolitic' ),
                        6 => esc_html__( 'Title With Last Border', 'wppolitic' ),
                    ],
                ]
            );

            $this->add_control(
                'section_title_text',
                [
                    'label' => __( 'Title', 'wppolitic' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'Section Title',
                    'title' => __( 'Enter section title', 'wppolitic' ),
                ]
            );
            
            $this->add_control(
                'section_subtitle_text',
                [
                    'label' => __( 'Sub Title', 'wppolitic' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => '',
                    'title' => __( 'Enter sub title', 'wppolitic' ),
                ]
            );
            $this->add_control(
                'section_content_text',
                [
                    'label' => __( 'Content', 'wppolitic' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud etur, adipisci velit.',
                    'title' => __( 'Enter Content Here', 'wppolitic' ),
                ]
            );

            $this->add_control(
                'item_icone_option',
                [
                    'label' => __( 'Icon Options', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'condition' => [
                        'titlestyle' => array('3','33'),
                    ]
                ]
            );

           $this->add_control(
                'link_icon_type',
                [
                    'label' => esc_html__( 'Select Icon Type', 'wppolitic' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'wppolitic' ),
                        'image' => esc_html__( 'Image', 'wppolitic' ),
                    ],
                    'condition' => [
                        'titlestyle' => array('3','33'),
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
                        'titlestyle' => array('3','33'),
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
                        'value' => 'fa fa-dot-circle-o',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'titlestyle' => array('3','33'),
                        'link_icon_type' => 'icon',
                    ]
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_area_style',
            [
                'label' => __( 'Section style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'sectionmargin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'sectionpadding',
                [
                    'label' => __( 'Padding', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'aligntitle',
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
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style tab tite section
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Title style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'sectitle-heading',
                [
                    'label' => __( 'Title', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color_span',
                [
                    'label' => __( 'Title Color Text Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel h3 span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .wppolitic-section-titel h3',
                ]
            );

            $this->add_responsive_control(
                'titlenmargin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'titlepadding',
                [
                    'label' => __( 'Padding', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'sectitle-heading_boreder_icon',
                [
                    'label' => __( 'Border & Icon Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'title_border',
                    'label' => __( 'Title Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .wppolitic-section-titel.dotborder h3::after,{{WRAPPER}} .wppolitic-section-titel.dotborder.bdrs2 h3::before,{{WRAPPER}} .wppolitic-title-style-three span:after,
                    {{WRAPPER}} .wppolitic-title-style-three>span:before,
                    {{WRAPPER}} .wppolitic-title-style-three.bdrs2 > span >span:before,
                    {{WRAPPER}} .wppolitic-title-style-three.bdrs2 > span >span:after,
                    {{WRAPPER}} .wppolitic-title-style-four::after,
                    {{WRAPPER}} .title-style-six h3 span:after,
                    {{WRAPPER}} .wppolitic-section-titel.bdr_s_top h3:after',
                ]
            );
            $this->add_control(
                'border_icon_color',
                [
                    'label' => __( 'Icon Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' =>'#ddd',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-title-style-three span i' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'titlestyle' => array('3','33'),
                        'link_icon_type' => 'icon',
                    ]                    
                ]
            );   
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypograph_icon',
                    'selector' => '{{WRAPPER}} .wppolitic-title-style-three span i',
                    'condition' => [
                        'titlestyle' => array('3','33'),
                        'link_icon_type' => 'icon',
                    ] 
                ]
            );

        $this->end_controls_section();

        // Style tab sub title section
        $this->start_controls_section(
            'section_subtitle_style',
            [
                'label' => __( 'Sub title style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'subtitle-heading',
                [
                    'label' => __( 'Sub Title', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'subtitle_color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel h4' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitletypography',
                    'selector' => '{{WRAPPER}} .wppolitic-section-titel h4',
                ]
            );

            $this->add_responsive_control(
                'subtitlemargin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'subtitlepadding',
                [
                    'label' => __( 'Padding', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            
        $this->end_controls_section();

        // Style tab content section
        $this->start_controls_section(
            'section_contenttitle_style',
            [
                'label' => __( 'Content style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
            $this->add_control(
                'content-heading',
                [
                    'label' => __( 'Content', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'contentitle_color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contenttypography',
                    'selector' => '{{WRAPPER}} .wppolitic-section-titel p',
                ]
            );

            $this->add_responsive_control(
                'contenttitlemargin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'contentepadding',
                [
                    'label' => __( 'Padding', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-section-titel p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $titlestyle = $this->get_settings_for_display('titlestyle');
        $aligntitle = $this->get_settings_for_display('aligntitle');

        $title      = ! empty( $settings['section_title_text'] ) ? $settings['section_title_text'] : '';
        $subtitle   = ! empty( $settings['section_subtitle_text'] ) ? $settings['section_subtitle_text'] : '';
        $section_content_text   = ! empty( $settings['section_content_text'] ) ? $settings['section_content_text'] : '';

        $link_icon_type        = $this->get_settings_for_display('link_icon_type');
        $link_icon_font  =   $settings['link_icon_font'];
        $link_icon_iamge  =   (isset($settings['link_icon_iamge']['url']) ? $settings['link_icon_iamge']['url'] : '');

        ?>
            <div class="wppolitic-section-titel <?php if( $titlestyle == 2 || $titlestyle == 22){
                if( $titlestyle == 22){ echo 'dotborder bdrs2 '; }else{ echo 'dotborder'; }
              }elseif($titlestyle == 3){ 
               echo 'wppolitic-title-style-three';
                 }elseif( $titlestyle == 33){ echo 'wppolitic-title-style-three bdrs2';}
            elseif($titlestyle == 4){echo 'wppolitic-title-style-four'; }elseif($titlestyle == 6){echo 'title-style-six'; }elseif($titlestyle == 'b_top'){echo 'bdr_s_top'; }else{echo 'default-style'; } if( $aligntitle ==  'left'){ echo ' text-left'; }
            elseif($aligntitle ==  'right'){echo ' text-right'; }
            else{echo ' text-center'; } ?>">
                <?php

                        if(!empty($subtitle)){
                            echo '<h4 class="section-sub-titel-txt">'. wp_kses_post( $subtitle ).'</h4>';
                        }if(!empty($title)){
                            echo '<h3 class="wppolitic-section-titel-txt">'. wp_kses_post( $title ).'</h3>';
                        }
                        if( $titlestyle == 3 || $titlestyle == 33 && !empty($link_icon_font)){

                            echo "<span><span>";
                            \Elementor\Icons_Manager::render_icon( $settings['link_icon_font'], [ 'aria-hidden' => 'true' ] );
                            echo "</span></span>";

                        }elseif( $titlestyle == 3 || $titlestyle == 33 && !empty($link_icon_iamge)){
                            ?>
                                <img src="<?php echo esc_url( $link_icon_iamge ); ?>" alt=" <?php echo esc_attr( $title );?>">
                            <?php
                        }


                    if( !empty($section_content_text) ){
                         echo '<p>' . wp_kses_post( $section_content_text ) . '</p>';
                    }
                ?>
            </div>

        <?php

    }


}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Section_Title() );