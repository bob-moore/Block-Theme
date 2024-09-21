<?php
/**
 * Title: Loop - Archive Stacked
 * Slug: theme/template-loop-archive
 * Categories: template
 * Inserter: false
 */
?>
<!-- wp:query {"queryId":10,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|large"}}} -->
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"backgroundColor":"white","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
    <div class="wp-block-group has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","align":"wide","className":"is-style-default","style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->

        <!-- wp:post-title {"isLink":true,"fontSize":"heading-5"} /-->

        <!-- wp:pattern {"slug":"theme/post-entry-meta"} /-->

        <!-- wp:post-excerpt {"moreText":"Keep Reading","excerptLength":30,"fontSize":"normal"} /-->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
    <!-- wp:query-pagination-previous /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
        <p>No Results Found. Try Searching Again</p>
        <!-- /wp:paragraph -->

        <!-- wp:search {"label":"Search","placeholder":"Search...","buttonText":"Search"} /-->
    </div>
    <!-- /wp:group -->
    <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->