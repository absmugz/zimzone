<?php
// Recipe should never be null. Construct just allows easy access to WPURP_Recipe functions in IDE.
if( is_null( $recipe ) ) $recipe = new WPURP_Recipe(0);
if( !isset( $required_fields ) ) $required_fields = array();
?>

<script>
    function autoSuggestTag(id, type) {
        <?php if( WPUltimateRecipe::option( 'disable_ingredient_autocomplete', '' ) !== '1' ) { ?>
        jQuery('#' + id).suggest("<?php echo get_bloginfo( 'wpurl' ); ?>/wp-admin/admin-ajax.php?action=ajax-tag-search&tax=" + type);
        <?php } ?>
    }
</script>
<input type="hidden" name="recipe_meta_box_nonce" value="<?php echo wp_create_nonce( 'recipe' ); ?>" />
<div class="recipe-general-container">
    <h4><?php _e( 'General', 'wp-ultimate-recipe' ); ?></h4>
    <table class="recipe-general-form">
    <?php if( !isset( $wpurp_user_submission ) ) { ?>
        <?php if( WPUltimateRecipe::is_premium_active() ) { ?>
        <tr class="recipe-general-form-template">
            <td class="recipe-general-form-label"><label for="recipe_custom_template"><?php _e( 'Template', 'wp-ultimate-recipe' ); ?></label></td>
            <td class="recipe-general-form-field">
                <select name="recipe_custom_template" id="recipe_custom_template">
                    <?php
                    $recipe_template = $recipe->template();
                    $templates = WPUltimateRecipe::addon( 'custom-templates' )->get_mapping();
                    ?>
                    <option value="default"<?php echo $recipe_template == 'default' ? ' selected' : '';?>><?php _e( 'Use default template from settings', 'wp-ultimate-recipe' ); ?></option>
                    <?php
                    foreach ( $templates as $index => $template ) {
                        $selected = $recipe_template != 'default' && $recipe_template == $index ? ' selected' : '';
                        echo '<option value="' . $index . '"' . $selected. '>' . $template . '</option>';
                    } ?>
                </select>
            </td>
        </tr>
        <?php } ?>
        <tr class="recipe-general-form-title">
            <td class="recipe-general-form-label"><label for="recipe_title"><?php _e( 'Title', 'wp-ultimate-recipe' ); ?></label></td>
            <td class="recipe-general-form-field">
                <input type="text" name="recipe_title" id="recipe_title" value="<?php echo esc_attr( $recipe->title() ); ?>" />
                <span class="recipe-general-form-notes"> <?php _e( '(leave blank to use post title)', 'wp-ultimate-recipe' ) ?></span>
            </td>
        </tr>
        <?php if( WPUltimateRecipe::option( 'recipe_alternate_image', '1' ) == '1' ) { ?>
        <tr class="recipe-general-form-alternate-image">
            <td class="recipe-general-form-label"><label for="recipe_alternate_image"><?php _e( 'Image', 'wp-ultimate-recipe' ); ?></label></td>
            <td class="recipe-general-form-field">
                <input type="hidden" name="recipe_alternate_image" id="recipe_alternate_image"  value="<?php echo $recipe->alternate_image(); ?>" />
                <input class="recipe_alternate_image_add button <?php if( $recipe->alternate_image() ) { echo ' wpurp-hide'; } ?>" rel="<?php echo $recipe->ID(); ?>" type="button" value="<?php _e( 'Add Alternate Image', 'wp-ultimate-recipe' ); ?>" />
                <input class="recipe_alternate_image_remove button<?php if( !$recipe->alternate_image() ) { echo ' wpurp-hide'; } ?>" type="button" value="<?php _e('Remove Alternate Image', 'wp-ultimate-recipe' ); ?>" />

                <br/><img src="<?php echo $recipe->alternate_image() ? $recipe->image_url( 'thumbnail' ) : WPUltimateRecipe::get()->coreUrl . '/img/image_placeholder.png'; ?>" class="recipe_alternate_image" />
                <span class="recipe-general-form-notes"> <?php _e( '(leave blank to use featured image)', 'wp-ultimate-recipe' ); ?></span>
            </td>
        </tr>
        <?php } ?>
    <?php } ?>
        <tr class="recipe-general-form-description">
            <td class="recipe-general-form-label"><label for="recipe_description"><?php _e('Description', 'wp-ultimate-recipe' ); ?><?php if( in_array( 'recipe_description', $required_fields ) ) echo '<span class="wpurp-required">*</span>'; ?></label></td>
            <td class="recipe-general-form-field">
                <textarea name="recipe_description" id="recipe_description" rows="4"><?php echo esc_html( $recipe->description() ); ?></textarea>
            </td>
        </tr>
        <tr class="recipe-general-form-rating">
            <td class="recipe-general-form-label"><label for="recipe_rating"><?php _e( 'Rating', 'wp-ultimate-recipe' ); ?></label></td>
            <td class="recipe-general-form-field">
                <select name="recipe_rating" id="recipe_rating">
                    <?php
                    for ( $i = 0; $i <= 5; $i ++ ) {
                    ?>
                    <option value="<?php echo $i; ?>" <?php echo selected( $i, $recipe->rating_author() ); ?>>
                        <?php echo $i == 1 ? $i .' '. __( 'star', 'wp-ultimate-recipe' ) : $i .' '. __( 'stars', 'wp-ultimate-recipe' ); ?>
                    </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr class="recipe-general-form-servings">
            <td class="recipe-general-form-label"><label for="recipe_servings"><?php _e( 'Servings', 'wp-ultimate-recipe' ); ?><?php if( in_array( 'recipe_servings', $required_fields ) ) echo '<span class="wpurp-required">*</span>'; ?></label></td>
            <td class="recipe-general-form-field">
                <input type="text" name="recipe_servings" id="recipe_servings" value="<?php echo esc_attr( $recipe->servings() ); ?>" />
                <input type="text" name="recipe_servings_type" id="recipe_servings_type" value="<?php echo esc_attr( $recipe->servings_type() ); ?>" />
                <span class="recipe-general-form-notes"> <?php _e( '(e.g. 2 people, 3 loafs, ...)', 'wp-ultimate-recipe' ); ?></span>
            </td>
        </tr>
        <tr class="recipe-general-form-prep-time">
            <td class="recipe-general-form-label"><label for="recipe_prep_time"><?php _e( 'Prep Time', 'wp-ultimate-recipe' ); ?><?php if( in_array( 'recipe_prep_time', $required_fields ) ) echo '<span class="wpurp-required">*</span>'; ?></label></td>
            <td class="recipe-general-form-field">
                <input type="text" name="recipe_prep_time" id="recipe_prep_time" value="<?php echo esc_attr( $recipe->prep_time() ); ?>" />
                <input type="text" name="recipe_prep_time_text" id="recipe_prep_time_text" value="<?php echo esc_attr( $recipe->prep_time_text() ); ?>" />
                <span class="recipe-general-form-notes"> <?php _e( '(e.g. 20 minutes, 1-2 hours, ...)', 'wp-ultimate-recipe' ); ?></span>
            </td>
        </tr>
        <tr class="recipe-general-form-cook-time">
            <td class="recipe-general-form-label"><label for="recipe_cook_time"><?php _e( 'Cook Time', 'wp-ultimate-recipe' ); ?><?php if( in_array( 'recipe_cook_time', $required_fields ) ) echo '<span class="wpurp-required">*</span>'; ?></label></td>
            <td class="recipe-general-form-field">
                <input type="text" name="recipe_cook_time" id="recipe_cook_time" value="<?php echo esc_attr( $recipe->cook_time() ); ?>" />
                <input type="text" name="recipe_cook_time_text" id="recipe_cook_time_text" value="<?php echo esc_attr( $recipe->cook_time_text() ); ?>" />
            </td>
        </tr>
        <tr class="recipe-general-form-passive-time">
            <td class="recipe-general-form-label"><label for="recipe_passive_time"><?php _e( 'Passive Time', 'wp-ultimate-recipe' ); ?><?php if( in_array( 'recipe_passive_time', $required_fields ) ) echo '<span class="wpurp-required">*</span>'; ?></label></td>
            <td class="recipe-general-form-field">
                <input type="text" name="recipe_passive_time" id="recipe_passive_time" value="<?php echo esc_attr( $recipe->passive_time() ); ?>" />
                <input type="text" name="recipe_passive_time_text" id="recipe_passive_time_text" value="<?php echo esc_attr( $recipe->passive_time_text() ); ?>" />
            </td>
        </tr>
    <?php if( !isset( $wpurp_user_submission ) ) { ?>
        <tr>
            <td class="recipe-general-form-label">&nbsp;</td>
            <td class="recipe-general-form-field recipe-form-notes">
                <?php _e( "Don't forget that you can tag your recipe with <strong>Courses</strong> and <strong>Cuisines</strong> by using the boxes on the right. Use the <strong>featured image</strong> if you want a photo of the finished dish.", 'wp-ultimate-recipe' ) ?>
            </td>
        </tr>
    <?php } ?>
    </table>
</div>

<div class="recipe-ingredients-container">
    <h4><?php _e( 'Ingredients', 'wp-ultimate-recipe' ); ?></h4>
    <?php $ingredients = $recipe->ingredients(); ?>
    <table id="recipe-ingredients">
        <thead>
        <tr class="ingredient-group ingredient-group-first">
            <td>&nbsp;</td>
            <td><strong><?php _e( 'Group', 'wp-ultimate-recipe' ); ?>:</strong></td>
            <td colspan="2">
                <span class="ingredient-groups-disabled"><?php echo __( 'Main Ingredients', 'wp-ultimate-recipe' ) . ' ' . __( '(this label is not shown)', 'wp-ultimate-recipe' ); ?></span>
                <?php
                $previous_group = '';
                if( isset( $ingredients[0] ) && isset( $ingredients[0]['group'] ) ) {
                    $previous_group = $ingredients[0]['group'];
                }
                ?>
                <span class="ingredient-groups-enabled"><input type="text" class="ingredient-group-label" value="<?php echo esc_attr( $previous_group ); ?>" /></span>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="ingredient-field-header">
            <td>&nbsp;</td>
            <td><?php _e( 'Quantity', 'wp-ultimate-recipe' ); ?></td>
            <td><?php _e( 'Unit', 'wp-ultimate-recipe' ); ?></td>
            <td><?php _e( 'Ingredient', 'wp-ultimate-recipe' ); ?> <span class="wpurp-required">(<?php _e( 'required', 'wp-ultimate-recipe' ); ?>)</span></td>
            <td><?php _e( 'Notes', 'wp-ultimate-recipe' ); ?></td>
        </tr>
        </thead>
        <tbody>
        <tr class="ingredient-group-stub">
            <td>&nbsp;</td>
            <td><strong><?php _e( 'Group', 'wp-ultimate-recipe' ); ?>:</strong></td>
            <td colspan="2"><input type="text" class="ingredient-group-label" /></td>
            <td>&nbsp;</td>
            <td class="center-column"><span class="ingredient-group-delete"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/minus.png" width="16" height="16"></span></td>
        </tr>
        <?php
        $i = 0;
        if( $ingredients )
        {
            foreach( $ingredients as $ingredient ) {

                if( WPUltimateRecipe::option( 'ignore_ingredient_ids', '' ) != '1' && isset( $ingredient['ingredient_id'] ) ) {
                    $term = get_term( $ingredient['ingredient_id'], 'ingredient' );
                    if ( $term !== null && !is_wp_error( $term ) ) {
                        $ingredient['ingredient'] = $term->name;
                    }
                }

                if( !isset( $ingredient['group'] ) ) {
                    $ingredient['group'] = '';
                }

                if( $ingredient['group'] != $previous_group ) { ?>
                    <tr class="ingredient-group">
                        <td>&nbsp;</td>
                        <td><strong><?php _e( 'Group', 'wp-ultimate-recipe' ); ?>:</strong></td>
                        <td colspan="2"><input type="text" class="ingredient-group-label" value="<?php echo esc_attr( $ingredient['group'] ); ?>" /></td>
                        <td>&nbsp;</td>
                        <td class="center-column"><span class="ingredient-group-delete"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/minus.png" width="16" height="16"></span></td>
                    </tr>
                    <?php
                    $previous_group = $ingredient['group'];
                }
                ?>
                <tr class="ingredient">
                    <td class="sort-handle"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/arrows.png" width="18" height="16"></td>
                    <td><input type="text"   name="recipe_ingredients[<?php echo $i; ?>][amount]"     class="ingredients_amount" id="ingredients_amount_<?php echo $i; ?>" value="<?php echo esc_attr( $ingredient['amount'] ); ?>" /></td>
                    <td><input type="text"   name="recipe_ingredients[<?php echo $i; ?>][unit]"       class="ingredients_unit" id="ingredients_unit_<?php echo $i; ?>" value="<?php echo esc_attr( $ingredient['unit'] ); ?>" /></td>
                    <td><input type="text"   name="recipe_ingredients[<?php echo $i; ?>][ingredient]" class="ingredients_name" id="ingredients_<?php echo $i; ?>" onfocus="autoSuggestTag('ingredients_<?php echo $i; ?>', 'ingredient');"  value="<?php echo esc_attr( $ingredient['ingredient'] ); ?>" /></td>
                    <td>
                        <input type="text"   name="recipe_ingredients[<?php echo $i; ?>][notes]"      class="ingredients_notes" id="ingredient_notes_<?php echo $i; ?>" value="<?php echo esc_attr( $ingredient['notes'] ); ?>" />
                        <input type="hidden" name="recipe_ingredients[<?php echo $i; ?>][group]"      class="ingredients_group" id="ingredient_group_<?php echo $i; ?>" value="<?php echo esc_attr( $ingredient['group'] ); ?>" />
                    </td>
                    <td><span class="ingredients-delete"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/minus.png" width="16" height="16"></span></td>
                </tr>
                <?php
                $i++;
            }

        }
        ?>
        <tr class="ingredient">
            <td class="sort-handle"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/arrows.png" width="18" height="16"></td>
            <td><input type="text"   name="recipe_ingredients[<?php echo $i; ?>][amount]"     class="ingredients_amount" id="ingredients_amount_<?php echo $i; ?>"<?php if($i == 0) { echo 'placeholder="1"'; } ?> /></td>
            <td><input type="text"   name="recipe_ingredients[<?php echo $i; ?>][unit]"       class="ingredients_unit" id="ingredients_unit_<?php echo $i; ?>"<?php if($i == 0) { echo 'placeholder="' . __( 'tbsp', 'wp-ultimate-recipe' ) . '"'; } ?> /></td>
            <td>
                <?php if( isset( $wpurp_user_submission ) && WPUltimateRecipe::option( 'user_submission_ingredient_list', '0' ) == '1' ) { ?>
                    <select name="recipe_ingredients[<?php echo $i; ?>][ingredient]" class="ingredients_name_list" id="ingredients_<?php echo $i; ?>">
                        <option value=""><?php _e( 'Select an ingredient', 'wp-ultimate-recipe' ); ?></option>
                        <?php
                        $args = array(
                            'orderby'       => 'name',
                            'order'         => 'ASC',
                            'hide_empty'    => false,
                        );
                        $ingredient_terms = get_terms( 'ingredient', $args );

                        foreach( $ingredient_terms as $term )
                        {
                            ?>
                            <option value="<?php echo esc_attr( $term->name ); ?>"><?php echo $term->name; ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <input type="text"   name="recipe_ingredients[<?php echo $i; ?>][ingredient]" class="ingredients_name" id="ingredients_<?php echo $i; ?>" onfocus="autoSuggestTag('ingredients_<?php echo $i; ?>', 'ingredient');"<?php if($i == 0) { echo 'placeholder="' . __( 'olive oil', 'wp-ultimate-recipe' ) . '"'; } ?> />
                <?php } ?>
            </td>
            <td>
                <input type="text"   name="recipe_ingredients[<?php echo $i; ?>][notes]"      class="ingredients_notes" id="ingredient_notes_<?php echo $i; ?>"<?php if($i == 0) { echo 'placeholder="' . __( 'extra virgin', 'wp-ultimate-recipe' ) . '"'; } ?> />
                <input type="hidden" name="recipe_ingredients[<?php echo $i; ?>][group]"    class="ingredients_group" id="ingredient_group_<?php echo $i; ?>" value="" />
            </td>
            <td><span class="ingredients-delete"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/minus.png" width="16" height="16"></span></td>
        </tr>
        </tbody>
    </table>
    <div id="ingredients-add-box">
        <a href="#" id="ingredients-add"><?php _e( 'Add an ingredient', 'wp-ultimate-recipe' ); ?></a>
    </div>
    <div id="ingredients-add-group-box">
        <a href="#" id="ingredients-add-group"><?php _e( 'Add an ingredient group', 'wp-ultimate-recipe' ); ?></a>
    </div>
    <div class="recipe-form-notes">
        <?php _e( "<strong>Use the TAB key</strong> while adding ingredients, it will automatically create new fields. <strong>Don't worry about empty lines</strong>, these will be ignored.", 'wp-ultimate-recipe' ); ?>
    </div>
</div>

<div class="recipe-instructions-container">
    <h4><?php _e( 'Instructions', 'wp-ultimate-recipe' ); ?></h4>
    <?php $instructions = $recipe->instructions(); ?>
    <table id="recipe-instructions">
        <thead>
        <tr class="instruction-group instruction-group-first">
            <td>&nbsp;</td>
            <td colspan="2">
                <strong><?php _e( 'Group', 'wp-ultimate-recipe' ); ?>:</strong>
                <span class="instruction-groups-disabled"><?php echo __( 'Main Instructions', 'wp-ultimate-recipe' ) . ' ' . __( '(this label is not shown)', 'wp-ultimate-recipe' ); ?></span>
                <?php
                $previous_group = '';
                if( isset( $instructions[0] ) && isset( $instructions[0]['group'] ) ) {
                    $previous_group = $instructions[0]['group'];
                }
                ?>
                <span class="instruction-groups-enabled"><input type="text" class="instruction-group-label" value="<?php echo esc_attr( $previous_group ); ?>"/></span>
            </td>
            <td>&nbsp;</td>
        </tr>
        </thead>
        <tbody>
        <tr class="instruction-group-stub">
            <td>&nbsp;</td>
            <td colspan="2">
                <strong><?php _e( 'Group', 'wp-ultimate-recipe' ); ?>:</strong>
                <input type="text" class="instruction-group-label" />
            </td>
            <td class="center-column"><span class="instruction-group-delete"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/minus.png" width="16" height="16"></span></td>
        </tr>
    <?php
    $i = 0;

    if( $instructions )
    {
        foreach( $instructions as $instruction ) {
            if( !isset( $instruction['group'] ) ) {
                $instruction['group'] = '';
            }

            if( $instruction['group'] != $previous_group )
            { ?>
                <tr class="instruction-group">
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <strong><?php _e( 'Group', 'wp-ultimate-recipe' ); ?>:</strong>
                        <input type="text" class="instruction-group-label" value="<?php echo esc_attr( $instruction['group'] ); ?>"/>
                    </td>
                    <td class="center-column"><span class="instruction-group-delete"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/minus.png" width="16" height="16"></span></td>
                </tr>
    <?php
                $previous_group = $instruction['group'];
            }

            if( !isset( $instruction['image'] ) ) {
                $instruction['image'] = '';
            }

            if( $instruction['image'] )
            {
                $image = wp_get_attachment_image_src( $instruction['image'], 'thumbnail' );
                $image = $image[0];
                $has_image = true;
            }
            else
            {
                $image = WPUltimateRecipe::get()->coreUrl . '/img/image_placeholder.png';
                $has_image = false;
            }
            ?>
            <tr class="instruction">
                <td class="sort-handle"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/arrows.png" width="18" height="16"></td>
                <td>
                    <textarea name="recipe_instructions[<?php echo $i; ?>][description]" rows="4" id="ingredient_description_<?php echo $i; ?>"><?php echo $instruction['description']; ?></textarea>
                    <input type="hidden" name="recipe_instructions[<?php echo $i; ?>][group]"    class="instructions_group" id="instruction_group_<?php echo $i; ?>" value="<?php echo esc_attr( $instruction['group'] ); ?>" />
                <?php if ( isset( $wpurp_user_submission ) && ( !current_user_can( 'upload_files' ) || WPUltimateRecipe::option( 'user_submission_use_media_manager', '1' ) != '1' ) ) { ?>
                    <?php _e( 'Instruction Step Image', 'wp-ultimate-recipe' ); ?>:<br/>
                    <?php if( $has_image ) { ?>
                    <img src="<?php echo $image; ?>" class="recipe_instructions_thumbnail" />
                    <input type="hidden" value="<?php echo $instruction['image']; ?>" name="recipe_instructions[<?php echo $i; ?>][image]" /><br/>
                    <?php } ?>
                    <input class="recipe_instructions_image button" type="file" id="recipe_thumbnail" value="" size="50" name="recipe_thumbnail_<?php echo $i; ?>" />
                </td>
                <?php } else { ?>
                </td>
                <td>
                    <input name="recipe_instructions[<?php echo $i; ?>][image]" class="recipe_instructions_image" type="hidden" value="<?php echo $instruction['image']; ?>" />
                    <input class="recipe_instructions_add_image button<?php if($has_image) { echo ' wpurp-hide'; } ?>" rel="<?php echo $recipe->ID(); ?>" type="button" value="<?php _e( 'Add Image', 'wp-ultimate-recipe' ) ?>" />
                    <input class="recipe_instructions_remove_image button<?php if(!$has_image) { echo ' wpurp-hide'; } ?>" type="button" value="<?php _e( 'Remove Image', 'wp-ultimate-recipe' ) ?>" />
                    <br /><img src="<?php echo $image; ?>" class="recipe_instructions_thumbnail" />
                    <?php } ?>
                </td>
                <td><span class="instructions-delete"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/minus.png" width="16" height="16"></span></td>
            </tr>
            <?php
            $i++;
        }

    }

    $image = WPUltimateRecipe::get()->coreUrl . '/img/image_placeholder.png';
    ?>
            <tr class="instruction">
                <td class="sort-handle"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/arrows.png" width="18" height="16"></td>
                <td>
                    <textarea name="recipe_instructions[<?php echo $i; ?>][description]" rows="4" id="ingredient_description_<?php echo $i; ?>"></textarea>
                    <input type="hidden" name="recipe_instructions[<?php echo $i; ?>][group]"    class="instructions_group" id="instruction_group_<?php echo $i; ?>" value="" />
                    <?php if ( isset( $wpurp_user_submission ) && ( !current_user_can( 'upload_files' ) || WPUltimateRecipe::option( 'user_submission_use_media_manager', '1' ) != '1' ) ) { ?>
                        <?php _e( 'Instruction Step Image', 'wp-ultimate-recipe' ); ?>:<br/>
                        <input class="recipe_instructions_image button" type="file" id="recipe_thumbnail" value="" size="50" name="recipe_thumbnail_<?php echo $i; ?>" />
                        </td>
                    <?php } else { ?>
                </td>
                <td>

                    <input name="recipe_instructions[<?php echo $i; ?>][image]" class="recipe_instructions_image" type="hidden" value="" />
                    <input class="recipe_instructions_add_image button" rel="<?php echo $recipe->ID(); ?>" type="button" value="<?php _e('Add Image', 'wp-ultimate-recipe' ) ?>" />
                    <input class="recipe_instructions_remove_image button wpurp-hide" type="button" value="<?php _e( 'Remove Image', 'wp-ultimate-recipe' ) ?>" />
                    <br /><img src="<?php echo $image; ?>" class="recipe_instructions_thumbnail" />
                    <?php } ?>
                </td>
                <td><span class="instructions-delete"><img src="<?php echo WPUltimateRecipe::get()->coreUrl; ?>/img/minus.png" width="16" height="16"></span></td>
            </tr>
        </tbody>
    </table>

    <div id="ingredients-add-box">
        <a href="#" id="instructions-add"><?php _e( 'Add an instruction', 'wp-ultimate-recipe' ); ?></a>
    </div>
    <div id="ingredients-add-group-box">
        <a href="#" id="instructions-add-group"><?php _e( 'Add an instruction group', 'wp-ultimate-recipe' ); ?></a>
    </div>
    <div class="recipe-form-notes">
        <?php _e( "<strong>Use the TAB key</strong> while adding instructions, it will automatically create new fields. <strong>Don't worry about empty lines</strong>, these will be ignored.", 'wp-ultimate-recipe' ); ?>
    </div>
</div>

<div class="recipe-notes-container">
    <h4><?php _e( 'Recipe notes', 'wp-ultimate-recipe' ) ?></h4>
    <?php
    $options = array(
        'textarea_rows' => 7
    );

    if( isset( $wpurp_user_submission ) ) {
        $options['media_buttons'] = false;
    }

    wp_editor( $recipe->notes(), 'recipe_notes',  $options );
    ?>
</div>
<?php
$custom_fields_addon = WPUltimateRecipe::addon( 'custom-fields' );
if( $custom_fields_addon && ( !isset( $wpurp_user_submission ) || WPUltimateRecipe::option( 'recipe_fields_in_user_submission', '1' ) == '1' ) )
{
    $custom_fields = $custom_fields_addon->get_custom_fields();
    $custom_fields_in_user_submission = WPUltimateRecipe::option( 'recipe_fields_user_submission', array_keys( $custom_fields ) );

    if( count( $custom_fields ) > 0 ) {
?>
<div class="recipe-custom-fields-container">
    <h4><?php _e( 'Custom Fields', 'wp-ultimate-recipe' ) ?></h4>
    <table class="recipe-general-form">
        <?php foreach( $custom_fields as $key => $custom_field ) {
            if( isset( $wpurp_user_submission ) && !in_array( $key, $custom_fields_in_user_submission ) ) continue;
            ?>
            <tr>
                <td class="recipe-general-form-label"><label for="<?php echo $key; ?>"><?php echo $custom_field['name']; ?><?php if( in_array( $key, $required_fields ) ) echo '<span class="wpurp-required">*</span>'; ?></label></td>
                <td class="recipe-general-form-field">
                    <textarea name="<?php echo $key; ?>" id="<?php echo $key; ?>" rows="1"><?php echo $recipe->custom_field( $key ); ?></textarea>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<?php }
} ?>