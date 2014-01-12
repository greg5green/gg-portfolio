<?php get_header(); ?>
    <section class="content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <section class="entry">
                    <?php the_content(); ?>
                </section>
            </article>
        <?php endwhile; else: ?>
            <h1 class="four-oh-four">404</h1>
            <img class="four-oh-four" src="<?php echo get_template_directory_uri(); ?>/elements/img/under-construction.gif" />
            <p>I'm sorry, but the content you were looking for probably doesn&rsquo;t exist. Or else, we&rsquo;re having technical difficulties. Either way, how about a <a href="http://en.wikipedia.org/wiki/Special:Random">random Wikipedia article</a> to quell your insatiable thirst for knowledge?</p>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>
