    <section class="sidebar">
        <section class="search-form">
            <?php get_search_form(); ?>
        </section>
        <section class="categories-list">
            <h3>Categories</h3>
            <ul>
                <?php wp_list_categories('orderby=name&title_li='); ?>
            </ul>
        </section>
        <section class="archive-list">
            <h3>Archives</h3>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>
        </section>
        <section class="wp-meta">
            <?php wp_meta(); ?>
        </section>
    </section>
