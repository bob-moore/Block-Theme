<?php
/**
 * Title: Post Comments
 * Slug: theme/template-post-comments
 * Categories: template
 * Inserter: false
 */
?>
<!-- wp:comments {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"backgroundColor":"white"} -->
<div class="wp-block-comments has-white-background-color has-background"
    style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)">
    <!-- wp:comments-title {"style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->

    <!-- wp:comment-template -->
    <!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column {"width":"40px"} -->
        <div class="wp-block-column" style="flex-basis:40px">
            <!-- wp:avatar {"size":40,"style":{"border":{"radius":"20px"}}} /--></div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:comment-author-name {"fontSize":"small"} /-->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex"}} -->
            <div class="wp-block-group" style="margin-top:0px;margin-bottom:0px">
                <!-- wp:comment-date {"fontSize":"small"} /-->

                <!-- wp:comment-edit-link {"fontSize":"small"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:comment-content /-->

            <!-- wp:comment-reply-link {"fontSize":"small"} /-->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
    <!-- /wp:comment-template -->

    <!-- wp:post-comments-form /-->

    <!-- wp:comments-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
    <!-- wp:comments-pagination-previous /-->

    <!-- wp:comments-pagination-numbers /-->

    <!-- wp:comments-pagination-next /-->
    <!-- /wp:comments-pagination -->
</div>
<!-- /wp:comments -->