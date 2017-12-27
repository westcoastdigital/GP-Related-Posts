<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function gp_related_posts_output() {
    if ( is_single() ) {

        ?>
        <div class="inside-article related-posts">
        <?php

        $orig_post = $post;
        global $post;
        $tags = wp_get_post_tags($post->ID);

        if ($tags) {

            $options = get_option( 'gp_related_settings' );
            $heading = $options['gp_related_heading'];
            $postCount = $options['gp_related_posts_count'];
            $excerpt = $options['gp_related_excerpt'];
            $thumbnail = $options['gp_related_thumbnail'];

            if ( $postCount ) {
                $count = $options['gp_related_posts_count'];
            } else {
                $count = 5;
            }

            if($heading) {
                echo '<h2 class="related-post-heading">';
                echo $heading;
                echo '</h2>';
            }

            $first_tag = $tags[0]->term_id;
            $args=array(
                'tag__in' => array($first_tag),
                'post__not_in' => array($post->ID),
                'posts_per_page'=> $count,
                'caller_get_posts'=> 1
            );

            $related_posts = new WP_Query($args);
            if( $related_posts->have_posts() ) {
            while ($related_posts->have_posts()) : $related_posts->the_post(); ?>

                <article class="grid-container">
                    <a rel="bookmark" href="<? the_permalink()?>" title="Permanent Link to <?php the_title_attribute(); ?>">
                        <?php if ($thumbnail) { ?>
                        <div class="thumbnail grid-25">
                            <?php the_post_thumbnail(array(150,100)); ?>
                        </div>
                        <?php } ?>
                        <div class="content grid-75">
                            <?php the_title( '<h3 class="post-title">', '</h3>' ); ?>
                            <?php if ($excerpt) { the_excerpt(); } ?>
                        </div>
                    </a>
                </article>

            <?php
            endwhile;
            }
            $post = $orig_post;
            wp_reset_query();
        }
        ?>
        </div>
        <?php

    }
}

$options = get_option( 'gp_related_settings' );
$position = $options['gp_related_position'];

if ( $position == '1' ) {
    add_action( 'generate_after_main_content', 'gp_related_posts_output' );
} elseif ( $position == '2' ) {
    add_action( 'generate_before_footer', 'gp_related_posts_output' );    
} else {
    add_action( 'generate_after_main_content', 'gp_related_posts_output' );   
}