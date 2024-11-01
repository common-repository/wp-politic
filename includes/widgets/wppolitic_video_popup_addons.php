<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPPolitic_Elementor_Widget_Abt_Video extends Widget_Base {

    public function get_name() {
        return 'Video-addons';
    }
    
    public function get_title() {
        return __( 'WPPolitic : Video Popup', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-video-playlist';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'abt-video-setting',
            [
                'label' => esc_html__( 'Video Settings', 'wppolitic' ),
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

            $this->add_control(
                'videothumimage',
                [
                    'label' => __( 'Video background image', 'wppolitic' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'videourl',
                [
                    'label' => __( 'Video url', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'https://www.youtube.com/watch?v=TLnmb07WQ-s', 'wppolitic' ),
                ]
            );
            $this->add_control(
                'video_title',
                [
                    'label' => __( 'Video Title', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'placeholder' => __( 'WATCH THE VIDEO', 'wppolitic' ),
                ]
            );


        $this->end_controls_section();


        // Style tab section
        $this->start_controls_section(
            'abt_video_style',
            [
                'label' => __( 'Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
                    'label' => __( 'Video Title Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .video-content h4' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'video_title_color_span',
                [
                    'label' => __( 'Video Title Span Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#e03927',
                    'selectors' => [
                        '{{WRAPPER}} .video-content h4 span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'video_title_typography',
                    'selector' => '{{WRAPPER}} .video-content h4',
                ]
            );
            $this->add_responsive_control(
                'title_top_space',
                [
                    'label' => __( 'Title Top Space', 'wppolitic' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => '',
                    'max' => 200,
                    'step' => 1,
                    'default' => 82,
                    'selectors' => [
                        '{{WRAPPER}} .video-content h4' => 'margin-top: {{VALUE}}px;',
                    ],
                ]
            ); 
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $playiconty      = $this->get_settings_for_display('playiconty');
        $playicon        = $this->get_settings_for_display('playicon');
        $video_url        = $this->get_settings_for_display('videourl');
        $video_image  =   $settings['videothumimage']['url'];
        $iconiamge  =   (isset($settings['iconiamge']['url']) ? $settings['iconiamge']['url'] : '');
        $video_title        = $this->get_settings_for_display('video_title');

        ?>
<div class="aboutus-area text-center">
    <div class="aboutus-video" style="background: rgba(0, 0, 0, 0) url(<?php echo esc_url( $video_image ); ?> ) no-repeat scroll;">
        <div class="video-content wppolitic">
            <a href="<?php echo esc_url( $video_url ); ?>" class="wppolitic_popup-youtube">
            <?php
                if( $playiconty == 2 ){
                   ?>
                    <img src="<?php echo esc_url( $iconiamge ); ?>" alt="<?php esc_html__( 'video image', 'wppolitic' ); ?>" />
                    <?php
                }else{
                    \Elementor\Icons_Manager::render_icon( $settings['playicon'], [ 'aria-hidden' => 'true' ] );
                }
            ?>
            </a>
            <?php if(!empty($video_title)){ 
                echo '<h4>'. esc_html( $video_title ).'</h4>';
         } ?>            
        </div>
    </div>
</div>

        <?php

    }

}

wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Abt_Video() );