<?php
if (post_password_required()) {
    return;
}
use Ianua\Extras;
?>

<section id="comments" class="comments">
    <?php if (have_comments()) : ?>
    <h3><?php printf(_nx('One comment', '%1$s comments', get_comments_number(), 'comments title', 'ianua'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?></h3>

    <ol class="commentlist">
        <?php wp_list_comments(['style' => 'ul', 'short_ping' => true, 'callback'     =>  'Ianua\Extras\ianua_comment_section']); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
            <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'ianua')); ?></li>
            <?php endif; ?>
            <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'ianua')); ?></li>
            <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
    <?php endif;?>
    <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
        <?php _e('Comments are closed.', 'ianua'); ?>
    </div>
    <?php endif; ?>
            <?php
            comment_form(['title_reply'=> __('Leave a Comment'),'label_submit'=> __('Submit'),'comment_notes_before' => '','comment_notes_after' => '']); ?>
</section>