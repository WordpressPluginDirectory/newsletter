<?php

namespace Newsletter;

defined('ABSPATH') || exit;

class Logs {

    /**
     *
     * @global wpdb $wpdb
     * @param string $source
     * @param mixed $data
     */
    static function add($source, $description, $status = 0, $data = '') {
        global $wpdb;
        $wpdb->insert($wpdb->prefix . 'newsletter_logs', ['source' => $source, 'description' => $description, 'status' => $status, 'data' => $data, 'created' => time()]);
    }

    static function get($id) {
        global $wpdb;
        $log = $wpdb->get_row($wpdb->prepare("select * from {$wpdb->prefix}newsletter_logs where id=%d limit 1", $id));
        return $log;
    }

    static function get_all($source) {
        global $wpdb;
        $list = $wpdb->get_results($wpdb->prepare("select * from {$wpdb->prefix}newsletter_logs where source=%s order by created desc", $source));
        return $list;
    }

    static function clean() {
        global $wpdb;
        $wpdb->get_results($wpdb->prepare("delete from {$wpdb->prefix}newsletter_logs where created < %d", time() - 30 * DAY_IN_SECONDS));
    }
}
