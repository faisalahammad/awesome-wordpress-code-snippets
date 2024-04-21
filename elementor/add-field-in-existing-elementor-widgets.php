<?php
//I've explored various methods, but I find this particular way of adding control to existing Elementor widgets to be the easiest. I specifically applied this to the tabs widget. Note: you must be enabled nested tabs feature from elementor settings


// add color control for tab tringle
add_action('elementor/element/before_section_end', function( $section, $section_id, $args ) {		
	if( $section->get_name() == 'nested-tabs' && $section_id == 'section_tabs_style' ){				
		$section->add_control(
			'abc-tab-tringle-color' ,
			[
				'label'        => 'Traingle Color',
				'type'         => Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.abc-var-tabs .e-n-tabs-heading > button[aria-selected="true"]:after' => 'border-left-color: {{VALUE}}',
				],
				'prefix_class' => 'abc-tab-tringle-color-',
			]
		);
	}
}, 10, 3 );