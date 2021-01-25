<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Easy_Tag_And_Tracking_Id_Inserter
 * @subpackage Easy_Tag_And_Tracking_Id_Inserter/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php $current_screen = isset($_GET['tab']) ? $_GET['tab'] : ''; ?>
<div class="wrap">
    <h1>Easy Tag And Tracking Id Insert Settings</h1>
    <?php do_action('Easy_Tag_And_Tracking_Id_Inserter_settings_tabs', $current_screen); ?>
    <form method="post" action="options.php">
        <?php
        wp_nonce_field("easy-tag-and-tracking-id-inserter-page-nonce");
        if ('google-webmaster' == $current_screen) {
            settings_fields('easy_tag_and_tracking_id_inserter_google_webmaster');
            do_settings_sections('easy-tag-and-tracking-id-inserter-webmaster');
        } else if ('google-analytics' == $current_screen) {
            settings_fields('easy_tag_and_tracking_id_inserter_google_analytical');
            do_settings_sections('easy-tag-and-tracking-id-inserter_section');
        } else if ('google-tag-manager' == $current_screen) {
            settings_fields('easy_tag_and_tracking_id_inserter_google_tag_manager');
            do_settings_sections('easy-tag-and-tracking-id-inserter-google-tag-manager_section');
        } else {
            /* settings_fields('all_in_once_setting_google-intro');
            do_settings_sections('all_in_once_setting_google-intro'); */

            echo "Dashboard";
        }
        if ('intro' != $current_screen || '' == $current_screen) {
            submit_button();
        }
        ?>
    </form>
</div>