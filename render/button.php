<?php

$url   = get_field( 'mitypes_button_url', $item->ID );
$blank = get_field( 'mitypes_button_target_blank', $item->ID );

if( ! isset( $url ) || '' === $url ){ return ; }

$attr = array(
    'href'   => array(),
    'title'  => array(),
    'class'  => array(),
    'target' => array(),
);

$a_tags = array(
    'a'    => $attr,
    'span' => $attr
);

$a_tags = apply_filters( 'mitypes_wpkses_button_tags', $a_tags );

$target = '_self' ;

if( isset( $blank ) && '1' === $blank ){ $target = '_blank' ; }

echo wp_kses( $args->before, $a_tags );
echo '<a' . $attributes . ' href="' . esc_url( $url ) . '" target="' . esc_attr( $target ) . '">';
    echo wp_kses( $args->link_before, $a_tags ) . esc_html( $item->post_title ) . wp_kses( $args->link_after, $a_tags );
echo '</a>';
echo wp_kses( $args->after, $a_tags );