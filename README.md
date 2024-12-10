# Meu Login WordPress

Um plugin de login customizado para WordPress.
Plugin para personalizar o formulário de login e as mensagens padrão que são limitadas pelo sistema.

## Descrição

Este plugin fornece um shortcode para exibir um formulário de login customizado no seu site WordPress.  Ele permite personalizar a mensagem para usuários logados e oferece opções para estilização via CSS.

## Instalação

1. Faça o download do plugin.
2. Envie a pasta `meu-login-wordpress` para o diretório `/wp-content/plugins/` do seu site WordPress.
3. Ative o plugin através do menu "Plugins" no painel administrativo do WordPress.

## Utilização

1. Adicione o shortcode `[meu_login_wp]` em qualquer página ou postagem onde você deseja exibir o formulário de login.
2. Você pode estilizar o formulário adicionando CSS ao seu tema child.

## Personalização

* **Tradução:** O plugin está pronto para tradução.  Você pode adicionar traduções na pasta `/languages`.
* **Estilização:**  Estilize o formulário com CSS.  Classes CSS úteis incluem:
    * `login-username`: Campo de nome de usuário.
    * `login-password`: Campo de senha.
    * `login-remember`: Checkbox "Lembrar-me".
    * `login-submit`: Botão de enviar.
    * `lost-password-link`: Link para recuperar senha.
    * `register-link`: Link para registro.

## Contribuindo

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests no repositório do GitHub.

## Licença

GPLv2

## Autor

Melksedeque Silva