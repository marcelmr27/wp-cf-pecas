<?php

/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
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
            'endereco' => get_field('endereco'),
            'horario_funcionamento' => get_field('horario_funcionamento'),
            'texto_rodape' => get_field('texto_rodape'),
            'redes_sociais' => get_field('redes_sociais'),
            'link_area_cliente' => get_field('link_area_cliente')
        );
    endwhile;
endif;
?>
<footer>
    <div class="color-part2"></div>
    <div class="color-part"></div>
    <div class="container-fluid">
        <div class="row block-content">
            <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s">
                <a href="#" class="logo-footer"></a>
                <p><?php echo $array_institucional['texto_rodape'] ?></p>
                <div class="footer-icons">
                    <?php if ($array_institucional['redes_sociais']['facebook'] !== '') { ?>
                        <a href="<?php echo $array_institucional['redes_sociais']['facebook'] ?>" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
                    <?php } ?>
                    <?php if ($array_institucional['redes_sociais']['instagram'] !== '') { ?>
                        <a href="<?php echo $array_institucional['redes_sociais']['instagram'] ?>" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
                    <?php } ?>
                    <?php if ($array_institucional['redes_sociais']['youtube'] !== '') { ?>
                        <a href="<?php echo $array_institucional['redes_sociais']['youtube'] ?>" target="_blank"><i class="fa fa-youtube fa-2x"></i></a>
                    <?php } ?>
                    <?php if ($array_institucional['redes_sociais']['linkedin'] !== '') { ?>
                        <a href="<?php echo $array_institucional['redes_sociais']['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a>
                    <?php } ?>
                </div>
                <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace('/\D/', '', $array_institucional['whatsapp']) ?>&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20suas%20pe%C3%A7as." target="_blank">TIRE SUAS DÚVIDAS <i class="fa fa-whatsapp" style="margin-left: 10px; font-size:16px"></i></a>
            </div>
            <div class="col-lg-3 wow zoomIn" data-wow-delay="0.3s">
                <h4>NAVEGAÇÃO RÁPIDA</h4>
                <nav>
                    <a href="<?php echo home_url() ?>">Página Principal</a>
                    <a href="<?php echo home_url() ?>/institucional">Institucional</a>
                    <a href="<?php echo home_url() ?>/catalogo/catalogo-eletronico">Catálogo Eletrônico</a>
                    <a href="<?php echo home_url() ?>/catalogo/pesquisar-por-imagem">Pesquisar por Imagem</a>
                    <a href="<?php echo home_url() ?>/catalogo/lancamentos">Lançamentos</a>
                    <a href="<?php echo home_url() ?>/catalogo/promocoes">Promoções</a>
                    <a href="<?php echo home_url() ?>/equipe">Equipe</a>
                    <a href="<?php echo home_url() ?>/troca-e-devolucao">Troca e Devolução</a>
                    <a href="<?php echo home_url() ?>/contato">Contato</a>
                    <a href="<?php echo $array_institucional['link_area_cliente'] ?>" target="_blank">Área do Cliente</a>
                </nav>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                <h4>INFORMAÇÕES DE CONTATO</h4>
                <div class="contact-info">
                    <span><i class="fa fa-location-arrow"></i><strong>ENDEREÇO</strong><br>
                        <div style="padding-left: 20px;"><?php echo $array_institucional['endereco'] ?></div>
                    </span>
                    <span><i class="fa fa-phone"></i><?php echo $array_institucional['telefone'] ?></span>
                    <span><i class="fa fa-envelope"></i><?php echo $array_institucional['email'] ?></span>
                    <span><i class="fa fa-clock-o"></i><?php echo $array_institucional['horario_funcionamento'] ?></span>
                </div>
            </div>
        </div>
        <div class="copy text-right"><a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>&copy; 2022 CF - Peças para Freios de Caminhão. Todos os direitos reservados. Desenvolvido por <a href="https://agenciaamplia.digital" target="_blank">Agência Amplia</a>.</div>
    </div>
</footer>
</div>

<!-- Modal -->
<div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="modalProduct" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DADOS DO PRODUTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="img-modal" id="product_image" src="" alt="<?php echo get_bloginfo('name') ?>">
                        <div class="sidebar-container" style="margin-top: 20px; margin-bottom: 20px">
                            <div class="wow slideInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                                <ul class="blog-cats">
                                    <li><a href="#!" rel="nofollow"><b>REFERÊNCIA CF:</b><br /><label id="product_reference" style="font-weight: 400;"></label></a></li>
                                    <li><a href="#!" rel="nofollow"><b>Nº ORIGINAL / FABRICANTE:</b><br /><label id="product_original_number_manufacturer" style="font-weight: 400;"></label></a></li>
                                </ul>
                            </div>
                        </div>
                        <a class="btn btn-success" id="product_whatsapp" href="#!" target="_blank" style="width:100%; display:block; text-align:center">CHAMAR NO WHATSAPP <i class="fa fa-whatsapp" style="font-size:16px;"></i></a>
                    </div>
                    <div class="col-lg-8">
                        <div class="single-post">
                            <div class="wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <h1 id="product_title"></h1>
                                <div class="post-content" id="product_description"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!--Main-->
<script src="<?php echo get_template_directory_uri() ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/modernizr.custom.js"></script>

<script src="assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.easypiechart.min.js"></script>
<!-- Loader -->
<script src="<?php echo get_template_directory_uri() ?>/assets/loader/js/classie.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/loader/js/pathLoader.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/loader/js/main.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/classie.js"></script>
<!--Switcher-->
<!--<script src="<?php //echo get_template_directory_uri() 
                    ?>/assets/switcher/js/switcher.js"></script>-->
<!--Owl Carousel-->
<script src="<?php echo get_template_directory_uri() ?>/assets/owl-carousel/owl.carousel.min.js"></script>
<!-- SCRIPTS -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/isotope/jquery.isotope.min.js"></script>
<!--Theme-->
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.smooth-scroll.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/wow.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.placeholder.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/smoothscroll.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/theme.js"></script>
<script>
    $(document).ready(function() {
        $('[data-product-details]').click(function() {
            var id = $(this).attr('data-product-details');
            $.ajax({
                url: '<?php echo home_url() ?>/search.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    action: 'get_product',
                    id: id
                },
                success: function(response) {
                    $('#modalProduct #product_image').attr('src', response.image);
                    $('#modalProduct #product_title').html(response.product);
                    $('#modalProduct #product_reference').html(response.reference);
                    $('#modalProduct #product_original_number_manufacturer').html(response.original_number_manufacturer);
                    $('#modalProduct #product_description').html(response.description);
                    $('#modalProduct #product_whatsapp').attr('href', 'https://api.whatsapp.com/send?phone=5517991479450&text=' + response.whatsapp);
                    $('#modalProduct').modal('toggle');
                }
            });
        });
    });
</script>

<?php wp_footer(); ?>

</body>

</html>