<?php
/**
 * Title: Footer
 * Slug: theme/template-footer
 * Categories: template
 * Block Types: core/group, core/navigation, core/site-logo, core/social-links, core/search
 * Description: A footer with logo, social, search, and site links
 * Inserter: false
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|large","left":"var:preset|spacing|large"}}}} -->
        <div class="wp-block-columns"><!-- wp:column -->
            <div class="wp-block-column"><!-- wp:site-logo /-->

                <!-- wp:paragraph -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"iconColor":"white","iconColorValue":"#FFFFFF","openInNewTab":true,"style":{"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} -->
                <ul class="wp-block-social-links has-icon-color"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"youtube"} /-->
                </ul>
                <!-- /wp:social-links -->

                <!-- wp:search {"label":"Search","placeholder":"Search...","buttonText":"Search"} /-->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column"><!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:heading {"level":6} -->
                        <h6 class="wp-block-heading">Company</h6>
                        <!-- /wp:heading -->

                        <!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} -->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('About', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Careers', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Brand Assets', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Contact', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Privacy Policy', 'mwf_block_theme'); ?>","url":"#"} /-->
                        <!-- /wp:navigation -->

                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:heading {"level":6} -->
                        <h6 class="wp-block-heading">Resources</h6>
                        <!-- /wp:heading -->

                        <!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} -->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Blog', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Contact', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Support Docs', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Get Help', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Documentation', 'mwf_block_theme'); ?>","url":"#"} /-->
                        <!-- /wp:navigation -->

                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column"><!-- wp:heading {"level":6} -->
                        <h6 class="wp-block-heading">Product</h6>
                        <!-- /wp:heading -->

                        <!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} -->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Features', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Pricing', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Use Cases', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Demo', 'mwf_block_theme'); ?>","url":"#"} /-->
                            <!-- wp:navigation-link {"label":"<?php esc_html_e('Case Studies', 'mwf_block_theme'); ?>","url":"#"} /-->
                        <!-- /wp:navigation -->

                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group"><!-- wp:paragraph -->
        <p>© Copyright <?php echo get_bloginfo( 'name' ); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->