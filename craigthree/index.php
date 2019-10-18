<?php get_header(); ?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
        <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                if ( is_sticky() ) {
                    get_template_part('template-parts/content', 'sticky');
                } else if ( is_single() || is_front_page() || is_page() ) {
                    get_template_part('template-parts/content', 'single');
                } else {
                    get_template_part('template-parts/content');
                }
            } // end while
        } // end if
        ?>
        <?php if ( is_front_page() ) { ?>
            <!-- <hr> -->
            <aside class="widget-area" role="complementary">
                <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                    <ul class="sidebar">
                        <?php dynamic_sidebar( 'sidebar-2' ); ?>
                    </ul>
                <?php endif; ?>
            </aside>
        <?php } ?>
        <?php if ( is_single() && !is_front_page() ) { ?>
            <!-- <hr> -->
            <aside class="widget-area" role="complementary">
                <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                    <ul class="sidebar">
                        <?php dynamic_sidebar( 'sidebar-3' ); ?>
                    </ul>
                <?php endif; ?>
            </aside>
        <?php } ?>
        <?php if ( is_page() && !is_front_page() ) { ?>
            <aside class="widget-area" role="complementary">
                <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                    <ul class="sidebar">
                        <?php dynamic_sidebar( 'sidebar-3' ); ?>
                    </ul>
                <?php endif; ?>
            </aside>
        <?php } ?>
    </main>
    <?php 
    if ( is_front_page() ) {
        get_sidebar(); 
    } 
    ?>
</section>
<?php get_footer();
