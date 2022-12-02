<?php

/**
 * Template Name: Catálogo Eletrônico
 */
global $wp;
$pagina = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
));

$array_grupos = $array_produtos = array();
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
            'link' => home_url() . '/catalogo/catalogo-eletronico/?grupo=' . get_the_ID()
        );
    endwhile;
endif;

if (isset($_GET['grupo']) && (int) $_GET['grupo'] > 0) {
    $args_produtos = new WP_Query(array(
        'post_type' => 'cpt_produtos',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'group',
                'value' => (int) $_GET['grupo'],
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'stock_quantity',
                'value' => 1,
                'compare' => '>='
            )
        )
    ));
} else {
    $args_produtos = new WP_Query(array(
        'post_type' => 'cpt_produtos',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'stock_quantity',
                'value' => 1,
                'compare' => '>='
            )
        )
    ));
}
if ($args_produtos->have_posts()) :
    while ($args_produtos->have_posts()) : $args_produtos->the_post();
        $array_produtos[] = array(
            'id' => get_the_ID(),
            'product' => get_the_title(),
            'reference' => get_field('reference'),
            'original_number_manufacturer' => get_field('original_number_manufacturer'),
            'description' => get_field('description'),
            'image' => get_the_post_thumbnail_url(get_the_ID(), 'full')
        );
    endwhile;
endif;

get_header();
?>

<?php
if ($pagina->have_posts()) :
    while ($pagina->have_posts()) : $pagina->the_post();
?>
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

        <div class="container-fluid block-content">
            <div class="row main-grid">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
                    <h1><?php the_title() ?></h1>
                </div>
                <div class="col-lg-6 text-right">
                    <h6 style="display: inline-block; margin-right: 10px">GRUPO: </h6>
                    <select class="select_product_group">
                        <option value="<?php echo home_url() ?>/catalogo/catalogo-eletronico" <?php if (!isset($_GET['grupo']) || (int) $_GET['grupo'] < 1) {
                                                                                                    echo 'selected';
                                                                                                } ?>>Todos os Grupos</option>
                        <?php if (!empty($array_grupos)) { ?>
                            <?php foreach ($array_grupos as $GRUPOS) { ?>
                                <option value="<?php echo $GRUPOS['link'] ?>" <?php if (isset($_GET['grupo']) && (int) $_GET['grupo'] === $GRUPOS['id']) {
                                                                                    echo 'selected';
                                                                                } ?>><?php echo $GRUPOS['group'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-12" style="margin-top: 30px">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <th>IMAGEM</th>
                                <th>REFERÊNCIA CF</th>
                                <th>Nº ORIGINAL / Nº FABRICANTE</th>
                                <th>PRODUTO</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                                <?php if (!empty($array_produtos)) { ?>
                                    <?php foreach ($array_produtos as $PRODUTOS) { ?>
                                        <tr>
                                            <td><img class="img-fluid" src="<?php echo $PRODUTOS['image'] ?>" alt="<?php echo $PRODUTOS['product'] . ' - ' . get_bloginfo('name') ?>" width="100"></td>
                                            <td><?php echo $PRODUTOS['reference'] ?></td>
                                            <td><?php echo $PRODUTOS['original_number_manufacturer'] ?></td>
                                            <td><?php echo $PRODUTOS['product'] ?></td>
                                            <td><a class="btn btn-danger" data-product-details="<?php echo $PRODUTOS['id'] ?>" href="#!">VER DETALHES</a></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Nenhum produto encontrado.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
?>
<?php
get_footer();
