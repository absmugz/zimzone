<?php

class WPURP_Metadata {

    public function __construct()
    {
    }

    public function get_metadata( $recipe )
    {
        $metadata = $this->get_metadata_array( $recipe );
        return '<script type="application/ld+json">' . json_encode( $metadata ) . '</script>';
    }

    public function get_metadata_array( $recipe )
    {
        $recipe = is_null( $recipe ) ? new WPURP_Recipe(0) : $recipe;

        // Essentials
        $metadata = array(
            '@context' => 'http://schema.org/',
            '@type' => 'Recipe',
            'name' => $recipe->title(),
            'author' => array(
                '@type' => 'Person',
                'name' => $recipe->author(),
            ),
            'datePublished' => $recipe->date(),
            'image' => $recipe->image_url( 'full' ),
            'description' => $recipe->description(),
        );


        // Yield
        if( $recipe->servings() ) $metadata['recipeYield'] = $recipe->servings() . ' ' . $recipe->servings_type();


        // Rating
        if( WPUltimateRecipe::is_addon_active( 'user-ratings' ) && WPUltimateRecipe::option( 'user_ratings_enable', 'everyone' ) != 'disabled' ) {
            $rating_data = WPURP_User_Ratings::get_recipe_rating( $recipe->ID() );

            $count = $rating_data['votes'];
            $rating = $rating_data['rating'];

            // Optional rounding
            $rounding = WPUltimateRecipe::option( 'user_ratings_rounding', 'disabled' );

            if( $rounding == 'half' ) {
                $rating = ceil( $rating * 2 ) / 2;
            } else if ( $rounding == 'integer' ) {
                $rating = ceil( $rating );
            }

            // Do we have the minimum # of votes?
            $minimum_votes = intval( WPUltimateRecipe::option( 'user_ratings_minimum_votes', '2' ) );
            if( $count >= $minimum_votes ) {
                $metadata['aggregateRating'] = array(
                    '@type' => 'AggregateRating',
                    'ratingValue' => $rating,
                    'ratingCount' => $count,
                );
            }
        }


        // Times
        if( $recipe->prep_time_meta() && $recipe->cook_time_meta() ) {
            // Only use separate ones when we have both
            $metadata['prepTime'] = $recipe->prep_time_meta();
            $metadata['cookTime'] = $recipe->cook_time_meta();
        } else {
            // Otherwise use total time
            if( $recipe->prep_time_meta() ) $metadata['totalTime'] = $recipe->prep_time_meta();
            if( $recipe->cook_time_meta() ) $metadata['totalTime'] = $recipe->cook_time_meta();
        }


        // Nutrition
        if( WPUltimateRecipe::is_addon_active( 'nutritional-information' ) ) {
            $nutritional = $recipe->nutritional();
            $nutritional_units = WPUltimateRecipe::addon( 'nutritional-information' )->fields;
            $nutritional_units['unsaturated_fat'] = 'g';

            $mapping = array(
                'calories' => 'calories',
                'fat' => 'fatContent',
                'saturated_fat' => 'saturatedFatContent',
                'unsaturated_fat' => 'unsaturatedFatContent',
                'trans_fat' => 'transFatContent',
                'carbohydrate' => 'carbohydrateContent',
                'sugar' => 'sugarContent',
                'fiber' => 'fiberContent',
                'protein' => 'proteinContent',
                'cholesterol' => 'cholesterolContent',
                'sodium' => 'sodiumContent',
            );

            // Unsaturated Fat = mono + poly
            if( isset( $nutritional['monounsaturated_fat'] ) && $nutritional['monounsaturated_fat'] !== '' ) {
                $nutritional['unsaturated_fat'] = floatval( $nutritional['monounsaturated_fat'] );
            }

            if( isset( $nutritional['polyunsaturated_fat'] ) && $nutritional['polyunsaturated_fat'] !== '' ) {
                $mono = isset( $nutritional['unsaturated_fat'] ) ? $nutritional['unsaturated_fat'] : 0;
                $nutritional['unsaturated_fat'] = $mono + floatval( $nutritional['polyunsaturated_fat'] );
            }

            // Get metadata
            $metadata_nutrition = array(
                '@type' => 'NutritionInformation',
                'servingSize' => '1 serving',
            );

            foreach( $mapping as $field => $meta_field ) {
                if( isset( $nutritional[$field] ) && $nutritional[$field] !== '' ) {
                    $metadata_nutrition[$meta_field] = floatval( $nutritional[$field] ) . ' ' . $nutritional_units[$field];
                }
            }

            if( count( $metadata_nutrition ) > 2 ) {
                $metadata['nutrition'] = $metadata_nutrition;
            }
        }


        // Ingredients
        if( $recipe->has_ingredients() ) {
            $metadata_ingredients = array();

            foreach( $recipe->ingredients() as $ingredient ) {
                $metadata_ingredient = $ingredient['amount'] . ' ' . $ingredient['unit'] . ' ' . $ingredient['ingredient'];
                if( trim( $ingredient['notes'] ) !== '' ) {
                    $metadata_ingredient .= ' (' . $ingredient['notes'] . ')';
                }

                $metadata_ingredients[] = $metadata_ingredient;
            }

            $metadata['recipeIngredient'] = $metadata_ingredients;
        }


        // Instructions
        if( $recipe->has_instructions() ) {
            $metadata_instructions = array();

            foreach( $recipe->instructions() as $instruction ) {
                $metadata_instructions[] = $instruction['description'];
            }

            $metadata['recipeInstructions'] = $metadata_instructions;
        }


        // Category & Cuisine
        $courses = wp_get_post_terms( $recipe->ID(), 'course', array( 'fields' => 'names' ) );
        if( !is_wp_error( $courses ) && isset( $courses[0] ) ) {
            $metadata['recipeCategory'] = $courses[0];
        }

        $cuisines = wp_get_post_terms( $recipe->ID(), 'cuisine', array( 'fields' => 'names' ) );
        if( !is_wp_error( $cuisines ) && isset( $cuisines[0] ) ) {
            $metadata['recipeCuisine'] = $cuisines[0];
        }


        // Allow external filtering of metadata
        return apply_filters( 'wpurp_recipe_metadata', $metadata, $recipe );
    }
}