<?php

$unit_helper = WPUltimateRecipe::get()->helper('ingredient_units');
$conversion_units_admin = $unit_helper->get_unit_admin_settings();
$unit_systems_admin = $unit_helper->get_unit_system_admin_settings();

// Include part of site URL hash in HTML settings to update when site URL changes
$sitehash = substr( md5( WPUltimateRecipe::get()->coreUrl ), 0, 8 );

$template_editor_button = WPUltimateRecipe::is_addon_active( 'template-editor' ) ? 'recipe_template_open_editor_active' . $sitehash : 'recipe_template_open_editor_disabled';
$custom_fields_button = WPUltimateRecipe::is_addon_active( 'custom-fields' ) ? 'recipe_fields_manage_custom_active' . $sitehash : 'recipe_fields_manage_custom_disabled';

$admin_menu = array(
    'title' => 'WP Ultimate Recipe ' . __('Settings', 'wp-ultimate-recipe'),
    'logo'  => WPUltimateRecipe::get()->coreUrl . '/img/icon_100.png',
    'menus' => array(
//=-=-=-=-=-=-= RECIPE TEMPLATE =-=-=-=-=-=-=
        array(
            'title' => __('Recipe Template', 'wp-ultimate-recipe'),
            'name' => 'recipe_template',
            'icon' => 'font-awesome:fa-picture-o',
            'menus' => array(
                array(
                    'title' => __('Template Editor', 'wp-ultimate-recipe'),
                    'name' => 'recipe_template_template_editor_menu',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Template Editor', 'wp-ultimate-recipe'),
                            'name' => 'recipe_template_editor',
                            'fields' => array(
                                array(
                                    'type' => 'html',
                                    'name' => $template_editor_button,
                                    'binding' => array(
                                        'field'    => '',
                                        'function' => 'wpurp_admin_template_editor',
                                    ),
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_template_editor_recipe',
                                    'label' => __('Preview Recipe', 'wp-ultimate-recipe'),
                                    'description' => __( 'This recipe will be used for the preview in the editor.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'wpurp_admin_template_editor_recipe',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '{{first}}',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Default Templates', 'wp-ultimate-recipe'),
                            'name' => 'recipe_templates',
                            'fields' => array(
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_template_recipe_template',
                                    'label' => __('Recipe Template', 'wp-ultimate-recipe'),
                                    'description' => __( 'The default template to use for recipes.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'wpurp_admin_templates',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '70',
                                    ),
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_template_print_template',
                                    'label' => __('Print Template', 'wp-ultimate-recipe'),
                                    'description' => __( 'The default template to use for printed recipes.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'wpurp_admin_templates',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '1',
                                    ),
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_template_amp_template',
                                    'label' => __('AMP Template', 'wp-ultimate-recipe'),
                                    'description' => __( 'The default template to use for AMP pages.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'wpurp_admin_templates',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '94',
                                    ),
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_template_feed_template',
                                    'label' => __('RSS Feed Template', 'wp-ultimate-recipe'),
                                    'description' => __( 'The default template to use for RSS feeds.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        'data' => array(
                                            array(
                                                'source' => 'function',
                                                'value' => 'wpurp_admin_templates',
                                            ),
                                        ),
                                    ),
                                    'default' => array(
                                        '99',
                                    ),
                                    'validation' => 'required',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Variables', 'wp-ultimate-recipe'),
                            'name' => 'recipe_template_variables',
                            'fields' => array(
                                array(
                                    'type' => 'color',
                                    'name' => 'recipe_template_variable_background_color',
                                    'label' => __('Background Color', 'wp-ultimate-recipe'),
                                    'description' => __( 'Background Color for default recipe template', 'wp-ultimate-recipe' ),
                                    'default' => '#ffffff',
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'recipe_template_variable_text_color',
                                    'label' => __('Text Color', 'wp-ultimate-recipe'),
                                    'description' => __( 'Text Color for default recipe template', 'wp-ultimate-recipe' ),
                                    'default' => '#1a1a1a',
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'recipe_template_variable_link_color',
                                    'label' => __('Link Color', 'wp-ultimate-recipe'),
                                    'description' => __( 'Link Color for default recipe template', 'wp-ultimate-recipe' ),
                                    'default' => '#3498db',
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'recipe_template_variable_button_color',
                                    'label' => __('Button Color', 'wp-ultimate-recipe'),
                                    'description' => __( 'Button Color for default recipe template', 'wp-ultimate-recipe' ),
                                    'default' => '#3498db',
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'recipe_template_variable_highlight_color',
                                    'label' => __('Highlight Color', 'wp-ultimate-recipe'),
                                    'description' => __( 'Highlight Color for default recipe template', 'wp-ultimate-recipe' ),
                                    'default' => '#3498db',
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'color',
                                    'name' => 'recipe_template_variable_highlight_text_color',
                                    'label' => __('Highlight Text Color', 'wp-ultimate-recipe'),
                                    'description' => __( 'Highlight Text Color for default recipe template', 'wp-ultimate-recipe' ),
                                    'default' => '#ffffff',
                                    'validation' => 'required',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Featured Image', 'wp-ultimate-recipe'),
                    'name' => 'recipe_template_featured_image_menu',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Theme', 'wp-ultimate-recipe'),
                            'name' => 'featured_image_section_theme',
                            'fields' => array(
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_theme_thumbnail',
                                    'label' => __('Display Thumbnail', 'wp-ultimate-recipe'),
                                    'description' => __( 'Thumbnail position depends on the theme you use', 'wp-ultimate-recipe' ) . '.',
                                    'items' => array(
                                        array(
                                            'value' => 'never',
                                            'label' => __('Never', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'archive',
                                            'label' => __('Only on archive pages', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'recipe',
                                            'label' => __('Only on recipe pages', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'always',
                                            'label' => __('Always', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        'archive',
                                    ),
                                    'validation' => 'required',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Recipe', 'wp-ultimate-recipe'),
                            'name' => 'featured_image_section_recipe',
                            'fields' => array(
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_alternate_image',
                                    'label' => __('Alternate Image', 'wp-ultimate-recipe'),
                                    'description' => __( 'Ability to define an alternate image for the recipe.', 'wp-ultimate-recipe' ),
                                    'default' => '1',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Recipe Box', 'wp-ultimate-recipe'),
                    'name' => 'recipe_template_recipe_box_menu',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Metadata', 'wp-ultimate-recipe'),
                            'name' => 'section_metadata',
                            'fields' => array(
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_metadata_type',
                                    'label' => __('Metadata Type', 'wp-ultimate-recipe'),
                                    'description' => __( 'Format to use for the recipe metadata.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        array(
                                            'value' => 'json',
                                            'label' => __('JSON-LD', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'inline',
                                            'label' => __('Inline Meta Tags', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'json-inline',
                                            'label' => __('Use both JSON-LD and Inline Meta Tags', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        'json',
                                    ),
                                    'validation' => 'required',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Functionality', 'wp-ultimate-recipe'),
                            'name' => 'section_functionality',
                            'fields' => array(
                                array(
                                    'type' => 'textbox',
                                    'name' => 'print_tooltip_text',
                                    'label' => __('Print Button Tooltip', 'wp-ultimate-recipe'),
                                    'description' => __('Text to show when someone hovers over the button.', 'wp-ultimate-recipe'),
                                    'default' => __('Print Recipe', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_adjustable_servings',
                                    'label' => __('Adjustable Servings', 'wp-ultimate-recipe'),
                                    'description' => __( 'Allow users to dynamically adjust the servings of recipes.', 'wp-ultimate-recipe' ),
                                    'default' => '1',
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_decimal_character',
                                    'label' => __('Decimal Character', 'wp-ultimate-recipe'),
                                    'description' => __( 'Character to use for decimal numbers.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        array(
                                            'value' => '.',
                                            'label' => __('Point', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => ',',
                                            'label' => __('Comma', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        '.',
                                    ),
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'slider',
                                    'name' => 'recipe_adjustable_servings_precision',
                                    'label' => __('Ingredient Precision', 'wp-ultimate-recipe'),
                                    'description' => __('Precision of decimal numbers for ingredient quantities after adjusting servings.', 'wp-ultimate-recipe'),
                                    'min' => '0',
                                    'max' => '10',
                                    'step' => '1',
                                    'default' => '2',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_adjustable_servings_fractions',
                                    'label' => __('Use Fractions', 'wp-ultimate-recipe'),
                                    'description' => __( "Use fractions after adjusting, even if the original quantity wasn't one.", 'wp-ultimate-recipe' ),
                                    'default' => '0',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_adjustable_servings_hyphen',
                                    'label' => __('Use Hyphens for Ranges', 'wp-ultimate-recipe'),
                                    'description' => __( "A hyphen in your quantity will be treated as a range.", 'wp-ultimate-recipe' ),
                                    'default' => '1',
                                ),
                                array(
                                    'type' => 'slider',
                                    'name' => 'recipe_default_servings',
                                    'label' => __('Default Servings', 'wp-ultimate-recipe'),
                                    'description' => __('Default number of servings to use when none specified.', 'wp-ultimate-recipe'),
                                    'min' => '1',
                                    'max' => '10',
                                    'step' => '1',
                                    'default' => '4',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_linkback',
                                    'label' => __('Link to plugin', 'wp-ultimate-recipe'),
                                    'description' => __( 'Show a link to the plugin website as a little thank you.', 'wp-ultimate-recipe' ),
                                    'default' => '0',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Images', 'wp-ultimate-recipe'),
                            'name' => 'section_recipe_images',
                            'fields' => array(
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_images_clickable',
                                    'label' => __('Clickable Images', 'wp-ultimate-recipe'),
                                    'description' => __( 'Best used in combination with a lightbox plugin.', 'wp-ultimate-recipe' ),
                                    'default' => '',
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_image_title',
                                    'label' => __('Recipe Image Title', 'wp-ultimate-recipe'),
                                    'description' => __( 'Title attritube to be used for the recipe image.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        array(
                                            'value' => 'attachment',
                                            'label' => __('Use media attachment title', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'recipe_title',
                                            'label' => __('Use recipe title', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        'attachment',
                                    ),
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_image_alt',
                                    'label' => __('Recipe Image Alt', 'wp-ultimate-recipe'),
                                    'description' => __( 'Alt attritube to be used for the recipe image.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        array(
                                            'value' => 'attachment',
                                            'label' => __('Use media attachment alt', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'recipe_title',
                                            'label' => __('Use recipe title', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        'attachment',
                                    ),
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_instruction_images_title',
                                    'label' => __('Instruction Images Title', 'wp-ultimate-recipe'),
                                    'description' => __( 'Title attritube to be used for instruction images.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        array(
                                            'value' => 'attachment',
                                            'label' => __('Use media attachment title', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'instruction',
                                            'label' => __('Use instruction text', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        'attachment',
                                    ),
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_instruction_images_alt',
                                    'label' => __('Instruction Images Alt', 'wp-ultimate-recipe'),
                                    'description' => __( 'Alt attritube to be used for instruction images.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        array(
                                            'value' => 'attachment',
                                            'label' => __('Use media attachment alt', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'instruction',
                                            'label' => __('Use instruction text', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        'attachment',
                                    ),
                                    'validation' => 'required',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Ingredients', 'wp-ultimate-recipe'),
                            'name' => 'section_ingredients',
                            'fields' => array(
                                array(
                                    'type' => 'notebox',
                                    'name' => 'recipe_ingredient_links_premium_not_installed',
                                    'label' => 'WP Ultimate Recipe Premium',
                                    'description' => __('Custom links are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                                    'status' => 'warning',
                                    'dependency' => array(
                                        'field' => '',
                                        'function' => 'wpurp_admin_premium_not_installed',
                                    ),
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_ingredient_links',
                                    'label' => __('Ingredient Links', 'wp-ultimate-recipe'),
                                    'description' => __( 'Links to be used in the ingredient list.', 'wp-ultimate-recipe' ),
                                    'items' => array(
                                        array(
                                            'value' => 'disabled',
                                            'label' => __('No ingredient links', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'archive',
                                            'label' => __('Only link to ingredient archive page', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'archive_custom',
                                            'label' => __('Custom link if provided, otherwise archive page', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'custom',
                                            'label' => __('Custom links if provided, otherwise no link', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        'archive_custom',
                                    ),
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_ingredient_custom_links_target',
                                    'label' => __('Custom Links', 'wp-ultimate-recipe'),
                                    'description' => __( 'Custom links can be added on the ', 'wp-ultimate-recipe' ) . ' <a href="'.admin_url('edit-tags.php?taxonomy=ingredient&post_type=recipe').'" target="_blank">' . __( 'ingredients page', 'wp-ultimate-recipe' ) . '</a>.',
                                    'items' => array(
                                        array(
                                            'value' => '_self',
                                            'label' => __('Open in the current tab/window', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => '_blank',
                                            'label' => __('Open in a new tab/window', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        '_blank',
                                    ),
                                    'dependency' => array(
                                        'field' => '',
                                        'function' => 'wpurp_admin_premium_installed',
                                    ),
                                    'validation' => 'required',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_ingredient_custom_links_nofollow',
                                    'label' => __('Use Nofollow', 'wp-ultimate-recipe'),
                                    'description' => __( 'Add the nofollow attribute to custom ingredient links.', 'wp-ultimate-recipe' ),
                                    'default' => '0',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Print Version', 'wp-ultimate-recipe'),
                    'name' => 'recipe_template_print_template_menu',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('General', 'wp-ultimate-recipe'),
                            'name' => 'print_template_section_general',
                            'fields' => array(
                                array(
                                    'type' => 'textbox',
                                    'name' => 'print_template_keyword',
                                    'label' => __('Print Keyword', 'wp-ultimate-recipe'),
                                    'description' => __('Keyword used in the URL to get the print version', 'wp-ultimate-recipe'),
                                    'default' => 'print',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Title', 'wp-ultimate-recipe'),
                            'name' => 'print_template_section_title',
                            'fields' => array(
                                array(
                                    'type' => 'textbox',
                                    'name' => 'print_template_title_text',
                                    'label' => __('Title Text', 'wp-ultimate-recipe'),
                                    'description' => __('Title of the new webpage that opens.', 'wp-ultimate-recipe'),
                                    'default' => get_bloginfo('name'),
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Advanced', 'wp-ultimate-recipe'),
                            'name' => 'print_template_section_advanced',
                            'fields' => array(
                                array(
                                    'type' => 'toggle',
                                    'name' => 'print_version_legacy_code',
                                    'label' => __('Use Legacy Print', 'wp-ultimate-recipe'),
                                    'description' => __( 'Use the old print style.', 'wp-ultimate-recipe' ),
                                    'default' => '0',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('RSS Feed', 'wp-ultimate-recipe'),
                    'name' => 'recipe_template_rss_feed_menu',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Recipe Posts', 'wp-ultimate-recipe'),
                            'name' => 'recipe_template_rss_feed_recipe_posts',
                            'fields' => array(
                                array(
                                    'type' => 'select',
                                    'name' => 'recipe_rss_feed_display',
                                    'label' => __('Display', 'wp-ultimate-recipe'),
                                    'items' => array(
                                        array(
                                            'value' => 'excerpt',
                                            'label' => __('Only the excerpt', 'wp-ultimate-recipe'),
                                        ),
                                        array(
                                            'value' => 'full',
                                            'label' => __('The entire recipe', 'wp-ultimate-recipe'),
                                        ),
                                    ),
                                    'default' => array(
                                        'full',
                                    ),
                                    'validation' => 'required',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => __('Recipe Shortcode', 'wp-ultimate-recipe'),
                            'name' => 'recipe_template_rss_feed_shortcode',
                            'fields' => array(
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_rss_feed_shortcode',
                                    'label' => __('Display', 'wp-ultimate-recipe'),
                                    'description' => __( 'Output the recipe shortcode in RSS feeds?', 'wp-ultimate-recipe' ),
                                    'default' => '1',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Advanced', 'wp-ultimate-recipe'),
                    'name' => 'recipe_template_advanced_menu',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('Mobile', 'wp-ultimate-recipe'),
                            'name' => 'recipe_template_advanced',
                            'fields' => array(
                                array(
                                    'type' => 'slider',
                                    'name' => 'recipe_template_responsive_breakpoint',
                                    'label' => __('Responsive Breakpoint', 'wp-ultimate-recipe'),
                                    'description' => __( 'The width of the recipe box at which will be switched to the mobile version.', 'wp-ultimate-recipe' ),
                                    'min' => '10',
                                    'max' => '1000',
                                    'step' => '1',
                                    'default' => '500',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'section',
                            'title' => 'CSS',
                            'name' => 'recipe_template_advanced_styling',
                            'fields' => array(
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_template_force_style',
                                    'label' => __('Force CSS style', 'wp-ultimate-recipe'),
                                    'description' => __( 'This ensures maximum compatibility with most themes. Can be disabled for advanced usage.', 'wp-ultimate-recipe' ),
                                    'default' => '1',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_template_font_awesome',
                                    'label' => __('Include Font Awesome', 'wp-ultimate-recipe'),
                                    'description' => __( 'You can disable this if your theme already includes Font Awesome.', 'wp-ultimate-recipe' ),
                                    'default' => '1',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_template_inline_css',
                                    'label' => __('Output Inline CSS', 'wp-ultimate-recipe'),
                                    'description' => __( 'When disabled the Template Editor will not output any inline CSS.', 'wp-ultimate-recipe' ),
                                    'default' => '1',
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_template_base_css',
                                    'label' => __('Use base CSS', 'wp-ultimate-recipe'),
                                    'description' => __( 'When disabled the base CSS file will not be included.', 'wp-ultimate-recipe' ),
                                    'default' => '1',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= RECIPE ARCHIVE =-=-=-=-=-=-=
        array(
            'title' => __('Recipe Archive', 'wp-ultimate-recipe'),
            'name' => 'recipe_archive',
            'icon' => 'font-awesome:fa-archive',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('Recipe Archive Pages', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_archive_pages',
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'recipe_archive_display',
                            'label' => __('Display', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'excerpt',
                                    'label' => __('Only the excerpt', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'full',
                                    'label' => __('The entire recipe', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'full',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_archive_use_custom_template',
                            'label' => __('Custom Recipe Template', 'wp-ultimate-recipe'),
                            'description' => __( 'Use a different recipe template for the archive pages.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'recipe_archive_recipe_template',
                            'label' => __('Recipe Template', 'wp-ultimate-recipe'),
                            'description' => __( 'Recipe template to use on the archive pages.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_templates',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '70',
                            ),
                            'validation' => 'required',
                            'dependency' => array(
                                'field' => 'recipe_archive_use_custom_template',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'recipe_slug',
                            'label' => __('Slug', 'wp-ultimate-recipe'),
                            'default' => 'recipe',
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'recipe_slug_preview' . $sitehash,
                            'binding' => array(
                                'field'    => 'recipe_slug',
                                'function' => 'wpurp_admin_recipe_slug_preview',
                            ),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'recipe_slug_notebox',
                            'label' => __('404 error/page not found?', 'wp-ultimate-recipe'),
                            'description' => __('Try', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipe.com/docs/404-page-found/" target="_blank">'.__('flushing your permalinks', 'wp-ultimate-recipe').'</a>.',
                            'status' => 'info',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Advanced', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_archive_advanced',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_archive_disabled',
                            'label' => __('Disable Recipe Archive', 'wp-ultimate-recipe'),
                            'description' => __( 'Make sure to flush your permalinks after changing this setting.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= PARTNER INTEGRATIONS =-=-=-=-=-=-=
        array(
            'title' => __('Partner Integrations', 'wp-ultimate-recipe'),
            'name' => 'partners_integrations',
            'icon' => 'font-awesome:fa-link',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => 'Chicory',
                    'name' => 'section_integrations_chicory',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'partners_integrations_chicory_enable',
                            'label' => 'Chicory',
                            'description' => __( 'Connect your recipes to leading online grocers with the Chicory "get ingredients" button.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'checkbox',
                            'name' => 'partners_integrations_chicory_terms',
                            'label' => '',
                            'items' => array(
                                array(
                                    'value' => '1',
                                    'label' => __( "I agree to Chicory's", 'wp-ultimate-recipe') . '</label> <a href="http://chicoryapp.com/terms/" target="_blank">' . __( 'terms of use', 'wp-ultimate-recipe') . '</a><label>',
                                ),
                            ),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'partners_integrations_chicory_agree',
                            'label' => 'Chicory',
                            'description' => __( "You need to agree to Chicory's terms of use if you want the button to show up.", 'wp-ultimate-recipe'),
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => 'partners_integrations_chicory_enable,partners_integrations_chicory_terms',
                                'function' => 'wpurp_admin_chicory_terms',
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('General', 'wp-ultimate-recipe'),
                    'name' => 'section_integrations_general',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'partners_integrations_mediavine_enable',
                            'label' => 'Mediavine',
                            'description' => __( 'Show Mediavine ad next to your recipe ingredients.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'partners_integrations_bigoven_enable',
                            'label' => 'BigOven',
                            'description' => __( 'Show save recipe to BigOven button.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'partners_integrations_foodfanatic_enable',
                            'label' => 'Food Fanatic',
                            'description' => __( 'Show save recipe to Food Fanatic button.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'partners_integrations_yummly_enable',
                            'label' => 'Yummly',
                            'description' => __( 'Show the Yum button.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= RECIPE SHARING =-=-=-=-=-=-=
        array(
            'title' => __('Recipe Sharing', 'wp-ultimate-recipe'),
            'name' => 'recipe_sharing',
            'icon' => 'font-awesome:fa-thumbs-o-up',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('General', 'wp-ultimate-recipe'),
                    'name' => 'section_general',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_sharing_enable',
                            'label' => __('Enable Sharing', 'wp-ultimate-recipe'),
                            'description' => __( 'Show sharing buttons.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Language', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_sharing_language',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'recipe_sharing_language_options',
                            'description' => __('Available languages can be found over here:', 'wp-ultimate-recipe') . ' <a href="https://developers.facebook.com/docs/internationalization/" target="_blank">Facebook</a>, <a href="https://dev.twitter.com/overview/general/adding-international-support-to-your-apps" target="_blank">Twitter</a>, <a href="https://developers.google.com/+/web/+1button/#available-languages" target="_blank">Google+</a>',
                            'status' => 'info',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'recipe_sharing_language_facebook',
                            'label' => 'Facebook',
                            'default' => 'en_US',
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'recipe_sharing_language_twitter',
                            'label' => 'Twitter',
                            'default' => 'en',
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'recipe_sharing_language_google',
                            'label' => 'Google+',
                            'default' => 'en-US',
                            'validation' => 'required',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Default text to share', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_sharing_default_text',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'recipe_sharing_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'recipe_sharing_codes',
                            'label' => __('Important', 'wp-ultimate-recipe'),
                            'description' => __('Use %title% as a placeholder for the recipe title.', 'wp-ultimate-recipe'),
                            'status' => 'info',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_installed',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'recipe_sharing_twitter',
                            'label' => 'Twitter',
                            'default' => '%title% - Powered by @WPUltimRecipe',
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'recipe_sharing_pinterest',
                            'label' => 'Pinterest',
                            'default' => '%title% - Powered by @ultimaterecipe',
                            'validation' => 'required',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= RECIPE FIELDS =-=-=-=-=-=-=
        array(
            'title' => __('Recipe Fields', 'wp-ultimate-recipe'),
            'name' => 'recipe_fields',
            'icon' => 'font-awesome:fa-edit',
            'controls' => array(
                array(
                    'type' => 'notebox',
                    'name' => 'recipe_tags_premium_not_installed',
                    'label' => 'WP Ultimate Recipe Premium',
                    'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                    'status' => 'warning',
                    'dependency' => array(
                        'field' => '',
                        'function' => 'wpurp_admin_premium_not_installed',
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Custom Recipe Fields', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_fields_custom',
                    'fields' => array(
                        array(
                            'type' => 'html',
                            'name' => $custom_fields_button,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_manage_fields',
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Advanced', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_fields_advanced',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_fields_in_user_submission',
                            'label' => __('Show Custom Fields in User Submission form', 'wp-ultimate-recipe'),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'multiselect',
                            'name' => 'recipe_fields_user_submission',
                            'label' => __( 'Fields', 'wp-ultimate-recipe' ),
                            'description' => __( 'Fields to show in the User Submission form.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_custom_fields',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '{{all}}',
                            ),
                            'dependency' => array(
                                'field' => 'recipe_fields_in_user_submission',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= RECIPE TAGS =-=-=-=-=-=-=
        array(
            'title' => __('Recipe Tags', 'wp-ultimate-recipe'),
            'name' => 'recipe_tags',
            'icon' => 'font-awesome:fa-tags',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('Custom Recipe Tags', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_tags_custom',
                    'fields' => array(
                        array(
                            'type' => 'html',
                            'name' => 'recipe_tags_manage_custom' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_manage_tags',
                            ),
                        ),
                        array(
                            'type' => 'multiselect',
                            'name' => 'recipe_tags_hide_in_recipe',
                            'label' => __('Hide Custom Tags', 'wp-ultimate-recipe'),
                            'description' => __( 'Do not show these tags in the Recipe Box.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_recipe_tags',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('WordPress Categories & Tags', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_tags_wordpress',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_tags_use_wp_categories',
                            'label' => __('Use Categories and Tags', 'wp-ultimate-recipe'),
                            'description' => __( 'Use the default WP Categories and Tags to organize your recipes.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_tags_show_in_archives',
                            'label' => __('Show Recipes in Archives', 'wp-ultimate-recipe'),
                            'description' => __( 'Show recipes in the WP Categories and Tags archives.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Links', 'wp-ultimate-recipe'),
                    'name' => 'section_tags_links',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'recipe_tags_links_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('Custom links are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'recipe_tags_links',
                            'label' => __('Tag Links', 'wp-ultimate-recipe'),
                            'description' => __( 'Links to be used in the tag list.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                array(
                                    'value' => 'disabled',
                                    'label' => __('No tag links', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'archive',
                                    'label' => __('Only link to archive page', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'archive_custom',
                                    'label' => __('Custom link if provided, otherwise archive page', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'custom',
                                    'label' => __('Custom links if provided, otherwise no link', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'archive_custom',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'recipe_tags_custom_links_target',
                            'label' => __('Custom Links', 'wp-ultimate-recipe'),
                            'description' => __( 'Custom links can be added on the ', 'wp-ultimate-recipe' ) . ' <a href="'.admin_url('edit-tags.php?taxonomy=category&post_type=recipe').'" target="_blank">' . __( 'tag page', 'wp-ultimate-recipe' ) . '</a>.',
                            'items' => array(
                                array(
                                    'value' => '_self',
                                    'label' => __('Open in the current tab/window', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => '_blank',
                                    'label' => __('Open in a new tab/window', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                '_blank',
                            ),
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_installed',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_tags_custom_links_nofollow',
                            'label' => __('Use Nofollow', 'wp-ultimate-recipe'),
                            'description' => __( 'Add the nofollow attribute to custom tag links.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Advanced', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_tags_advanced',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'recipe_tags_cu_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'recipe_tags_show_in_recipe_info',
                            'label' => __('Important', 'wp-ultimate-recipe'),
                            'description' => __('Categories will only show up as tags in the recipe if they have a parent category. For example: a "Courses" parent category with "Main Dish" and "Dessert" as child categories assigned to your recipes.', 'wp-ultimate-recipe'),
                            'status' => 'info',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_installed',
                            ),
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_tags_show_in_recipe',
                            'label' => __('Show Categories in Recipe', 'wp-ultimate-recipe'),
                            'description' => __( 'Use WP categories as if they are tags for their parent category.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_tags_filter_categories',
                            'label' => __('Show Categories Filter', 'wp-ultimate-recipe'),
                            'description' => __( 'Users can see the categories when filtering.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_tags_filter_tags',
                            'label' => __('Show Tags Filter', 'wp-ultimate-recipe'),
                            'description' => __( 'Users can see the tags when filtering.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= USER RATINGS =-=-=-=-=-=-=
        array(
            'title' => __('User Ratings', 'wp-ultimate-recipe'),
            'name' => 'user_ratings',
            'icon' => 'font-awesome:fa-star-half-o',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('General', 'wp-ultimate-recipe'),
                    'name' => 'section_user_ratings_general',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'user_ratings_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_ratings_enable',
                            'label' => __('User Ratings', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'disabled',
                                    'label' => __('Disabled', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'users_only',
                                    'label' => __('Only logged in users can rate recipes', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'everyone',
                                    'label' => __('Everyone can rate recipes', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'everyone',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_ratings_vote_attention',
                            'label' => __('Show indicator', 'wp-ultimate-recipe'),
                            'description' => __( 'Attract attention to the possibility to vote.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'slider',
                            'name' => 'user_ratings_minimum_votes',
                            'label' => __('Minimum # Votes', 'wp-ultimate-recipe'),
                            'description' => __('Minimum number of votes needed before sharing the rating as metadata used by Google and other search engines.', 'wp-ultimate-recipe'),
                            'min' => '1',
                            'max' => '50',
                            'step' => '1',
                            'default' => '2',
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_ratings_rounding',
                            'label' => __('Rounding Ratings', 'wp-ultimate-recipe'),
                            'description' => __( 'Round the ratings presented in the metadata.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                array(
                                    'value' => 'disabled',
                                    'label' => __('Disabled', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'half',
                                    'label' => __('Round up to nearest half', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'integer',
                                    'label' => __('Round up to nearest integer', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'disabled',
                            ),
                            'validation' => 'required',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= UNIT CONVERSION =-=-=-=-=-=-=
        array(
            'title' => __('Unit Conversion', 'wp-ultimate-recipe'),
            'name' => 'unit_conversion',
            'icon' => 'font-awesome:fa-exchange',
            'menus' => array(
                array(
                    'title' => __('General Settings', 'wp-ultimate-recipe'),
                    'name' => 'unit_conversion_general_settings',
                    'controls' => array(
                        array(
                            'type' => 'section',
                            'title' => __('General', 'wp-ultimate-recipe'),
                            'name' => 'section_unit_conversion_general',
                            'fields' => array(
                                array(
                                    'type' => 'notebox',
                                    'name' => 'unit_conversion_premium_not_installed',
                                    'label' => 'WP Ultimate Recipe Premium',
                                    'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                                    'status' => 'warning',
                                    'dependency' => array(
                                        'field' => '',
                                        'function' => 'wpurp_admin_premium_not_installed',
                                    ),
                                ),
                                array(
                                    'type' => 'toggle',
                                    'name' => 'recipe_adjustable_units',
                                    'label' => __('Allow Conversion', 'wp-ultimate-recipe'),
                                    'description' => __( 'Allow your visitors to switch between Imperial and Metric units.', 'wp-ultimate-recipe' ),
                                    'default' => '1',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title' => __('Unit Systems', 'wp-ultimate-recipe'),
                    'name' => 'unit_conversion_unit_systems',
                    'controls' => $unit_systems_admin, //TODO Universal units
                ),
                array(
                    'title' => __('Unit Aliases', 'wp-ultimate-recipe'),
                    'name' => 'unit_conversion_unit_aliases',
                    'controls' => $conversion_units_admin
                ),
            ),
        ),
//=-=-=-=-=-=-= RECIPE GRID =-=-=-=-=-=-=
        array(
            'title' => __('Recipe Grid', 'wp-ultimate-recipe'),
            'name' => 'recipe_grid',
            'icon' => 'font-awesome:fa-th',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('General', 'wp-ultimate-recipe'),
                    'name' => 'section_recipe_grid_general',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'recipe_grid_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_grid_disable',
                            'label' => __('Disable Recipe Grid', 'wp-ultimate-recipe'),
                            'description' => __( 'Disable the loading of the WP Ultimate Post Grid plugin', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'recipe_grid_manage' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_manage_recipe_grid',
                            ),
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= USER SUBMISSION =-=-=-=-=-=-=
        array(
            'title' => __('User Submission', 'wp-ultimate-recipe'),
            'name' => 'user_submission',
            'icon' => 'font-awesome:fa-user',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('General', 'wp-ultimate-recipe'),
                    'name' => 'section_user_submission_general',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'user_submission_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'user_submission_shortcode',
                            'label' => __('Important', 'wp-ultimate-recipe'),
                            'description' => __('Use the following shortcode to display the front-end form:', 'wp-ultimate-recipe') . ' [ultimate-recipe-submissions]. '. __('The shortcode can be added to any page or post.', 'wp-ultimate-recipe'),
                            'status' => 'info',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_installed',
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_submission_enable',
                            'label' => __('Allow submissions from', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'off',
                                    'label' => __('Nobody', 'wp-ultimate-recipe') . ' (' . __('disabled', 'wp-ultimate-recipe') . ')',
                                ),
                                array(
                                    'value' => 'guests',
                                    'label' => __('Guests and registered users', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'registered',
                                    'label' => __('Registered users only', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'guests',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_submission_preview_button',
                            'label' => __('Allow visitors to preview their submission', 'wp-ultimate-recipe'),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_submission_delete_button',
                            'label' => __('Allow users to delete their own recipes', 'wp-ultimate-recipe'),
                            'description' => __('Show a delete button when users are editing their own recipes from the front-end.', 'wp-ultimate-recipe'),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'codeeditor',
                            'name' => 'user_submission_submitted_text',
                            'label' => __('After-submission text', 'wp-ultimate-recipe'),
                            'description' => __('Text to be shown after a user has submitted a recipe.', 'wp-ultimate-recipe') . ' ' . __( 'HTML can be used.', 'wp-ultimate-recipe' ),
                            'theme' => 'github',
                            'mode' => 'html',
                            'default' => __( 'Recipe submitted! Thank you, your recipe is now awaiting moderation.', 'wp-ultimate-recipe' ),
                        ),
                        array(
                            'type' => 'multiselect',
                            'name' => 'user_submission_required_fields',
                            'label' => __('Required Fields', 'wp-ultimate-recipe'),
                            'description' => __( 'Fields that are required to fill in.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_user_submission_required_fields',
                                    ),
                                ),
                            ),
                            'default' => array(
                                'title',
                                'recipe-author',
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Security Question', 'wp-ultimate-recipe'),
                    'name' => 'section_user_submission_security_question',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'user_submissions_use_security_question',
                            'label' => __('Security Question', 'wp-ultimate-recipe'),
                            'description' => __( 'Use a security question to prevent spam.', 'wp-ultimate-recipe' ),
                            'default' => '',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'user_submissions_security_question',
                            'label' => __('Question', 'wp-ultimate-recipe'),
                            'description' => __( 'The question your visitors have to answer.', 'wp-ultimate-recipe' ),
                            'default' => '4 + 7 =',
                            'dependency' => array(
                                'field' => 'user_submissions_use_security_question',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'user_submissions_security_answer',
                            'label' => __('Answer', 'wp-ultimate-recipe'),
                            'description' => __( 'The correct answer to that question.', 'wp-ultimate-recipe' ),
                            'default' => '11',
                            'dependency' => array(
                                'field' => 'user_submissions_use_security_question',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Recipe Tags', 'wp-ultimate-recipe'),
                    'name' => 'section_user_submission_recipe_tags',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_tags_user_submissions_multiselect',
                            'label' => __('Allow Multiselect', 'wp-ultimate-recipe'),
                            'description' => __( 'Allow users to select multiple terms per category.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_tags_user_submissions_categories',
                            'label' => __('User Submitted Categories', 'wp-ultimate-recipe'),
                            'description' => __( 'Allow users to assign categories when submitting recipes.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_tags_user_submissions_tags',
                            'label' => __('User Submitted Tags', 'wp-ultimate-recipe'),
                            'description' => __( 'Allow users to assign tags when submitting recipes.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'multiselect',
                            'name' => 'user_submission_hide_tags',
                            'label' => __('Hide Custom Tags', 'wp-ultimate-recipe'),
                            'description' => __( 'Hide these tags on the user submission page.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_recipe_tags',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'type' => 'multiselect',
                            'name' => 'user_submission_hide_category_terms',
                            'label' => __('Hide Category Terms', 'wp-ultimate-recipe'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_category_terms',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'type' => 'multiselect',
                            'name' => 'user_submission_hide_tag_terms',
                            'label' => __('Hide Tag Terms', 'wp-ultimate-recipe'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_tag_terms',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Approval Rules', 'wp-ultimate-recipe'),
                    'name' => 'section_user_submission_approval_rules',
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'user_submission_approve',
                            'label' => __('Auto approve', 'wp-ultimate-recipe'),
                            'description' => __('Publish recipe immediately on submission.', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'off',
                                    'label' => __('Nobody', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'guests',
                                    'label' => __('Guests and registered users', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'registered',
                                    'label' => __('Registered users only', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'off',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'multiselect',
                            'name' => 'user_submission_approve_users',
                            'label' => __('Auto approve specific users', 'wp-ultimate-recipe'),
                            'description' => __('Publish recipes from these users immediately on submission.', 'wp-ultimate-recipe'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_users',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'user_submissions_approve_role',
                            'label' => __('Auto approve users with role or capability', 'wp-ultimate-recipe'),
                            'description' => __( 'Publish recipes from these users immediately on submission.', 'wp-ultimate-recipe' ),
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Advanced', 'wp-ultimate-recipe'),
                    'name' => 'section_user_submission_advanced',
                    'fields' => array(
//                        array(
//                            'type' => 'toggle',
//                            'name' => 'user_submission_css',
//                            'label' => __('Submission form CSS', 'wp-ultimate-recipe'),
//                            'description' => __( 'Add basic CSS styles to the frontend form.', 'wp-ultimate-recipe' ),
//                            'default' => '1',
//                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_submission_default_user',
                            'label' => __('Default User for Guest Posts', 'wp-ultimate-recipe'),
                            'description' => __('Assign recipes submitted by guests to this user.', 'wp-ultimate-recipe'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_users',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_submission_ingredient_list',
                            'label' => __('Can only select existing ingredients', 'wp-ultimate-recipe'),
                            'description' => __( 'When enabled visitors will only be able to select from a list of existing ingredients.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_submission_email_admin',
                            'label' => __('Email administrator', 'wp-ultimate-recipe'),
                            'description' => __( 'Send an email notification when a new recipe is submitted.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_submission_restrict_media_access',
                            'label' => __('Restrict Media Library Access', 'wp-ultimate-recipe'),
                            'description' => __( 'Only show media library for editors and up', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_submission_use_media_manager',
                            'label' => __('Use Media Manager', 'wp-ultimate-recipe'),
                            'description' => __( 'Let logged in users use the Media Manager to upload images', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= MEAL PLANNER =-=-=-=-=-=-=
        array(
            'title' => __('Meal Planner', 'wp-ultimate-recipe'),
            'name' => 'meal_planner',
            'icon' => 'font-awesome:fa-calendar',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('Access', 'wp-ultimate-recipe'),
                    'name' => 'section_meal_planner_access',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'meal_planner_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'meal_planner_shortcode',
                            'label' => __('Important', 'wp-ultimate-recipe'),
                            'description' => __('Use the following shortcode to display the front-end form:', 'wp-ultimate-recipe') . ' [ultimate-recipe-meal-planner]. '. __('The shortcode can be added to any page or post.', 'wp-ultimate-recipe'),
                            'status' => 'info',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_installed',
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'meal_planner_enable',
                            'label' => __('Enable Meal Planner for', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'off',
                                    'label' => __('Nobody', 'wp-ultimate-recipe') . ' (' . __('disabled', 'wp-ultimate-recipe') . ')',
                                ),
                                array(
                                    'value' => 'guests',
                                    'label' => __('Guests and registered users', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'registered',
                                    'label' => __('Registered users only', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'guests',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'codeeditor',
                            'name' => 'meal_planner_disabled_text',
                            'label' => __('Disabled Text', 'wp-ultimate-recipe'),
                            'description' => __('Text to be shown when the Meal Planner is disabled for a visitor.', 'wp-ultimate-recipe') . ' ' . __( 'HTML can be used.', 'wp-ultimate-recipe' ),
                            'theme' => 'github',
                            'mode' => 'html',
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Add to Meal Plan', 'wp-ultimate-recipe'),
                    'name' => 'section_meal_planner_add_to_meal_plan_select',
                    'fields' => array(
                        array(
                            'type' => 'multiselect',
                            'name' => 'meal_planner_hide_group_by',
                            'label' => __('Hide Group By Options', 'wp-ultimate-recipe'),
                            'description' => __( 'Hide these group by options for the Add to Meal Plan recipe selection.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                array(
                                    'value' => 'a-z',
                                    'label' => __('Alphabet', 'wp-ultimate-recipe'),
                                ),
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_recipe_tags',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'meal_planner_default_group_by',
                            'label' => __('Default Group By Option', 'wp-ultimate-recipe'),
                            'description' => __( 'Group By Option to use by default. First one in row by default.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                array(
                                    'value' => 'a-z',
                                    'label' => __('Alphabet', 'wp-ultimate-recipe'),
                                ),
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_recipe_tags',
                                    ),
                                ),
                            ),
                            'default' => array(
                                'a-z',
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Saved Meal Plan', 'wp-ultimate-recipe'),
                    'name' => 'section_meal_planner_saved_meal_plan',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'saved_meal_plan_add_to_meal_planner',
                            'label' => __('Add to Meal Planner Button', 'wp-ultimate-recipe'),
                            'description' => __( 'Allow users to add your saved Meal Plan to their own Meal Planner.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'saved_meal_plan_add_to_meal_planner_text',
                            'label' => __('Text after adding', 'wp-ultimate-recipe'),
                            'description' => __('Text to show after a user saved the Meal Plan.', 'wp-ultimate-recipe'),
                            'default' => __('This plan has been added to your Meal Planner', 'wp-ultimate-recipe'),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Add to Meal Plan Button', 'wp-ultimate-recipe'),
                    'name' => 'section_meal_planner_add_to_meal_plan',
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'meal_planner_add_to_meal_plan',
                            'label' => __('Show add to meal plan button for', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'off',
                                    'label' => __('Nobody', 'wp-ultimate-recipe') . ' (' . __('disabled', 'wp-ultimate-recipe') . ')',
                                ),
                                array(
                                    'value' => 'guests',
                                    'label' => __('Guests and registered users', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'registered',
                                    'label' => __('Registered users only', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'off',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'add_to_meal_plan_tooltip_text',
                            'label' => __('Tooltip before adding', 'wp-ultimate-recipe'),
                            'description' => __('Text to show when someone hovers over the button.', 'wp-ultimate-recipe'),
                            'default' => __('Add to Meal Plan:', 'wp-ultimate-recipe'),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'added_to_meal_plan_tooltip_text',
                            'label' => __('Tooltip after adding', 'wp-ultimate-recipe'),
                            'description' => __('Text to show when someone hovers over the button.', 'wp-ultimate-recipe'),
                            'default' => __('This recipe has been added to your Meal Plan', 'wp-ultimate-recipe'),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'add_to_meal_plan_tooltip_html',
                            'description' => __('You can use HTML to link to the relevant page in the tooltips:', 'wp-ultimate-recipe') . '<br/>' . htmlspecialchars( '<a href="/meal-plan/">Meal Plan</a>' ),
                            'status' => 'info',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Appearance', 'wp-ultimate-recipe'),
                    'name' => 'section_meal_planner_appearance',
                    'fields' => array(
                        array(
                            'type' => 'slider',
                            'name' => 'meal_planner_days_desktop',
                            'label' => __('Number of Days on Desktop', 'wp-ultimate-recipe'),
                            'min' => '1',
                            'max' => '10',
                            'step' => '1',
                            'default' => '5',
                        ),
                        array(
                            'type' => 'slider',
                            'name' => 'meal_planner_days_tablet',
                            'label' => __('Number of Days on Tablet', 'wp-ultimate-recipe'),
                            'min' => '1',
                            'max' => '10',
                            'step' => '1',
                            'default' => '3',
                        ),
                        array(
                            'type' => 'slider',
                            'name' => 'meal_planner_days_mobile',
                            'label' => __('Number of Days on Mobile', 'wp-ultimate-recipe'),
                            'min' => '1',
                            'max' => '10',
                            'step' => '1',
                            'default' => '1',
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'meal_planner_dates_change',
                            'label' => __('Change Dates By', 'wp-ultimate-recipe'),
                            'description' => __( 'How many days to go forward or backward when using the arrows.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                array(
                                    'value' => 'shown',
                                    'label' => __('Number of Days shown', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => '1',
                                    'label' => __('1 Day', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'shown',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_planner_date_format',
                            'label' => __('Date Format', 'wp-ultimate-recipe'),
                            'description' => '<a href="http://php.net/manual/en/function.date.php" target="_blank">' . __('Use PHP Date String', 'wp-ultimate-recipe') . '</a>',
                            'default' => 'F j',
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'meal_planner_recipe_details_template',
                            'label' => __('Recipe Details Template', 'wp-ultimate-recipe'),
                            'description' => __( 'The template to use for recipe details.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_templates',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '96',
                            ),
                            'validation' => 'required',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Courses', 'wp-ultimate-recipe'),
                    'name' => 'section_meal_planner_courses',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'meal_plan_courses_use_custom',
                            'label' => __('Use Custom Courses', 'wp-ultimate-recipe'),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'multiselect',
                            'name' => 'meal_planner_default_courses',
                            'label' => __('Default Courses', 'wp-ultimate-recipe'),
                            'description' => __( 'Default courses to show in the menu.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                array(
                                    'value' => __( 'Breakfast', 'wp-ultimate-recipe' ),
                                    'label' => __( 'Breakfast', 'wp-ultimate-recipe' ),
                                ),
                                array(
                                    'value' => __( 'Lunch', 'wp-ultimate-recipe' ),
                                    'label' => __( 'Lunch', 'wp-ultimate-recipe' ),
                                ),
                                array(
                                    'value' => __( 'Snack', 'wp-ultimate-recipe' ),
                                    'label' => __( 'Snack', 'wp-ultimate-recipe' ),
                                ),
                                array(
                                    'value' => __( 'Dinner', 'wp-ultimate-recipe' ),
                                    'label' => __( 'Dinner', 'wp-ultimate-recipe' ),
                                ),
                                array(
                                    'value' => __( 'Dessert', 'wp-ultimate-recipe' ),
                                    'label' => __( 'Dessert', 'wp-ultimate-recipe' ),
                                ),
                            ),
                            'default' => array(
                                __( 'Breakfast', 'wp-ultimate-recipe' ),
                                __( 'Lunch', 'wp-ultimate-recipe' ),
                                __( 'Dinner', 'wp-ultimate-recipe' ),
                            ),
                            'dependency' => array(
                                'field' => 'meal_plan_courses_use_custom',
                                'function' => 'vp_dep_boolean_inverse',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_plan_courses_custom_1',
                            'label' => __('Default Course', 'wp-ultimate-recipe') . ' 1',
                            'description' => __('Leave blank to hide.', 'wp-ultimate-recipe'),
                            'default' => __('Breakfast', 'wp-ultimate-recipe'),
                            'dependency' => array(
                                'field' => 'meal_plan_courses_use_custom',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_plan_courses_custom_2',
                            'label' => __('Default Course', 'wp-ultimate-recipe') . ' 2',
                            'description' => __('Leave blank to hide.', 'wp-ultimate-recipe'),
                            'default' => __('Lunch', 'wp-ultimate-recipe'),
                            'dependency' => array(
                                'field' => 'meal_plan_courses_use_custom',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_plan_courses_custom_3',
                            'label' => __('Default Course', 'wp-ultimate-recipe') . ' 3',
                            'description' => __('Leave blank to hide.', 'wp-ultimate-recipe'),
                            'default' => __('Snack', 'wp-ultimate-recipe'),
                            'dependency' => array(
                                'field' => 'meal_plan_courses_use_custom',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_plan_courses_custom_4',
                            'label' => __('Default Course', 'wp-ultimate-recipe') . ' 4',
                            'description' => __('Leave blank to hide.', 'wp-ultimate-recipe'),
                            'default' => __('Dinner', 'wp-ultimate-recipe'),
                            'dependency' => array(
                                'field' => 'meal_plan_courses_use_custom',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_plan_courses_custom_5',
                            'label' => __('Default Course', 'wp-ultimate-recipe') . ' 5',
                            'description' => __('Leave blank to hide.', 'wp-ultimate-recipe'),
                            'default' => __('Dessert', 'wp-ultimate-recipe'),
                            'dependency' => array(
                                'field' => 'meal_plan_courses_use_custom',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_plan_courses_custom_6',
                            'label' => __('Default Course', 'wp-ultimate-recipe') . ' 6',
                            'description' => __('Leave blank to hide.', 'wp-ultimate-recipe'),
                            'default' => '',
                            'dependency' => array(
                                'field' => 'meal_plan_courses_use_custom',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_plan_courses_custom_7',
                            'label' => __('Default Course', 'wp-ultimate-recipe') . ' 7',
                            'description' => __('Leave blank to hide.', 'wp-ultimate-recipe'),
                            'default' => '',
                            'dependency' => array(
                                'field' => 'meal_plan_courses_use_custom',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_plan_courses_custom_8',
                            'label' => __('Default Course', 'wp-ultimate-recipe') . ' 8',
                            'description' => __('Leave blank to hide.', 'wp-ultimate-recipe'),
                            'default' => '',
                            'dependency' => array(
                                'field' => 'meal_plan_courses_use_custom',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Per Person Nutrition Facts', 'wp-ultimate-recipe'),
                    'name' => 'section_meal_planner_nutrition',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'meal_plan_nutrition_facts',
                            'label' => __('Show Nutrition Facts', 'wp-ultimate-recipe'),
                            'default' => '0',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Shopping List', 'wp-ultimate-recipe'),
                    'name' => 'section_meal_planner_shopping_list',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'meal_planner_dynamic_unit_system',
                            'label' => __('Unit System Dropdown', 'wp-ultimate-recipe'),
                            'description' => __( 'Users can use a dropdown to select the unit system they want.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'meal_planner_default_unit_system',
                            'label' => __('Default Unit System', 'wp-ultimate-recipe'),
                            'description' => __( 'Unit system to use for the shopping list feature.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_get_unit_systems',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '0',
                            ),
                            'validation' => 'required',
                            'dependency' => array(
                                'field' => 'user_menus_dynamic_unit_system',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'meal_plan_shopping_list_ingredient_notes',
                            'label' => __('Show Ingredient Notes', 'wp-ultimate-recipe'),
                            'description' => __( 'Ingredients with different notes will be handled as different ingredients.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'meal_plan_shopping_list_consolidate_ingredients',
                            'label' => __('Consolidate Ingredients', 'wp-ultimate-recipe'),
                            'description' => __( 'Convert units to be able to consolidate ingredients into 1 line.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'meal_plan_shopping_list_checkboxes',
                            'label' => __('Show Checkboxes', 'wp-ultimate-recipe'),
                            'description' => __( 'Show checkboxes in the shopping list to cross items of the list.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'meal_plan_shopping_list_save',
                            'label' => __('Show Save Button', 'wp-ultimate-recipe'),
                            'description' => __( 'Allow visitors to save the shopping list for mobile usage.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'meal_plan_shopping_list_keyword',
                            'label' => __('Mobile Shopping List Keyword', 'wp-ultimate-recipe'),
                            'description' => __('Keyword used in the URL to get the mobile shopping list.', 'wp-ultimate-recipe'),
                            'default' => 'shopping-list',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'meal_plan_shopping_list_email',
                            'label' => __('Show Email Form', 'wp-ultimate-recipe'),
                            'description' => __( 'Allow visitors to email the shopping list for easy access.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= USER MENUS =-=-=-=-=-=-=
        array(
            'title' => __('User Menus', 'wp-ultimate-recipe'),
            'name' => 'user_menus',
            'icon' => 'font-awesome:fa-list-alt',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('General', 'wp-ultimate-recipe'),
                    'name' => 'section_user_menus_general',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'user_menus_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'user_menus_shortcode',
                            'label' => __('Important', 'wp-ultimate-recipe'),
                            'description' => __('Use the following shortcode to display the front-end form:', 'wp-ultimate-recipe') . ' [ultimate-recipe-user-menus]. '. __('The shortcode can be added to any page or post.', 'wp-ultimate-recipe'),
                            'status' => 'info',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_installed',
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_menus_enable',
                            'label' => __('Enable user menus for', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'off',
                                    'label' => __('Nobody', 'wp-ultimate-recipe') . ' (' . __('disabled', 'wp-ultimate-recipe') . ')',
                                ),
                                array(
                                    'value' => 'guests',
                                    'label' => __('Guests and registered users', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'registered',
                                    'label' => __('Registered users only', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'guests',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_menus_enable_save',
                            'label' => __('Enable user menus save function for', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'off',
                                    'label' => __('Nobody', 'wp-ultimate-recipe') . ' (' . __('disabled', 'wp-ultimate-recipe') . ')',
                                ),
                                array(
                                    'value' => 'guests',
                                    'label' => __('Guests and registered users', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'registered',
                                    'label' => __('Registered users only', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'guests',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_menus_enable_delete',
                            'label' => __('Enable Delete Button', 'wp-ultimate-recipe'),
                            'description' => __( 'Users can delete their own saved menus.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'slider',
                            'name' => 'user_menus_default_servings',
                            'label' => __('Default Servings', 'wp-ultimate-recipe'),
                            'min' => '1',
                            'max' => '10',
                            'step' => '1',
                            'default' => '4',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_menus_ingredient_notes',
                            'label' => __('Show Ingredient Notes', 'wp-ultimate-recipe'),
                            'description' => __( 'Ingredients with different notes will be handled as different ingredients.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_menus_checkboxes',
                            'label' => __('Show Checkboxes', 'wp-ultimate-recipe'),
                            'description' => __( 'Show checkboxes in the shopping list to cross items of the list.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Add to Shopping List Button', 'wp-ultimate-recipe'),
                    'name' => 'section_user_menus_add_to_shopping_list',
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'user_menus_add_to_shopping_list',
                            'label' => __('Show add to shopping list button for', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'off',
                                    'label' => __('Nobody', 'wp-ultimate-recipe') . ' (' . __('disabled', 'wp-ultimate-recipe') . ')',
                                ),
                                array(
                                    'value' => 'guests',
                                    'label' => __('Guests and registered users', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'registered',
                                    'label' => __('Registered users only', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'off',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'add_to_shopping_list_tooltip_text',
                            'label' => __('Add to Shopping List Button Tooltip', 'wp-ultimate-recipe'),
                            'description' => __('Text to show when someone hovers over the button.', 'wp-ultimate-recipe'),
                            'default' => __('Add to Shopping List', 'wp-ultimate-recipe'),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'added_to_shopping_list_tooltip_text',
                            'label' => __('Tooltip after adding', 'wp-ultimate-recipe'),
                            'description' => __('Text to show when someone hovers over the button.', 'wp-ultimate-recipe'),
                            'default' => __('This recipe is in your Shopping List', 'wp-ultimate-recipe'),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'add_to_shopping_list_tooltip_html',
                            'description' => __('You can use HTML to link to the relevant page in the tooltips:', 'wp-ultimate-recipe') . '<br/>' . htmlspecialchars( '<a href="/shopping-list/">Shopping List</a>' ),
                            'status' => 'info',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Unit Systems', 'wp-ultimate-recipe'),
                    'name' => 'section_user_menus_unit_systems',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'user_menus_consolidate_ingredients',
                            'label' => __('Consolidate Ingredients', 'wp-ultimate-recipe'),
                            'description' => __( 'Convert units to be able to consolidate ingredients into 1 line.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_menus_dynamic_unit_system',
                            'label' => __('Unit System Dropdown', 'wp-ultimate-recipe'),
                            'description' => __( 'Users can use a dropdown to select the unit system they want.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        // Dynamic Unit System Selection
                        array(
                            'type' => 'select',
                            'name' => 'user_menus_default_unit_system',
                            'label' => __('Default Unit System', 'wp-ultimate-recipe'),
                            'description' => __( 'Unit system to use for the shopping list feature.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_get_unit_systems',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '0',
                            ),
                            'validation' => 'required',
                            'dependency' => array(
                                'field' => 'user_menus_dynamic_unit_system',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                        // Fixed Unit Systems in table
                        array(
                            'type' => 'slider',
                            'name' => 'user_menus_static_nbr_systems',
                            'label' => __('Number of Systems', 'wp-ultimate-recipe'),
                            'description' => __('Number of unit systems displayed in the shopping list.', 'wp-ultimate-recipe'),
                            'min' => '1',
                            'max' => '3',
                            'step' => '1',
                            'default' => '1',
                            'dependency' => array(
                                'field' => 'user_menus_dynamic_unit_system',
                                'function' => 'vp_dep_boolean_inverse',
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_menus_static_system_1',
                            'label' => __('Unit System', 'wp-ultimate-recipe') . ' 1',
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_get_unit_systems',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '0',
                            ),
                            'validation' => 'required',
                            'dependency' => array(
                                'field' => 'user_menus_dynamic_unit_system',
                                'function' => 'vp_dep_boolean_inverse',
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_menus_static_system_2',
                            'label' => __('Unit System', 'wp-ultimate-recipe') . ' 2',
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_get_unit_systems',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '0',
                            ),
                            'validation' => 'required',
                            'dependency' => array(
                                'field' => 'user_menus_dynamic_unit_system',
                                'function' => 'vp_dep_boolean_inverse',
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_menus_static_system_3',
                            'label' => __('Unit System', 'wp-ultimate-recipe') . ' 3',
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_get_unit_systems',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '0',
                            ),
                            'validation' => 'required',
                            'dependency' => array(
                                'field' => 'user_menus_dynamic_unit_system',
                                'function' => 'vp_dep_boolean_inverse',
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Print Options', 'wp-ultimate-recipe'),
                    'name' => 'section_user_menus_print',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'user_menus_enable_print_list',
                            'label' => __('Print Shopping List Button', 'wp-ultimate-recipe'),
                            'description' => __( 'Show a button to print the shopping list.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_menus_print_with_menu',
                            'label' => __('Include Recipe List', 'wp-ultimate-recipe'),
                            'description' => __( 'Include of list of the recipes in the menu when printing the shopping list.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'user_menus_enable_print_menu',
                            'label' => __('Print Menu Button', 'wp-ultimate-recipe'),
                            'description' => __( 'Show a button to print the entire menu (Shopping list and recipes).', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'user_menus_recipe_print_template',
                            'label' => __('Print Template', 'wp-ultimate-recipe'),
                            'description' => __( 'The default template to use for printed recipes.', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_templates',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '1',
                            ),
                            'validation' => 'required',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Slug', 'wp-ultimate-recipe'),
                    'name' => 'section_user_menus_slug',
                    'fields' => array(
                        array(
                            'type' => 'textbox',
                            'name' => 'user_menus_slug',
                            'label' => __('Slug', 'wp-ultimate-recipe'),
                            'default' => 'menu',
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'user_menus_slug_preview' . $sitehash,
                            'binding' => array(
                                'field'    => 'user_menus_slug',
                                'function' => 'wpurp_admin_user_menus_slug_preview',
                            ),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'user_menus_slug_notebox',
                            'label' => __('404 error/page not found?', 'wp-ultimate-recipe'),
                            'description' => __('Try', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipe.com/docs/404-page-found/" target="_blank">'.__('flushing your permalinks', 'wp-ultimate-recipe').'</a>.',
                            'status' => 'info',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= FAVORITE RECIPES =-=-=-=-=-=-=
        array(
            'title' => __('Favorite Recipes', 'wp-ultimate-recipe'),
            'name' => 'favorite_recipes',
            'icon' => 'font-awesome:fa-heart',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('General', 'wp-ultimate-recipe'),
                    'name' => 'section_favorite_recipes_general',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'favorite_recipes_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'favorite_recipes_shortcode',
                            'label' => __('Important', 'wp-ultimate-recipe'),
                            'description' => __('Use the following shortcode to display the list of favorite recipes:', 'wp-ultimate-recipe') . ' [ultimate-recipe-favorites]. '. __('The shortcode can be added to any page or post.', 'wp-ultimate-recipe'),
                            'status' => 'info',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_installed',
                            ),
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'favorite_recipes_enabled',
                            'label' => __('Enable Button', 'wp-ultimate-recipe'),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'favorite_recipes_tooltip_text',
                            'label' => __('Favorite Recipes Button Tooltip', 'wp-ultimate-recipe'),
                            'description' => __('Text to show when someone hovers over the button.', 'wp-ultimate-recipe'),
                            'default' => __('Add to your Favorite Recipes', 'wp-ultimate-recipe'),
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'favorited_recipes_tooltip_text',
                            'label' => __('Tooltip after adding', 'wp-ultimate-recipe'),
                            'description' => __('Text to show when someone hovers over the button.', 'wp-ultimate-recipe'),
                            'default' => __('This recipe is in your Favorite Recipes', 'wp-ultimate-recipe'),
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'favorite_recipes_tooltip_html',
                            'description' => __('You can use HTML to link to the relevant page in the tooltips:', 'wp-ultimate-recipe') . '<br/>' . htmlspecialchars( '<a href="/favorite-recipes/">Favorite Recipes</a>' ),
                            'status' => 'info',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= NUTRITIONAL INFORMATION =-=-=-=-=-=-=
        array(
            'title' => __('Nutritional Information', 'wp-ultimate-recipe'),
            'name' => 'nutritional_information',
            'icon' => 'font-awesome:fa-tasks',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('General', 'wp-ultimate-recipe'),
                    'name' => 'section_nutritional_information_general',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'nutritional_information_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'nutritional_information_unit',
                            'label' => __('Display Unit', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'calories',
                                    'label' => __( 'Calories', 'wp-ultimate-recipe' ),
                                ),
                                array(
                                    'value' => 'kilojoules',
                                    'label' => __('Kilojoules', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'calories',
                            ),
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'nutritional_information_notice',
                            'label' => __('Show Notice', 'wp-ultimate-recipe'),
                            'description' => __( 'Show notice to update Nutritional Information after updating a recipe.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'nutritional_information_capability',
                            'label' => __('Required role or capability', 'wp-ultimate-recipe'),
                            'description' => __( 'Only users with this role or capability can edit the Nutritional Information.', 'wp-ultimate-recipe' ),
                            'default' => 'manage_options',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= IMPORT RECIPES =-=-=-=-=-=-=
        array(
            'title' => __('Import Recipes', 'wp-ultimate-recipe'),
            'name' => 'import_recipes',
            'icon' => 'font-awesome:fa-upload',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('Import Options', 'wp-ultimate-recipe'),
                    'name' => 'secion_import_recipes_options',
                    'fields' => array(
                        array(
                            'type' => 'textarea',
                            'name' => 'import_recipes_generic_units',
                            'label' => __('Generic ingredient units', 'wp-ultimate-recipe'),
                            'description' => __('Generic ingredient units to recognize while importing. Separate with a ;', 'wp-ultimate-recipe'),
                            'default' => $defaults['import_recipes_generic_units'],
                        ),
                        array(
                            'type' => 'select',
                            'name' => 'import_recipes_order',
                            'label' => __('Import order', 'wp-ultimate-recipe'),
                            'items' => array(
                                array(
                                    'value' => 'ASC',
                                    'label' => __('Import oldest recipes first', 'wp-ultimate-recipe'),
                                ),
                                array(
                                    'value' => 'DESC',
                                    'label' => __('Import latest recipes first', 'wp-ultimate-recipe'),
                                ),
                            ),
                            'default' => array(
                                'ASC',
                            ),
                            'validation' => 'required',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Import From', 'wp-ultimate-recipe'),
                    'name' => 'secion_import_recipes_plugins',
                    'fields' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'import_recipes_premium_not_installed',
                            'label' => 'WP Ultimate Recipe Premium',
                            'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                            'status' => 'warning',
                            'dependency' => array(
                                'field' => '',
                                'function' => 'wpurp_admin_premium_not_installed',
                            ),
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'import_recipes_cooked' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_import_cooked',
                            ),
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'import_recipes_easyrecipe' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_import_easyrecipe',
                            ),
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'import_recipes_recipecard' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_import_recipecard',
                            ),
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'import_recipes_recipress' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_import_recipress',
                            ),
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'import_recipes_yummly' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_import_yummly',
                            ),
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'import_recipes_ziplist' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_import_ziplist',
                            ),
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'import_recipes_xml' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_import_xml',
                            ),
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'import_recipes_xml_ingredients' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_import_xml_ingredients',
                            ),
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'import_recipes_fdx' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_admin_import_fdx',
                            ),
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= EXPORT RECIPES =-=-=-=-=-=-=
        array(
            'title' => __('Export Recipes', 'wp-ultimate-recipe'),
            'name' => 'export_recipes',
            'icon' => 'font-awesome:fa-download',
            'controls' => array(
                array(
                    'type' => 'notebox',
                    'name' => 'export_recipes_premium_not_installed',
                    'label' => 'WP Ultimate Recipe Premium',
                    'description' => __('These features are only available in ', 'wp-ultimate-recipe') . ' <a href="http://www.wpultimaterecipeplugin.com/premium/" target="_blank">WP Ultimate Recipe Premium</a></strong>.',
                    'status' => 'warning',
                    'dependency' => array(
                        'field' => '',
                        'function' => 'wpurp_admin_premium_not_installed',
                    ),
                ),
                array(
                    'type' => 'html',
                    'name' => 'export_recipes_xml' . $sitehash,
                    'binding' => array(
                        'field'    => '',
                        'function' => 'wpurp_admin_export_xml',
                    ),
                ),
                array(
                    'type' => 'toggle',
                    'name' => 'export_recipes_xml_post_id',
                    'label' => __('Include Recipe Post ID', 'wp-ultimate-recipe'),
                    'description' => __( 'Include the Post ID in the export to update a specific post when importing.', 'wp-ultimate-recipe' ),
                    'default' => '0',
                ),
            ),
        ),
//=-=-=-=-=-=-= ADVANCED =-=-=-=-=-=-=
        array(
            'title' => __('Advanced', 'wp-ultimate-recipe'),
            'name' => 'advanced',
            'icon' => 'font-awesome:fa-wrench',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('Recipe', 'wp-ultimate-recipe'),
                    'name' => 'advanced_section_recipe',
                    'fields' => array(
                        array(
                            'type' => 'html',
                            'name' => 'advanced_reset_demo_recipe' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_reset_demo_recipe',
                            ),
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'recipe_as_posts',
                            'label' => __('Recipes act as posts', 'wp-ultimate-recipe'),
                            'description' => __( 'Recipes act like normal posts. For example: they show up on your front page.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'show_recipes_in_posts',
                            'label' => __('Recipes in admin posts', 'wp-ultimate-recipe'),
                            'description' => __( 'Show recipes in admin posts overview when acting as posts.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'remove_recipe_slug',
                            'label' => __('Remove recipe slug', 'wp-ultimate-recipe'),
                            'description' => __( 'Make sure your slugs are unique across posts, pages and recipes! Your archive page will still be available.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'ignore_ingredient_ids',
                            'label' => __('Ignore Ingredient IDs', 'wp-ultimate-recipe'),
                            'description' => __( 'Can be useful when using content copy plugins.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'disable_ingredient_autocomplete',
                            'label' => __('Disable Ingredient Autocomplete', 'wp-ultimate-recipe'),
                            'description' => __( 'Disable the ingredient suggestions when entering them in the recipe form.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Shortcode Editor', 'wp-ultimate-recipe'),
                    'name' => 'advanced_section_shortcode',
                    'fields' => array(
                        array(
                            'type' => 'html',
                            'name' => 'advanced_reset_cache' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'wpurp_reset_cache',
                            ),
                        ),
                        array(
                            'type' => 'multiselect',
                            'name' => 'shortcode_editor_post_types',
                            'label' => __('Show shortcode editor for', 'wp-ultimate-recipe'),
                            'description' => __( 'Where do you want to be able to insert recipes with the shortcode editor?', 'wp-ultimate-recipe' ),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'wpurp_admin_post_types',
                                    ),
                                ),
                            ),
                            'default' => array(
                                '{{all}}',
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Performance', 'wp-ultimate-recipe'),
                    'name' => 'advanced_section_performance',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'overview_show_recipe_thumbnails',
                            'label' => __('Show Thumbnails in Overview', 'wp-ultimate-recipe'),
                            'description' => __( 'Show the recipe thumbnails on the recipe overview page.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'overview_show_recipe_rating',
                            'label' => __('Show Rating in Overview', 'wp-ultimate-recipe'),
                            'description' => __( 'Show the recipe rating on the recipe overview page.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __('Assets', 'wp-ultimate-recipe'),
                    'name' => 'advanced_section_assets',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'assets_use_minified',
                            'label' => __('Use minified assets', 'wp-ultimate-recipe'),
                            'description' => __( 'Use minified assets to improve page load speed.', 'wp-ultimate-recipe' ),
                            'default' => '1',
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'assets_generate_minified',
                            'label' => __('Generate minified assets', 'wp-ultimate-recipe'),
                            'description' => __( 'Generate minified assets on the fly.', 'wp-ultimate-recipe' ),
                            'default' => '0',
                        ),
                        array(
                            'type' => 'textbox',
                            'name' => 'assets_generate_minified_dir',
                            'label' => __('Minified assets directory', 'wp-ultimate-recipe'),
                            'description' => __('Directory to generate the minified assets to. Should be writable.', 'wp-ultimate-recipe'),
                            'default' => '',
                            'dependency' => array(
                                'field' => 'assets_generate_minified',
                                'function' => 'vp_dep_boolean',
                            ),
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= CUSTOM CODE =-=-=-=-=-=-=
        array(
            'title' => __('Custom Code', 'wp-ultimate-recipe'),
            'name' => 'custom_code',
            'icon' => 'font-awesome:fa-code',
            'controls' => array(
                array(
                    'type' => 'codeeditor',
                    'name' => 'custom_code_public_css',
                    'label' => __('Public CSS', 'wp-ultimate-recipe'),
                    'theme' => 'github',
                    'mode' => 'css',
                ),
                array(
                    'type' => 'codeeditor',
                    'name' => 'custom_code_print_css',
                    'label' => __('Print Recipe CSS', 'wp-ultimate-recipe'),
                    'theme' => 'github',
                    'mode' => 'css',
                ),
                array(
                    'type' => 'codeeditor',
                    'name' => 'custom_code_print_shoppinglist_css',
                    'label' => __('Print Meal Plan & Shopping List CSS', 'wp-ultimate-recipe'),
                    'theme' => 'github',
                    'mode' => 'css',
                ),
            ),
        ),
    ),
);