<?php 
namespace Elementor;

if( !defined ( 'ABSPATH' ) )exit;

class WPPolitic_Elementor_Widget_Progress extends Widget_Base{
    public function get_name(){
        return 'wppolitic_progress';
    }
    public function get_title(){
        return __('Politic:Progress Bar','wppolitic');
    }
    public function get_icon(){
        return 'eicon-skill-bar';
    }
    public function get_categories(){
        return ['wppolitic'];
    }
     public function get_style_depends() {
        return [];
    }

    public function get_script_depends() {
        return [];
    }
    protected function register_controls(){
        $this->start_controls_section(
            'wppolitic_prgress_bar',
            [
                'label' => __( 'Progress', 'wppolitic' ),
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'list_title', [
                'label'         => __( 'Title', 'wppolitic' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'list_percent', [
                'label'         => __( 'Percent (please type % )', 'wppolitic' ),
                'type'          => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'list_color', [
                'label'         => __( 'Background', 'wppolitic' ),
                'type'          => Controls_Manager::COLOR,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => __( 'Progress List', 'wppolitic' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title'     => __( 'Title', 'wppolitic' ),
                        'list_percent'   => __( '70%', 'wppolitic' ),
                        'list_color'     => '#1A1A1A ',
                    ],
                ],

                'title_field' => '{{{ list_title }}}',
            ]
        );
    
        $this->end_controls_section();
        // style tab start
        $this->start_controls_section(
            'wppolitic_accroding_style',
            [
                'label'     => __( 'Style', 'wppolitic' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            //start title
            $this->add_control(
                'title_options',
                [
                    'label'     => __( 'Title', 'wppolitic' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Color', 'wppolitic' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-single-skill .wppolitic-title' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .wppolitic-single-skill .wppolitic-percent' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'selector' => '{{WRAPPER}} .wppolitic-single-skill .wppolitic-title,{{WRAPPER}} .wppolitic-single-skill .wppolitic-percent',
                ]
            );
            $this->add_control(
                'title_color_per',
                [
                    'label'     => __( 'Percent Color', 'wppolitic' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wppolitic-single-skill span.wppolitic-percent' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography_per',
                    'selector' => '{{WRAPPER}} .wppolitic-single-skill span.wppolitic-percent',
                ]
            );
            //end title   
            $this->end_controls_tabs();
        $this->end_controls_section(); // style tab end

    }
    protected function render(){ 
        $settings = $this->get_settings_for_display();
    ?>

    <?php if( $settings['list'] ):
        foreach ( $settings['list'] as $item ) {
            
     ?>
        <div class="wppolitic-single-skill clearfix">
            <span class="wppolitic-title"><?php echo esc_html( $item['list_title'] ); ?></span>
            <span class="wppolitic-percent">(<?php echo esc_html( $item['list_percent'] ); ?>)</span>
            <div class="wppolitic-progress progress"><div class="wow fadeInLeft bar bg-dark" style="width: <?php echo esc_html( $item['list_percent'] ); ?>; background-color:<?php echo esc_html( $item['list_color'] ); ?>!important;"></div></div>
        </div>
    <?php } endif; ?>
                
    <?php 

    }

}
wppolitic_widget_register_manager( new WPPolitic_Elementor_Widget_Progress() );