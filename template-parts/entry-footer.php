<?php
/**
 * Template part for displaying entry footers
 * 
 * @package BTlabs
 */

$post_type = get_post_type();
?>

<footer class="entry-footer">
    <?php if ($post_type !== 'projets' && has_tag()) : ?>
        <div class="tags-links">
            <?php the_tags('<span class="tags-title">' . esc_html__('Tags:', 'btlabs') . '</span> ', ', '); ?>
        </div>
    <?php endif; ?>

    <?php if (get_edit_post_link()) : ?>
        <div class="edit-link">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        __('Modifier <span class="screen-reader-text">"%s"</span>', 'btlabs'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </div>
    <?php endif; ?>
</footer>