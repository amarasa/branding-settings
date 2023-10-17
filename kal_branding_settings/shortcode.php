<?php
function branding_shortcode($atts)
{
    // Start output buffering
    ob_start();

    $atts = shortcode_atts(
        array(
            'key' => '',
        ),
        $atts,
        'branding'
    );

    if (have_rows('field_value_pairs', 'option')) :
        while (have_rows('field_value_pairs', 'option')) : the_row();
            $field = get_sub_field('field');
            $value = get_sub_field('value');
            $type = get_sub_field('type');

            if ($field === $atts['key']) {
                switch ($type) {
                    case 'email':
                        echo '<a href="mailto:' . esc_attr($value) . '">' . esc_html($value) . '</a>';
                        break;
                    case 'phone':
                        echo '<a href="tel:' . esc_attr($value) . '">' . esc_html($value) . '</a>';
                        break;
                    default:
                        echo esc_html($value);
                        break;
                }
                break;
            }
        endwhile;
    endif;

    // End output buffering and return the captured output
    return ob_get_clean();
}


add_shortcode('branding', 'branding_shortcode');
