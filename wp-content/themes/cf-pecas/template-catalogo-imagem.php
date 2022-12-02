<?php

/**
 * Template Name: Catálogo Imagem
 */
global $wp;
$pagina = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
));

$array_grupos = array();
$args_grupos = new WP_Query(array(
    'post_type' => 'cpt_grupos',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC'
));
if ($args_grupos->have_posts()) :
    while ($args_grupos->have_posts()) : $args_grupos->the_post();
        $array_grupos[] = array(
            'id' => get_the_ID(),
            'group' => get_the_title(),
            'image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'link' => home_url() . '/catalogo/catalogo-eletronico/?grupo=' . get_the_ID()
        );
    endwhile;
endif;

get_header();
?>

<?php
if ($pagina->have_posts()) :
    while ($pagina->have_posts()) : $pagina->the_post(); ?>
        <div class="bg-image page-title">
            <div class="container-fluid">
                <a href="#">
                    <h1><?php the_title() ?></h1>
                </a>
                <div class="pull-right">
                    <a href="<?php echo home_url() ?>"><i class="fa fa-home fa-lg"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#!">Catálogo</a> &nbsp;&nbsp;|&nbsp;&nbsp;<?php the_title() ?>
                </div>
            </div>
        </div>

        <div class="container-fluid inner-offset">
            <div class="row">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.3s">
                    <h1><?php the_title() ?></h1>
                </div>
            </div>
            <div class="row services">
                <?php if (!empty($array_grupos)) { ?>
                    <?php foreach ($array_grupos as $GRUPOS) { ?>
                        <div class="service-item col-xs-12 col-sm-4 wow zoomIn text-center" data-wow-delay="0.3s">
                            <img class="full-width" src="<?php echo $GRUPOS['image'] ?>" alt="<?php echo get_bloginfo('name') . ' - ' . $GRUPOS['group'] ?>">
                            <h4><?php echo $GRUPOS['group'] ?></h4>
                            <a class="btn btn-danger" href="<?php echo $GRUPOS['link'] ?>">VER PRODUTOS</a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

<?php
    endwhile;
endif;
?>
<?php
get_footer();
