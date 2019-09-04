<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <?php if ( has_post_thumbnail() ) { ?>
        <figure class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </figure>
    <?php } ?>
    <section class="entry-content">
        <?php the_content(); ?>
    </section>
</article>
