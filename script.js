document.addEventListener('DOMContentLoaded', function() {
    const botao = document.querySelector('.meu-login-wordpress__form input[type="submit"]');

    if (botao) {
        botao.addEventListener('mousemove', function(e) {
            const x = e.offsetX;
            const y = e.offsetY;
            const width = botao.offsetWidth;
            const height = botao.offsetHeight;

            botao.style.background = `radial-gradient(circle at ${x}px ${y}px, #1EBF06, #0F71F2)`;
        });

        botao.addEventListener('mouseleave', function() {
            botao.style.background = '#0F71F2'; // Retorna à cor original
        });
    }
});