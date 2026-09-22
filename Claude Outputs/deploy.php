<?php
/**
 * Deploy Script for VINZ IDEAS Theme
 * Pulls latest changes from GitHub repository
 */

// Configuration - CORRECT PATH
$theme_dir = '/home/vinzidea/public_html/wp-content/themes/vinz-ideas-theme';

// Check if .git folder exists
if ( ! is_dir( $theme_dir . '/.git' ) ) {
    http_response_code( 500 );
    echo '<h1>Error: Theme repository not found</h1>';
    echo '<p>Make sure the theme folder <code>vinz-ideas-theme</code> exists in <code>/home/vinzidea/public_html/wp-content/themes/</code> and contains a .git folder.</p>';
    echo '<p>Theme directory checked: <code>' . htmlspecialchars( $theme_dir ) . '</code></p>';
    exit;
}

// Change to theme directory
chdir( $theme_dir );

// Execute git pull
$output = shell_exec( 'git fetch origin main 2>&1' );
$output .= shell_exec( 'git pull origin main 2>&1' );

// Set proper permissions
shell_exec( 'chmod -R 755 ' . escapeshellarg( $theme_dir ) );
shell_exec( 'chmod -R 644 ' . escapeshellarg( $theme_dir . '/*.php' ) );
shell_exec( 'chmod -R 644 ' . escapeshellarg( $theme_dir . '/*.css' ) );

// Display result
if ( strpos( $output, 'error' ) === false && strpos( $output, 'Error' ) === false ) {
    http_response_code( 200 );
    echo '<h1 style="color: green;">✓ Deployment Successful</h1>';
    echo '<p>Theme files have been updated from GitHub.</p>';
    echo '<pre>' . htmlspecialchars( $output ) . '</pre>';
    echo '<p><a href="https://vinzideas.com/wp-admin/">Go to WordPress Admin</a></p>';
} else {
    http_response_code( 500 );
    echo '<h1 style="color: red;">✗ Deployment Failed</h1>';
    echo '<p>There was an error pulling from GitHub:</p>';
    echo '<pre>' . htmlspecialchars( $output ) . '</pre>';
}
?>
