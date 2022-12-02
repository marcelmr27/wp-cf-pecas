<?php
global $wp;
$blog = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'p' => url_to_postid(home_url($wp->request))
        ));

get_header();
?> 
<?php
if ($blog->have_posts()):
    while ($blog->have_posts()) : $blog->the_post();
        ?>
        <header class="pages-header bg-img valign parallaxie" data-background="<?php echo get_template_directory_uri() ?>/img/pg1.jpg" data-overlay-dark="5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cont text-center">
                            <h1><?php the_title() ?></h1>
                            <div class="path">
                                <a href="<?php echo home_url() ?>">Home</a>
                                <span>/</span>
                                <a href="<?php echo home_url() ?>/blog">Blog</a>
                                <span>/</span>
                                <a href="#!" rel="nofollow" class="active"><?php the_title() ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="blog-pg single section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="post">
                            <div class="title-head">
                                <h2><?php the_title() ?></h2>
                                <div class="info">
                                    <p><a href="#!" rel="nofollow"><?php the_date() ?></a></p>
                                </div>
                            </div>
                            <div class="img main-img">
                                <img src="<?php get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="<?php the_title() ?>" class="thumparallax">
                            </div>
                            <div class="content pt-20">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="cont">
                                            <?php the_content() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif;
?>
<?php
get_footer();
