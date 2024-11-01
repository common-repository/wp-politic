<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPP_Elementor_Widget_Google_Vector_map extends Widget_Base {

    public function get_name() {
        return 'wppolitic-vector_map';
    }
    
    public function get_title() {
        return __( 'WP - Politic Google Vector Map', 'wppolitic' );
    }

    public function get_icon() {
        return 'eicon-google-maps';
    }
    public function get_categories() {
        return [ 'wppolitic' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'vector_map-setting',
            [
                'label' => esc_html__( 'Google Vector Map', 'wppolitic' ),
            ]
        );

        $repeater = new Repeater();

            $repeater->add_control(
                'country_short_name',
                [
                    'label' => __( 'Country Short Name', 'wppolitic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'bd',
                    'title' => __( 'Enter Country Short name', 'wppolitic' ),
                ]
            );
            $repeater->add_control(
                'gvm_address',
                [
                    'label' => __( 'Address:', 'wppolitic' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => __( 'Floor. 4 House. 15, Block C, Banasree Main Rd, Dhaka', 'wppolitic' ),
                    'title' => __( 'Enter Address', 'wppolitic' ),
                ]
            );

            $this->add_control(
                'vector_map_list',
                [
                    'label' => __( 'Google Vector Map', 'wppolitic' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'country_short_name' => __( 'bd', 'wppolitic' ),
                            'gvm_address' => __( 'Floor. 4 House. 15, Block C, Banasree Main Rd, Dhaka', 'wppolitic', 'wppolitic' ),
                        ],
                    ],
                    'title_field' => '{{{ country_short_name }}}',
                ]
            );
            $this->add_control(
                'address_title',
                    [
                        'label' => __( 'Address Title', 'wppolitic' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Address',
                        'title' => __( 'Enter Address Title', 'wppolitic' ),
                    ]
                );        
            $this->add_control(
                'map_bg_color',
                    [
                        'label' => __( 'Map Bg color', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '6f89a2',
                        'title' => __( 'Map Bg Color', 'wppolitic' ),
                    ]
                );        
            $this->add_control(
                'map_bg_color_brder',
                    [
                        'label' => __( 'Map Border color', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '6f89a2',
                        'title' => __( 'Map Border Color', 'wppolitic' ),
                    ]
                );
            $this->add_control(
                'map_hover_color',
                    [
                        'label' => __( 'Map Hover BG color', 'wppolitic' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => 'e03927',
                        'title' => __( 'Map Bg Hover Color', 'wppolitic' ),
                    ]
                );
                
        $this->end_controls_section();
        // content tab

        // Style tab section
        $this->start_controls_section(
            'vector_map_style',
            [
                'label' => __( 'Content Style', 'wppolitic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );         
            $this->add_control(
                'title_address-heading',
                [
                    'label' => __( 'Address Style', 'wppolitic' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'address_title_color',
                [
                    'label' => __( 'Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .vmap-pin-text h4' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'country_short_nametypography',
                    'selector' => '{{WRAPPER}} .vmap-pin-text h4',
                ]
            );
            $this->add_responsive_control(
                'test_name_margin',
                [
                    'label' => __( 'Margin', 'wppolitic' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .vmap-pin-text h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );            

            $this->add_control(
                'addres_details-color',
                [
                    'label' => __( 'Address Color', 'wppolitic' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .vmap-pin-text p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'cldesignationtypography',
                    'selector' => '{{WRAPPER}} .vmap-pin-text p',
                ]
            );
            
        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();
        $address_title = $this->get_settings_for_display('address_title');
        $map_bg_color = $this->get_settings_for_display('map_bg_color');
        $map_hover_color = $this->get_settings_for_display('map_hover_color');
        $map_bg_color_brder = $this->get_settings_for_display('map_bg_color_brder');
        
        // Slider Option
        $sectionid =  $this-> get_id();

        ?>
            <div class="wppolitic_vector_map_active <?php echo esc_attr($sectionid);?>">
                <div class="mission-map" id="wppolitic_world-vmap"></div>
            </div>


            <?php
                $countrry = '';
                foreach( $settings['vector_map_list'] as $item ){ 
                    $country_short_name_set = $item['country_short_name'];
                    $gvm_address_set = $item['gvm_address'];
                                    
                    $countrry .= "$country_short_name_set : escapeXml('<div class=\"vmap-pin-text\"><p> $gvm_address_set </p></div><span class=\"vmap-pin\"></span>'),";

                }
            ?>


            <script>

                   function escapeXml(string) {
                        return string.replace(/[<>]/g, function (c) {
                            switch (c) {
                                case '<': return '\u003c';
                                case '>': return '\u003e';
                            }
                        });
                    }

                    jQuery(document).ready(function($) {
                        var pins = {
                            <?php echo wp_kses_post( $countrry ); ?>
                        };

                        jQuery('#wppolitic_world-vmap').vectorMap({
                            backgroundColor: 'transparent',
                            borderColor: '<?php echo esc_attr( $map_bg_color_brder ); ?>',
                            map: 'world_en',
                            pins: pins,
                            color: '<?php echo esc_attr( $map_bg_color ); ?>',
                            enableZoom: false,
                            pinMode: 'content',
                            selectedColor: '<?php echo esc_attr( $map_hover_color ); ?>',
                            hoverColor: '<?php echo esc_attr( $map_hover_color ); ?>',
                            showTooltip: true,
                            onRegionClick: function(element, code, region)
                            {
                                var message = '<h4>'
                                    + region
                                    + ' <?php echo esc_html( $address_title ) ?> </h4> <p></p> '

                                    var $this = jQuery(this).find('div[for='+ code +']').find('.vmap-pin-text');
                                    if ($this.hasClass('open')) {
                                        $this.removeClass('open').find('h4').remove();
                                    } else {
                                        $this.addClass('open').prepend(message);
                                    }
                                
                            }
                        });

                    });

            </script>

        <?php

    }


}

wppolitic_widget_register_manager( new WPP_Elementor_Widget_Google_Vector_map() );