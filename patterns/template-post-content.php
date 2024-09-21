<?php

/**
 * Title: Single Post Content
 * Slug: theme/template-post-content
 * Categories: template
 * Inserter: false
 */
?>
<!-- wp:group {"className":"entry is-style-container","layout":{"type":"default"}} -->
<div class="wp-block-group entry is-style-container"><!-- wp:group {"tagName":"header","className":"entry-header","layout":{"type":"constrained"}} -->
    <header class="wp-block-group entry-header"><!-- wp:post-title {"level":1} /-->

        <!-- wp:group {"className":"post-meta","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"fontSize":"x-small","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
        <div class="wp-block-group post-meta has-x-small-font-size"><!-- wp:post-author {"avatarSize":24,"showBio":false,"byline":"","isLink":true,"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"x-small"} /-->

            <!-- wp:post-date {"fontSize":"x-small"} /-->

            <!-- wp:post-terms {"term":"category","fontSize":"x-small"} /-->
        </div>
        <!-- /wp:group -->
    </header>
    <!-- /wp:group -->

    <!-- wp:post-content {"layout":{"type":"constrained"}} /-->
</div>
<!-- /wp:group -->