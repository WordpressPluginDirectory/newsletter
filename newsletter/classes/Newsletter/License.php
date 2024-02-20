<?php

namespace Newsletter;

defined('ABSPATH') || exit;

class License {

    static function update() {
        \Newsletter::instance()->get_license_data(true);
    }

    static function get_badge() {
        $license_data = \Newsletter::instance()->get_license_data(false);
        $badge = '';

        if (is_wp_error($license_data)) {
            $badge = '<span class="tnp-badge-orange">License check failed</span>';
        } else {
            if ($license_data !== false) {
                if ($license_data->expire == 0) {
                    $badge = '<span class="tnp-badge-green">Valid free license</span>';
                } elseif ($license_data->expire >= time()) {
                    $badge = '<span class="tnp-badge-green">License expires on ' . esc_html(date('Y-m-d', $license_data->expire)) . '</span>';
                } else {
                    $badge = '<span class="tnp-badge-red">License expired on ' . esc_html(date('Y-m-d', $license_data->expire)) . '</span>';
                }
            }
        }

        return $badge;
    }
}
