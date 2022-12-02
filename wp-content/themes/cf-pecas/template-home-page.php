<?php
/*
 * Template Name: Home Page
 */

$array_institucional = $array_banners = $array_servicos = $array_portfolio = $array_equipe = $array_depoimentos = $array_blog = array();

$args_institucional = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => 1,
    'p' => '2'
));
if ($args_institucional->have_posts()) :
    while ($args_institucional->have_posts()) : $args_institucional->the_post();
        $array_institucional['INSTITUCIONAL_01'] = array(
            '01' => get_field('t1_titulo'),
            '02' => get_field('t1_texto'),
            '03' => get_field('t1_imagem')
        );
        $array_institucional['CTA_01'] = array(
            '01' => get_field('cta1_titulo'),
            '02' => get_field('cta1_texto')
        );
        $array_institucional['REP_01'] = get_field('rep1_looping');
        $array_institucional['whatsapp'] = get_field('whatsapp');
    endwhile;
endif;

$args_banners = new WP_Query(array(
    'post_type' => 'cpt_banners',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC'
));
if ($args_banners->have_posts()) :
    while ($args_banners->have_posts()) : $args_banners->the_post();
        $array_banners[] = array(
            'imagem' => get_field('imagem')
        );
    endwhile;
endif;

$args_servicos = new WP_Query(array(
    'post_type' => 'cpt_servicos',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC',
    'meta_key' => 'home_page',
    'meta_value' => 'Sim'
));
if ($args_servicos->have_posts()) :
    while ($args_servicos->have_posts()) : $args_servicos->the_post();
        $array_servicos[] = array(
            'nome' => get_the_title(),
            'icone' => get_field('icone'),
            'headline' => get_field('headline'),
            'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'link' => get_permalink(),
        );
    endwhile;
endif;

$args_portfolio = new WP_Query(array(
    'post_type' => 'cpt_portfolio',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC',
    'meta_key' => 'home_page',
    'meta_value' => 'Sim'
));
if ($args_portfolio->have_posts()) :
    while ($args_portfolio->have_posts()) : $args_portfolio->the_post();
        $array_portfolio[] = array(
            'nome' => get_the_title(),
            'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'categorias' => get_the_category(get_the_ID()),
            'link' => get_permalink(),
        );
    endwhile;
endif;

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
            'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'cargo' => get_field('cargo'),
            'redes_sociais' => get_field('redes_sociais')
        );
    endwhile;
endif;

$args_depoimentos = new WP_Query(array(
    'post_type' => 'cpt_depoimentos',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC'
));
if ($args_depoimentos->have_posts()) :
    while ($args_depoimentos->have_posts()) : $args_depoimentos->the_post();
        $array_depoimentos[] = array(
            'nome' => get_the_title(),
            'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'empresa' => get_field('empresa'),
            'depoimento' => get_the_content()
        );
    endwhile;
endif;

$args_blog = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC'
));
if ($args_blog->have_posts()) :
    while ($args_blog->have_posts()) : $args_blog->the_post();
        $array_blog[] = array(
            'titulo' => get_the_title(),
            'link' => get_permalink(),
            'imagem' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            'data' => get_the_date(),
        );
    endwhile;
endif;

get_header();
?>

<?php if (!empty($array_banners)) { ?>
    <div id="owl-main-slider" class="owl-carousel enable-owl-carousel" data-single-item="true" data-pagination="false" data-auto-play="true" data-main-slider="true" data-stop-on-hover="true">
        <?php foreach ($array_banners as $BANNER) { ?>
            <div class="item">
                <img src="<?php echo $BANNER['imagem'] ?>" alt="<?php echo get_bloginfo('name') ?>">
            </div>
        <?php } ?>
    </div>
<?php } ?>

<div class="container-fluid">
    <div class="row column-info block-content">
        <div class="col-lg-7 wow fadeInLeft" data-wow-delay="0.3s">
            <h1><?php echo $array_institucional['INSTITUCIONAL_01']['01'] ?></h1>
            <?php echo $array_institucional['INSTITUCIONAL_01']['02'] ?>
            <a class="btn btn-danger read-all-news wow fadeInLeft" data-wow-delay="0.3s" href="<?php echo home_url() ?>/institucional">Saiba Mais</a>
        </div>
        <div class="col-lg-5 wow fadeInRight" data-wow-delay="0.3s">
            <img class="full-width" src="<?php echo $array_institucional['INSTITUCIONAL_01']['03'] ?>" alt="<?php echo get_bloginfo('name') ?>">
        </div>
    </div>

    <div class="big-hr color-2 wow zoomInUp" data-wow-delay="0.3s">
        <div class="row" style="display: flex;">
            <div class="col-lg-8">
                <div class="text-left" style="margin-right:40px;">
                    <h2><?php echo $array_institucional['CTA_01']['01'] ?></h2>
                    <p><?php echo $array_institucional['CTA_01']['02'] ?></p>
                </div>
            </div>
            <div class="col-lg-4" style="display: flex; align-items: center; justify-content: flex-end;">
                <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace('/\D/', '', $array_institucional['whatsapp']) ?>&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20suas%20pe%C3%A7as." target="_blank">TIRE SUAS DÚVIDAS <i class="fa fa-whatsapp" style="margin-left: 10px; font-size:16px"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="fleet-gallery block-content bg-image inner-offset" style="background: #a91605;">
    <div class="container-fluid inner-offset">
        <div class="text-center hgroup wow zoomInUp" data-wow-delay="0.3s">
            <h1>ENCONTRE SUA PEÇA</h1>
        </div>
        <form novalidate id="contactForm" action="<?php echo home_url() ?>/catalogo" method="POST" class="reply-form form-inline">
            <div class="row form-elem">
                <div class="col-lg-3 form-elem form-mb">
                    <div class="default-inp form-elem">
                        <input type="text" name="referencia_cf" id="referencia_cf" placeholder="Referência CF">
                    </div>
                </div>
                <div class="col-lg-3 form-elem form-mb">
                    <div class="default-inp form-elem">
                        <input type="text" name="nr_original_fabricante" id="nr_original_fabricante" placeholder="Nº Original / Fabricante">
                    </div>
                </div>
                <div class="col-lg-6 form-elem form-mb">
                    <div class="default-inp form-elem">
                        <input type="text" name="descricao_palavra_chave" id="descricao_palavra_chave" placeholder="Descrição / Palavra-chave">
                    </div>
                </div>
                <div class="col-lg-12 form-elem text-right">
                    <div class="dropdown" style="display: inline-block;">
                        <button class="btn btn-gray dropdown-toggle" type="button" id="dropdown_menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            + Catálogo
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown_menu">
                            <a class="dropdown-item" href="<?php echo home_url() ?>/catalogo/catalogo-eletronico">Catálogo Eletrônico</a>
                            <a class="dropdown-item" href="<?php echo home_url() ?>/catalogo/pesquisar-por-imagem">Pesquisar por Imagem</a>
                            <a class="dropdown-item" href="<?php echo home_url() ?>/catalogo/lancamentos">Lançamentos</a>
                            <a class="dropdown-item" href="<?php echo home_url() ?>/catalogo/promocoes">Promoções</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-default">Pesquisar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if ($array_institucional['REP_01'] !== null) { ?>
    <div class="container-fluid block-content">
        <div class="text-center hgroup wow zoomInUp" data-wow-delay="0.3s">
            <h1>NOSSOS DIFERENCIAIS</h1>
            <h2>Conheça os pontos que nos tornaram diferenciais neste concorrido mercado</h2>
        </div>
        <div class="row our-services">
            <?php foreach ($array_institucional['REP_01'] as $DIFERENCIAIS) { ?>
                <div class="col-lg-6 wow zoomInLeft" data-wow-delay="0.3s">
                    <a href="11_blog-details.html">
                        <span><img src="<?php echo $DIFERENCIAIS['icone'] ?>" alt="<?php echo get_bloginfo('name') ?>" width="50"></span>
                        <h4><?php echo $DIFERENCIAIS['titulo'] ?></h4>
                        <p><?php echo $DIFERENCIAIS['texto'] ?></p>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<?php
get_footer();
