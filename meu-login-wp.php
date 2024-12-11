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
 * Text Domain: meu-login-wordpress
 */

function meu_login_wordpress_shortcode() {
    if ( is_user_logged_in() ) {
        $user = wp_get_current_user();
        $nome = $user->display_name;
        $logout_url = wp_logout_url( get_permalink() );
        return "<div class='logged-user-message'><p>Olá, <span class='logged-user-name'>$nome</span>. Você já está logado no sistema.</p><a class='btn btn-sm btn-outline-danger btn-leave' href='$logout_url'><i class='fa-solid fa-arrow-right-from-bracket'></i>Sair</a></div>";
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

        $form .= '<div class="useful-form-links">';
        $form .= '<p class="lost-password-link"><a href="' . wp_lostpassword_url() . '">' . __( 'Esqueceu a senha?', 'meu-login-wordpress' ) . '</a></p>';
        $form .= '<p class="register-link"><a href="' . wp_registration_url() . '">' . __( 'Registrar', 'meu-login-wordpress' ) . '</a></p>';
        $form .= '</div>';

        $form = '<div class="meu-login-wordpress__form">' . $form . '</div>';

        return $form;
    }
}
add_shortcode( 'meu_login_wordpress', 'meu_login_wordpress_shortcode' );

function meu_login_wordpress_enqueue_styles() {
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css' );
    wp_enqueue_style( 'meu-login-wordpress-style', plugins_url( 'style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'meu_login_wordpress_enqueue_styles' );

function meu_login_wordpress_enqueue_scripts() {
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.4.min.js', array(), '3.6.4', true );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true );
    wp_enqueue_script( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js', array('jquery'), '6.7.1', true );
    wp_enqueue_script( 'meu-login-wordpress-script', plugins_url( 'script.js', __FILE__ ), array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'meu_login_wordpress_enqueue_scripts' );