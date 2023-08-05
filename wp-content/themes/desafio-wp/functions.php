<?php
/*SUPPORTS BASICOS THEME*/
add_action('after_setup_theme', 'generic_setup');
function generic_setup()
{
   
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('html5', array('search-form', 'navigation-widgets'));
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
}



/*CUSTOM POST PARA VIDEOS*/
function lc_custom_vídeos()
{

    $labels = array(
        'name'               => __('Vídeos'),
        'singular_name'      => __('Vídeo'),
        'add_new'            => __('Adicionar'),
        'add_new_item'       => __('Adicionar'),
        'edit_item'          => __('Editar'),
        'new_item'           => __('Novo vídeo'),
        'all_items'          => __('Todos'),
        'view_item'          => __('Visualizar'),
        'search_items'       => __('Buscar'),
        'featured_image'     => 'Poster',
        'set_featured_image' => 'Adicionar capa'
    );

    $args = array(
        'labels'            => $labels,
        'description'       => 'Custom posts para Vídeos',
        'public'            => true,
        'menu_position'     => 8,
        'supports'          => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'has_archive'       => true,
        'query_var'         => 'videos',
        'menu_icon'         => 'dashicons-format-video',
    );

    register_post_type('videos', $args);


    register_taxonomy('video_type', ['videos'], [
        'label' => __('Tipos de Vídeo', 'txtdomain'),
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'labels' => [
            'singular_name' => __('Tipo de Vídeo', 'txtdomain'),
            'all_items' => __('Todos os Tipos de Vídeo', 'txtdomain'),
            'edit_item' => __('Editar Tipo de Vídeo', 'txtdomain'),
            'view_item' => __('Ver Tipos de Vídeo', 'txtdomain'),
            'update_item' => __('Atualizar Tipo de Vídeo', 'txtdomain'),
            'add_new_item' => __('Adicionar Tipo de Vídeo', 'txtdomain'),
            'new_item_name' => __('Novo Tipo de Vídeo', 'txtdomain'),
            'search_items' => __('Buscar Tipo de Vídeo', 'txtdomain'),
            'parent_item' => __('Parent Tipos de Vídeo', 'txtdomain'),
            'parent_item_colon' => __('Parent Categorias:', 'txtdomain'),
            'not_found' => __('Nenhum Tipo de Vídeo encontrado', 'txtdomain'),
        ]
    ]);
    register_taxonomy_for_object_type('video_type', 'videos');
}
add_action('init', 'lc_custom_vídeos');


// /*CONFIGURAÇÃO ACF*/

add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_64ca3b93c83e5',
	'title' => 'Informações de vídeo',
	'fields' => array(
		array(
			'key' => 'field_64ca3b941a772',
			'label' => 'Tempo de Duração(Em minutos)',
			'name' => 'bx_play_video_duration',
			'aria-label' => '',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'min' => '',
			'max' => '',
			'placeholder' => 'Ex: 130',
			'step' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_64cafaa7d1d57',
			'label' => 'Embed de Vídeo(URL YouTube)',
			'name' => 'bx_play_video_ID',
			'aria-label' => '',
			'type' => 'url',
			'instructions' => 'URL do YouTube',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'videos',
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
	'show_in_rest' => 1,
) );
} );


