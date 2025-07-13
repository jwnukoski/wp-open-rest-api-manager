<?php
// ...existing code...

// Wrap the call to wp_get_current_user() inside the 'init' action hook
add_action('init', function() {
    $current_user = wp_get_current_user() ?? null;
    $request = new WP_REST_Request( 'GET', '/wp/v2/posts' , [$current_user]);
    $response = rest_do_request( $request );
    var_dump($response);
});

// Add settings page to admin menu
add_action('admin_menu', function() {
    add_options_page(
        'Open REST API Manager Settings',
        'Open REST API Manager',
        'manage_options',
        'open-rest-api-manager',
        'open_rest_api_manager_settings_page'
    );
});

// Register settings
add_action('admin_init', function() {
    register_setting('open_rest_api_manager_settings', 'orama_enable_feature');
    add_settings_section(
        'orama_main_section',
        'Main Settings',
        function() {}, // Provide an empty callback
        'open-rest-api-manager'
    );
    add_settings_field(
        'orama_enable_feature',
        'Enable Feature',
        function() {
            $value = get_option('orama_enable_feature', false);
            echo '<input type="checkbox" name="orama_enable_feature" value="1"' . checked(1, $value, false) . ' />';
        },
        'open-rest-api-manager',
        'orama_main_section'
    );
});

// Settings page HTML
function open_rest_api_manager_settings_page() {
    ?>
    <div class="wrap">
        <h1>Open REST API Manager Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('open_rest_api_manager_settings');
            do_settings_sections('open-rest-api-manager');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
// ...existing code...