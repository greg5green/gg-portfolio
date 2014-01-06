<?php get_header(); ?>
    <section class="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <header class="post-header">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-time"><small>Posted on <time datetime="<?php the_time('c'); ?>"><?php the_time('F j, Y \a\t g:ia'); ?></time>.</small></p>
                </header>
                <section class="entry">
                    <?php the_content(); ?>
                </section>
                <div class="clearfix">&nbsp;</div>
                <footer class="post-footer">
                    <p class="post-metadata"><small>Tagged: <?php the_category(', '); ?></small></p>
                    <div class="previous-link"><?php previous_post_link('<div class="post-direction-indicator">&laquo;</div> %link'); ?></div>
                    <div class="next-link"><?php next_post_link('%link <div class="post-direction-indicator">&raquo</div>'); ?></div>
                </footer>
                <div class=”comments-template”>
                    <?php comments_template(); ?>
                </div>
            </article>
        <?php endwhile; else: ?>
            <p>Sorry, no posts!</p>
        <?php endif; ?>
    </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
