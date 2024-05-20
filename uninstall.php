<?php

/**
 * Uninstall Plugin
 * 
 * @package PaymentGTW
 */

 if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
global $wpdb;
$table_name = $wpdb->prefix . 'weather';
$wpdb->query("DELETE FROM wp_posts WHERE post_type ='paymentgtw'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DROP TABLE IF EXISTS $table_name");    
register_deactivation_hook( __FILE__, 'my_plugin_remove_database' );