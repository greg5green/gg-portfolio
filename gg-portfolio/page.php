<?php get_header(); ?>
    <section class="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <section class="entry">
                    <?php the_content(); ?>
                </section>
            </article>
        <?php endwhile; else: ?>
            <p>Sorry, no pages.</p>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>
