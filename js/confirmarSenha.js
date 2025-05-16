document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const senha = document.getElementById('Senha');
    const senhaConfirm = document.getElementById('SenhaConfirm');

    form.addEventListener('submit', function(e) {
        if (senha.value !== senhaConfirm.value) {
            e.preventDefault();
            alert('As senhas não coincidem!');
            senhaConfirm.focus();
        }
    });
});