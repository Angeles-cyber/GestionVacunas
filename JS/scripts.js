// animacionBoton.js

document.addEventListener('DOMContentLoaded', function () {
    const botones = document.querySelectorAll('.btn-anim');

    botones.forEach(button => {
        button.addEventListener('click', function () {
            this.classList.add('clicked');
            const url = this.getAttribute('data-url');

            setTimeout(() => {
                window.location.href = url;
            }, 300); // Tiempo de animación antes de redirigir
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const div = document.querySelector('.div1');

    div.addEventListener('click', function () {
        this.classList.toggle('expandido');
    });
});

div.addEventListener('click', function () {
    this.classList.toggle('expandido');

    setTimeout(() => {
        window.location.href = "tu-pagina.php";
    }, 500); // espera medio segundo para mostrar la animación
});
document.addEventListener('DOMContentLoaded', function () {
    const botones = document.querySelectorAll('.btn-anim');

    botones.forEach(button => {
        button.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            const userCard = this.closest('.user-card');

            // Añadir animación
            userCard.classList.add('expandido');

            // Redirigir después de animación
            setTimeout(() => {
                window.location.href = url;
            }, 500); // Tiempo para ver la expansión
        });
    });
});
