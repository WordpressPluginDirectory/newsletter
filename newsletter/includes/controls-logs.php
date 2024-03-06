<?php
use Newsletter\Logs;

global $wpdb;



require_once NEWSLETTER_INCLUDES_DIR . '/paginator.php';

$paginator = new TNP_Pagination_Controller($wpdb->prefix . 'newsletter_logs', 'id', ['source' => $source]);
$logs = $paginator->get_items();

$ajax_url = wp_nonce_url(admin_url('admin-ajax.php') . '?action=newsletter-log', 'newsletter-log');
?>


<?php if (empty($logs)) { ?>
    <p>No logs.</p>
<?php } else { ?>

    <?php $paginator->display_paginator(); ?>
    <table class="widefat">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Status</th>
                <th>Description</th>
                <th>Data</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($logs as $log) { ?>
                <tr>
                    <td><?php echo esc_html($log->id); ?></td>
                    <td style="width: 5%; white-space: nowrap"><?php echo esc_html($this->print_date($log->created)); ?></td>
                    <td><?php echo esc_html($log->status) ?></td>
                    <td><?php echo esc_html($log->description) ?></td>
                    <td>
                        <?php $this->button_icon_view($ajax_url . '&id=' . $log->id) ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>


