<?php

/**
 * Template Name: Institucional
 */
global $wp;
$pagina = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
));

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
                    <?php the_content() ?>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
?>
<?php
get_footer();
