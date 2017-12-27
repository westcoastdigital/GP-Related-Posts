<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'admin_menu', 'gp_related_add_admin_menu' );
add_action( 'admin_init', 'gp_related_settings_init' );


function gp_related_add_admin_menu(  ) { 

	add_options_page( 'GP Related Posts', 'GP Related Posts', 'manage_options', 'gp_related_posts', 'gp_related_options_page' );

}


function gp_related_settings_init(  ) { 

	register_setting( 'generateRelatedPosts', 'gp_related_settings' );

	add_settings_section(
		'gp_related_generateRelatedPosts_section', 
		__( 'Settings for the GP Related Posts plugin', 'generatepress' ), 
		'gp_related_settings_section_callback', 
		'generateRelatedPosts'
	);

	add_settings_field( 
		'gp_related_heading',
		__( 'Related Posts Heading', 'generatepress' ), 
		'gp_related_heading_render', 
		'generateRelatedPosts', 
		'gp_related_generateRelatedPosts_section' 
	);

	add_settings_field( 
		'gp_related_posts_count',
		__( 'Posts to Show <br><small>(default: 5)</small>', 'generatepress' ), 
		'gp_related_posts_count_render', 
		'generateRelatedPosts', 
		'gp_related_generateRelatedPosts_section' 
    );
    
    add_settings_field( 
		'gp_related_excerpt', 
		__( 'Display Excerpt', 'generatepress' ), 
		'gp_related_excerpt_render', 
		'generateRelatedPosts', 
		'gp_related_generateRelatedPosts_section' 
    );
    
    add_settings_field( 
		'gp_related_thumbnail', 
		__( 'Display Thumbnail', 'generatepress' ), 
		'gp_related_thumbnail_render', 
		'generateRelatedPosts', 
		'gp_related_generateRelatedPosts_section' 
	);
    
    add_settings_field( 
		'gp_related_position', 
		__( 'Related Posts Position', 'generatepress' ), 
		'gp_related_position_render', 
		'generateRelatedPosts', 
		'gp_related_generateRelatedPosts_section' 
	);


}


function gp_related_heading_render(  ) { 

	$options = get_option( 'gp_related_settings' );
	?>
	<input type='text' name='gp_related_settings[gp_related_heading]' value='<?php echo $options['gp_related_heading']; ?>'>
	<?php

}


function gp_related_posts_count_render(  ) { 

	$options = get_option( 'gp_related_settings' );
	?>
	<input type='text' name='gp_related_settings[gp_related_posts_count]' value='<?php echo $options['gp_related_posts_count']; ?>'>
	<?php

}

function gp_related_excerpt_render(  ) { 

	$options = get_option( 'gp_related_settings' );
	?>
	<input type='checkbox' name='gp_related_settings[gp_related_excerpt]' <?php checked( $options['gp_related_excerpt'], 1 ); ?> value='1'>
	<?php

}

function gp_related_thumbnail_render(  ) { 

	$options = get_option( 'gp_related_settings' );
	?>
	<input type='checkbox' name='gp_related_settings[gp_related_thumbnail]' <?php checked( $options['gp_related_thumbnail'], 1 ); ?> value='1'>
	<?php

}

function gp_related_position_render(  ) { 

	$options = get_option( 'gp_related_settings' );
	?>
	<select name='gp_related_settings[gp_related_position]'>
		<option value='1' <?php selected( $options['gp_related_position'], 1 ); ?>><?php echo __('Inside Container', 'generatepress'); ?></option>
		<option value='2' <?php selected( $options['gp_related_position'], 2 ); ?>><?php echo __('Above Footer', 'generatepress'); ?></option>
	</select>

<?php

}


function gp_related_settings_section_callback(  ) { 

	//echo __( 'Define the heading (defaults to Related Posts) and how many posts to show', 'generatepress' );

}


function gp_related_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>GP Related Posts</h2>

		<?php
		settings_fields( 'generateRelatedPosts' );
		do_settings_sections( 'generateRelatedPosts' );
		submit_button();
		?>

	</form>
	<?php

}

?>