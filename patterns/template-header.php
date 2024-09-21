<?php
/**
 * Title: Header
 * Slug: theme/template-header
 * Categories: template
 * Block Types: core/group, core/navigation, core/site-logo
 * Description: Basic header with logo and navigation
 * Inserter: false
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|normal","bottom":"var:preset|spacing|normal","left":"var:preset|spacing|normal","right":"var:preset|spacing|normal"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--normal);padding-right:var(--wp--preset--spacing--normal);padding-bottom:var(--wp--preset--spacing--normal);padding-left:var(--wp--preset--spacing--normal)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    
    <div class="wp-block-group">
        
        <!-- wp:site-logo {"width":262,"shouldSyncIcon":false} /-->

        <!-- wp:navigation {"ref":22} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->