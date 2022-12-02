<?php

/**
 * Template Name: Equipe
 */
global $wp;
$pagina = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
));

$array_equipe = array();
$args_equipe = new WP_Query(array(
    'post_type' => 'cpt_equipe',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC'
));
if ($args_equipe->have_posts()) :
    while ($args_equipe->have_posts()) : $args_equipe->the_post();
        $array_equipe[] = array(
            'nome' => get_the_title(),
            'imagem' => get_field('imagem'),
            'cargo' => get_field('cargo')
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
                    <a href="<?php echo home_url() ?>"><i class="fa fa-home fa-lg"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp; <?php the_title() ?>
                </div>
            </div>
        </div>

        <div class="container-fluid block-content">
            <div class="row">
                <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.3s">
                    <h1><?php the_title() ?></h1>
                </div>
            </div>
            <div class="row main-grid team hover-eff">
                <?php if (!empty($array_equipe)) { ?>
                    <?php foreach ($array_equipe as $EQUIPE) { ?>
                        <div class="col-lg-4 wow fadeInLeft" data-wow-delay="0.3s">
                            <div class="userpic" style="background-image:url('<?php echo $EQUIPE['imagem'] ?>');">
                            </div>
                            <div class="user-info">
                                <small><?php echo $EQUIPE['cargo'] ?></small>
                                <h4><?php echo $EQUIPE['nome'] ?></h4>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="col-lg-12 wow fadeInLeft text-center" data-wow-delay="0.3s">
                        <p>Nenhum colaborador cadastrado ainda.</p>
                    </div>
                <?php } ?>
            </div>
        </div>
<?php
    endwhile;
endif;
?>
<?php
get_footer();
