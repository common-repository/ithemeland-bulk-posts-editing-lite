<?php

use wpbel\classes\helpers\Sanitizer;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<table id="wpbel-items-list" class="widefat">
    <thead>
        <tr>
            <?php if (isset($show_id_column) && $show_id_column === true) : ?>
                <?php
                if ('id' == $sort_by) {
                    if ($sort_type == 'ASC') {
                        $sortable_icon = "<i class='dashicons dashicons-arrow-up'></i>";
                    } else {
                        $sortable_icon = "<i class='dashicons dashicons-arrow-down'></i>";
                    }
                } else {
                    $sortable_icon = "<img src='" . esc_url(WPBEL_IMAGES_URL . "/sortable.png") . "' alt=''>";
                }
                ?>
                <th class="wpbel-td70 <?php echo ($sticky_first_columns == 'yes') ? 'wpbel-td-sticky wpbel-td-sticky-id' : ''; ?>">
                    <input type="checkbox" class="wpbel-check-item-main" title="<?php esc_attr_e('Select All', 'ithemeland-wordpress-bulk-posts-editing-lite'); ?>">
                    <label data-column-name="id" class="wpbel-sortable-column"><?php esc_html_e('ID', 'ithemeland-wordpress-bulk-posts-editing-lite'); ?><span class="wpbel-sortable-column-icon"><?php echo wp_kses($sortable_icon, Sanitizer::allowed_html_tags()); ?></span></label>
                </th>
            <?php endif; ?>
            <?php if (!empty($next_static_columns)) : ?>
                <?php foreach ($next_static_columns as $static_column) : ?>
                    <?php
                    if ($static_column['field'] == $sort_by) {
                        if ($sort_type == 'ASC') {
                            $sortable_icon = "<i class='dashicons dashicons-arrow-up'></i>";
                        } else {
                            $sortable_icon = "<i class='dashicons dashicons-arrow-down'></i>";
                        }
                    } else {
                        $sortable_icon = "<img src='" . esc_url(WPBEL_IMAGES_URL . "/sortable.png") . "' alt=''>";
                    }
                    ?>
                    <th data-column-name="<?php echo esc_attr($static_column['field']) ?>" class="wpbel-sortable-column wpbel-td120 <?php echo ($sticky_first_columns == 'yes') ? 'wpbel-td-sticky wpbel-td-sticky-title' : ''; ?>"><?php echo esc_html($static_column['title']); ?><span class="wpbel-sortable-column-icon"><?php echo wp_kses($sortable_icon, Sanitizer::allowed_html_tags()); ?></span></th>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($columns)) :
                foreach ($columns as $column_name => $column) :
                    $title = (!empty($columns_title) && isset($columns_title[$column_name])) ? $columns_title[$column_name] : '';
                    $sortable_icon = '';
                    if (isset($column['sortable']) && $column['sortable'] === true) {
                        if ($column_name == $sort_by) {
                            if ($sort_type == 'ASC') {
                                $sortable_icon = "<i class='dashicons dashicons-arrow-up'></i>";
                            } else {
                                $sortable_icon = "<i class='dashicons dashicons-arrow-down'></i>";
                            }
                        } else {
                            $sortable_icon = "<img src='" . esc_url(WPBEL_IMAGES_URL . "/sortable.png") . "' alt=''>";
                        }
                    }

                    if (isset($display_full_columns_title) && $display_full_columns_title == 'yes') {
                        $column_title = $column['title'];
                    } else {
                        $column_title = (strlen($column['title']) > 12) ? mb_substr($column['title'], 0, 12) . '.' : $column['title'];
                    }
            ?>
                    <th data-column-name="<?php echo esc_attr($column_name); ?>" <?php echo (!empty($column['sortable'])) ? 'class="wpbel-sortable-column"' : ''; ?>><?php echo (!empty($title)) ? "<span class='wpbel-column-title dashicons dashicons-info' title='" . esc_attr($title) . "'></span>" : "" ?> <?php echo esc_html($column_title); ?> <span class="wpbel-sortable-column-icon"><?php echo wp_kses($sortable_icon, Sanitizer::allowed_html_tags()); ?></span></th>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($after_dynamic_columns)) : ?>
                <?php foreach ($after_dynamic_columns as $last_column_item) : ?>
                    <th data-column-name="<?php echo esc_attr($last_column_item['field']) ?>" class="wpbel-td120"><?php echo esc_html($last_column_item['title']); ?></th>
                <?php endforeach; ?>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($items_loading)) : ?>
            <tr>
                <td colspan="8" class="wpbel-text-alert"><?php esc_html_e('Loading ...', 'ithemeland-wordpress-bulk-posts-editing-lite'); ?></td>
            </tr>
        <?php
        elseif (!empty($items) && count($items) > 0) :
            if (!empty($item_provider && is_object($item_provider))) :
                $items_result = $item_provider->get_items($items, $columns);
                if (!empty($items_result)) :
                    echo (is_array($items_result) && !empty($items_result['items'])) ? wp_kses($items_result['items'], Sanitizer::allowed_html_tags()) : wp_kses($items_result, Sanitizer::allowed_html_tags());
                endif;
            endif;
        else :
        ?>
            <tr>
                <td colspan="8" class="wpbel-text-alert"><?php esc_html_e('No Data Available!', 'ithemeland-wordpress-bulk-posts-editing-lite'); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
if (!empty($items_result['includes']) && is_array($items_result['includes'])) {
    foreach (wpbel\classes\helpers\Others::array_flatten($items_result['includes']) as $include_item) {
        echo !empty($include_item) ? wp_kses($include_item, Sanitizer::allowed_html_tags()) : '';
    }
}
