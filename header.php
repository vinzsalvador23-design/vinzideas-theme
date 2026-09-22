<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <div class="header-container">
        <div class="site-logo">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . bloginfo( 'name' ) . '</a>';
            }
            ?>
        </div>
        
        <nav>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'fallback_cb'    => 'wp_page_menu',
                'depth'          => 2,
            ) );
            ?>
        </nav>
    </div>
</header>

<main>
