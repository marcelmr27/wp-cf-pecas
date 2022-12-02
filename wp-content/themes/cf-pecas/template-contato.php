<?php
/*
 * Template Name: Contato
 */
global $wp;
$pagina = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'page',
    'p' => url_to_postid(home_url($wp->request))
));

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
            'endereco' => get_field('endereco'),
            'mapa' => get_field('mapa'),
            'horario_funcionamento' => get_field('horario_funcionamento')
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

        <iframe class="we-onmap wow fadeInUp" data-wow-delay="0.3s" src="<?php echo $array_institucional['mapa'] ?>"></iframe>

        <div class="container-fluid block-content">
            <div class="row main-grid">
                <div class="col-lg-4">
                    <h4>ESCRITÓRIO</h4>
                    <div class="adress-details wow fadeInLeft" data-wow-delay="0.3s">
                        <div>
                            <span><i class="fa fa-location-arrow"></i></span>
                            <div><strong>ENDEREÇO</strong><br><?php echo $array_institucional['endereco'] ?></div>
                        </div>
                        <div>
                            <span><i class="fa fa-phone"></i></span>
                            <div><?php echo $array_institucional['telefone'] ?></div>
                        </div>
                        <div>
                            <span><i class="fa fa-envelope"></i></span>
                            <div><?php echo $array_institucional['email'] ?></div>
                        </div>
                        <div>
                            <span><i class="fa fa-clock-o"></i></span>
                            <div><?php echo $array_institucional['horario_funcionamento'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight" data-wow-delay="0.3s">
                    <h4>FORMULÁRIO DE CONTATO</h4>
                    <p>Entre em contato conosco através do formulário de contato abaixo, nossas redes sociais, telefone, e-mail. Se preferir ou venha até a nossa loja. Te aguardamos!</p>

                    <div id="contactForm" class="reply-form form-inline">
                        <?php echo do_shortcode('[contact-form-7 id="6" title="Formulário de Contato"]') ?>
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
