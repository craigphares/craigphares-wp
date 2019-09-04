            
            <footer id="colophon" class="site-footer">
                <span>
                    &copy; <?php echo date("Y"); ?>
                    <a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </span>
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                    <nav class="footer-navigation">
                        <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
                    </nav><!-- .footer-navigation -->
                <?php endif; ?>
            </footer>
        </section><!-- #page -->
        <!--<script>hljs.initHighlightingOnLoad();</script>-->
        <?php wp_footer(); ?>
    </body>
</html>