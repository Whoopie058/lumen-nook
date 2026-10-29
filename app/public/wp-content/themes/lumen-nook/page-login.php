<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('login-page'); ?>>
<?php wp_body_open(); ?>

<main class="login-panel">
    <a class="login-logo-link" href="<?php echo esc_url(home_url('/')); ?>">
        <img
            src="<?php echo esc_url(get_template_directory_uri()); ?>/img/LumenNookLogo.png"
            alt="Lumen Nook"
            class="login-logo"
        >
    </a>

    <div class="login-card">
        <p class="eyebrow">Welcome back</p>
        <h1>Log in</h1>

        <?php
        wp_login_form(
            array(
                'redirect' => home_url('/'),
                'label_username' => 'Email or username',
                'label_password' => 'Password',
                'label_remember' => 'Remember me',
                'label_log_in' => 'Log in',
                'remember' => true
            )
        );
        ?>

        <nav class="login-links" aria-label="Account options">
            <a href="<?php echo esc_url(wp_lostpassword_url()); ?>">Forgot your password?</a>
            <a href="<?php echo esc_url(wp_registration_url()); ?>">Create an account</a>
        </nav>
    </div>
</main>

<?php wp_footer(); ?>
</body>
</html>
