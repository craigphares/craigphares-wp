<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <small class="entry-meta"><?php the_time( 'F jS, Y' ); ?></small>
        <?php if ( has_post_thumbnail() && false ) { ?>
            <figure class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            </figure>
        <?php } ?>
        <h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
    </header>
    <section class="entry-content">
        <?php the_excerpt(); ?>
    </section>
</article>
