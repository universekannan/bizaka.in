<?php
$theme = wp_get_theme();
// var_dump( $theme->get( 'Name' ) );

$screen = get_current_screen();
if ( ! empty( $screen->base ) && 'appearance_page_gutenify-photo-zone-info' === $screen->base ) {
	return false;
}

$gutenify_is_installed = file_exists( plugin_dir_path( 'gutenify' ) );
$gutenify_is_active = in_array( 'gutenify/gutenify.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );

$show_notice = ! ( $gutenify_is_installed && $gutenify_is_active );

if ( ! $show_notice ) {
	return false;
}

?>
<div class="notice notice-success is-dismissible gutenify-photo-zone-admin-notice">
	<div class="gutenify-photo-zone-admin-notice-wrapper">
		<h2><?php esc_html_e( 'Hey, Thank you for installing ', 'gutenify-photo-zone' ); ?> <?php echo $theme->get( 'Name' ); ?> <?php esc_html_e( 'Theme!', 'gutenify-photo-zone' ); ?></h2>
		<p><?php esc_html_e( 'We recommend installing plugin: ', 'gutenify-photo-zone' ); ?> <strong><?php esc_html_e( 'Gutenify', 'gutenify-photo-zone' ); ?></strong></p>
		<p><strong><?php esc_html_e( 'Gutenify', 'gutenify-photo-zone' ); ?></strong> <?php esc_html_e( 'provides multiple site demo and add advance features to your site.', 'gutenify-photo-zone' ); ?></p>
		<a href="<?php echo esc_url( admin_url( 'themes.php?page=gutenify-photo-zone-info' ) ); ?>" class="gutenify-photo-zone-admin-notice-primary-button"><?php esc_html_e( 'Get Site Demo', 'gutenify-photo-zone' ); ?></a>
		<a href="<?php echo esc_url( 'https://gutenify.com'); ?>" target="_blank"><?php esc_html_e( 'Learn more about Gutenify', 'gutenify-photo-zone' ); ?></a>
	</div>
</div>
<?php
