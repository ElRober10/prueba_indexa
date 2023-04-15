const buttons = document.querySelectorAll('.boton2');

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        const value = button.dataset.value;
        document.getElementById('form_tipo').value = value;
    });
});