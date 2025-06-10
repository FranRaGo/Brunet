document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll("nav ul li a");
    const currentPath = window.location.pathname;

    let isActiveSet = false;

    navLinks.forEach(link => {
        if (link.getAttribute("href") === currentPath) {
            link.classList.add("active");
            isActiveSet = true;
        }
    });

    // Si no se encuentra un enlace activo, activa el enlace de "Inicio" por defecto
    if (!isActiveSet) {
        const inicioLink = document.querySelector('nav ul li a[href="/brunet/index.php"]');
        if (inicioLink) {
            inicioLink.classList.add("active");
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('idiomaBtn');
    const lista = document.getElementById('idiomaLista');
    const input = document.getElementById('idiomaInput');

    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', !expanded);
        lista.hidden = expanded;
    });

    lista.querySelectorAll('li').forEach(li => {
        li.addEventListener('click', function() {
            const bandera = li.querySelector('.bandera-idioma').innerHTML;
            btn.querySelector('.bandera-idioma').innerHTML = bandera;
            btn.querySelector('span:nth-child(2)').textContent = li.dataset.value.toUpperCase();
            input.value = li.dataset.value;
            lista.hidden = true;
            btn.setAttribute('aria-expanded', 'false');

            // Traducción automática
            const langMap = { es: 'es', ca: 'ca', en: 'en', fr: 'fr' };
            const idioma = li.dataset.value;

            function setLanguage() {
                const select = document.querySelector('.goog-te-combo');
                if (select) {
                    select.value = langMap[idioma];
                    select.dispatchEvent(new Event('change'));
                }
            }

            // Espera a que Google Translate esté listo si aún no lo está
            if (window.google && window.google.translate) {
                setLanguage();
            } else {
                // Intenta varias veces hasta que cargue
                let tries = 0;
                const interval = setInterval(() => {
                    if (window.google && window.google.translate) {
                        setLanguage();
                        clearInterval(interval);
                    }
                    tries++;
                    if (tries > 20) clearInterval(interval); // Deja de intentar tras 4 segundos
                }, 200);
            }
        });
    });

    document.addEventListener('click', function() {
        lista.hidden = true;
        btn.setAttribute('aria-expanded', 'false');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const navUl = document.querySelector('.header nav ul');

    if (menuToggle && navUl) {
        menuToggle.addEventListener('click', function() {
            menuToggle.classList.toggle('active');
            navUl.classList.toggle('menu-open');
        });

        // Cierra el menú al hacer click fuera
        document.addEventListener('click', function(e) {
            if (!menuToggle.contains(e.target) && !navUl.contains(e.target)) {
                menuToggle.classList.remove('active');
                navUl.classList.remove('menu-open');
            }
        });
    }
});

window.addEventListener("scroll", () => {
    const header = document.querySelector(".header");
    const isMobile = window.innerWidth <= 768;

    if (window.scrollY > 50) {
        header.style.backgroundColor = "rgba(0, 0, 0, 0.42)";
        header.style.boxShadow = "0 10px 50px rgba(0, 0, 0, 0.8)";
        header.style.transition = "background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out";
        header.style.backdropFilter = "blur(30px)";
        header.style.webkitBackdropFilter = "blur(30px)";
        header.style.borderRadius = isMobile ? "0px" : "0px 0px 100px 100px";
        header.style.transition = "all 0.3s ease-in-out";
    } else {
        header.style.backgroundColor = "transparent";
        header.style.boxShadow = "none";
        header.style.backdropFilter = "none";
        header.style.webkitBackdropFilter = "none";
        header.style.borderRadius = "0px";
    }
});

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'es',
        includedLanguages: 'es,ca,en,fr',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
    }, 'google_translate_element');
}