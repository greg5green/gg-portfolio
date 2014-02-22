<?php get_header(); ?>
    <section class="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <header class="post-header">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php the_title(); ?></a></h2>
                    <p class="post-time"><small>Posted on <time datetime="<?php the_time('c'); ?>"><?php the_time('F j, Y \a\t g:ia'); ?></time>.</small></p>
                </header>
                <section class="entry">
                    <?php the_excerpt(); ?>
                </section>
                <footer class="post-footer">
                    <p class="post-metadata"><small>Tagged: <?php the_category(', '); ?></small></p>
                </footer>
            </article>
        <?php endwhile; else: ?>
            <p>Sorry, nothing found!</p>
        <?php endif; ?>
    </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
