<?php

class WPURP_Template_Block {

    public $type;
    public $children = array();
    public $settings = array();
    public $style = array();
    public $conditions = array();
    public $classes = array();

    // Relative block position
    public $parent;
    public $row;
    public $column;
    public $order;

    // Max block size
    public $max_width;
    public $max_height;

    // Responsive condition
    protected $show_on_desktop = true;
    protected $show_on_mobile = true;

    // Hover conditions
    public $show_on_hover = false;
    public $hide_on_hover = false;
    public $hover_in_transition = 'instant';
    public $hover_out_transition = 'instant';
    public $hover_in_time = 0;
    public $hover_out_time = 0;

    // Special cases
    protected $link_color = false;
    protected $background_preset = false;
    protected $cut_off = false;

    public function __construct( $type )
    {
        $this->type = $type;
    }

    /*
     * Children
     */

    public function add_child( $block )
    {
        $this->children[$block->row][$block->column][] = $block;
    }

    public function output_children_string( $recipe, $row = 0, $column = 0, $args = array() )
    {
        $output = '';

        if( isset( $this->children[$row][$column] ) ) {
            foreach( $this->children[$row][$column] as $child )
            {
                $output .= $child->output( $recipe, $args );
            }
        }

        return $output;
    }

    public function output_children( $recipe, $row = 0, $column = 0, $args = array() )
    {
        echo $this->output_children_string( $recipe, $row, $column, $args );
    }

    /*
     * Settings
     */

    public function add_settings( $block )
    {
        $this->settings = $block;

        /*
         * Styling
         */

        // Positioning
        if( $this->present( $block, 'float' )  && $block->float != 'none' ) $this->add_style( 'float', $block->float );
        if( $this->present( $block, 'center' ) && $block->center ) $this->add_style( 'margin', '0 auto' );
        if( $this->present( $block, 'marginTop' ) )     $this->add_style( 'margin-top',       $block->marginTop . 'px' );
        if( $this->present( $block, 'marginBottom' ) )  $this->add_style( 'margin-bottom',    $block->marginBottom . 'px' );
        if( $this->present( $block, 'marginLeft' ) )    $this->add_style( 'margin-left',      $block->marginLeft . 'px' );
        if( $this->present( $block, 'marginRight' ) )   $this->add_style( 'margin-right',     $block->marginRight . 'px' );

        if( $this->present( $block, 'paddingTop' ) )    $this->add_style( 'padding-top',      $block->paddingTop . 'px' );
        if( $this->present( $block, 'paddingBottom' ) ) $this->add_style( 'padding-bottom',   $block->paddingBottom . 'px' );
        if( $this->present( $block, 'paddingLeft' ) )   $this->add_style( 'padding-left',     $block->paddingLeft . 'px' );
        if( $this->present( $block, 'paddingRight' ) )  $this->add_style( 'padding-right',    $block->paddingRight . 'px' );
        if( $this->present( $block, 'paddingTop' ) )    $this->add_style( 'padding-top',      $block->paddingTop . 'px', 'td' );
        if( $this->present( $block, 'paddingBottom' ) ) $this->add_style( 'padding-bottom',   $block->paddingBottom . 'px', 'td' );
        if( $this->present( $block, 'paddingLeft' ) )   $this->add_style( 'padding-left',     $block->paddingLeft . 'px', 'td' );
        if( $this->present( $block, 'paddingRight' ) )  $this->add_style( 'padding-right',    $block->paddingRight . 'px', 'td' );

        if( $this->present( $block, 'width' ) )     $this->add_style( 'width', $block->width . $block->widthType );
        if( $this->present( $block, 'height' ) )    $this->add_style( 'height', $block->height . $block->heightType );
        if( $this->present( $block, 'maxWidth' ) )  $this->add_style( 'max-width', $block->maxWidth . $block->maxWidthType );
        if( $this->present( $block, 'maxHeight' ) ) $this->add_style( 'max-height', $block->maxHeight . $block->maxHeightType );
        if( $this->present( $block, 'minWidth' ) )  $this->add_style( 'min-width', $block->minWidth . $block->minWidthType );
        if( $this->present( $block, 'minHeight' ) ) $this->add_style( 'min-height', $block->minHeight . $block->minHeightType );

        if( $this->present( $block, 'position' ) ) {
            $this->add_style( 'position',      $block->position );

            if( $block->position != 'static' ) {
                if( $this->present( $block, 'positionTop' ) )    $this->add_style( 'top',      $block->positionTop . 'px' );
                if( $this->present( $block, 'positionBottom' ) ) $this->add_style( 'bottom',   $block->positionBottom . 'px' );
                if( $this->present( $block, 'positionLeft' ) )   $this->add_style( 'left',     $block->positionLeft . 'px' );
                if( $this->present( $block, 'positionRight' ) )  $this->add_style( 'right',    $block->positionRight . 'px' );
            }
        }

        // Block Style
        if( $this->present( $block, 'backgroundPreset' ) ) { $this->background_preset = $block->backgroundPreset; }
        if( $this->present( $block, 'backgroundImage' ) ) $this->add_style( 'background', 'url(' . $block->backgroundImage . ')' );
        if( $this->present( $block, 'backgroundColor' ) ) $this->add_style( 'background-color', $block->backgroundColor );

        if( $this->present( $block, 'borderWidth' ) ) {
            $borderTop =    $this->present( $block, 'borderTop' ) ? $block->borderWidth . 'px' : '0';
            $borderBottom = $this->present( $block, 'borderBottom' ) ? $block->borderWidth . 'px' : '0';
            $borderLeft =   $this->present( $block, 'borderLeft' ) ? $block->borderWidth . 'px' : '0';
            $borderRight =  $this->present( $block, 'borderRight' ) ? $block->borderWidth . 'px' : '0';

            $this->add_style( 'border-width', $borderTop . ' ' . $borderRight . ' ' .$borderBottom . ' ' . $borderLeft );
            if( $this->present( $block, 'borderColor' ) ) $this->add_style( 'border-color', $block->borderColor );
            if( $this->present( $block, 'borderStyle' ) ) $this->add_style( 'border-style', $block->borderStyle );

            $this->add_style( 'border-width', $block->borderWidth . 'px', 'td' );
            if( $this->present( $block, 'borderColor' ) ) $this->add_style( 'border-color', $block->borderColor, 'td' );
            if( $this->present( $block, 'borderStyle' ) ) $this->add_style( 'border-style', $block->borderStyle, 'td' );
        }

        if( $this->present( $block, 'shadowColor' ) && $this->present( $block, 'shadowHorizontal' ) && $this->present( $block, 'shadowVertical' ) )
        {
            $blur = $this->present( $block, 'shadowBlur' ) ? $block->shadowBlur . 'px ' : ' ';
            $spread = $this->present( $block, 'shadowSpread' ) ? $block->shadowSpread . 'px ' : ' ';

            $shadow = $block->shadowHorizontal . 'px ' . $block->shadowVertical . 'px ' . $blur . $spread . $block->shadowColor . ' ' . $block->shadowType;

            $this->add_style( '-webkit-box-shadow', $shadow );
            $this->add_style( '-moz-box-shadow', $shadow );
            $this->add_style( 'box-shadow', $shadow );
        }

        // Text Style
        if( $this->present( $block, 'textAlign' ) && $this->type != 'container' ) {
            $this->add_style( 'text-align',   $block->textAlign );
            $this->add_style( 'text-align',   $block->textAlign, 'td' );
        }
        if( $this->present( $block, 'verticalAlign' ) ) {
            $this->add_style( 'vertical-align',   $block->verticalAlign );
        }

        if( $this->present( $block, 'fontTransform' ) && $block->fontTransform !== 'none' ) {
            $this->add_style( 'text-transform', $block->fontTransform );
        }

        if( $this->present( $block, 'fontBold' ) && $block->fontBold ) {
            $this->add_style( 'font-weight',   'bold' );
            $this->add_style( 'font-weight',   'bold', 'td' );
        }
        if( $this->present( $block, 'fontSmallCaps' ) && $block->fontSmallCaps ) $this->add_style( 'font-variant',  'small-caps' );

        $fontSizeUnit   = $this->present( $block, 'fontSizeUnit' )   ? $block->fontSizeUnit : 'px';
        $lineHeightUnit = $this->present( $block, 'lineHeightUnit' ) ? $block->lineHeightUnit : 'px';

        if( $this->present( $block, 'fontSize' ) )   $this->add_style( 'font-size',   $block->fontSize . $fontSizeUnit );
        if( $this->present( $block, 'lineHeight' ) ) $this->add_style( 'line-height', $block->lineHeight . $lineHeightUnit );
        if( $this->present( $block, 'fontColor' ) )  $this->add_style( 'color',       $block->fontColor );
        if( $this->present( $block, 'linkColor' ) )  $this->link_color = $block->linkColor;

        if( $this->present( $block, 'fontFamilyType' ) && $block->fontFamilyType == 'manual' ) {
            if( $this->present( $block, 'fontFamilyManual' ) ) $this->add_style( 'font-family',       $block->fontFamilyManual );
        }
        if( $this->present( $block, 'fontFamilyType' ) && $block->fontFamilyType == 'gwf' ) {
            if( $this->present( $block, 'fontFamilyGWF' ) ) {
                $font = str_replace( '+',' ', $block->fontFamilyGWF );
                $font .= ', sans-serif';
                $this->add_style( 'font-family', $font );
            }
        }

        /*
         * Hover
         */
        if( $this->present( $block, 'hover' ) ) {
            if( $block->hover == 'show' ) $this->show_on_hover = true;
            if( $block->hover == 'hide' ) $this->hide_on_hover = true;
        }
        if( $this->present( $block, 'hoverInTransition' ) ) $this->hover_in_transition = $block->hoverInTransition;
        if( $this->present( $block, 'hoverOutTransition' ) ) $this->hover_out_transition = $block->hoverOutTransition;
        if( $this->present( $block, 'hoverInTime' ) ) $this->hover_in_time = $block->hoverInTime;
        if( $this->present( $block, 'hoverOutTime' ) ) $this->hover_out_time = $block->hoverOutTime;

        /*
         * Conditions
         */
        if( isset( $block->conditions ) ) {
            foreach( $block->conditions as $condition ) {
                if( ( $condition->condition_type == 'field' || $condition->condition_type == 'custom_field' ) && $this->present( $condition, 'field' ) ) {
                    $this->add_condition( array( 'type' => 'hide', 'condition_type' => 'field', 'field' => $condition->field, 'when' => $condition->when ), $condition->target );
                } else if( $condition->condition_type == 'sub_field' && $this->present( $condition, 'field' ) ) {
                    $this->add_condition( array( 'type' => 'hide', 'condition_type' => 'sub_field', 'field' => $condition->field, 'when' => $condition->when ), $condition->target );
                } else if( $condition->condition_type == 'setting' && $this->present( $condition, 'setting' ) ) {
                    $this->add_condition( array( 'type' => 'hide', 'condition_type' => 'setting', 'setting' => $condition->setting, 'when' => $condition->when ), $condition->target );
                } else if( $condition->condition_type == 'tag' ) {
                    $this->add_condition( array( 'type' => 'hide', 'condition_type' => 'tag', 'when' => $condition->when, 'term' => $condition->term, 'taxonomy' => $condition->taxonomy ), $condition->target );
                } else if( $condition->condition_type == 'responsive' ) {
                    $this->add_condition( array( 'type' => 'hide', 'condition_type' => 'responsive', 'when' => $condition->when ), $condition->target );
                }
            }
        }

        /*
         * Cut off
         */
        if( $this->present( $block, 'shortenText') && $block->shortenText != 'none' ) {
            $this->cut_off = array(
                'type' => $block->shortenText,
                'number' => intval( $block->shortenTextNumber ),
                'after_text' => $block->shortenTextAfter,
            );
        }

        /*
         * Max block size
         */
        if( $this->present( $block, 'maxWidth' ) && $block->maxWidthType == 'px' )      $this->max_width = intval( $block->maxWidth );
        if( $this->present( $block, 'maxHeight' ) && $block->maxHeightType == 'px' )    $this->max_height = intval( $block->maxHeight );
        if( $this->present( $block, 'width' ) && $block->widthType == 'px' )            $this->max_width = intval( $block->width );
        if( $this->present( $block, 'height' ) && $block->heightType == 'px' )          $this->max_height = intval( $block->height );
    }

    protected function present( $block, $field )
    {
        if( is_array( $block ) ) {
            return isset( $block[$field] ) && !is_null( $block[$field] ) && $block[$field] != '';
        } else {
            return isset( $block->{$field} ) && !is_null( $block->{$field} ) && $block->{$field} != '';
        }
    }

    /*
     * Styling
     */

    public function replace_variables( $value )
    {
        switch( $value ) {
            case '%background_color%':
                $value = WPUltimateRecipe::option( 'recipe_template_variable_background_color', '#ffffff' );
                break;
            case '%text_color%':
                $value = WPUltimateRecipe::option( 'recipe_template_variable_text_color', '#1a1a1a' );
                break;
            case '%link_color%':
                $value = WPUltimateRecipe::option( 'recipe_template_variable_link_color', '#3498db' );
                break;
            case '%button_color%':
                $value = WPUltimateRecipe::option( 'recipe_template_variable_button_color', '#3498db' );
                break;
            case '%highlight_color%':
                $value = WPUltimateRecipe::option( 'recipe_template_variable_highlight_color', '#3498db' );
                break;
            case '%highlight_text_color%':
                $value = WPUltimateRecipe::option( 'recipe_template_variable_highlight_text_color', '#ffffff' );
                break;
        }
        return $value;
    }

    public function add_class( $class )
    {
        $this->classes[] = $class;
    }

    public function add_style( $property, $value, $name = 'default' )
    {
        $this->style[$name][$property] = str_replace( '"', "'", $value );
    }

    private function get_style_string( $name )
    {
        $output = '';

        foreach( $this->style[$name] as $property => $value )
        {
            $output_value = $this->replace_variables( $value );

            if( WPUltimateRecipe::option( 'recipe_template_force_style', '1' ) == '1' ) {
                $output .= $property . ':' . $output_value . ' !important;';
            } else {
                $output .= $property . ':' . $output_value . ';';
            }
        }

        return $output;
    }

    protected function style( $names = 'default' )
    {
        if( !is_array( $names ) ) {
            $names = array( $names );
        }

        $style = '';
        $class = '';

        // Only add inline style if setting is enabled
        if( WPUltimateRecipe::option( 'recipe_template_inline_css', '1' ) == '1' ) {
            foreach( $names as $name )
            {
                if( isset( $this->style[$name] ) ) {
                    $style .= $this->get_style_string( $name );
                }
            }
        }

        // Special Custom styles
        if( in_array( $this->type, array( 'recipe-ingredient-container', 'recipe-instruction-container' ) ) ) {
            if( in_array( 'li', $names ) && $this->present( $this->settings, 'customStyleItem' ) ) {
                $style .= esc_attr( preg_replace( "/\r|\n/", '', $this->settings->customStyleItem ) );
            }
            if( in_array( 'li-odd', $names ) && $this->present( $this->settings, 'customStyleOdd' ) ) {
                $style .= esc_attr( preg_replace( "/\r|\n/", '', $this->settings->customStyleOdd ) );
            }
            if( in_array( 'li-even', $names ) && $this->present( $this->settings, 'customStyleEven' ) ) {
                $style .= esc_attr( preg_replace( "/\r|\n/", '', $this->settings->customStyleEven ) );
            }
            if( in_array( 'li-first', $names ) && $this->present( $this->settings, 'customStyleFirst' ) ) {
                $style .= esc_attr( preg_replace( "/\r|\n/", '', $this->settings->customStyleFirst ) );
            }
            if( in_array( 'li-last', $names ) && $this->present( $this->settings, 'customStyleLast' ) ) {
                $style .= esc_attr( preg_replace( "/\r|\n/", '', $this->settings->customStyleLast ) );
            }
        }

        if( in_array( 'default', $names ) ) {
            // Custom inline CSS
            if( $this->present( $this->settings, 'customStyle' ) ) {
                $style .= esc_attr( preg_replace( "/\r|\n/", '', $this->settings->customStyle ) );
            }

            // Class name
            $classes = $this->classes;
            $classes[] = 'wpurp-' . $this->type;

            if( $this->present( $this->settings, 'customClass' ) ) {
                $classes[] = esc_attr( $this->settings->customClass );
            }

            if( $this->hide_on_hover || $this->show_on_hover ) {
                $classes[] = $this->hide_on_hover ? 'wpupg-hide-on-hover' : 'wpupg-show-on-hover';
            }

            $classes = implode( ' ', $classes );

            $class = ' class="' . $classes . '"';

            if( $this->hide_on_hover || $this->show_on_hover ) {
                $class .= ' data-hover-in="' . $this->hover_in_transition . '" data-hover-out="' . $this->hover_out_transition . '"';
                $class .= ' data-hover-in-duration="' . $this->hover_in_time . '" data-hover-out-duration="' . $this->hover_out_time . '"';
            }
        }

        if( $style == '' ) {
            return $class;
        } else {
            return $class . ' style="' . $style . '"';
        }
    }

    /*
     * Conditions
     */

    public function add_condition( $condition, $target = 'block' )
    {
        if( $condition['condition_type'] == 'responsive' ) {
            if( $condition['when'] == 'mobile' ) {
                $this->show_on_mobile = false;
            } else if ( $condition['when'] == 'desktop' ) {
                $this->show_on_desktop = false;
            }
        }

        if( !isset( $this->conditions[$target] ) ) {
            $this->conditions[$target] = array();
        }

        $this->conditions[$target][] = $condition;
    }

    private function condition( $recipe, $condition, $args = array() )
    {
        $show = true;

        if( $condition['condition_type'] == 'field' ) {
            $present = $recipe->is_present( $condition['field'] );

            if( isset( $condition['when'] ) && $condition['when'] == 'present' ) {
                $show = $show && !$present; // Hide when present
            } else {
                $show = $show && $present; // Hide when missing
            }
        } else if( $condition['condition_type'] == 'sub_field' && isset( $args[$condition['field']] ) ) {
            $present = $args[$condition['field']] == '' ? false : true;

            if( isset( $condition['when'] ) && $condition['when'] == 'present' ) {
                $show = $show && !$present; // Hide when present
            } else {
                $show = $show && $present; // Hide when missing
            }
        } else if( $condition['condition_type'] == 'setting' ) {

            if( $condition['setting'] == 'meal_planner_add_to_meal_plan' || $condition['setting'] == 'user_menus_add_to_shopping_list' ) {
                if( !WPUltimateRecipe::is_premium_active() ) {
                    $val = false;
                } else {
                    $setting = WPUltimateRecipe::option( $condition['setting'], 'off' );

                    if( $setting == 'guests' || ( $setting == 'registered' && is_user_logged_in() ) ) {
                        $val = true;
                    } else {
                        $val = false;
                    }
                }
            } else if( $condition['setting'] == 'favorite_recipes_enabled' ) {
                if( !WPUltimateRecipe::is_premium_active() ) {
                    $val = false;
                } else {
                    $val = WPUltimateRecipe::option( 'favorite_recipes_enabled', '0' );
                }
            } else if ( in_array( $condition['setting'], array(
                'recipe_linkback',
                'partners_integrations_yummly_enable',
                'partners_integrations_foodfanatic_enable',
                'partners_integrations_chicory_enable',
                'partners_integrations_bigoven_enable' ) ) ) {
                // Default 0
                $val = WPUltimateRecipe::option( $condition['setting'], '0' );
            } else {
                // Default 1
                $val = WPUltimateRecipe::option( $condition['setting'], '1' );
            }

            if( $condition['setting'] == 'recipe_adjustable_units' && !WPUltimateRecipe::is_premium_active() ) {
                return false; // Hide unit conversion block if we're not Premium
            }

            if( isset( $condition['when'] ) && $condition['when'] == 'enabled' ) {
                $show = $show && $val != '1';
            } else {
                $show = $show && $val == '1';
            }
        } else if( $condition['condition_type'] == 'tag' ) {
            if( has_term( $condition['term'], $condition['taxonomy'], $recipe->ID() ) ) {
                $show = $condition['when'] == 'in' ? false : true;
            } else {
                $show = $condition['when'] == 'in' ? true : false;
            }
        }

        return $show;
    }

    protected function show( $recipe, $target = 'block', $args = array() )
    {
        if( isset( $this->conditions[$target] ) ) {
            foreach( $this->conditions[$target] as $condition ) {
                if( !$this->condition( $recipe, $condition, $args ) ) {
                    return false;
                }
            }
        }

        return true;
    }

    /*
    * Cut off text
    */
    protected function cut_off( $text )
    {
        if( $this->cut_off ) {
            $limit = $this->cut_off['number'];

            if( $this->cut_off['type'] == 'words' && str_word_count( $text, 0 ) > $limit ) {
                // Limit to X words
                $words = str_word_count( $text, 2 );
                $pos = array_keys( $words );
                $text = substr( $text, 0, $pos[$limit] );

                $text = rtrim( $text ) . $this->cut_off['after_text'];
            } elseif( $this->cut_off['type'] == 'characters' && strlen( $text ) > $limit ) {
                // Limit to X characters
                $text = substr( $text, 0, $limit );

                $text = rtrim( $text ) . $this->cut_off['after_text'];
            }
        }

        return $text;
    }

    /*
     * Output block, called before output of child.
     * Return false to not output the child.
     */
    protected function output_block( $recipe, $args )
    {
        return $this->show( $recipe, 'block', $args );
    }

    protected function before_output()
    {
        $output = '';

        // Responsive
        if( !$this->show_on_desktop ) {
            $output = '<div class="wpurp-responsive-mobile">';
        } else if( !$this->show_on_mobile ) {
            $output = '<div class="wpurp-responsive-desktop">';
        }

        // Background presets
        if( $this->background_preset )
        {
            switch( $this->background_preset ) {
                case 'default':
                    $img = WPUltimateRecipe::addon( 'custom-templates' )->addonUrl . '/img/default.png';
                    break;
                default:
                    $img = WPUltimateRecipe::addon( 'template-editor' )->addonUrl . '/img/' . $this->background_preset . '.png';
            }

            if( isset( $img ) ) $this->add_style( 'background', 'url(' . $img . ')' );
        }

        return $output;
    }

    protected function after_output( $output, $recipe, $args = array() )
    {
        if( !$this->show_on_desktop || !$this->show_on_mobile ) {
            $output .= '</div>';
        }

        // TODO Better way of doing this?
        if( $this->link_color && WPUltimateRecipe::option( 'recipe_template_inline_css', '1' ) == '1' ) {

            if( WPUltimateRecipe::option( 'recipe_template_force_style', '1' ) == '1' ) {
                $important = ' !important';
            } else {
                $important = '';
            }

            $link_color = $this->replace_variables( $this->link_color );

            preg_match_all("/<a [^><]*>/i", $output, $links);

            foreach( $links[0] as $link )
            {
                $new_link = preg_replace('/( style=")([^"]*")/i', '$1color: ' . $link_color . $important .';$2', $link);

                if( $new_link == $link ) {
                    $new_link = str_ireplace('<a ', '<a style="color: ' . $link_color . $important . ';" ', $link);
                }

                $output = str_ireplace( $link, $new_link, $output );
            }
        }

        return apply_filters( 'wpurp_output_recipe_block_' . $this->type, $output, $recipe, $this, $args );
    }

    /*
     * Quick Access
     */

    public function loc( $parent, $row, $column, $order )
    {
        $this->parent = $parent;
        $this->row = $row;
        $this->column = $column;
        $this->order = $order;

        return $this;
    }

    public function parent( $parent )
    {
        $this->parent = $parent;
        return $this;
    }

    public function row( $row )
    {
        $this->row = $row;
        return $this;
    }

    public function column( $column )
    {
        $this->column = $column;
        return $this;
    }

    public function order( $order )
    {
        $this->order = $order;
        return $this;
    }
}