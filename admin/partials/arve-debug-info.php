<textarea style="font-family: monospace; width: 100%" rows="25">

URL or Shortcode with the issue:
Link to live site with the issue:
Detailed Description of the issue:

What you are expecting and what you are seeing instead?

ARVE Version:      <?php echo $plugin_version . "\n"; ?>
ARVE-Pro Version:  <?php echo $pro_version . "\n"; ?>
WordPress Version: <?php echo $wp_version . "\n"; ?>
PHP Version:       <?php echo phpversion() . "\n"; ?>

ACTIVE PLUGINS:
<?php
$plugins = get_plugins();
$active_plugins = get_option( 'active_plugins', array() );

foreach ( $plugins as $plugin_path => $plugin ) {
	// If the plugin isn't active, don't show it.
	if ( ! in_array( $plugin_path, $active_plugins ) ) {
		continue;
	}

	echo $plugin['Name'] . ': ' . $plugin['Version'] . "\n";
}

if ( is_multisite() ) :
?>

NETWORK ACTIVE PLUGINS:
<?php
$plugins = wp_get_active_network_plugins();
$active_plugins = get_site_option( 'active_sitewide_plugins', array() );

foreach ( $plugins as $plugin_path ) {
	$plugin_base = plugin_basename( $plugin_path );

	// If the plugin isn't active, don't show it.
	if ( ! array_key_exists( $plugin_base, $active_plugins ) ) {
		continue;
	}

	$plugin = get_plugin_data( $plugin_path );

	echo $plugin['Name'] . ': ' . $plugin['Version'] . "\n";
}

endif; ?>

ARVE OPTIONS:
<?php
ob_start();
var_dump( get_option( 'arve_options_main' ) );
echo ob_get_clean();
ob_start();
var_dump( get_option( 'arve_options_shortcodes' ) );
echo ob_get_clean();
ob_start();
var_dump( get_option( 'arve_options_params' ) );
echo ob_get_clean();
?>

<?php if( is_plugin_active( 'arve-pro/arve-pro.php' ) ) : ?>
ARVE Pro Options:
<?php
ob_start();
var_dump( get_option( 'arve_options_pro' ) );
echo ob_get_clean();
?>
<?php endif; ?>
</textarea>
