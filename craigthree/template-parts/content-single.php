<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php if ( !is_front_page() ) { ?>
            <small class="entry-meta"><?php the_time( 'F jS, Y' ); ?></small>
        <?php } ?>
    </header>
    <?php if ( !is_front_page() && has_post_thumbnail() ) { ?>
        <figure class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
            <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
        </figure>
    <?php } ?>
    <section class="entry-content">
        <?php the_content(); ?>
    </section>
    <footer class="entry-footer">
        <?php the_tags('<ul class="tags"><li>', '</li><li>', '</li></ul>'); ?>
    </footer>
</article>
