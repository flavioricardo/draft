<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
        	<?php printf( '%s %s for %s', get_comments_number(), (get_comments_number() > 1) ? __( 'Comments', 'draft' ) : __( 'Comment', 'draft' ), get_the_title() ); ?>
        </h2>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	        <nav class="navigation comment-navigation" role="navigation">
	            <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'draft' ); ?></h1>
	            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'draft' ) ); ?></div>
	            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'draft' ) ); ?></div>
	        </nav>
        <?php endif; ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        	<div class="no-comments"><?php _e( 'Comments are closed!', 'draft' ); ?></div>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form(); ?>

</div>