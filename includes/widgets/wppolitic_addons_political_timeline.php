<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPPolitic_Elementor_Widget_Timeline extends Widget_Base {

    public function get_name() {
        return 'wppolitic-political-timeline';
    }
    
    public function get_title() {
        return __( 'WP Politic Timeline', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-time-line';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'political-timeline-setting',
            [
                'label' => esc_html__( 'Timeline', 'wppolitic' ),
            ]
        );
       $this->add_control(
            'wpts',
            [
                'label' => esc_html__( 'Select Style', 'wppolitic' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'sts1' => esc_html__( 'Style One', 'wppolitic' ),
                    'sts2' => esc_html__( 'Style Two', 'wppolitic' ),
                ],
            ]
        );
        $this->add_control(
            'content_length',
            [
                'label' => __( 'Content Length', 'ftagementor' ),
                'type' => Controls_Manager::NUMBER,
                'min' => -1,
                'max' => 100,
                'step' => 1,
                'default' => 20,
            ]
        );       
        $repeater = new Repeater();
            $repeater->add_control(
                'time_img',
                [
                    'label' => __( 'Timeline Image', 'wppolitic' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'timeline_img_size',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );
            
            $repeater->add_control(
                'timeline_title',
                [
                    'label' => __( 'Timeline Title ', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Creating the party’s brand',
                    'title' => __( 'Enter Title name', 'wppolitic' ),
                ]
            );
            $repeater->add_control(
                'timeline_date',
                [
                    'label' => __( 'Date', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'April 2019',
                    'label_block' => 'true',
                    'title' => __( 'Enter Date', 'wppolitic' ),
                ]
            );

            $repeater->add_control(
                'timeline_content',
                [
                    'label' => __( 'Timeline Content', 'wppolitic' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => __( 'Content', 'wppolitic' ),
                    'title' => __( 'Enter Timeline Content', 'wppolitic' ),
                ]
            );

            $this->add_control(
                'political-timeline_list',
                [
                    'label' => __( 'Timeline', 'wppolitic' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'timeline_title' => __( 'Creating the party’s brand', 'wppolitic' ),
                            'timeline_date' => __( 'April 2019', 'wppolitic' ),
                            'timeline_content' => __( 'Rapidiously redefine enterprise-wide collaboration and idea-sharing after world-class e-services. Conveniently e-enable 24/365 web services via high standards in synergy. Progressively whiteboard imperatives.Rapidiously redefine enterprise-wide collaboration and idea-sharing after world-class e-services. Conveniently e-enable 24/365 web services via high standards in synergy. Progressively whiteboard imperatives.', 'wppolitic' ),
                        ],
                    ],
                    'title_field' => '{{{ timeline_title }}}',
                ]
            );
            
        $this->end_controls_section();
        // content tab

        // Style tab section
        $this->start_controls_section(
            'political-timeline_style',
            [
                'label' => __( 'Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs1'
        );
            // Normal style tab
            $this->start_controls_tab(
                'box_style_normal_tab',
                [
                    'label' => __( 'Normal', 'wppolitic' ),
                ]
            );        
            $this->add_control(
                'wppolitic_timeline-heading_title',
                [
                    'label' => __( 'Title Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'wppolitic_timeline_title_color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_timeline-text > h3,{{WRAPPER}} .wppolitic_timeline .wppolitic_tm-content h4' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'wppolitic_timeline_titletypography',
                    'selector' => '{{WRAPPER}} .wppolitic_timeline-text > h3,{{WRAPPER}} .wppolitic_timeline .wppolitic_tm-content h4',
                ]
            );
            $this->add_responsive_control(
                'wppolitic_timeline_title_margin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_timeline-text > h3,{{WRAPPER}} .wppolitic_timeline .wppolitic_tm-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
           
            $this->add_control(
                'timeline_date-heading',
                [
                    'label' => __( 'Date Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_control(
                'timeline_date-color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_timeline-date,{{WRAPPER}} .wppolitic_timeline .date h4' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'timeline_datetypography',
                    'selector' => '{{WRAPPER}} .wppolitic_timeline-date,{{WRAPPER}} .wppolitic_timeline .date h4',
                ]
            );

            $this->add_control(
                'imelinedescription-heading',
                [
                    'label' => __( 'Content Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_control(
                'timeline_content-color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#555',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_timeline-text > p,{{WRAPPER}} .wppolitic_timeline .wppolitic_tm-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'timeline_contenttypography',
                    'selector' => '{{WRAPPER}} .wppolitic_timeline-text > p,{{WRAPPER}} .wppolitic_timeline .wppolitic_tm-content p',
                ]
            );
            
            $this->add_control(
                'content_box-heading',
                [
                    'label' => __( 'Content Box Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_responsive_control(
                'wppolitic_cnt_boxpadding',
                [
                    'label' => __( 'Padding', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_timeline-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'wppolitic_aligntitle',
                [
                    'label' => __( 'Cotent Aligment ', 'wppolitic' ),
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
                        '{{WRAPPER}} .wppolitic_timeline-text' => 'text-align: {{VALUE}};',
                    ],
                ]
            );   

            $this->add_control(
                'timeline_border-heading',
                [
                    'label' => __( 'Time line Border Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'timeleing_border',
                    'label' => __( 'Timeline Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .sin-timeline::before, {{WRAPPER}} .wppolitic_timeline-wrap::before',
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'box_style_hover_tab',
                [
                    'label' => __( 'Hover', 'wppolitic' ),
                ]
            ); 

            $this->add_control(
                'timeline_border-heading_hover',
                [
                    'label' => __( 'Time line Border Hover', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'wppolitic_border_hover',
                    'label' => __( 'Title Border', 'wppolitic' ),
                    'selector' => '{{WRAPPER}} .sin-timeline:before,{{WRAPPER}} .wppolitic_timeline-wraper::before,.wppolitic_timeline.hover .date .dot',
                ]
            );

            $this->add_control(
                'timeline_boder_hover_active',
                [
                    'label' => __( 'Timeline Border Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic_timeline-wrap .wppolitic_timeline-proces' => 'background: {{VALUE}};',
                    ],
                ]
            );  

            $this->add_control(
                'timeline_date-color_hover',
                [
                    'label' => __( 'Date Hover Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ea000d',
                    'selectors' => [
                        '{{WRAPPER}} .sin-timeline:hover .wppolitic_timeline-date,{{WRAPPER}} .sin-timeline:hover::after' => 'color: {{VALUE}};',
                    ],
                ]
            );   

            $this->end_controls_tab();    

            $this->end_controls_tabs(); 

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();
         $content_length        = $this->get_settings_for_display('content_length');
         $wpts        = $this->get_settings_for_display('wpts');

        // Slider Option

        ?>

            <?php if( $wpts == 'sts2'){ ?>
            <div class="wppolitic_timeline-wrap">
                <span class="wppolitic_timeline-proces"></span>
            <?php }else{?>
                <div class="wppolitic_timeline-wraper fix">
            <?php } ?>
            
        <?php foreach ( $settings['political-timeline_list'] as $item ){ ?>

            <?php if( $wpts == 'sts1' ){?>

            <div class="sin-timeline">
               <?php if( !empty( $item['timeline_date'] ) ){
                    echo '<span class="wppolitic_timeline-date">' . esc_html( $item['timeline_date'] ) . '</span>';
                }
                ?>
                <div class="wppolitic_timeline-content">
                <?php
                echo '<div class="wppolitic_timeline-img">'.Group_Control_Image_Size::get_attachment_image_html( $item, 'timeline_img_size', 'time_img' ).'</div>';
                        ?>
                    <div class="wppolitic_timeline-text">
                        <?php  if( !empty( $item['timeline_title'] ) ){
                            echo '<h3>' . esc_html( $item['timeline_title'] ) . '</h3>';
                            }?>
                        <?php if(!empty($item['timeline_content'])){ echo '<p>'. wp_kses_post( $item['timeline_content'] ) .'</p>'; } ?>
                    </div>
                </div>
            </div>

        <?php } else{ ?>

            <div class="wppolitic_timeline row">

                <!-- Date -->
                <div class="date col-md-6">
                    <span class="dot"></span>
                    <?php if($item['timeline_date']){ ?>
                        <h4><?php echo wp_kses_post($item['timeline_date']) ;?></h4>
                    <?php }?>
                </div>

                <!-- Content -->
                <div class="wppolitic_tm-content col-md-6">
                    <?php if($item['timeline_title']){ ?>
                        <h4><?php echo wp_kses_post($item['timeline_title']);?></h4>
                    <?php }?>

                    <?php if($item['timeline_content'] != ''){ 

                        if( $content_length > 0 ){ ?>
                           <p><?php echo wp_trim_words( $item['timeline_content'], $content_length , '' );?></p>
                        <?php
                        } else {
                            echo '<p>' . wp_kses_post( $item['timeline_content'] ) . '</p>'; 
                        }
                        ?>    
                    <?php } ?>

                </div>
            </div>

        <?php  }  }?>

        </div>
        <?php
    }

}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Timeline() );