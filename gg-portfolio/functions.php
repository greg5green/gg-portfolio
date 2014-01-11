<?php

    function portfolio_theme_setup() {
        remove_action( 'wp_head', 'wp_generator' );
        remove_action( 'wp_head', 'rsd_link' );
        remove_action( 'wp_head', 'wlwmanifest_link' );
        remove_action( 'wp_head', 'rel_canonical' );

        add_action( 'init', 'register_custom_menu' );
        add_action( 'init', 'portfolio_projects' );
        add_action( 'init', 'portfolio_client_work' );
        add_action( 'load-post.php', 'portfolio_project_url_meta_box_setup' );
        add_action( 'load-post-new.php', 'portfolio_project_url_meta_box_setup' );
        add_action( 'wp_enqueue_scripts', 'portfolio_enqueue_styles_and_scripts' );

        add_filter( 'wp_default_scripts', 'change_default_jquery_behavior' );
    }

    function register_custom_menu() {
        register_nav_menu( 'main-nav', 'Main Nav' );
    }

    function portfolio_projects() {
        $labels = array(
            'name'               => _x( 'Projects', 'post type general name' ),
            'singular_name'      => _x( 'Project', 'post type singular name' ),
            'add_new'            => _x( 'Add New', 'book' ),
            'add_new_item'       => __( 'Add New Project' ),
            'edit_item'          => __( 'Edit Project' ),
            'new_item'           => __( 'New Project' ),
            'all_items'          => __( 'All Projects' ),
            'view_item'          => __( 'View Project' ),
            'search_items'       => __( 'Search Projects' ),
            'not_found'          => __( 'No Projects found' ),
            'not_found_in_trash' => __( 'No Projects found in the Trash' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Projects'
        );

        $args = array(
            'labels'        => $labels,
            'description'   => 'Shows off some projects',
            'public'        => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'editor' ),
            'has_archive'   => true
        );

        register_post_type( 'Projects', $args );
    }

    function portfolio_client_work() {
        $labels = array(
            'name'               => _x( 'Client Work', 'post type general name' ),
            'singular_name'      => _x( 'ClientWork', 'post type singular name' ),
            'add_new'            => _x( 'Add New', 'book' ),
            'add_new_item'       => __( 'Add New Project' ),
            'edit_item'          => __( 'Edit Project' ),
            'new_item'           => __( 'New Project' ),
            'all_items'          => __( 'All Projects' ),
            'view_item'          => __( 'View Project' ),
            'search_items'       => __( 'Search Projects' ),
            'not_found'          => __( 'No Projects found' ),
            'not_found_in_trash' => __( 'No Projects found in the Trash' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Client Work'
        );

        $args = array(
            'labels'              => $labels,
            'description'         => 'Shows off some client work',
            'public'              => true,
            'exclude_from_search' => true,
            'rewrite'             => array( 'slug' => _x( 'TODO', 'URL slug', 'post type slug' ) ),
            'menu_position'       => 5,
            'supports'            => array( 'title', 'editor' ),
            'has_archive'         => true
        );

        register_post_type( 'Client Work', $args );
    }

    function portfolio_project_url_meta_box_setup() {
        add_action( 'add_meta_boxes', 'portfolio_project_url_add_meta_box' );
        add_action( 'add_meta_boxes', 'portfolio_project_url_clientwork_add_meta_box' );
        add_action( 'save_post', 'portfolio_project_url_save_meta' );
    }

    function portfolio_project_url_add_meta_box() {
        add_meta_box(
            'portfolio-project-url',
            esc_html__( 'Project URL', 'url' ),
            'portfolio_project_url_meta_box',
            'projects',
            'normal',
            'default'
        );
    }

    function portfolio_project_url_clientwork_add_meta_box() {
        add_meta_box(
            'portfolio-project-url',
            esc_html__( 'Project URL', 'url' ),
            'portfolio_project_url_meta_box',
            'client work',
            'normal',
            'default'
        );
    }

    function portfolio_project_url_meta_box( $object, $box ) {
        ?>

        <?php wp_nonce_field( basename( __FILE__ ), 'portfolio_project_url_nonce' ); ?>

        <p>
            <label for="portfolio-project-url"><?php _e( "Add a URL to the live project.", 'example' ); ?></label>
            <br />
            <input class="widefat" type="text" name="portfolio-project-url" id="portfolio-project-url" value="<?php echo esc_attr( get_post_meta( $object->ID, 'portfolio_project_url', true ) ); ?>" size="30" />
        </p>
        <?php
    }

    function portfolio_project_url_save_meta( $post_id ) {
        if ( !isset( $_POST['portfolio_project_url_nonce'] ) || !wp_verify_nonce( $_POST['portfolio_project_url_nonce'], basename( __FILE__ ) ) ) {
            return $post_id;
        }

        $new_meta_value = ( isset( $_POST['portfolio-project-url'] ) ? sanitize_text_field( $_POST['portfolio-project-url'] ) : '' );

        $meta_key = 'portfolio_project_url';

        $meta_value = get_post_meta( $post_id, $meta_key, true );

        if ( $new_meta_value && '' == $meta_value ) {
            add_post_meta( $post_id, $meta_key, $new_meta_value, true );
        }
        elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
            update_post_meta( $post_id, $meta_key, $new_meta_value );
        }
        elseif ( '' == $new_meta_value && $meta_value ) {
            delete_post_meta( $post_id, $meta_key, $meta_value );
        }
    }

    function change_default_jquery_behavior( &$scripts ) {
        if ( !is_admin() ) {
            $scripts->remove( 'jquery' );

            $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
        }
    }

    // enqueue styles and scripts
    function portfolio_enqueue_styles_and_scripts() {
        if ( !is_admin() ) {
            // register styles
            wp_register_style( 'base', get_stylesheet_uri(), array(), '1.0.1', 'all' );

            // register scripts
            wp_register_script( 'modernizr', get_template_directory_uri() . '/elements/js/libs/modernizr.custom.min.js', array(), '2.6.2', false );
            wp_register_script( 'base', get_template_directory_uri() . '/elements/js/base.js', array( 'jquery' ), '1.0.1', true );

            // enqueue styles and scripts
            wp_enqueue_style( 'base' );
            wp_enqueue_script( 'modernizr' );
            wp_enqueue_script( 'base' );

            // some conditional scripts
            //wp_register_script( 'selectivzr', get_template_directory_uri() . '/elements/js/libs/selectivizr-min.js', array( 'jquery' ), '1.0.2', false );
        }
    }

    add_action( 'after_setup_theme', 'portfolio_theme_setup' );

?>
