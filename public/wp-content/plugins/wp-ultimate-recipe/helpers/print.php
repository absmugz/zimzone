<?php

class WPURP_Print {

    public $keyword = 'print';

    public function __construct()
    {
        define( 'EP_RECIPE', 524288 ); // 2^19

        add_action( 'init', array( $this, 'endpoint' ) );
        add_action( 'template_redirect', array( $this, 'redirect' ) );
    }

    public function endpoint() {
        $keyword = urlencode( WPUltimateRecipe::option( 'print_template_keyword', 'print' ) );
        if( strlen( $keyword ) > 0 ) {
            $this->keyword = $keyword;
        }

        add_rewrite_endpoint( $this->keyword, EP_RECIPE );
    }

    public function redirect() {
        $print = get_query_var( $this->keyword, false );

        if( $print !== false ) {
            $post = get_post();
            $recipe = new WPURP_Recipe( $post );
            $this->print_recipe( $recipe, $print );
            exit();
        }
    }

    public function print_recipe( $recipe, $parameters ) {
        // Get Serving Size
        preg_match("/[0-9\.,]+/", $parameters, $servings);
        $servings = empty( $servings ) ? 0.0 : floatval( str_replace( ',', '.', $servings[0] ) );

        if( $servings <= 0 ) {
            $servings = $recipe->servings_normalized();
        }

        if( WPUltimateRecipe::is_premium_active() ) {
            // Get Unit System
            $unit_system = false;
            $requested_systems = explode( '/', $parameters );
            $systems = WPUltimateRecipe::get()->helper( 'ingredient_units')->get_active_systems();

            foreach( $systems as $id => $options ) {
                foreach( $requested_systems as $requested_system ) {
                    if( $requested_system == $this->convertToSlug( $options['name'] ) ) {
                        $unit_system = $id;
                    }
                }
            }
        }

        // Get Template
        $template = WPUltimateRecipe::get()->template( 'print', 'default' );
        $fonts = false;
        if( isset( $template->fonts ) && count( $template->fonts ) > 0 ) {
            $fonts = 'https://fonts.googleapis.com/css?family=' . implode( '|', $template->fonts );
        }

        include( 'print_template.php' );
    }

    public function convertToSlug( $text )
    {
        $text = strtolower( $text );
        $text = str_replace( ' ', '-', $text );
        $text = preg_replace( "/-+/", "-", $text );
        $text = preg_replace( "/[^\w-]+/", "", $text );

        return $text;
    }
}