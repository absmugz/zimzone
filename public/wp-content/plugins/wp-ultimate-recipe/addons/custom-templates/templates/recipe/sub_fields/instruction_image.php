<?php

class WPURP_Template_Recipe_Instruction_Image extends WPURP_Template_Block {

    public $editorField = 'recipeInstructionImage';
    public $thumbnail;
    public $crop = false;

    public function __construct( $type = 'recipe-instruction-image' )
    {
        parent::__construct( $type );
    }

    public function thumbnail( $thumbnail )
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function crop( $crop )
    {
        $this->crop = $crop;
        return $this;
    }

    public function output( $recipe, $args = array() )
    {
        if( !$this->output_block( $recipe, $args ) || !isset( $args['instruction_image'] ) || $args['instruction_image'] == '' ) return '';
        if( !isset( $this->thumbnail ) ) $this->thumbnail = 'full';

        $thumb = wp_get_attachment_image_src( $args['instruction_image'], $this->thumbnail );

        if(!$thumb) return ''; // No recipe image found

        $image_url = $thumb[0];
        if( is_null( $image_url ) ) return '';

        // Check image size unless a specific thumbnail was specified
        if( is_array( $this->thumbnail ) ) {

            $new_width = $this->thumbnail[0];
            $new_height = $this->thumbnail[1];

            if( $thumb[1] && $thumb[2] ) { // Use image size if passed along
                $width = $thumb[1];
                $height = $thumb[2];
            } else { // Or look it up for ourselves otherwise
                $size = getimagesize( $image_url );
                $width = $size[0];
                $height = $size[1];
            }

            // Don't distort the image
            $undistored_height = floor( $new_width * ( $height / $width ) );
            $this->add_style( 'height', $undistored_height.'px' );

            // Get correct thumbnail size
            $correct_thumb = array(
                $new_width,
                $undistored_height
            );

            $thumb = wp_get_attachment_image_src( $args['instruction_image'], $correct_thumb );
            $image_url = $thumb[0];

            // Cropping the image
            if( $this->crop ) {
                $this->add_style( 'overflow', 'hidden', 'outer' );
                $this->add_style( 'max-width', $new_width.'px', 'outer' );
                $this->add_style( 'max-height', $new_height.'px', 'outer' );

                if( $new_height < $undistored_height ) {
                    $margin = -1 * ( 1 - $new_height / $undistored_height ) * 100/2;
                    $this->add_style( 'margin-top', $margin.'%' );
                    $this->add_style( 'margin-bottom', $margin.'%' );

                    $this->add_style( 'width', '100%' );
                    $this->add_style( 'height', 'auto' );
                } elseif ( $new_height > $undistored_height ) {
                    // We need a larger image
                    $larger_width = $new_height * ($new_width / $undistored_height);
                    $larger_thumb = array(
                        $larger_width,
                        $new_height
                    );

                    $thumb = wp_get_attachment_image_src( $args['instruction_image'], $larger_thumb );
                    $image_url = $thumb[0];

                    $margin = ( $new_width - $larger_width ) / 2;
                    $this->add_style( 'margin-left', $margin.'px' );
                    $this->add_style( 'margin-right', $margin.'px' );
                    $this->add_style( 'width', $larger_width.'px' );
                    $this->add_style( 'max-width', $larger_width.'px' );
                    $this->add_style( 'height', $new_height.'px' );

                }
            }
        } else if( $this->thumbnail == 'full' ) {
            // Get better thumbnail size based on max possible block size
            $height = $args['max_height'] == 9999 ? 0 : $args['max_height'];
            $correct_thumb = array(
                $args['max_width'],
                $height,
            );

            $thumb = wp_get_attachment_image_src( $args['instruction_image'], $correct_thumb );

            if( isset( $thumb[1] ) && $thumb[1] >= $args['max_width'] ) {
                $image_url = $thumb[0];
            }
        }

        $full_img = wp_get_attachment_image_src( $args['instruction_image'], 'full' );
        $full_image_url = $full_img['0'];

        $description = isset( $args['instruction_description'] ) ? $args['instruction_description'] : '';
        $title_tag = WPUltimateRecipe::option( 'recipe_instruction_images_title', 'attachment' ) == 'attachment' ? esc_attr( get_the_title( $args['instruction_image'] ) ) : esc_attr( $description );
        $alt_tag = WPUltimateRecipe::option( 'recipe_instruction_images_alt', 'attachment' ) == 'attachment' ? esc_attr( get_post_meta( $args['instruction_image'], '_wp_attachment_image_alt', true ) ) : esc_attr( $description );

        if( WPUltimateRecipe::option( 'recipe_images_clickable', '0' ) == 1 ) {
            $img = '<a href="' . $full_image_url . '" rel="lightbox" title="' . $title_tag . '">';
            $img .= '<img src="' . $image_url . '" alt="' . $alt_tag . '" title="' . $title_tag . '"' . $this->style() . '/>';
            $img .= '</a>';
        } else {
            $img = '<img src="' . $image_url . '" alt="' . $alt_tag . '" title="' . $title_tag . '"' . $this->style() . '/>';
        }

        $output = $this->before_output();

        $output .= '<div' . $this->style( 'outer' ) . '>' . $img . '</div>';

        return $this->after_output( $output, $recipe, $args );
    }
}