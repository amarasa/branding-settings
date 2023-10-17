<?php

/**
 * Plugin Name: Branding Settings
 * Description: A plugin to manage branding settings.
 * Version: 1.0
 * Author: Angelo
 */

// Include the shortcode file
include(plugin_dir_path(__FILE__) . 'shortcode.php');

// Hook to add admin menu
add_action('admin_menu', 'branding_settings_menu');

// Action function to add admin menu and settings page
function branding_settings_menu()
{
    add_menu_page(
        'Branding Settings',
        'Branding Settings',
        'manage_options',
        'branding_settings',
        'branding_settings_page'
    );
}

// Function to display the settings page content
function branding_settings_page()
{
?>
    <div class="wrap">
        <h2>Branding Settings</h2>
        <?php
        acf_form([
            'id' => 'branding-settings-form',
            'post_id' => 'options',
            'new_post' => false,
            'submit_value' => 'Update Settings'
        ]);
        ?>
        <hr>
        <h3>Available Shortcodes</h3>
        <div id="available-shortcodes">
            <?php
            if (have_rows('field_value_pairs', 'option')) :
                echo '<ul>';
                while (have_rows('field_value_pairs', 'option')) : the_row();
                    $field = get_sub_field('field');
                    echo '<li>[branding key="' . esc_html($field) . '"]</li>';
                endwhile;
                echo '</ul>';
            else :
                echo '<p>No shortcodes available.</p>';
            endif;
            ?>
        </div>
    </div>
<?php
}

if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'group_branding_settings',
        'title' => 'Branding Settings',
        'fields' => array(
            array(
                'key' => 'field_branding_pairs',
                'label' => 'Field-Value Pairs',
                'name' => 'field_value_pairs',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_branding_pair_field',
                        'label' => 'Field',
                        'name' => 'field',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_branding_pair_value',
                        'label' => 'Value',
                        'name' => 'value',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_branding_pair_type',
                        'label' => 'Type',
                        'name' => 'type',
                        'type' => 'select',
                        'choices' => array(
                            'standard_text' => 'Standard Text',
                            'email' => 'Email',
                            'phone' => 'Phone',
                        ),
                        'default_value' => 'standard_text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'branding_settings',
                ),
            ),
        ),
    ));

endif;
