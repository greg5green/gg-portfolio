<?php get_header(); ?>
    <section class="content">
        <?php $loop = new WP_Query( array( 'post_type' => 'clientwork', 'posts_per_page' => 100 ) ); ?>
        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <article <?php post_class(); ?>>
                <header class="post-header">
                    <h2><a href="<?php echo get_post_meta( get_the_ID(), 'portfolio_project_url', true ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                </header>
                <section class="entry">
                    <?php the_content(); ?>
                </section>
            </article>
        <?php endwhile; else: ?>
            <p>Sorry, no posts!</p>
        <?php endif; ?>
    </section>
<?php get_footer(); ?>
