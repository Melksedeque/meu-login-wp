<?php
/**
 * Plugin Name: Meu Login WordPress
 * Plugin URI:  https://github.com/Melksedeque/meu-login-wp
 * Description: Plugin de login customizado para WordPress.
 * Version:     1.0.0
 * Author:      Melksedeque Silva
 * Author URI:  https://github.com/Melksedeque
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: meu-login-wp
 */

function meu_login_wordpress_shortcode() {
    if ( is_user_logged_in() ) {
        $user = wp_get_current_user();
        $nome = $user->display_name;
        $logout_url = wp_logout_url( get_permalink() );
        return "<p>Olá, <strong>$nome</strong>. Você já está logado no sistema.</p><p><a class='btn btn-outline-danger' href='$logout_url'>Sair</a></p>";
    } else {
        $form = wp_login_form( array(
            'echo'           => false,
            'redirect'       => site_url(),
            'label_username' => __( 'Usuário', 'meu-login-wordpress' ),
            'label_password' => __( 'Senha', 'meu-login-wordpress' ),
            'label_remember' => __( 'Lembrar-me', 'meu-login-wordpress' ),
            'label_log_in'   => __( 'Entrar', 'meu-login-wordpress' ),
            'remember'       => true,
        ) );

        $form .= '<p class="lost-password-link"><a href="' . wp_lostpassword_url() . '">' . __( 'Esqueceu a senha?', 'meu-login-wordpress' ) . '</a></p>';
        $form .= '<p class="register-link"><a href="' . wp_registration_url() . '">' . __( 'Registrar', 'meu-login-wordpress' ) . '</a></p>';

        $form = '<div class="meu-login-wordpress__form">' . $form . '</div>';

        return $form;
    }
}
add_shortcode( 'meu_login_wp', 'meu_login_wordpress_shortcode' );

function meu_login_wordpress_enqueue_styles() {
    wp_enqueue_style( 'meu-login-wordpress-style', plugins_url( 'style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'meu_login_wordpress_enqueue_styles' );

function meu_login_wordpress_enqueue_scripts() {
    wp_enqueue_script( 'meu-login-wordpress-script', plugins_url( 'script.js', __FILE__ ), array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'meu_login_wordpress_enqueue_scripts' );