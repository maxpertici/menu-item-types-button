<?php

return array(
    
    'key' => 'group_mitypes_button_61b136d8bcf78',
    'title' => __( 'Button', 'mitypes-button' ),
    'fields' => array(
        array(
            'key' => 'field_mitypes_button_61b136ec53e37',
            'label' => 'URL',
            'name' => 'mitypes_button_url',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
        ),
        array(
            'key' => 'field_mitypes_button_61b1370d53e38',
            'label' => __( 'Button Target', 'mitypes-button' ),
            'name' => 'mitypes_button_target_blank',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => __( 'Open link in new tab', 'mitypes-button' ),
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'mitypes',
                'operator' => '==',
                'value' => 'button',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
) ;