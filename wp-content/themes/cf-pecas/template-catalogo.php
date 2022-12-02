<?php

/**
 * Template Name: Catálogo
 */
global $wp;
$pagina = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
));

$array_query = array();
if (isset($_POST['referencia_cf']) && !empty($_POST['referencia_cf']) && trim($_POST['referencia_cf']) !== '') {
    $array_query[] = array(
        'key' => 'reference',
        'value' => trim($_POST['referencia_cf']),
        'compare' => 'LIKE'
    );
}
if (isset($_POST['nr_original_fabricante']) && !empty($_POST['nr_original_fabricante']) && trim($_POST['nr_original_fabricante']) !== '') {
    $array_query[] = array(
        'key' => 'original_number_manufacturer',
        'value' => trim($_POST['nr_original_fabricante']),
        'compare' => 'LIKE'
    );
}
if (isset($_POST['descricao_palavra_chave']) && !empty($_POST['descricao_palavra_chave']) && trim($_POST['descricao_palavra_chave']) !== '') {
    $array_query[] = array(
        'key' => 'description',
        'value' => trim($_POST['descricao_palavra_chave']),
        'compare' => 'LIKE'
    );
}

$array_produtos = array();

$args_produtos = new WP_Query(array(
    'post_type' => 'cpt_produtos',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'stock_quantity',
            'value' => 1,
            'compare' => '>='
        ),
        $array_query
    )
));

if ($args_produtos->have_posts()) :
    while ($args_produtos->have_posts()) : $args_produtos->the_post();
        $array_produtos[] = array(
            'id' => get_the_ID(),
            'product' => get_the_title(),
            'reference' => get_field('reference'),
            'original_number_manufacturer' => get_field('original_number_manufacturer'),
            'description' => get_field('description'),
            'original_price' => get_field('original_price'),
            'special_price' => get_field('special_price'),
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
            <div class="row">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.3s">
                    <h1><?php the_title() ?></h1>
                </div>
            </div>
            <div class="row main-grid">
                <div class="col-lg-12">
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
