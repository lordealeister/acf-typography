<?php

/**
 *  Update Google Fonts JSON file
 * 
 *  acft_update_gf_json_file()
 * 
 *  @since		3.0.0
 */
function acft_update_gf_json_file( $API_KEY ) {

    $dir = plugin_dir_path( dirname(__FILE__) );
    $filename = $dir . 'google_fonts.json';

    if ( file_exists( $filename ) ) {
        
        $file_date = date ( "Ymd", filemtime( $filename ) );
        $now = date ( "Ymd", time() );
        $time = $now - $file_date;
        
        if ( !filesize($filename) || $time > 2 ) {

            $json = file_get_contents('https://www.googleapis.com/webfonts/v1/webfonts?key=' . $API_KEY);

            $gf_file = fopen($filename, 'wb');
            fwrite($gf_file, $json);
            fclose( $gf_file );

        }

    }

}

/**
 *  Get google fonts for Font-Family drop-down subfield
 * 
 *  acft_get_google_font_family()
 * 
 *  @since		3.0.0
 */
function acft_get_google_font_family(){

    if ( !defined('YOUR_API_KEY') ) return;

    acft_update_gf_json_file( YOUR_API_KEY );

    // Load json file for extra seting
    $dir = plugin_dir_path( dirname(__FILE__) );
    $json = file_get_contents("{$dir}google_fonts.json");
    $fontArray = json_decode( $json);
    $font_family = array();

    if( $fontArray ){
        foreach ( $fontArray as $k => $v ) {
            if (is_array($v)){
                foreach ($v as $value){
                    foreach ($value as $key1 => $value1) {
                        if($key1== "family"){
                            $font_family[ $value1 ] = $value1;
                        }		
                    }
                }
            }
        }
    }

    return $font_family;

}

/**
 *  Enqueue Google Fonts file
 * 
 *  acft_enqueue_google_fonts_file()
 * 
 *  @since		3.0.0
 */
add_action( 'wp_enqueue_scripts', 'acft_enqueue_google_fonts_file' );
function acft_enqueue_google_fonts_file() {
    
    global $post;
    
    $all_fields = get_fields( $post->ID, false );
    $font_family = array();

    if( is_array($all_fields) ){
        
        array_walk_recursive($all_fields, function($item, $key) use (&$font_family) {
            if( $key === 'font_family' )
                $font_family[] = $item;
        });

    }

    if( is_array($font_family) && count($font_family) > 0 ){

        $font_family = implode( ':400,700|', $font_family );
        
        wp_enqueue_style( 'acft-gf', 'https://fonts.googleapis.com/css?family='.$font_family );

    }

}