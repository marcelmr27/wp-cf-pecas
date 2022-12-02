<?php
include_once 'wp-load.php';
$args_produtos = new WP_Query(array(
    'post_type' => 'cpt_produtos',
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'p' => $_POST['id']
));
if ($args_produtos->have_posts()) :
    while ($args_produtos->have_posts()) : $args_produtos->the_post();
        $array_produtos = array(
            'id' => get_the_ID(),
            'product' => get_the_title(),
            'reference' => get_field('reference'),
            'original_number_manufacturer' => get_field('original_number_manufacturer'),
            'description' => get_field('description'),
            'image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'whatsapp' => urlencode('Olá! Gostaria de saber mais sobre o produto ' . get_the_title() . ' (Referência CF: ' . get_field('reference') . ')')
        );
    endwhile;
endif;

echo json_encode($array_produtos);
