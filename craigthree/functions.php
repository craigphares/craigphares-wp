<?php
function cp_enqueue_scripts() {
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
    wp_enqueue_style( 'core', get_stylesheet_uri(), array('normalize') );

	wp_enqueue_style('prism', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/themes/prism-tomorrow.min.css');
	// wp_enqueue_style('prism-toolbar', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/toolbar/prism-toolbar.min.css');

	wp_enqueue_script('prism-core', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js', array(), false, true);
	// wp_enqueue_script('prism-toolbar', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/toolbar/prism-toolbar.min.js', array(), false, true);

	wp_enqueue_script('prism-clike', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-clike.min.js', array('prism-core'), false, true);
	wp_enqueue_script('prism-css', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-css.min.js', array('prism-core'), false, true);
	wp_enqueue_script('prism-javascript', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-javascript.min.js', array('prism-core'), false, true);
	wp_enqueue_script('prism-bash', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-bash.min.js', array('prism-core'), false, true);
	wp_enqueue_script('prism-pug', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-pug.min.js', array('prism-core'), false, true);
	wp_enqueue_script('prism-json', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-json.min.js', array('prism-core'), false, true);
	wp_enqueue_script('prism-yaml', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-yaml.min.js', array('prism-core'), false, true);
	wp_enqueue_script('prism-markup', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-markup.min.js', array('prism-core'), false, true);
	wp_enqueue_script('prism-jsx', 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-jsx.min.js', array('prism-markup'), false, true);

	wp_enqueue_script('cp', get_template_directory_uri() . '/js/main.js', array('prism-core', 'prism-toolbar'), false, true);

}
add_action( 'wp_enqueue_scripts', 'cp_enqueue_scripts' );

function cp_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Home', 'craigphares' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your home sidebar.', 'craigphares' ),
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Home Footer', 'craigphares' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your home footer sidebar.', 'craigphares' ),
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'craigphares' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer sidebar.', 'craigphares' ),
		)
	);
}
add_action( 'widgets_init', 'cp_widgets_init' );

function cp_init() {
	register_nav_menu('footer',__( 'Footer Menu' ));
}
add_action( 'init', 'cp_init' );


function cp_after_setup_theme() {
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'cp_after_setup_theme' );

function add_opengraph_doctype( $output ) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

function cp_head() {
	global $post;

	$default_image = get_template_directory_uri() . '/images/craig.jpg';
	$excerpt = get_bloginfo('description');

	echo '<meta property="og:title" content="' . get_the_title() . '"/>';
	echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	echo '<meta property="og:site_name" content="' . get_bloginfo() . '"/>';

	if ( !is_singular() ) {
		echo '<meta property="og:type" content="website"/>';
		echo '<meta property="og:image" content="' . $default_image . '"/>';
		echo '<meta property="og:description" content="' . $excerpt . '"/>';
		return;
	}

	echo '<meta property="og:type" content="article"/>';

	if ( !has_post_thumbnail( $post->ID ) ) { 
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	} else {
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}

	if ( $post->post_excerpt ) {
		$excerpt = strip_tags($post->post_excerpt);
		$excerpt = str_replace("", "'", $excerpt);
	}
	echo '<meta property="og:description" content="' . $excerpt . '"/>';

}
add_action( 'wp_head', 'cp_head', 5 );
