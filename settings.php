<?php

function wp_ai_image_caption_settings_add_menu() {
    add_options_page( __(
		'AI Image Caption',
		'wp-ai-image-caption' ),
		__( 'AI Image Caption', 'wp-ai-image-caption' ),
		'manage_options',
		'wp-ai-image-caption',
		'wp_ai_image_caption_settings_page'
	);
}
add_action( 'admin_menu', 'wp_ai_image_caption_settings_add_menu' );

function wp_ai_image_caption_settings_page() {
	if ( isset( $_POST[ 'wp-ai-image-caption-api-key' ] ) ) {
		update_option(
			'wp-ai-image-caption-api-key',
			$_POST[ 'wp-ai-image-caption-api-key']
		);
	}

    // Get the current API key from the database
    $api_key = get_option( 'wp-ai-image-caption-api-key' );

    // Render the HTML for the settings page
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options-general.php?page=wp-ai-image-caption" method="post">
            <label for="wp-ai-image-caption-api-key">
				<?php esc_html_e( 'API Key:', 'wp-ai-image-caption' ); ?>
			</label>
            <input
				type="text"
				id="wp-ai-image-caption-api-key"
				name="wp-ai-image-caption-api-key"
				value="<?php echo esc_attr( $api_key ); ?>"
			/>
            <?php submit_button(); ?>
        </form>
    </div>
	<?php
}
