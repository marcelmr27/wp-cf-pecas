<?php

/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
$array_institucional = array();

$args_institucional = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => 1,
    'p' => '2'
));
if ($args_institucional->have_posts()) :
    while ($args_institucional->have_posts()) : $args_institucional->the_post();
        $array_institucional = array(
            'telefone' => get_field('telefone'),
            'whatsapp' => get_field('whatsapp'),
            'email' => get_field('email'),
            'horario_funcionamento' => get_field('horario_funcionamento'),
            'redes_sociais' => get_field('redes_sociais'),
            'link_area_cliente' => get_field('link_area_cliente')
        );
    endwhile;
endif;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.png" type="image/x-icon">
    <link href="<?php echo get_template_directory_uri() ?>/css/master.css" rel="stylesheet">
    <!--[if lt IE 9]>
          <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body data-scrolling-animations="true">
    <div class="sp-body">
        <!-- Loader Landing Page -->
        <div id="ip-container" class="ip-container">
            <div class="ip-header">
                <div class="ip-loader">
                    <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                        <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,39.3,10z" />
                        <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" />
                    </svg>
                </div>
            </div>
        </div>
        <!-- Loader end -->

        <header id="this-is-top">
            <div class="container-fluid">
                <div class="topmenu row">
                    <nav class="col-sm-offset-3 col-md-offset-4 col-lg-offset-4 col-sm-6 col-md-5 col-lg-5">
                        <a href="<?php echo $array_institucional['link_area_cliente'] ?>" target="_blank">ÁREA DO CLIENTE</a>
                    </nav>
                    <nav class="text-right col-sm-3 col-md-3 col-lg-3">
                        <?php if ($array_institucional['redes_sociais']['facebook'] !== '') { ?>
                            <a href="<?php echo $array_institucional['redes_sociais']['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <?php } ?>
                        <?php if ($array_institucional['redes_sociais']['instagram'] !== '') { ?>
                            <a href="<?php echo $array_institucional['redes_sociais']['instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                        <?php } ?>
                        <?php if ($array_institucional['redes_sociais']['youtube'] !== '') { ?>
                            <a href="<?php echo $array_institucional['redes_sociais']['youtube'] ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                        <?php } ?>
                        <?php if ($array_institucional['redes_sociais']['linkedin'] !== '') { ?>
                            <a href="<?php echo $array_institucional['redes_sociais']['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <?php } ?>
                    </nav>
                </div>
                <div class="row header">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <a href="<?php echo home_url() ?>" id="logo"></a>
                    </div>
                    <div class="col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-sm-8 col-md-8 col-lg-8">
                        <div class="text-right header-padding">
                            <div class="h-block"><span>TELEFONE</span><?php echo $array_institucional['telefone'] ?></div>
                            <div class="h-block"><span>E-MAIL</span><?php echo $array_institucional['email'] ?></div>
                            <div class="h-block"><span>HORÁRIO DE FUNCIONAMENTO</span><?php echo $array_institucional['horario_funcionamento'] ?></div>
                            <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace('/\D/', '', $array_institucional['whatsapp']) ?>&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20suas%20pe%C3%A7as." target="_blank">TIRE SUAS DÚVIDAS <i class="fa fa-whatsapp" style="margin-left: 10px; font-size:16px"></i></a>
                        </div>
                    </div>
                </div>
                <div id="main-menu-bg"></div>
                <a id="menu-open" href="#"><i class="fa fa-bars"></i></a>
                <nav class="main-menu navbar-main-slide">
                    <ul class="nav navbar-nav navbar-main">
                        <li><a href="<?php echo home_url() ?>">PÁGINA PRINCIPAL</a></li>
                        <li><a href="<?php echo home_url() ?>/institucional">INSTITUCIONAL</a></li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle border-hover-color1" href="#!">CATÁLOGO <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo home_url() ?>/catalogo/catalogo-eletronico">Catálogo Eletrônico</a></li>
                                <li><a href="<?php echo home_url() ?>/catalogo/pesquisar-por-imagem">Pesquisar por Imagem</a></li>
                                <li><a href="<?php echo home_url() ?>/catalogo/lancamentos">Lançamentos</a></li>
                                <li><a href="<?php echo home_url() ?>/catalogo/promocoes">Promoções</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo home_url() ?>/equipe">EQUIPE</a></li>
                        <li><a href="<?php echo home_url() ?>/troca-e-devolucao">TROCA E DEVOLUÇÃO</a></li>
                        <li><a href="<?php echo home_url() ?>/contato">CONTATO</a></li>
                    </ul>
                    <div class="search-form-modal transition">
                        <form class="navbar-form header_search_form">
                            <i class="fa fa-times search-form_close"></i>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn_search customBgColor">Search</button>
                        </form>
                    </div>
                </nav>
                <a id="menu-close" href="#"><i class="fa fa-times"></i></a>
            </div>
        </header>