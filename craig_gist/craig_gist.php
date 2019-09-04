<?php
/*
Plugin Name: Craig Gist
Plugin URI: https://craigphares.com/plugins/craiggist
Description: Adds a Gist embed shortcode to your site.
Version: 1.0
Author: Craig Phares
Author URI: https://craigphares.com/
License: MIT
*/

class Craig_Gist {
	public function __construct() {
		add_action( 'init', array( $this, 'gist_init' ) );
	}
    
	public function gist_init() {
        // regex found on https://github.com/miya0001/oembed-gist/blob/master/oembed-gist.php#L20
		wp_embed_register_handler( 
            'gist', 
            '#(https://gist.github.com/([^\/]+\/)?([a-zA-Z0-9]+)(\/[a-zA-Z0-9]+)?)(\#file(\-|_)(.+))?$#i',
            array( $this, 'gist_embed_handler' ) 
        );
    }
    
    public function gist_embed_handler( $url ) {
		$url = $url[0];
		if ( !preg_match( '#\.js$#i', $url ) ) {
            $url .= '.js';
        }
		return '<script src="' . $url . '"></script>';
	}
}
$craig_gist = new Craig_Gist();