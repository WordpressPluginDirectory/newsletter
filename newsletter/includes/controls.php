<?php
defined('ABSPATH') || exit;

include_once __DIR__ . '/fields.php';

class NewsletterControls {

    var $data = [];
    var $action = '';
    var $button_data = '';
    var $errors = '';

    /**
     * @var string
     */
    var $messages = '';
    var $toasts = [];

    /**
     * @var array
     */
    var $warnings = array();
    var $countries = array(
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua And Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia And Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Congo, Democratic Republic',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote D\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island & Mcdonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran, Islamic Republic Of',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle Of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia, Federated States Of',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'AN' => 'Netherlands Antilles',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory, Occupied',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts And Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre And Miquelon',
        'VC' => 'Saint Vincent And Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome And Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia And Sandwich Isl.',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard And Jan Mayen',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad And Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks And Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'UK' => 'United Kingdom',
        'US' => 'United States',
        'UM' => 'United States Outlying Islands',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Viet Nam',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'WF' => 'Wallis And Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
        'XX' => 'Undefined',
        'CW' => 'Curaçao',
        'SS' => 'South Sudan',
        'EU' => 'Europe (generic)',
        'A1' => 'Anonymous IP',
        'A2' => 'Satellite IP',
        'XK' => 'Kosovo'
    );

    /**
     *
     * @param array $options
     */
    function __construct($options = null) {
        if ($options === null) {
            // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.NonceVerification.Missing
            $this->data = wp_unslash($_POST['options'] ?? []);
        } else {
            $this->data = (array) $options;
        }

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
        $this->action = sanitize_key($_REQUEST['act'] ?? '');

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing
        $this->button_data = sanitize_key($_REQUEST['btn'] ?? '');

        // Fields analysis
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        if (isset($_REQUEST['tnp_fields'])) {
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
            $fields = wp_unslash($_REQUEST['tnp_fields']);
            if (is_array($fields)) {
                foreach ($fields as $name => $type) {
                    if ($type === 'datetime') {
                        // Ex. The user insert 01/07/2012 14:30 and it set the time zone to +2. We cannot use the
                        // mktime, since it uses the time zone of the machine. We create the time as if we are on
                        // GMT 0 and then we subtract the GMT offset (the example date and time on GMT+2 happens
                        // "before").
                        // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated, WordPress.Security.NonceVerification.Recommended
                        $time = gmmktime((int) $_REQUEST[$name . '_hour'], 0, 0, (int) $_REQUEST[$name . '_month'], (int) $_REQUEST[$name . '_day'], (int) $_REQUEST[$name . '_year']);
                        $time -= get_option('gmt_offset') * 3600;
                        $this->data[$name] = $time;
                        continue;
                    }
                    if ($type === 'array') {
                        if (!isset($this->data[$name])) {
                            $this->data[$name] = [];
                        }
                        continue;
                    }
                    if ($type === 'checkbox') {
                        if (!isset($this->data[$name])) {
                            $this->data[$name] = 0;
                        }
                        continue;
                    }
                    if ($type === 'encoded') {
                        // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode
                        $this->data[$name] = rawurldecode(base64_decode($this->data[$name]));
                        continue;
                    }
                }
            }
        }
    }

    function set_data($data) {
        $this->data = (array) $data;
    }

    function merge($options) {
        if (!is_array($options))
            return;
        if ($this->data == null)
            $this->data = [];
        $this->data = array_merge($this->data, $options);
    }

    function merge_defaults($defaults) {
        if ($this->data == null)
            $this->data = $defaults;
        else
            $this->data = array_merge($defaults, $this->data);
    }

    /**
     * Return true is there in an asked action is no action name is specified or
     * true is the requested action matches the passed action.
     * Dies if it is not a safe call.
     */
    function is_action($action = null) {
        if (empty($this->action)) {
            return false;
        }

        return ($action === null || $this->action === $action) && check_admin_referer('save');
    }

    function get_value($name, $def = null) {
        if (!isset($this->data[$name])) {
            return $def;
        }
        return $this->data[$name];
    }

    function get_value_array($name) {
        if (!isset($this->data[$name]) || !is_array($this->data[$name]))
            return [];
        return $this->data[$name];
    }

    function show_error($text) {
        echo '<div class="tnp-error">', wp_kses_post($text), '</div>';
    }

    function show_warning($text) {
        echo '<div class="tnp-warning">', wp_kses_post($text), '</div>';
    }

    function show_message($text) {
        echo '<div class="tnpc-message">', wp_kses_post($text), '</div>';
    }

    /**
     * Show the errors and messages.
     */
    function show() {
        static $shown = false;

        if ($shown) {
            return;
        }
        $shown = true;

        if (!empty($this->errors)) {
            if (is_array($this->errors)) {
                foreach ((array) $this->errors as $text) {
                    echo '<div class="tnpc-error">';
                    echo wp_kses_post($text);
                    echo '</div>';
                }
            } else {
                echo '<div class="tnpc-error">';
                echo wp_kses_post($this->errors);
                echo '</div>';
            }
        }
        if (!empty($this->warnings)) {
            foreach ((array) $this->warnings as $warning) {
                echo '<div class="tnpc-warning">';
                echo wp_kses_post($warning);
                echo '</div>';
            }
        }
        if (!empty($this->messages)) {
            echo '<div class="tnpc-message">';
            echo wp_kses_post($this->messages);
            echo '</div>';
        }

        if (!empty($this->toasts)) {
            echo '<script>';
            foreach ($this->toasts as $toast) {
                echo 'TNP.toast(\'', esc_js($toast), '\');';
            }
            echo '</script>';
        }
    }

    function add_toast($text) {
        $this->toasts[] = $text;
    }

    function add_message($text) {
        if (!empty($this->messages)) {
            $this->messages .= '<br><br>';
        }
        $this->messages .= $text;
    }

    function add_message_saved() {
        if (!empty($this->messages)) {
            $this->messages .= '<br><br>';
        }
        $this->messages .= __('Saved.', 'newsletter');
    }

    function add_toast_saved() {
        $this->toasts[] = __('Saved.', 'newsletter');
    }

    function add_toast_done() {
        $this->toasts[] = __('Done.', 'newsletter');
    }

    function add_toast_deleted() {
        $this->toasts[] = __('Deleted.', 'newsletter');
    }

    function add_message_deleted() {
        if (!empty($this->messages)) {
            $this->messages .= '<br><br>';
        }
        $this->messages .= __('Deleted.', 'newsletter');
    }

    function add_message_reset() {
        if (!empty($this->messages)) {
            $this->messages .= '<br><br>';
        }
        $this->messages .= __('Options reset.', 'newsletter');
    }

    function add_message_done() {
        if (!empty($this->messages)) {
            $this->messages .= '<br><br>';
        }
        $this->messages .= __('Done.', 'newsletter');
    }

    function add_language_warning() {
        $newsletter = NewsletterAdmin::instance();
        $current_language = $newsletter->get_current_language();

        if (!$current_language) {
            return;
        }
        $this->warnings[] = 'You are configuring the language <strong>' . esc_html($newsletter->get_language_label($current_language)) . '</strong>. Switch to "all languages" to see all options.';
    }

    /**
     *
     * @return string
     *
     * @todo Internationalization
     */
    function language_notice() {
        NewsletterAdmin::instance()->language_notice();
    }

    /**
     *
     * @return string
     * @deprecated
     */
    function switch_to_all_languages_notice() {
        if (!NewsletterAdmin::instance()->language()) {
            return;
        }
        echo '<div class="tnpc-language-notice">';

        echo 'You are configuring the language <strong>', esc_html(NewsletterAdmin::instance()->get_language_label($current_language)), '</strong>. Switch to "all languages" to see all options.';

        echo '</div>';
    }

    function hint($text, $url = '') {
        echo '<div class="tnpc-hint">';
        echo wp_kses_post($text);
        if (!empty($url)) {
            echo ' <a href="', esc_attr($url), '" target="_blank">Read more</a>.';
        }
        echo '</div>';
    }

    function user_status($name = 'status') {
        $this->select($name, [
            'C' => TNP_User::get_status_label('C'),
            'S' => TNP_User::get_status_label('S'),
            'U' => TNP_User::get_status_label('U'),
            'B' => TNP_User::get_status_label('B'),
            'P' => TNP_User::get_status_label('P')
        ]);
    }

    function gender($name) {
        $this->select($name, ['n' => __('Not specified', 'newsletter'), 'f' => __('Female', 'newsletter'), 'm' => __('Male', 'newsletter')]);
    }

    function yesno($name) {
        $value = isset($this->data[$name]) ? (int) $this->data[$name] : 0;

        echo '<select style="width: 60px" name="options[', esc_attr($name), ']">';
        echo '<option value="0"';
        if ($value == 0) {
            echo ' selected';
        }
        echo '>', esc_html__('No', 'newsletter'), '</option>';
        echo '<option value="1"';
        if ($value == 1) {
            echo ' selected';
        }
        echo '>', esc_html__('Yes', 'newsletter'), '</option>';
        echo '</select>&nbsp;&nbsp;&nbsp;';
    }

    function showhide($name) {
        $value = isset($this->data[$name]) ? (int) $this->data[$name] : 0;

        echo '<select style="width: auto" name="options[', esc_attr($name), ']">';
        echo '<option value="0"';
        if ($value == 0) {
            echo ' selected';
        }
        echo '>', esc_html__('Hide', 'newsletter'), '</option>';
        echo '<option value="1"';
        if ($value == 1) {
            echo ' selected';
        }
        echo '>', esc_html__('Show', 'newsletter'), '</option>';
        echo '</select>';
    }

    function enabled($name = 'enabled', $attrs = []) {
        $value = (int) ($this->data[$name] ?? 0);

        echo '<select style="width: 100px" name="options[', esc_attr($name), ']" id="options-', esc_attr($name), '"';
        if (isset($attrs['bind_to'])) {
            echo ' onchange="tnp_select_toggle(this, \'', esc_attr($attrs['bind_to']), '\')"';
        }
        echo '>';
        echo '<option value="0"';
        if ($value === 0) {
            echo ' selected';
        }
        echo '>', esc_html__('Disabled', 'newsletter'), '</option>';
        echo '<option value="1"';
        if ($value === 1) {
            echo ' selected';
        }
        echo '>', esc_html__('Enabled', 'newsletter'), '</option>';
        echo '</select>';
        if (isset($attrs['bind_to'])) {
            if ($value) {
                echo '<script>jQuery(function ($) {$("#options-', esc_attr($attrs['bind_to']), '").show()})</script>';
            } else {
                echo '<script>jQuery(function ($) {$("#options-', esc_attr($attrs['bind_to']), '").hide()})</script>';
            }
        }
    }

    function disabled($name) {
        $value = isset($this->data[$name]) ? (int) $this->data[$name] : 0;

        echo '<select style="width: 100px" name="options[' . esc_attr($name) . ']">';
        echo '<option value="0"';
        if ($value == 0) {
            echo ' selected';
        }
        echo '>Enabled</option>';
        echo '<option value="1"';
        if ($value == 1) {
            echo ' selected';
        }
        echo '>Disabled</option>';
        echo '</select>';
    }

    /**
     * Creates a set of checkbox all named as $name with values and labels extracted from
     * $values_labels. A checkbox will be checked if internal data under key $name is an array
     * and contains the value of the current (echoing) checkbox.
     *
     * On submit it produces an array under the name $name IF at least one checkbox has
     * been checked. Otherwise the key won't be present.
     *
     * @param array $values
     * @param string $name
     * @param array $values_labels
     */
    function checkboxes_group($name, $values_labels, $attrs = []) {
        $value_array = $this->get_value_array($name);

        echo '<div class="tnpc-checkboxes">';
        foreach ($values_labels as $value => $label) {
            echo '<label><input type="checkbox" id="', esc_attr($name), '" name="options[', esc_attr($name), '][]" value="', esc_attr($value), '"';
            // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
            if (array_search($value, $value_array) !== false) {
                echo ' checked';
            }
            if (!empty($attrs['disabled'])) {
                echo ' disabled';
            }
            echo '>';
            if ($label != '') {
                echo '&nbsp;' . esc_html($label);
            }
            echo "</label>";
        }
        echo "<div style='clear: both'></div>";
    }

    /** Creates a checkbox group with all public post types.
     */
    function post_types($name = 'post_types') {
        $list = array();
        $post_types = get_post_types(['public' => true], 'objects', 'and');
        foreach ($post_types as $post_type) {
            $list[$post_type->name] = $post_type->labels->name;
        }

        $this->checkboxes_group($name, $list);
    }

    function posts_select($name, $max = 20, $args = array()) {
        $args = array_merge(array(
            'posts_per_page' => 5,
            'offset' => 0,
            'category' => '',
            'category_name' => '',
            'orderby' => 'date',
            'order' => 'DESC',
            'include' => '',
            'exclude' => '',
            'meta_key' => '',
            'meta_value' => '',
            'post_type' => 'post',
            'post_mime_type' => '',
            'post_parent' => '',
            'author' => '',
            'author_name' => '',
            'post_status' => 'publish',
            'suppress_filters' => true
                ), $args);
        $args['posts_per_page'] = $max;

        $posts = get_posts($args);
        $options = array();
        foreach ($posts as $post) {
            $options['' . $post->ID] = $post->post_title;
        }

        $this->select($name, $options);
    }

    function select_number($name, $min, $max) {
        $options = array();
        for ($i = $min; $i <= $max; $i++) {
            $options['' . $i] = $i;
        }
        $this->select($name, $options);
    }

    /**
     *
     * @param string $name Control name
     * @param string $first LAbel for the first empty entry (if null: not shown)
     * @param string $language Language code to extract the pages only for that language
     * @param bool $show_id Show the page ID near the page title
     */
    function page($name = 'page', $first = null, $language = '', $show_id = false) {
        $args = array(
            'post_type' => 'page',
            // phpcs:ignore WordPress.WP.PostsPerPage.posts_per_page_posts_per_page
            'posts_per_page' => 1500,
            'offset' => 0,
            'orderby' => 'post_title',
            'post_status' => 'any',
            'suppress_filters' => true
        );

        $pages = get_posts($args);
        $options = [];
        foreach ($pages as $page) {
            /* @var $page WP_Post */
            $label = $page->post_title;
            if ($page->post_status != 'publish') {
                $label .= ' (' . $page->post_status . ')';
            }
            if ($show_id) {
                $label .= ' [#' . $page->ID . ']';
            }
            $options[$page->ID] = $label;
        }
        $this->select($name, $options, $first);
    }

    /**
     * Selector for a WP page or a custom URL.
     *
     * @param string $name
     * @param string $language
     * @param bool $show_id
     */
    function page_or_url($name = 'page', $language = '', $show_id = true, $attrs = []) {
        $args = array(
            'post_type' => 'page',
            // phpcs:ignore WordPress.WP.PostsPerPage.posts_per_page_posts_per_page
            'posts_per_page' => 200,
            'offset' => 0,
            'orderby' => 'post_title',
            'post_status' => 'any',
            'suppress_filters' => true
        );

        $pages = get_posts($args);
        //$pages = get_pages();
        $options = ['url' => 'Custom URL'];
        foreach ($pages as $page) {
            /* @var $page WP_Post */
            $label = $page->post_title;
            if ($page->post_status != 'publish') {
                $label .= ' (' . $page->post_status . ')';
            }
            if ($show_id) {
                $label .= ' [#' . $page->ID . ']';
            }
            $options[$page->ID] = $label;
        }

        $this->select($name . '_id', $options, __('Newsletter public page', 'newsletter'));
        if (!empty($attrs['preview_url']) && current_user_can('administrator')) {
            $this->btn_link($attrs['preview_url'], __('Preview', 'newsletter'), ['tertiary' => true, 'target' => '_blank']);
        }
        echo '<p class="description" data-tnpshow="', esc_attr($name), '_id=0">The public page is set on general Setting page.</p>';
        echo '<div data-tnpshow="', esc_attr($name), '_id=url" style="margin-top: 1rem;">';
        $this->text($name . '_url', ['placeholder' => 'https://']);
        echo '</div>';
    }

    /** Used to create a select which is part of a group of controls identified by $name that will
     * produce an array of values as $_REQUEST['name'].
     * @param string $name
     * @param array $options Associative array
     */
    function select_group($name, $options) {
        $value_array = $this->get_value_array($name);

        echo '<select name="options[', esc_attr($name), '][]">';

        foreach ($options as $key => $label) {
            echo '<option value="' . esc_attr($key) . '"';
            // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
            if (array_search($key, $value_array) !== false) {
                echo ' selected';
            }
            echo '>', esc_html($label), '</option>';
        }

        echo '</select>';
    }

    function select($name, $options, $first = null, $attrs = []) {
        if (!is_array($options)) {
            $this->hidden($name); // To preserve the value
        }
        echo '<select id="options-', esc_attr($name), '" name="options[', esc_attr($name), ']"';
        if ($attrs && is_array($attrs)) {
            foreach ($attrs as $key => $value) {
                echo ' ', esc_attr($key), '="', esc_attr($value), '"';
            }
        }
        echo '>';
        if (!empty($first)) {
            echo '<option value="">', esc_html($first), '</option>';
        }
        $value = $this->get_value($name);
        foreach ($options as $key => $label) {
            echo '<option value="', esc_attr($key), '"';
            if ($value == $key) {
                echo ' selected';
            }
            echo '>', esc_html($label), '</option>';
        }
        echo '</select>';
    }

    function optin($name = 'optin') {
        $this->select('optin', ['' => __('Default', 'newsletter'), 'double' => __('Double', 'newsletter'), 'single' => __('Single', 'newsletter')]);
        echo '<p>Default: ', NewsletterSubscription::instance()->is_double_optin() ? esc_html__('Double', 'newsletter') : esc_html__('Single', 'newsletter'), '</p>';
    }

    function select_images($name, $options, $first = null) {
        $value = $this->get_value($name);

        echo '<select id="options-' . esc_attr($name) . '" name="options[' . esc_attr($name) . ']" style="min-width: 200px">';
        if (!empty($first)) {
            echo '<option value="">' . esc_html($first) . '</option>';
        } else {
//            if (empty($value)) {
//                $keys = array_keys($options);
//                $value = $keys[0];
//            }
        }
        foreach ($options as $key => $data) {
            echo '<option value="' . esc_attr($key) . '" image="' . esc_attr($data['image']) . '"';
            if ($value == $key)
                echo ' selected';
            echo '>' . esc_html($data['label']) . '</option>';
        }
        echo '</select>';
        echo '<script>jQuery("#options-' . esc_attr($name) . '").select2({templateResult: tnp_select_images, templateSelection: tnp_select_images_selection});</script>';
    }

    function select2($name, $options, $first = null, $multiple = false, $style = null, $placeholder = '') {

        if ($multiple) {
            $option_name = "options[" . $name . "][]";
            echo '<input type="hidden" name="tnp_fields[' . esc_attr($name) . ']" value="array">';
        } else {
            $option_name = "options[" . $name . "]";
        }

        if (is_null($style)) {
            $style = 'width: 100%';
        }

        $value = $this->get_value($name);

        echo '<select id="options-', esc_attr($name), '" name="', esc_attr($option_name), '" style="', esc_attr($style), '"',
        ($multiple ? ' multiple' : ''), '>';
        if (!empty($first)) {
            echo '<option value="">', esc_html($first), '</option>';
        }

        foreach ($options as $key => $data) {
            echo '<option value="', esc_attr($key), '"';
            // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
            if (is_array($value) && in_array($key, $value) || (!is_null($value) && $value == $key )) {
                echo ' selected';
            }
            echo '>', esc_html($data), '</option>';
        }

        echo '</select>';
        echo '<script>jQuery("#options-' . esc_attr($name) . '").select2({placeholder: "', esc_js($placeholder), '"});</script>';
    }

    function select_grouped($name, $groups) {
        $value = $this->get_value($name);
        echo '<select name="options[', esc_attr($name), ']">';

        foreach ($groups as $group) {
            echo '<optgroup label="', esc_attr($group['']), '">';
            if (!empty($group)) {
                foreach ($group as $key => $label) {
                    if ($key == '') {
                        continue;
                    }
                    echo '<option value="', esc_attr($key), '"';
                    if ($value == $key) {
                        echo ' selected';
                    }
                    echo '>', esc_html($label), '</option>';
                }
            }
            echo '</optgroup>';
        }
        echo '</select>';
    }

    /**
     * Generated a select control with all available templates. From version 3 there are
     * only on kind of templates, they are no more separated by type.
     */
    function themes($name, $themes, $submit_on_click = true) {
        foreach ($themes as $key => $data) {
            echo '<label style="display: block; float: left; text-align: center; margin-right: 10px;">';
            echo esc_html($key) . '<br>';
            echo '<img src="' . esc_attr($data['screenshot']) . '" width="100" height="100" style="border: 1px solid #666; padding: 5px"><br>';
            echo '<input style="position: relative; top: -40px" type="radio" onchange="this.form.act.value=\'theme\';this.form.submit()" name="options[' . esc_attr($name) . ']" value="' . esc_attr($key) . '"';
            if ($this->data[$name] == $key) {
                echo ' checked';
            }
            echo '>';
            echo '</label>';
        }
        echo '<div style="clear: both"></div>';
    }

    function value($name) {
        echo esc_html($this->data[$name]);
    }

    function value_date($name, $show_remaining = true) {
        $time = $this->get_value($name);

        echo esc_html(gmdate(get_option('date_format') . ' ' . get_option('time_format'), $time + get_option('gmt_offset') * 3600));
        $delta = $time - time();
        if ($show_remaining && $delta > 0) {
            echo 'Remaining: ';
            $delta = $time - time();
            $days = floor($delta / (24 * 3600));
            $delta = $delta - $days * 24 * 3600;
            $hours = floor($delta / 3600);
            $delta = $delta - $hours * 3600;
            $minutes = floor($delta / 60);

            if ($days > 0) {
                echo (int) $days, ' days ';
            }
            echo (int) $hours, ' hours ';
            echo (int) $minutes, ' minutes ';
        }
    }

    function password($name, $size = 20, $placeholder = '') {
        $value = $this->get_value($name);
        echo '<input id="options-', esc_attr($name), '" placeholder="' . esc_attr($placeholder) . '" name="options[', esc_attr($name), ']" type="password" autocomplete="off" ';
        if (!empty($size)) {
            echo 'size="', (int) $size, '" ';
        }
        echo 'value="', esc_attr($value), '">';
    }

    function text($name, $attrs = [], $placeholder = '') {
        if (!is_array($attrs)) {
            $attrs = ['size' => $attrs, 'placeholder' => $placeholder];
        }
        $attrs = array_merge(['placeholder' => '', 'size' => 40, 'required' => false, 'visible' => true], $attrs);
        $value = $this->get_value($name);
        $style = '';
        if (isset($attrs['width'])) {
            $style = 'width: ' . ((int) $attrs['width']) . 'px;';
        }
        if (!$attrs['visible']) {
            $style .= 'display: none;';
        }
        echo '<input id="options-', esc_attr($name), '" placeholder="', esc_attr($attrs['placeholder']), '" title="',
        esc_attr($attrs['placeholder']), '" name="options[', esc_attr($name), ']" type="text" ',
        'style="', esc_attr($style), '"';
        if (!empty($attrs['size'])) {
            echo ' size="', esc_attr($attrs['size']), '" ';
        }
        echo ' value="', esc_attr($value), '">';
    }

    function text_email($name, $attrs = []) {
        if (is_numeric($attrs)) {
            $attrs = ['size' => $attrs];
        }
        $attrs = array_merge(['placeholder' => __('Valid email address', 'newsletter'), 'size' => 40, 'required' => false], $attrs);

        $value = $this->get_value($name);
        echo '<input name="options[' . esc_attr($name) . ']" type="email" placeholder="';
        echo esc_attr($attrs['placeholder']);
        echo '" size="', esc_attr($attrs['size']), '" value="', esc_attr($value), '"';
        if ($attrs['required']) {
            echo ' required';
        }

        echo '>';
    }

    function text_url($name, $attrs = []) {
        if (!is_array($attrs)) {
            $attrs = [];
        }
        $attrs = array_merge(['visible' => true, 'size' => 40, 'placeholder' => 'https://...'], $attrs);
        $style = '';
        if (!$attrs['visible']) {
            $style .= 'display: none;';
        }
        $value = $this->get_value($name);
        echo '<input id="options-', esc_attr($name), '" name="options[', esc_attr($name), ']" type="url" placeholder="' . esc_attr($attrs['placeholder']) . '" size="' . esc_attr($attrs['size']) . '" value="';
        echo esc_attr($value), '" style="', esc_attr($style), '">';
    }

    function hidden($name) {
        $value = $this->get_value($name);
        echo '<input name="options[', esc_attr($name), ']" id="options-', esc_attr($name), '" type="hidden" value="', esc_attr($value), '">';
    }

    /**
     * General button. Attributes:
     * - id: the element HTML id
     * - confirm: if string the text is shown in a confirmation message, if true shows a standard confirm message
     * - icon: the font awesome icon name (fa-xxx)
     * - style: the CSS style
     * - data: free data associated to the button click ($controls->button_data) for example to pass the element ID from a list of elements
     * - confirm: false to no show an alert, true to show the "want to proceed?" question or a string to show that exact message
     *
     * @param string $action
     * @param string $label
     * @param array $attrs
     */
    function btn($action, $label, $attrs = []) {
        $action = sanitize_key($action);

        if (isset($attrs['delete'])) {
            echo '<button class="button-secondary button-tertiary tnpc-button tnpc-button-delete"';
        } elseif (isset($attrs['tertiary'])) {
            echo '<button class="button-secondary button-tertiary tnpc-button tnpc-button-tertiary"';
        } elseif (isset($attrs['secondary'])) {
            echo '<button class="button-secondary tnpc-button tnpc-button-secondary"';
        } else {
            echo '<button class="button-primary tnpc-button"';
        }
        if (isset($attrs['id'])) {
            echo ' id="', esc_attr($attrs['id']), '"';
        }

        if (isset($attrs['disabled']) && $attrs['disabled']) {
            echo ' disabled';
        }

        $onclick = "this.form.act.value='" . esc_attr(esc_js(trim($action))) . "';";
        if (!empty($attrs['data'])) {
            $onclick .= "this.form.btn.value='" . esc_attr(esc_js($attrs['data'])) . "';";
        }

        $confirm = $attrs['confirm'] ?? false;

        if ($confirm === true || is_string($confirm) && empty($confirm)) {
            $confirm = __('Proceed?', 'newsletter');
        }

        if ($confirm) {
            $onclick .= "if (!confirm('" . esc_attr(esc_js($confirm)) . "')) return false;";
        }

        echo ' onclick="', esc_attr($onclick), '"';

        if (!empty($attrs['title'])) {
            echo ' title="', esc_attr($attrs['title']), '"';
        }
        if (!empty($attrs['style'])) {
            echo ' style="', esc_attr($attrs['style']), '"';
        }
        echo '>';

        if (!empty($attrs['icon'])) {
            echo '<i class="fas ', esc_attr($attrs['icon']), '"></i>';
            if (!empty($label)) {
                echo '&nbsp;', esc_html($label);
            }
        } else {
            echo esc_html($label);
        }
        echo '</button>';
    }

    /**
     * Creates a link looking lie a standard button. Attributes:
     * - title: the link "title" HTML attribute
     * - target: the link "target" HTML attribute
     * - icon: the font awesome icon name (fa-xxx)
     * - style: the CSS style
     *
     * @param string $url
     * @param string $label
     * @param array $attrs
     */
    function btn_link($url, $label, $attrs = []) {
        if (isset($attrs['tertiary'])) {
            echo '<a href="', esc_attr($url), '" class="button-secondary button-tertiary tnpc-button tnpc-button-tertiary"';
        } elseif (isset($attrs['secondary'])) {
            echo '<a href="', esc_attr($url), '" class="button-secondary tnpc-button tnpc-button-secondary"';
        } else {
            echo '<a href="', esc_attr($url), '" class="button-primary tnpc-button"';
        }
        if (!empty($attrs['style'])) {
            echo ' style="', esc_attr($attrs['style']), '"';
        }
        if (!empty($attrs['title'])) {
            echo ' title="', esc_attr($attrs['title']), '"';
        }
        if (!empty($attrs['id'])) {
            echo ' id="', esc_attr($attrs['id']), '"';
        }
        if (!empty($attrs['target'])) {
            echo ' target="', esc_attr($attrs['target']), '"';
        }
        if (!empty($attrs['data-tnpshow'])) {
            echo ' data-tnpshow="', esc_attr($attrs['data-tnpshow']), '"';
        }
        echo '>';
        if (!empty($attrs['icon'])) {
            echo '<i class="fas ', esc_attr($attrs['icon']), '"></i>';
            if (!empty($label)) {
                echo '&nbsp;', esc_html($label);
            }
        } else {
            echo esc_html($label);
        }
        echo '</a>';
    }

    function button($action, $label, $function = '', $id = '') {
        $action = sanitize_key($action);

        if ($function != null) {
            echo '<input id="' . esc_attr($id) . '" class="button-primary tnpc-button" type="button" value="' . esc_attr($label) . '" onclick="this.form.act.value=\'' . esc_attr($action) . '\';' . esc_html($function) . '"/>';
        } else {
            echo '<input id="' . esc_attr($id) . '" class="button-primary tnpc-button" type="submit" value="' . esc_attr($label) . '" onclick="this.form.act.value=\'' . esc_attr($action) . '\';return true;"/>';
        }
    }

    function action_link($action, $label, $function = null) {
        $action = sanitize_key($action);
        if ($function != null) {
            echo '<input class="button-link tnpc-button" type="button" value="' . esc_attr($label) . '" onclick="this.form.act.value=\'' . esc_attr($action) . '\';' . esc_html($function) . '"/>';
        } else {
            echo '<input class="button-link tnpc-button" type="submit" value="' . esc_attr($label) . '" onclick="this.form.act.value=\'' . esc_attr($action) . '\';return true;"/>';
        }
    }

    function button_save() {
        $this->btn('save', __('Save', 'newsletter'), ['icon' => 'fa-save']);
    }

    function button_link_save($url) {
        $this->btn_link($url, __('Save', 'newsletter'), ['icon' => 'fa-save']);
    }

    function button_reset($action = 'reset') {
        $this->btn($action, __('Reset', 'newsletter'), ['icon' => 'fa-reply', 'confirm' => true, 'secondary' => true]);
    }

    function button_copy($data = '') {
        $this->btn('copy', __('Duplicate', 'newsletter'), ['data' => $data, 'icon' => 'fa-copy', 'confirm' => true]);
    }

    function button_icon_copy($data = '') {
        $this->btn('copy', '', ['secondary' => true, 'data' => $data, 'icon' => 'fa-copy', 'confirm' => true, 'title' => __('Duplicate', 'newsletter')]);
    }

    /**
     * Creates a button with "delete" action.
     * @param type $data
     */
    function button_delete($data = '') {
        $this->btn('delete', __('Delete', 'newsletter'), ['data' => $data, 'icon' => 'fa-times', 'confirm' => true, 'delete' => true]);
    }

    function button_icon_delete($data = '', $attrs = []) {
        //if (isset($attrs['secondary'])) {
        //    $style = 'background-color: transparent; color: darkred !important;';
        //} else {
        $style = 'background-color: darkred; color: #ffffff';
        //}
        $this->btn('delete', '', ['data' => $data, 'icon' => 'fa-times', 'confirm' => true, 'title' => __('Delete', 'newsletter'), 'style' => $style]);
    }

    function button_icon_configure($url, $attrs = []) {
        $this->btn_link($url, '', array_merge(['icon' => 'fa-cog', 'title' => __('Configure', 'newsletter')], $attrs));
    }

    function button_icon_subscribers($url) {
        $this->btn_link($url, '', ['icon' => 'fa-users', 'title' => __('Subscribers', 'newsletter')]);
    }

    function button_statistics($url) {
        $this->btn_link($url, __('Statistics', 'newsletter'), ['icon' => 'fa-chart-bar']);
    }

    function button_icon_statistics($url, $attrs = []) {
        $this->btn_link($url, '', array_merge(['secondary' => true, 'icon' => 'fa-chart-bar', 'title' => __('Statistics', 'newsletter')], $attrs));
    }

    function button_icon_view($url) {
        $this->btn_link($url, '', ['secondary' => true, 'icon' => 'fa-eye', 'title' => __('View', 'newsletter'), 'target' => '_blank']);
    }

    function button_icon_newsletters($url) {
        $this->btn_link($url, '', ['icon' => 'fa-copy', 'title' => __('Newsletters', 'newsletter')]);
    }

    function button_icon_design($url) {
        $this->btn_link($url, '', ['icon' => 'fa-paint-brush', 'title' => __('Design', 'newsletter')]);
    }

    function button_icon_edit($url, $attrs = []) {
        $attrs = array_merge(['icon' => 'fa-edit', 'title' => __('Edit', 'newsletter')], $attrs);
        $this->btn_link($url, '', $attrs);
    }

    function button_icon_back($url) {
        $this->btn_link($url, '', ['secondary' => true, 'icon' => 'fa-chevron-left', 'title' => __('Back', 'newsletter')]);
    }

    function button_icon($action, $icon, $title = '', $data = '', $confirm = false) {
        $this->btn($action, '', ['data' => $data, 'icon' => $icon, 'title' => $title, 'confirm' => $confirm]);
    }

    function button_back($url) {
        $this->btn_link($url, __('Back', 'newsletter'), ['icon' => 'fa-chevron-left', 'tertiary' => true]);
    }

    function button_test($action = 'test') {
        $this->btn($action, __('Test', 'newsletter'), ['icon' => 'fa-vial']);
    }

    /**
     * @deprecated
     */
    function button_primary($action, $label, $function = null) {
        $action = sanitize_key($action);
        if ($function != null) {
            echo '<button class="button-primary" onclick="this.form.act.value=\'' . esc_attr($action) . '\';' . esc_attr($function) . '">', $label, '</button>';
        } else {
            echo '<button class="button-primary" onclick="this.form.act.value=\'' . esc_attr($action) . '\'; return true;"/>', $label, '</button>';
        }
    }

    function button_confirm($action, $label, $confirm = true, $data = '') {
        $this->btn($action, $label, ['data' => $data, 'confirm' => $confirm]);
    }

    function button_confirm_secondary($action, $label, $confirm = true, $data = '') {
        $this->btn($action, $label, ['data' => $data, 'confirm' => $confirm, 'secondary' => true]);
    }

    /**
     * @deprecated
     * @param string $url
     * @param string $label Not escaped.
     */
    function button_link($url, $label = '') {
        echo '<a href="', esc_attr($url), '" class="button-primary">', wp_kses_post($label), '</a>';
    }

    function echo_tag($tag, $attrs = []) {
        echo '<', sanitize_key($tag);
        foreach ($attrs as $k => $v) {
            echo ' ', sanitize_key($k), '="', esc_attr($v), '"';
        }
        echo '>';
    }

    function editor($name, $rows = 5, $cols = 75) {
        echo '<textarea class="visual" name="options[' . esc_attr($name) . ']" style="width: 100%" wrap="off" rows="' . esc_attr($rows) . '">';
        echo esc_html($this->get_value($name));
        echo '</textarea>';
    }

    function wp_editor($name, $settings = [], $attrs = []) {
        static $filter_added = false;

        if (!$filter_added) {
            $filter_added = true;
            add_filter('mce_buttons', function ($mce_buttons) {
                $mce_buttons[] = 'wp_add_media';
                //$mce_buttons[] = 'wp_code';
                return $mce_buttons;
            });
        }

        $settings = array_merge(['media_buttons' => false], $settings);

        $value = $this->get_value($name);
        if (empty($value) && isset($attrs['default'])) {
            $value = $attrs['default'];
        }

        $content_style = '';
        if (isset($attrs['body_background'])) {
            $content_style = 'body {background-color:' . wp_strip_all_tags($attrs['body_background']) . ';}';
        }
        add_filter('mce_buttons_2', [$this, '_wp_editor_options']);
        wp_editor($value, $name, array_merge(
                        [
                            'tinymce' => [
                                'content_css' => plugins_url('newsletter') . '/admin/css/wp-editor.css?ver=' . NEWSLETTER_VERSION,
                                'content_style' => $content_style,
                            ],
                            'textarea_name' => 'options[' . esc_attr($name) . ']',
                            'wpautop' => false,
                        ], $settings));
    }

    function _wp_editor_options($buttons) {
        static $applied = false;
        if ($applied) {
            return $buttons;
        }
        $applied = true;
        array_unshift($buttons, 'fontselect');
        array_unshift($buttons, 'fontsizeselect');
        return $buttons;
    }

    function wp_editor_multilanguage($name, $settings, $languages) {
        ?>

        <?php if ($languages) { ?>

            <div class = "tnp-tabs">
                <ul>
                    <li><a href = "#tabs-a">Default</a></li>
                    <?php foreach ($languages as $key => $value) {
                        ?>
                        <li><a href="#tabs-a-<?php echo esc_attr($key) ?>"><?php echo esc_html($value) ?></a></li>
                    <?php } ?>
                </ul>

                <div id="tabs-a">
                    <?php $this->wp_editor('confirmation_text'); ?>
                </div>
                <?php foreach ($languages as $key => $value) { ?>
                    <div id="tabs-a-<?php echo esc_attr($key) ?>">
                        <?php $this->wp_editor($key . '_confirmation_text', $settings); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <?php $this->wp_editor('confirmation_text', $settings); ?>
        <?php } ?>

        <?php
    }

    function textarea($name, $attrs = '100%', $height = '50') {
        $value = $this->get_value($name);
        if (is_array($value)) {
            $value = implode("\n", $value);
        }

        if (!is_array($attrs)) {
            echo '<textarea id="options-' . esc_attr($name) . '" class="dynamic" name="options[' . esc_attr($name) . ']" wrap="off" style="width:' . esc_attr($attrs) . ';height:' . esc_attr($height) . '">';
            echo esc_html($value);
            echo '</textarea>';
        } else {
            $attrs = array_merge(['width' => '100%', 'height' => '200px', 'placeholder' => ''], $attrs);
            echo '<textarea id="options-' . esc_attr($name) . '" name="options[' . esc_attr($name) . ']" wrap="off" placeholder="'
            . esc_attr($attrs['placeholder']) . '" style="width:' . esc_attr($attrs['width']) . ';height:' . esc_attr($attrs['height']) . '">';
            echo esc_html($value);
            echo '</textarea>';
        }
    }

    function textarea_fixed($name, $width = '100%', $height = '200') {
        $value = $this->get_value($name);
        echo '<textarea id="options-', esc_attr($name), '" name="options[', esc_attr($name), ']" wrap="off" style="width:', esc_attr($width), ';height:', esc_attr($height), 'px">';
        echo esc_html($value);
        echo '</textarea>';
    }

    function textarea_preview($name, $width = '100%', $height = '200', $header = '', $footer = '', $switch_button = true) {
        $value = $this->get_value($name);
        if ($switch_button) {
            echo '<input class="button-primary" type="button" onclick="newsletter_textarea_preview(\'options-', esc_attr($name), '\', \'\', \'\')" value="Switch editor/preview">';
            echo '<br><br>';
        }
        echo '<div style="box-sizing: border-box; position: relative; margin: 0; padding: 0; width:' . esc_attr($width) . '; height:' . esc_attr($height) . '">';
        echo '<textarea id="options-', esc_attr($name), '" name="options[', esc_attr($name), ']" wrap="off" style="width:' . esc_attr($width) . ';height:' . esc_attr($height) . 'px">';
        echo esc_html($value);
        echo '</textarea>';
        echo '<div id="options-', esc_attr($name), '-preview" style="box-sizing: border-box; background-color: #eee; border: 1px solid #bbb; padding: 15px; width: auto; position: absolute; top: 20px; left: 20px; box-shadow: 0 0 20px #777; z-index: 10000; display: none">';
        echo '<iframe id="options-', esc_attr($name), '-iframe" class="tnp-editor-preview-desktop"></iframe>';
        echo '<iframe id="options-', esc_attr($name), '-iframe-phone" class="tnp-editor-preview-mobile"></iframe>';
        echo '</div>';
        echo '</div>';
    }

    function email($prefix, $editor = null, $disable_option = false, $settings = array()) {
        if ($disable_option) {
            $this->disabled($prefix . '_disabled');
            echo '&nbsp;';
        }

        $this->text($prefix . '_subject', 70, 'Subject');
        echo '<br><br>';

        if ($editor == 'wordpress') {
            $this->wp_editor($prefix . '_message', $settings);
        } elseif ($editor == 'textarea') {
            $this->textarea($prefix . '_message');
        } else {
            $this->editor($prefix . '_message');
        }
    }

    /**
     * Standard checkbox, when not checked no value is transmitted (checkbox2).
     *
     * @param string $name
     * @param string $label
     */
    function checkbox($name, $label = '', $attrs = []) {
        if ($label != '') {
            echo '<label>';
        }
        echo '<input type="checkbox" id="options-' . esc_attr($name) . '" name="options[' . esc_attr($name) . ']" value="1"';
        if (!empty($this->data[$name])) {
            echo ' checked';
        }
        if (!empty($attrs['onchange'])) {
            echo ' onchange="', esc_attr($attrs['onchange']), '"';
        }

        if (!empty($attrs['disabled'])) {
            echo ' disabled';
        }

        echo '>';
        if ($label != '') {
            echo '&nbsp;' . esc_html($label) . '</label>';
        }
    }

    /**
     * Checkbox with a hidden field to transmit 1 or 0 even when the checkbox is not checked.
     *
     * @param string $name
     * @param string $label
     */
    function checkbox2($name, $label = '', $attrs = []) {
        if ($label != '') {
            echo '<label>';
        }
        echo '<input type="checkbox" id="options-' . esc_attr($name) . '" onchange="document.getElementById(\'' . esc_attr($name) . '_hidden\').value=this.checked?\'1\':\'0\';';
        if (!empty($attrs['onchange'])) {
            echo esc_attr($attrs['onchange']);
        }
        echo '"';
        if (!empty($this->data[$name])) {
            echo ' checked';
        }
        if (!empty($attrs['title'])) {
            echo ' title="', esc_attr($attrs['title']), '"';
        }
        echo '>';
        if ($label != '') {
            echo '&nbsp;' . esc_html($label) . '</label>';
        }
        echo '<input type="hidden" id="' . esc_attr($name) . '_hidden" name="options[' . esc_attr($name) . ']" value="';

        echo empty($this->data[$name]) ? '0' : '1';
        echo '">';
    }

    function radio($name, $value, $label = '') {
        if ($label != '') {
            echo '<label>';
        }
        echo '<input type="radio" id="' . esc_attr($name) . '" name="options[' . esc_attr($name) . ']" value="' . esc_attr($value) . '"';
        $v = $this->get_value($name);
        if ($v == $value) {
            echo ' checked';
        }
        echo '>';
        if ($label != '') {
            echo '&nbsp;' . esc_html($label) . '</label>';
        }
    }

    /**
     * Creates a checkbox named $name and checked if the internal data contains under
     * the key $name an array containig the passed value.
     */
    function checkbox_group($name, $value, $label = '', $attrs = []) {
        $attrs = wp_parse_args($attrs, ['label_escape' => true]);
        echo '<label><input type="checkbox" id="' . esc_attr($name) . '" name="options[' . esc_attr($name) . '][]" value="' . esc_attr($value) . '"';
        // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
        if (isset($this->data[$name]) && is_array($this->data[$name]) && array_search($value, $this->data[$name]) !== false) {
            echo ' checked';
        }
        echo '>';
        if (!empty($label)) {
            echo wp_kses_post($label);
        }
        echo '</label>';
    }

    function checkboxes($name, $options) {
        echo '<input type="hidden" name="tnp_fields[' . esc_attr($name) . ']" value="array">';
        echo '<div class="tnpc-checkboxes">';
        foreach ($options as $value => $label) {
            $this->checkbox_group($name, $value, $label);
        }
        echo '<div style="clear: both"></div>';
        echo '</div>';
    }

    function color($name, $default = '') {
        $value = $this->get_value($name, $default);
        echo '<input class="tnpc-color" id="options-', esc_attr($name), '" name="options[', esc_attr($name), ']" type="text" value="', esc_attr($value), '">';
    }

    /** Creates a set of checkbox named $name_[category id] (so they are posted with distinct names).
     */
    function categories($name = 'category') {
        $categories = get_categories();
        echo '<div class="tnpc-checkboxes">';
        foreach ($categories as $c) {
            $this->checkbox($name . '_' . $c->cat_ID, esc_html($c->cat_name));
        }
        echo '<div style="clear: both"></div>';
    }

    /**
     * Creates a set of checkbox to activate the profile preferences. Every checkbox has a DIV around to
     * be formatted.
     */
    function categories_group($name, $show_mode = false) {
        $categories = get_categories();
        if ($show_mode) {
            $this->select($name . '_mode', array('include' => 'To be included', 'exclude' => 'To be excluded'));
        }
        echo '<div class="tnpc-checkboxes">';
        foreach ($categories as &$c) {
            $this->checkbox_group($name, $c->cat_ID, esc_html($c->cat_name));
        }
        echo '<div style="clear: both"></div>';
        echo '</div>';
    }

    /**
     * Creates a set of checkboxes named $name_[preference number] (so they are
     * distinct fields).
     * Empty preferences are skipped.
     */
    function preferences($name = 'preferences') {
        $lists = NewsletterAdmin::instance()->get_lists();

        echo '<div class="tnpc-checkboxes">';
        foreach ($lists as $list) {
            $this->checkbox2($name . '_' . $list->id, esc_html($list->name));
        }
        echo '<div style="clear: both"></div>';
    }

    /** A list of all lists defined each one with a checkbox to select it. An array
     * of ID of all checked lists is submitted.
     *
     * @param string $name
     */
    function lists($name = 'lists') {
        echo '<input type="hidden" name="tnp_fields[' . esc_attr($name) . ']" value="array">';
        $this->preferences_group($name);
    }

    function lists_public($name = 'lists') {
        echo '<input type="hidden" name="tnp_fields[' . esc_attr($name) . ']" value="array">';
        $lists = NewsletterAdmin::instance()->get_lists_public();

        echo '<div class="tnpc-lists">';
        foreach ($lists as $list) {
            $this->checkbox_group($name, $list->id, '<span>' . $list->id . '</span> ' . esc_html($list->name));
        }
        echo '</div>';
    }

    function profiles_public($name = 'profiles') {
        echo '<input type="hidden" name="tnp_fields[' . esc_attr($name) . ']" value="array">';
        $fields = NewsletterAdmin::instance()->get_profiles_public();

        echo '<div class="tnpc-lists">';
        foreach ($fields as $field) {
            $this->checkbox_group($name, $field->id, '<span>' . $field->id . '</span> ' . esc_html($field->name));
        }

        echo '</div>';
    }

    function customfields_public($name = 'customfields') {
        echo '<input type="hidden" name="tnp_fields[' . esc_attr($name) . ']" value="array">';
        $fields = NewsletterAdmin::instance()->get_profiles_public();

        echo '<div class="tnpc-lists">';
        foreach ($fields as $field) {
            $this->checkbox_group($name, $field->id, '<span>' . $field->id . '</span> ' . esc_html($field->name));
        }

        echo '</div>';
    }

    function autoresponders($name = 'autoresponders') {
        if (!class_exists('NewsletterAutoresponder')) {
            echo 'The Autoresponder addon is required.';
            return;
        }

        $autoresponders = NewsletterAutoresponder::instance()->get_autoresponders();

        foreach ($autoresponders as $autoresponder) {
            $this->checkbox_group($name, $autoresponder->id, $autoresponder->name);
            echo '<br>';
        }
    }

    /**
     * Shows all the autoresponders giving the choice to activate, deactivate or left
     * unchanged. The generated value is an associative array where the key is the autoresponder
     * ID and the value is 'on', 'off', or ''.
     *
     * @param string $name
     */
    function autoresponders_on_off($name = 'autoresponders') {
        if (!class_exists('NewsletterAutoresponder')) {
            echo 'The Autoresponder addon is required.';
            return;
        }

        $autoresponders = NewsletterAutoresponder::instance()->get_autoresponders();

        echo '<table class="widefat" style="width: auto">';
        echo '<thead><tr>';
        echo '<th>Series</th><th>&nbsp;</th>';

        echo '</tr></thead>';

        foreach ($autoresponders as $autoresponder) {
            echo '<tr><td>';
            echo esc_html($autoresponder->name);
            echo '</td><td>';

            echo '<select name="options[', esc_attr($name), '][]"';
            echo '>';

            echo '<option value="">', esc_html__('Ignore', 'newsletter'), '</option>';

            $values = $this->get_value_array($name);

            // Positive ID
            echo '<option value="', esc_attr($autoresponder->id), '"';
            if (in_array('' . $autoresponder->id, $values)) {
                echo ' selected';
            }
            echo '>', esc_html__('Activate', 'newsletter'), '</option>';

            // Negative ID
            echo '<option value="-', esc_attr($autoresponder->id), '"';
            if (in_array('-' . $autoresponder->id, $values)) {
                echo ' selected';
            }
            echo '>', esc_html__('Deactivate', 'newsletter'), '</option>';

            echo '</select>';

            echo '</tr></td>';
        }

        echo '</table>';
    }

    function lists_checkboxes($name = 'lists') {
        $this->preferences_group($name);
    }

    /**
     * Creates a set of checkboxes all names $name[] and the preference number as value
     * so the selected checkboxes are retrieved as an array of values ($REQUEST[$name]
     * will be an array if at east one preference is checked).
     */
    function preferences_group($name = 'preferences') {

        $lists = NewsletterAdmin::instance()->get_lists();

        echo '<div class="tnpc-lists">';
        foreach ($lists as $list) {
            $this->checkbox_group($name, $list->id, '<span>' . $list->id . '</span> ' . esc_html($list->name));
        }
        echo '<a href="https://www.thenewsletterplugin.com/documentation/newsletter-lists" target="_blank">'
        . 'Click here to read more about lists.'
        . '</a>';
        echo '</div>';
    }

    /** Creates as many selects as the active preferences with the three values
     * 'any', 'yes', 'no' corresponding to the values 0, 1, 2.
     */
    function preferences_selects($name = 'preferences', $skip_empty = false) {
        // Someone is using this method improperly
        if (!class_exists('NewsletterAdmin')) {
            return '';
        }

        $lists = NewsletterAdmin::instance()->get_lists();

        echo '<div class="newsletter-preferences-group">';
        foreach ($lists as $list) {

            echo '<div class="newsletter-preferences-item">';

            $this->select($name . '_' . $list->id, array(0 => 'Any', 1 => 'Yes', 2 => 'No'));
            echo '(' . esc_html($list->id) . ') ' . esc_html($list->name);

            echo '</div>';
        }
        echo '<div style="clear: both"></div>';
        echo '<a href="https://www.thenewsletterplugin.com/plugins/newsletter/newsletter-preferences" target="_blank">Click here know more about preferences.</a> They can be configured on Subscription/Form field panel.';
        echo '</div>';
    }

    /**
     * Creates a single select with the active preferences.
     */
    function preferences_select($name = 'preference', $empty_label = null) {
        $lists = $this->get_list_options($empty_label);
        $this->select($name, $lists);
        echo ' <a href="admin.php?page=newsletter_subscription_lists" target="_blank"><i class="fas fa-edit"></i></a>';
    }

    function lists_select($name = 'list', $empty_label = null) {
        $lists = $this->get_list_options($empty_label);
        $this->select($name, $lists);
    }

    function lists_select_with_notes($name = 'list', $empty_label = null) {

        $value = $this->get_value($name);

        $lists = NewsletterAdmin::instance()->get_lists();
        $options = [];
        if ($empty_label) {
            $options[''] = $empty_label;
        }

        foreach ($lists as $list) {
            $options['' . $list->id] = '(' . $list->id . ') ' . $list->name;
        }

        $this->select($name, $options, null, ['onchange' => 'tnp_lists_toggle(this); return true;']);
        echo '<div id="options-', esc_attr($name), '-notes" class="tnpc_lists_notes">';
        foreach ($lists as $list) {
            $id = $list->id;
            $notes = apply_filters('newsletter_lists_notes', [], $id);

            echo '<div class="list_', esc_attr($id), '" style="display: ', ($value == $id ? 'block' : 'none'), '">';
            if ($list->forced) {
                echo 'Enforced on subscription<br>';
            }
            echo wp_kses_post(implode('<br>', $notes));
            echo '</div>';
        }
        echo '</div>';
    }

    function public_lists_select($name = 'list', $empty_label = null) {
        $lists = $this->get_public_list_options($empty_label);
        $this->select($name, $lists);
    }

    /**
     * Generates an associative array with the active lists to be used in a select.
     * @param string $empty_label
     * @return array
     */
    function get_list_options($empty_label = null) {
        $objs = NewsletterAdmin::instance()->get_lists();
        $lists = array();
        if ($empty_label) {
            $lists[''] = $empty_label;
        }
        foreach ($objs as $list) {
            $lists['' . $list->id] = '(' . $list->id . ') ' . esc_html($list->name);
        }
        return $lists;
    }

    function get_public_list_options($empty_label = null) {
        $objs = NewsletterAdmin::instance()->get_lists_public();
        $lists = array();
        if ($empty_label) {
            $lists[''] = $empty_label;
        }
        foreach ($objs as $list) {
            $lists['' . $list->id] = '(' . $list->id . ') ' . esc_html($list->name);
        }
        return $lists;
    }

    function date($name) {
        $this->hidden($name);
        // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
        $year = date('Y', $this->data[$name]);
        // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
        $day = date('j', $this->data[$name]);
        // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
        $month = date('m', $this->data[$name]);
        $onchange = "this.form.elements['options[" . esc_attr($name) . "]'].value = new Date(document.getElementById('" . esc_attr($name) . "_year').value, document.getElementById('" . esc_attr($name) . "_month').value, document.getElementById('" . esc_attr($name) . "_day').value, 12, 0, 0).getTime()/1000";
        echo '<select id="', esc_attr($name), '_month" onchange="', esc_attr($onchange), '">';
        for ($i = 0; $i < 12; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($month - 1 == $i) {
                echo ' selected';
            }
            // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
            echo '>', esc_html(date('F', mktime(0, 0, 0, $i + 1, 1, 2000))), '</option>';
        }
        echo '</select>';

        echo '<select id="', esc_attr($name), '_day" onchange="', esc_attr($onchange), '">';
        for ($i = 1; $i <= 31; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($day == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, '</option>';
        }
        echo '</select>';

        echo '<select id="', esc_attr($name), '_year" onchange="', esc_attr($onchange), '">';
        // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
        for ($i = 2011; $i <= date('Y') + 3; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($year == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, '</option>';
        }
        echo '</select>';
    }

    /**
     * Creates a set of fields to collect a date and sends back the triplet year, month and day.
     *
     * @param string $name
     */
    function date2($name) {
        $year = $this->get_value($name . '_year');
        $day = $this->get_value($name . '_day');
        $month = $this->get_value($name . '_month');

        echo '<select name="options[', esc_attr($name), '_month]">';
        echo '<option value="">-</option>';
        for ($i = 1; $i <= 12; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($month == $i) {
                echo ' selected';
            }
            echo '>', esc_html(date_i18n('F', mktime(0, 0, 0, $i, 1, 2000))), '</option>';
        }
        echo '</select>';

        echo '<select name="options[', esc_attr($name), '_day]">';
        echo '<option value="">-</option>';
        for ($i = 1; $i <= 31; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($day == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, '</option>';
        }
        echo '</select>';

        echo '<select name="options[', esc_attr($name), '_year]">';
        echo '<option value="">-</option>';
        // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
        for ($i = 2011; $i <= date('Y') + 3; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($year == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, '</option>';
        }
        echo '</select>';
    }

    /**
     * Date and time (hour) selector. Timestamp stored.
     */
    function datetime($name) {
        echo '<input type="hidden" name="tnp_fields[', esc_attr($name), ']" value="datetime">';
        $value = (int) $this->get_value($name);
        if (empty($value)) {
            $value = time();
        }

        $time = $value + get_option('gmt_offset') * 3600;
        $year = gmdate('Y', $time);
        $day = gmdate('j', $time);
        $month = gmdate('m', $time);
        $hour = gmdate('H', $time);

        echo '<select name="', esc_attr($name), '_month">';
        for ($i = 1; $i <= 12; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($month == $i) {
                echo ' selected';
            }
            // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
            echo '>', esc_html(date('F', mktime(0, 0, 0, $i, 1, 2000))), '</option>';
        }
        echo '</select>';

        echo '<select name="', esc_attr($name), '_day">';
        for ($i = 1; $i <= 31; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($day == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, '</option>';
        }
        echo '</select>';

        // phpcs:ignore WordPress.DateTime.RestrictedFunctions.date_date
        $last_year = date('Y') + 2;
        echo '<select name="', esc_attr($name), '_year">';
        for ($i = 2011; $i <= $last_year; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($year == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, '</option>';
        }
        echo '</select>';

        echo '<select name="', esc_attr($name), '_hour">';
        for ($i = 0; $i <= 23; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($hour == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, ':00</option>';
        }
        echo '</select>';
    }

    function hours($name) {
        $hours = [];
        for ($i = 0; $i < 24; $i++) {
            $hours['' . $i] = sprintf('%02d', $i) . ':00';
        }
        $this->select($name, $hours);
    }

    function days($name) {
        $days = array(0 => 'Every day', 1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday', 7 => 'Sunday');
        $this->select($name, $days);
    }

    function init($options = []) {

        $nested = $options['nested'] ?? false;

        if (isset($options['cookie_name'])) {
            $cookie_name = $options['cookie_name'];
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        } elseif (isset($_GET['page'])) {
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended
            $cookie_name = $_GET['page'];
        } else {
            $cookie_name = 'newsletter_tab';
        }

        $tab = $_GET['tab'] ?? $_COOKIE[$cookie_name] ?? '';

        $config = [];
        $config['nested'] = $nested;
        $config['tab'] = $tab;
        $config['tab_name'] = $cookie_name;

        echo '<script>' . PHP_EOL;
        echo 'jQuery(document).ready(function(){' . PHP_EOL;
        echo 'tnp_controls_init(' . wp_json_encode($config), ');' . PHP_EOL;
        echo '});' . PHP_EOL;
        echo '</script>' . PHP_EOL;

        if (!$nested) {
            echo '<input name="act" type="hidden" value=""/>' . PHP_EOL;
            ;
            echo '<input name="btn" type="hidden" value=""/>' . PHP_EOL;
            ;
            wp_nonce_field('save');
        }

        // Required on nested "controls" since the submit is limited to the specific group of fields when
        // used on composer block options.
    }

    function log_level($name = 'log_level') {
        $this->select($name, [0 => 'None', 2 => 'Error', 3 => 'Normal', 4 => 'Debug']);
    }

    function update_option($name, $data = null) {
        if ($data == null) {
            $data = $this->data;
        }
        update_option($name, $data);
        if (isset($data['log_level'])) {
            update_option($name . '_log_level', $data['log_level']);
        }
    }

    function js_redirect($url) {
        echo '<script>';
        echo 'location.href="', $url, '"'; // Do not use esc_js() it doesn't work with "&" here
        echo '</script>';
        die();
    }

    /**
     * @deprecated
     */
    function get_test_subscribers() {
        return NewsletterAdmin::instance()->get_test_users();
    }

    /**
     * Attributes:
     * weight: [true|false]
     * color: [true|false]
     *
     * @param string $name
     * @param array $attrs
     */
    function css_font($name = 'font', $attrs = array()) {
        $default = [
            'color' => true,
            'weight' => true,
            'hide_size' => false,
            'hide_weight' => false,
            'hide_color' => false,
        ];
        $attrs = array_merge($default, $attrs);
        $this->css_font_family($name . '_family', !empty($attrs['family_default']));
        if (!$attrs['hide_size']) {
            $this->css_font_size($name . '_size', !empty($attrs['size_default']));
        }
        if ($attrs['weight'] && !$attrs['hide_weight']) {
            $this->css_font_weight($name . '_weight', !empty($attrs['weight_default']));
        }
        if ($attrs['color'] && !$attrs['hide_color']) {
            $this->color($name . '_color');
        }
    }

    function css_font_size($name = 'font_size', $show_empty_option = false) {
        $value = $this->get_value($name);

        echo '<select class="tnpf-font-size" id="options-', esc_attr($name), '" name="options[', esc_attr($name), ']">';
        if ($show_empty_option) {
            echo "<option value=''>-</option>";
        }
        for ($i = 8; $i <= 100; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($value == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, '</option>';
        }
        echo '</select>';
    }

    function css_font_weight($name = 'font_weight', $show_empty_option = false) {
        $value = $this->get_value($name);

        $fonts = array('normal' => 'Normal', 'bold' => 'Bold');

        echo '<select class="tnpf-font-weight" id="options-' . esc_attr($name) . '" name="options[' . esc_attr($name) . ']">';
        if ($show_empty_option) {
            echo "<option value=''>-</option>";
        }
        foreach ($fonts as $key => $font) {
            echo '<option value="', esc_attr($key), '"';
            if ($value == $key) {
                echo ' selected';
            }
            echo '>', esc_html($font), '</option>';
        }
        echo '</select>';
    }

    function css_font_family($name = 'font_family', $show_empty_option = false) {
        $value = $this->get_value($name);

        $fonts = [];
        if ($show_empty_option) {
            $fonts[''] = 'Default';
        }

        $fonts = [
            'Helvetica, Arial, sans-serif' => 'Helvetica, Arial',
            'Arial Black, Gadget, sans-serif' => 'Arial Black, Gadget',
            'Garamond, serif' => 'Garamond',
            'Courier, monospace' => 'Courier',
            'Comic Sans MS, cursive' => 'Comic Sans MS',
            'Impact, Charcoal, sans-serif' => 'Impact, Charcoal',
            'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva',
            'Times New Roman, Times, serif' => 'Times New Roman',
            'Verdana, Geneva, sans-serif' => 'Verdana, Geneva',
            'Lucida Sans Unicode, sans-serif' => 'Lucida Sans Unicode'];

        $unsafe_fonts = [
            'Palatino Linotype, serif' => 'Palatino Linotype',
            'Calibri, sans-serif' => 'Calibri',
            'Arial Narrow, sans-serif' => 'Arial Narrow',
            'Book Antiqua, serif' => 'Book Antiqua',
            'Century Gothic, sans-serif' => 'Century Gothic',
        ];

        echo '<select class="tnpf-font-family" id="options-', esc_attr($name), '" name="options[', esc_attr($name), ']">';

        if ($show_empty_option) {
            echo '<option value="">', esc_html('Default', 'newsletter');
        }

        echo '<optgroup label="', esc_attr__('Email safe fonts', 'newsletter'), '">';
        foreach ($fonts as $font => $label) {

            echo '<option value="', esc_attr($font), '" style="font-family: ', esc_attr($font), '"';
            if ($value == $font) {
                echo ' selected';
            }
            echo '>', esc_html($label), '</option>';
        }
        echo '</optgroup>';

        echo '<optgroup label="', esc_attr__('Less email safe fonts', 'newsletter'), '">';
        foreach ($unsafe_fonts as $font => $label) {

            echo '<option value="', esc_attr($font), '" style="font-family: ', esc_attr($font), '"';
            if ($value == $font) {
                echo ' selected';
            }
            echo '>', esc_html($label), '</option>';
        }
        echo '</optgroup>';

        echo '</select>';
    }

    function css_text_align($name) {
        $options = array('left' => __('Left', 'newsletter'), 'right' => __('Right', 'newsletter'),
            'center' => __('Center', 'newsletter'));
        $this->select($name, $options);
    }

    function css_border($name) {
        $value = $this->get_value($name . '_width');

        echo 'width&nbsp;<select id="options-' . esc_attr($name) . '-width" name="options[' . esc_attr($name) . '_width]">';
        for ($i = 0; $i < 10; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($value == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, '</option>';
        }
        echo '</select>&nbsp;px&nbsp;&nbsp;';

        $this->select($name . '_type', array('solid' => 'Solid', 'dashed' => 'Dashed'));

        $this->color($name . '_color');

        $value = $this->get_value($name . '_radius');

        echo '&nbsp;&nbsp;radius&nbsp;<select id="options-' . esc_attr($name) . '-radius" name="options[' . esc_attr($name) . '_radius]">';
        for ($i = 0; $i < 10; $i++) {
            echo '<option value="', (int) $i, '"';
            if ($value == $i) {
                echo ' selected';
            }
            echo '>', (int) $i, '</option>';
        }
        echo '</select>&nbsp;px';
    }

    /**
     * Media selector using the media library of WP. Produces a field which values is an array containing 'id' and 'url'.
     *
     * @param string $name
     */
    function media($name) {
        if (isset($this->data[$name]['id'])) {
            $media_id = (int) $this->data[$name]['id'];
            $media = wp_get_attachment_image_src($media_id, 'medium');
            $media_full = wp_get_attachment_image_src($media_id, 'full');
        } else {
            $media = false;
        }
        echo '<div class="tnpc-media">';
        echo '<a class="tnpc-media-remove" href="#" onclick="newsletter_media_remove(\'' . esc_attr($name) . '\'); return false;">&times;</a>';
        echo '<div class="tnpc-media-img">';
        if ($media === false) {
            $media = array('', '', '');
            $media_full = array('', '', '');
            $media_id = 0;
            echo '<img style="max-width: 200px; max-height: 150px; width: 100px;" id="' . esc_attr($name) . '_img" src="' . esc_attr(plugins_url('newsletter')) . '/admin/images/nomedia.png" onclick="newsletter_media(\'' . esc_attr($name) . '\')">';
        } else {
            echo '<img style="max-width: 200px; max-height: 150px;" id="' . esc_attr($name) . '_img" src="' . esc_attr($media[0]) . '" onclick="newsletter_media(\'' . esc_attr($name) . '\')">';
        }
        echo '</div>';

        echo '</div>';
        echo '<input type="hidden" id="' . esc_attr($name) . '_id" name="options[' . esc_attr($name) . '][id]" value="' . esc_attr($media_id) . '" size="5">';
        echo '<input type="hidden" id="' . esc_attr($name) . '_url" name="options[' . esc_attr($name) . '][url]" value="' . esc_attr($media_full[0]) . '" size="50">';
    }

    function media_input($option, $name, $label) {

        if (!empty($label)) {
            echo '<label class="select" for="tnp_' . esc_attr($name) . '">' . esc_html($label) . ':</label>';
        }
        echo '<input id="tnp_' . esc_attr($name) . '" type="text" size="36" name="' . esc_attr($option) . '[' . esc_attr($name) . ']" value="' . esc_attr($val) . '" />';
        echo '<input id="tnp_' . esc_attr($name) . '_button" class="button-primary" type="button" value="Select Image" />';
        echo '<br class="clear"/>';
    }

    function language($name = 'language', $empty_label = 'All') {
        if (!$this->is_multilanguage()) {
            echo esc_html__('Install a multilanguage plugin.', 'newsletter');
            echo ' <a href="https://www.thenewsletterplugin.com/documentation/multilanguage" target="_blank">', esc_html__('Read more', 'newsletter'), '</a>';
            return;
        }

        $languages = NewsletterAdmin::instance()->get_languages();
        if (!empty($empty_label)) {
            $languages = array_merge(array('' => $empty_label), $languages);
        }
        $this->select($name, $languages);
    }

    function is_multilanguage() {
        return NewsletterAdmin::instance()->is_multilanguage();
    }

    /**
     * Creates a checkbox group with all active languages. Each checkbox is named
     * $name[] and values with the relative language code.
     *
     * @param string $name
     */
    function languages($name = 'languages', $attrs = []) {
        if (!$this->is_multilanguage()) {
            echo esc_html__('Install WPML or Polylang for multilanguage support', 'newsletter');
            return;
        }

        $language_options = NewsletterAdmin::instance()->get_languages();

        if (empty($language_options)) {
            echo esc_html__('Your multilanguage plugin is not supported or there are no languages defined', 'newsletter');
            return;
        }

        $this->checkboxes_group($name, $language_options, $attrs);
    }

    /**
     * Prints a formatted date using the formats and timezone of WP, including the current date and time and the
     * time left to the passed time.
     *
     * @param int $time
     * @param int $now
     * @param bool $left
     * @return string
     */
    static function print_date($time = null, $now = false, $left = false) {
        if (is_null($time)) {
            $time = time();
        }
        if ($time == false) {
            $buffer = 'none';
        } else {
            $buffer = date_i18n(get_option('date_format') . ' ' . get_option('time_format'), $time + get_option('gmt_offset') * 3600);

            if ($now) {
                $buffer .= ' (now: ' . gmdate(get_option('date_format') . ' ' .
                                get_option('time_format'), time() + get_option('gmt_offset') * 3600);
                $buffer .= ')';
            }
            if ($left) {
                if ($time - time() < 0) {
                    $buffer .= ', ' . (time() - $time) . ' seconds late';
                } else {
                    $buffer .= ', ' . gmdate('H:i:s', $time - time()) . ' left';
                }
            }
        }
        return $buffer;
    }

    static function echo_date($time = null, $now = false, $left = false) {
        echo esc_html(self::print_date($time, $now, $left));
    }

    static function delta_time($delta = 0) {
        $seconds = $delta % 60;
        $minutes = (int) ($delta / 60) % 60;
        $hours = (int) ($delta / 3600) % 24;
        $days = floor($delta / 86400);

        return $days . ' day(s), ' . $hours . ' hour(s), ' . $minutes . ' minute(s)';
    }

    /**
     * Prints the help button near a form field. The label is used as icon title.
     *
     * @param string $url
     * @param string $label
     */
    static function help($url, $label = '') {
        echo '<a href="', esc_attr($url), '" target="_blank" title="', esc_attr($label), '"><i class="fas fa-question-circle"></i></a>';
    }

    static function idea($url, $label = '') {
        echo '<a href="', esc_attr($url), '" target="_blank" title="', esc_attr($label), '"><i class="fas fa-lightbulb-o"></i></a>';
    }

    static function field_help($url, $text = '') {
        if (strpos($url, 'http') !== 0) {
            $url = 'https://www.thenewsletterplugin.com/documentation' . $url;
        }
        echo '<a href="', esc_attr($url), '" class="tnpc-field-help" target="_blank" style="text-decoration: none" title="' . esc_attr(__('Read more', 'newsletter')) . '"><i class="fas fa-question-circle"></i>';
        if ($text) {
            echo '&nbsp;', wp_kses_post($text);
        }
        echo '</a>';
    }

    static function field_label($label, $help_url = false) {
        echo esc_html($label);
        if ($help_url) {
            echo '&nbsp';
            self::field_help($help_url);
        }
    }

    /**
     * Prints a panel link to the documentation.
     *
     * @param type $url
     * @param type $text
     */
    static function panel_help($url, $text = '') {
        if (substr($url, 0, 4) !== 'http') {
            $url = 'https://www.thenewsletterplugin.com/documentation' . $url;
        }
        if (empty($text)) {
            $text = __('Need help?', 'newsletter');
        }
        echo '<p class="tnp-panel-help"><a href="', esc_attr($url), '" target="_blank">', wp_kses_post($text), '</a></p>';
    }

    /**
     * Prints an administration page link to the documentation (just under the administration page title.
     * @param type $url
     * @param type $text
     */
    static function page_help($url, $text = '') {
        if (empty($text)) {
            $text = __('Need help?', 'newsletter');
        }
        echo '<div class="tnp-page-help"><a href="', esc_attr($url), '" target="_blank">', wp_kses_post($text), '</a></div>';
    }

    static function title_help($url, $text = '') {
        if (substr($url, 0, 4) !== 'http') {
            $url = 'https://www.thenewsletterplugin.com/documentation' . $url;
        }
        if (empty($text)) {
            $text = __('Get help', 'newsletter');
        }
        echo '<a class="tnp-title-help" href="', esc_attr($url), '" target="_blank">', wp_kses_post($text), '</a>';
    }

    static function label($text, $url = '') {
        if ($url) {
            if (substr($url, 0, 4) !== 'http') {
                $url = 'https://www.thenewsletterplugin.com/documentation' . $url;
            }
            echo wp_kses_post($text);
            self::field_help($url);
        } else {
            echo wp_kses_post($text);
        }
    }

    static function print_truncated($text, $size = 50) {
        if (mb_strlen($text) < $size)
            return esc_html($text);
        $sub = mb_substr($text, 0, $size);
        echo '<span title="', esc_attr($text), '">', esc_html($sub), '...</span>';
    }

    function block_background($name = 'block_background') {
        $this->color($name);
    }

    function block_padding($name = 'block_padding', $options = array()) {
        echo '<div style="text-align: center; width: 250px;">';
        $this->text($name . '_top', 5);
        echo '<br>';
        $this->text($name . '_left', 5);
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        $this->text($name . '_right', 5);
        echo '<br>';
        $this->text($name . '_bottom', 5);
        echo '</div>';
    }

    function composer_fields_v2($name = 'message') {

        // The composer, on saving, fills in those fields
        $this->hidden('subject');
        $this->hidden('message');
        $this->hidden('options_preheader');
        $this->hidden('updated');
        echo '<input type="hidden" name="tnp_fields[message]" value="encoded">';

        //$preheader_value = $this->get_value('options_preheader');
        //    echo '<input name="options[preheader]" id="options-preheader" type="hidden" value="', esc_attr($preheader_value), '">';
    }

    function composer_load_v2($show_subject = false, $show_test = true, $context_type = '') {

        global $tnpc_show_subject;
        $tnpc_show_subject = $show_subject;

        // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedStylesheet
        echo "<link href='", esc_attr(plugins_url('newsletter')), "/emails/tnp-composer/_css/newsletter-builder-v2.css?ver=", rawurlencode(NEWSLETTER_VERSION), "' rel='stylesheet' type='text/css'>";

        $controls = $this;
        include NEWSLETTER_DIR . '/emails/tnp-composer/index-v2.php';
    }

    function subject($name) {
        $value = $this->get_value($name);
        // Leave the ID with this prefix!
        echo '<div style="position: relative"><input size="80" id="options-subject-', esc_attr($name), '" name="options[' . esc_attr($name) . ']" type="text" placeholder="" value="';
        echo esc_attr($value);
        echo '">';
        echo '&nbsp;<a href="#subject-ideas-modal" rel="modal:open"><i class="far fa-lightbulb tnp-suggest-subject"></i></a>';
        do_action('newsletter_composer_subject');

        echo '<img src="', esc_attr(plugins_url('newsletter')), '/admin/images/subject/android.png" style="position: absolute; width: 16px; left: 330px; top: 25px; display: block; opacity: 0">';
        echo '<img src="', esc_attr(plugins_url('newsletter')), '/admin/images/subject/iphone.png" style="position: absolute; width: 16px; left: 380px; top: 25px; display: block; opacity: 0">';
        echo '</div>';
    }

    function composer_v3($show_subject = false, $show_test = true, $context_type = '') {

        // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedStylesheet
        echo "<link href='", esc_attr(plugins_url('newsletter')), "/composer/css/composer.css?ver=", rawurlencode(NEWSLETTER_VERSION), "' rel='stylesheet' type='text/css'>";

        include NEWSLETTER_DIR . '/composer/index.php';
    }

    function subject_v3($name = 'subject') {
        $value = $this->get_value($name);
        echo '<div style="position: relative"><input size="80" id="options-', esc_attr($name), '" name="options[' . esc_attr($name) . ']" type="text" placeholder="" value="';
        echo esc_attr($value);
        echo '">';
        echo '<img src="', esc_attr(plugins_url('newsletter')), '/admin/images/subject/android.png" style="position: absolute; width: 16px; left: 330px; top: 25px; display: block; opacity: 0">';
        echo '<img src="', esc_attr(plugins_url('newsletter')), '/admin/images/subject/iphone.png" style="position: absolute; width: 16px; left: 380px; top: 25px; display: block; opacity: 0">';
        echo '</div>';
    }

    function lists_on_off($name) {
        $lists = $this->get_list_options();
        esc_html_e('Lists to activate', 'newsletter');
        echo '<br>';
        $this->select2($name . '_on', $lists, null, true, null, __('None', 'newsletter'));
        echo '<br><br>';
        esc_html_e('Lists to deactivate', 'newsletter');
        echo '<br>';
        $this->select2($name . '_off', $lists, null, true, null, __('None', 'newsletter'));
    }

    function lists_on($name) {
        $lists = $this->get_list_options();
        $this->select2($name . '_on', $lists, null, true, null, __('None', 'newsletter'));
    }

    function lists_off($name) {
        $lists = $this->get_list_options();
        $this->select2($name . '_off', $lists, null, true, null, __('None', 'newsletter'));
    }

    function autoresponder($name = 'autoresponder') {
        if (!class_exists('NewsletterAutoresponder')) {
            echo 'Autoresponder Addon required';
            return;
        }

        $autoresponders = NewsletterAutoresponder::$instance->get_autoresponders();
        $options = ['' => 'None'];
        foreach ($autoresponders as $autoresponder) {
            if (!empty($autoresponder->list)) {
                continue;
            }
            $options[$autoresponder->id] = $autoresponder->name . ' (#' . $autoresponder->id . ')';
        }
        $this->select($name, $options);
    }

    function logs($source, $attrs = []) {
        include __DIR__ . '/controls-logs.php';
    }
}
