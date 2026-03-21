
    // 🔥 Animación de aparición
    const elementos = document.querySelectorAll('.card-estadistica');

    const mostrarAlHacerScroll = () => {
        elementos.forEach(el => {
            const posicion = el.getBoundingClientRect().top;
            const pantalla = window.innerHeight;

            if (posicion < pantalla - 100) {
                el.classList.add('mostrar');
            }
        });
    };

    window.addEventListener('scroll', mostrarAlHacerScroll);
    window.addEventListener('load', mostrarAlHacerScroll);

    // 🔥 Animación contador
    const counters = document.querySelectorAll('.contador');

    counters.forEach(counter => {
        counter.innerText = '0';

        const updateCounter = () => {
            const target = +counter.getAttribute('data-target');
            const current = +counter.innerText;

            const increment = target / 200;

            if (current < target) {
                counter.innerText = Math.ceil(current + increment);
                setTimeout(updateCounter, 10);
            } else {
                counter.innerText = target.toLocaleString();
            }
        };

        updateCounter();
    });

