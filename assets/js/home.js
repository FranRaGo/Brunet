document.addEventListener("DOMContentLoaded", () => {
    const scrollDown = document.getElementById("scrollDown");
    const socialIcons = document.querySelector(".social_icons");
    const content_home = document.querySelector(".home__content");
    const backgrounds = [
        "url('/brunet/assets/media/img/backgrounds/bg1.jpg')",
        "url('/brunet/assets/media/img/backgrounds/bg2.jpg')",
        "url('/brunet/assets/media/img/backgrounds/bg3.jpg')"
    ];
    let currentIndex = 0;

    // Establecer la primera imagen de fondo inmediatamente
    content_home.style.backgroundImage = backgrounds[currentIndex];
    content_home.style.transition = "background-image 1s ease-in-out";

    // Cambiar el fondo de forma cíclica cada 5 segundos
    setInterval(() => {
        currentIndex = (currentIndex + 1) % backgrounds.length;
        content_home.style.backgroundImage = backgrounds[currentIndex];
    }, 5000); // Cambia cada 5 segundos

    window.addEventListener("scroll", () => {
        const currentScrollY = window.scrollY;

        // Mostrar u ocultar scrollDown dependiendo de la posición
        if (currentScrollY === 0) {
            scrollDown.style.opacity = "1";
            scrollDown.style.transition = "opacity 0.5s ease-in-out";
            socialIcons.style.bottom = "20%"; // Posición original de los íconos
            socialIcons.style.transition = "bottom 0.5s ease-in-out";
        } else {
            scrollDown.style.opacity = "0";
            scrollDown.style.transition = "opacity 0.5s ease-in-out";
            socialIcons.style.bottom = "5%"; // Mismo bottom que el scrollDown
            socialIcons.style.transition = "bottom 0.5s ease-in-out";
        }
    });

    const infoHome = document.querySelector(".info_home");
    const borderHome = document.querySelector(".border_home");


    window.addEventListener("scroll", () => {
        const scrollY = window.scrollY;
        const borderHomeTop = borderHome.getBoundingClientRect().top;

        // Desaparecer info_home al entrar en el viewport de border_home
        if (borderHomeTop <= window.innerHeight * 0.25) {
            infoHome.style.opacity = "0";
        } else {
            infoHome.style.opacity = "1";
        }
    });

    const carrousel = document.querySelector(".carrousel_vinos");
    const images = carrousel.querySelectorAll("img");
    let index = 0;

    setInterval(() => {
        index = (index + 1) % images.length;
        carrousel.style.transform = `translateX(-${index * 100}%)`;
    }, 3000); // Cambia cada 3 segundos

    const imagesCarousel = document.querySelectorAll(".carrousel_vinos .carrousel-image");
    let currentIndexCarousel = 0;

    setInterval(() => {
        // Ocultar la imagen actual
        imagesCarousel[currentIndexCarousel].classList.remove("active");

        // Calcular el índice de la siguiente imagen
        currentIndexCarousel = (currentIndexCarousel + 1) % imagesCarousel.length;

        // Mostrar la siguiente imagen
        imagesCarousel[currentIndexCarousel].classList.add("active");
    }, 3000); // Cambia cada 3 segundos

    const carrouselVinos = document.querySelector(".carrousel_vinos");
    const imagesBackground = [
        "/brunet/assets/media/img/backgrounds/bodega2.jpg",
        "/brunet/assets/media/img/backgrounds/menjador2.jpg",
        "/brunet/assets/media/img/backgrounds/pernil.jpg",
        "/brunet/assets/media/img/backgrounds/pernil2.jpg"
    ];
    let currentIndexBackground = 0;

    // Cambiar la imagen de fondo cada 3 segundos
    setInterval(() => {
        carrouselVinos.style.backgroundImage = `url(${imagesBackground[currentIndexBackground]})`;
        currentIndexBackground = (currentIndexBackground + 1) % imagesBackground.length; // Cicla entre las imágenes
    }, 3000); // Cambia cada 3 segundos

    // Carrusel de postres
    const postresImages = document.querySelectorAll(".imagenes_postres .carrousel-postre-image");
    let postreIndex = 0;
    if (postresImages.length > 0) {
        setInterval(() => {
            postresImages[postreIndex].classList.remove("active");
            postreIndex = (postreIndex + 1) % postresImages.length;
            postresImages[postreIndex].classList.add("active");
        }, 3000);
    }

    // Lista de imágenes de platos
    const platosImgs = [
        "calamars.JPG",
        "cargols.JPG",
        "entrecot.JPG",
        "esparrecs.JPG",
        "foie.JPG",
        "foie2.JPG",
        "josper.JPG",
        "ousestrellats.JPG",
        "pastis.JPG",
        "pop.JPG",
        "sartencilla.JPG"
    ];

    // Selecciona todos los divs del carrusel de platos
    const containers = document.querySelectorAll('.container_carrousel_imgs');

    // Asigna las imágenes como fondo
    containers.forEach((div, i) => {
        if (platosImgs[i]) {
            div.style.backgroundImage = `url('/brunet/assets/media/img/platos/${platosImgs[i]}')`;
            div.style.backgroundSize = 'cover';
            div.style.backgroundPosition = 'center';
            div.style.backgroundRepeat = 'no-repeat';
        } else {
            div.style.background = '#222'; // Fondo por defecto si sobran divs
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const images = document.querySelectorAll(".carrousel_vinos img");
    let currentIndex = 0;

    setInterval(() => {
        // Ocultar la imagen actual
        images[currentIndex].classList.remove("active");

        // Calcular el índice de la siguiente imagen
        currentIndex = (currentIndex + 1) % images.length;

        // Mostrar la siguiente imagen
        images[currentIndex].classList.add("active");
    }, 3000); // Cambia cada 3 segundos
});

// Función para abrir el modal con los menús de grupos
function openGroupMenusModal() {
    const content = `
        <h2>Menús de grupo</h2>
        <p>Selecciona uno de los menús disponibles:</p>
        <div class="menu-buttons">
            <button class="btn" onclick="showGroupMenu('calcotada')">Menú Calçotada - 45€ pp</button>
            <button class="btn" onclick="showGroupMenu('txuleta')">Menú Chuletón - 45€ pp</button>
            <button class="btn" onclick="showGroupMenu('para8')">Menú Para 8 personas - 39€ pp</button>
            <button class="btn" onclick="showGroupMenu('economico')">Menú Económico - 34€ pp</button>
        </div>
        <div id="menu-content" class="menu-content">
            <!-- Aquí se cargará el contenido del menú seleccionado -->
        </div>
    `;
    openModal(content);
}

// Función para mostrar el contenido del menú seleccionado
function showGroupMenu(menuType) {
    let menuContent = '';
    switch (menuType) {
        case 'calcotada':
            menuContent = `
                <h3>Menú Calçotada - 45€ pp</h3>
                <p><strong>PRIMEROS</strong><br>RACIÓN DE CALÇOTS 18 UNIDADES</p>
                <p><strong>SEGUNDOS</strong><br>PARRILLADA: CORDERO, BUTIFARRA, PANCETA Y ALCACHOFAS.</p>
                <p>BACALAO A LA MUSSELINA DE AJO</p>
                <p>ENTRECOT</p>
                <p><strong>POSTRE VILLARÓ</strong><br>CREMADET: HOJALDRE CON CREMA QUEMADA</p>
                <p>BODEGA<br>VINO (1 BOTELLA CADA 4 PERSONAS)<br>1 COPA DE CAVA JUVÉ & CAMPS<br>AGUA<br>CAFÉ</p>
            `;
            break;
        case 'txuleta':
            menuContent = `
                <h3>Menú Chuletón - 45€ pp</h3>
                <p><strong>2 PRIMEROS A ELEGIR</strong><br>ESQUEIXADA DE BACALAO<br>MEJILLONES DE ROCA A LA BRASA</p>
                <p>BERENJENAS CON MIEL<br>ALCACHOFAS REBOZADAS<br>CROQUETAS DE ASADO<br>ENSALADA DE FRUTOS SECOS Y QUESO DE CABRA</p>
                <p><strong>PRINCIPAL</strong><br>CHULETÓN DE VACA (1KG APROXIMADAMENTE)<br>PATATAS FRITAS</p>
                <p><strong>VINO BLANCO, ROSADO O TINTO DO RIOJA</strong> (1 BOTELLA POR 4 PERSONAS) Y AGUA</p>
                <p><strong>POSTRES</strong><br>CREMA CATALANA<br>TRUFAS<br>HELADO DE VAINILLA CON CHOCOLATE CALIENTE<br>SORBETE</p>
            `;
            break;
        case 'para8':
            menuContent = `
                <h3>Menú Para 8 personas - 39€ pp</h3>
                <p><strong>PICA-PICA</strong><br>ALCACHOFAS REBOZADAS<br>PALETA IBÉRICA CORTADA A MANO<br>ESQUEIXADA DE BACALAO<br>BERENJENA CON MIEL<br>ESCALIVADA CON ANCHOAS<br>MEJILLONES DE ROCA A LA BRASA<br>PAN DE COCA CON TOMATE</p>
                <p><strong>SEGUNDO A ELEGIR</strong><br>CAZUELITA DE ESCALIVADA CON QUESO DE CABRA<br>SECRETO IBÉRICO (suplemento de 3,00€)<br>ENTRECOT (suplemento de 3,00€)<br>CORDERO A LA BRASA (suplemento de 3,00€)<br>CALAMARCITOS CON CEBOLLA<br>CARRILLERAS DE CERDO IBÉRICO DESHUESADAS<br>TERNERA CON SETAS<br>BACALAO CON MUSSELINA DE AJO</p>
                <p><strong>VINO BLANCO, ROSADO O TINTO BAGORDI CRIANZA DO RIOJA</strong> (1 BOTELLA POR CADA 4 PERSONAS) Y AGUA</p>
                <p><strong>POSTRES</strong><br>CREMADET (HOJALDRE Y CREMA QUEMADA)<br>BUVI<br>CARDINAL<br>TRUFAS<br>HELADO DE VAINILLA CON CHOCOLATE CALIENTE<br>SORBETE DE LIMÓN</p>
            `;
            break;
        case 'economico':
            menuContent = `
                <h3>Menú Económico - 34€ pp</h3>
                <p><strong>PICA-PICA</strong><br>ALCACHOFAS REBOZADAS<br>BERENJENA CON MIEL<br>MEJILLONES DE ROCA A LA BRASA<br>PATATAS BRAVAS<br>CROQUETAS DE ASADO<br>ESPÁRRAGOS TRIGUEROS CON ROMESCO<br>PAN DE COCA CON TOMATE</p>
                <p><strong>SEGUNDO A ELEGIR</strong><br>ENTRECOT (suplemento de 5,00€)<br>POLLO A LA BRASA CON PATATAS AL CALIU<br>CORDERO (suplemento de 3,00€)<br>BUTIFARRA CON JUDÍAS DEL GANXET O PATATAS<br>TERNERA CON SETAS<br>ALBÓNDIGAS CON SETAS<br>CARRILLERAS IBÉRICAS A LA BRASA<br>CAZUELITA DE ESCALIVADA CON QUESO DE CABRA</p>
                <p><strong>VINO BLANCO, ROSADO O TINTO DO RIOJA</strong> (1 BOTELLA POR CADA 4 PERSONAS) Y AGUA</p>
                <p><strong>POSTRES</strong><br>CREMADET (HOJALDRE Y CREMA QUEMADA) (POR ENCARGO)<br>PASTEL DEL VILLARÓ (POR ENCARGO)</p>
            `;
            break;
        default:
            menuContent = '<p>Menú no disponible.</p>';
    }
    document.getElementById('menu-content').innerHTML = menuContent;
}

// Función para abrir el modal con animación suave y cerrar al hacer clic fuera
function openModal(content) {
    const modal = document.getElementById('modal');
    const modalContent = modal.querySelector('.modal-content');
    document.getElementById('modal-body').innerHTML = content;

    modal.style.display = 'block';
    setTimeout(() => {
        modal.style.opacity = '1';
        modalContent.style.opacity = '1';
        modalContent.style.transition = 'opacity 0.3s';
        modal.style.transition = 'opacity 0.3s';
    }, 10);

    modal.onclick = function (e) {
        if (e.target === modal) {
            closeModal();
        }
    };
}

// Función para cerrar el modal con animación suave
function closeModal() {
    const modal = document.getElementById('modal');
    const modalContent = modal.querySelector('.modal-content');
    modal.style.opacity = '0';
    modalContent.style.opacity = '0';
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
}

// Función para abrir el modal de vinos
function openVinosModal() {
    const content = `
        <h2>Carta de Vinos</h2>
        <p>Selecciona una clase de vino o cava:</p>
        <div class="menu-buttons">
            <button class="btn" onclick="showVinosMenu('cavas')">Cavas</button>
            <button class="btn" onclick="showVinosMenu('vins-negres')">Vinos Tintos</button>
            <button class="btn" onclick="showVinosMenu('vins-rosats')">Vinos Rosados</button>
            <button class="btn" onclick="showVinosMenu('vins-blancs')">Vinos Blancos</button>
        </div>
        <div id="menu-content" class="menu-content">
            <!-- Aquí se cargará el contenido del menú seleccionado -->
        </div>
    `;
    openModal(content);
}

function showVinosMenu(menuType) {
    let menuContent = '';
    switch (menuType) {
        case 'cavas':
            menuContent = `
                <h3>CAVAS</h3>
                <p><strong>RESERVA DE LA FAMÍLIA J&C</strong><br>Macabeu, Xarel·lo i Parellada, Brut Nature Gran Reserva<br>29,00 €</p>
                <p><strong>LLOPART INTEGRAL</strong><br>Chardonnay, Xarel·lo i Parellada<br>22,50 €</p>
                <p><strong>LLOPART ROSE</strong><br>Monastrell, Garnacha i Pinot Noir<br>21,50 €</p>
                <p><strong>CINTA PURPURA</strong><br>Macabeu, Xarel·lo i Parellada, Brut Reserva<br>21,50 €</p>
                <p><strong>GRAMONA IMPERIAL</strong><br>Coupatge tradicional<br>34,00 €</p>
            `;
            break;
        case 'vins-negres':
            menuContent = `
                <h3>Vinos Tintos</h3>
                <p><strong>D.O.Q. PRIORAT</strong></p>
                <p><strong>TERRA SECA</strong><br>Garnacha negra y Cariñena<br>24,90 €</p>
                <p><strong>D.O. TERRA ALTA</strong></p>
                <p><strong>REBELS DE BATEA</strong><br>Garnatxa<br>19,50 €</p>
                <p><strong>D.O. MONTSANT</strong></p>
                <p><strong>CLOS DE NIT</strong><br>Garnatxa i Syrah<br>17,90 €</p>
                <p><strong>BRUNÉ RAVENTOS CHAVALIER</strong><br>Garnatxa i Carinyena<br>25,90 €</p>
                <p><strong>BRUNUS</strong><br>Cariñena, Garnacha tinta, Syrah<br>18,80 €</p>
                <p><strong>COSTERS DEL SEGRE</strong></p>
                <p><strong>JAN PETIT</strong><br>17,80 €</p>
                <p><strong>ALGES</strong><br>21,00 €</p>
                <p><strong>D.O. PENEDÈS</strong></p>
                <p><strong>CAP DE TRONS</strong><br>16,00 €</p>
                <p><strong>MAS SUAU</strong><br>15,75 €</p>
                <p><strong>D.O. EMPORDÀ</strong></p>
                <p><strong>CAP DE CREUS NEGRE</strong><br>75% Lledoner Negre, 20% Cariñena, 5% Lledoner Roig<br>19,90 €</p>
                <p><strong>D.O. RIOJA</strong></p>
                <p><strong>BARON DE PARDO CRIANZA</strong><br>Tempranillo, Garnatxa i Graciano<br>18,00 €</p>
                <p><strong>RAMON BILBAO EDICIÓ LIMITADA</strong><br>Tempranillo<br>22,50 €</p>
                <p><strong>VIÑA LANCIANO RESERVA</strong><br>Tempranillo, Mazuelo i Graciano<br>26,00 €</p>
                <p><strong>PUJANZA</strong><br>17,80 €</p>
                <p><strong>RIBERA DEL DUERO</strong></p>
                <p><strong>BIBERIUS ROBLE</strong><br>Tempranillo<br>17,90 €</p>
                <p><strong>ORIGEN BY COMENGE</strong><br>Tempranillo<br>25,00 €</p>
                <p><strong>VIÑA SASTRE ROBLE</strong><br>Tempranillo<br>18,50 €</p>
                <p><strong>MARQUES DE BURGOS CRIANZA</strong><br>Tinta Fina<br>18,50 €</p>
                <p><strong>FUENTESPINA RESERVA</strong><br>Tempranillo<br>26,00 €</p>
                <p><strong>BIBERIUS MAGNUM</strong><br>TEMPRANILLO<br>45,00 €</p>
                <p><strong>RIBEIRA SACRA</strong></p>
                <p><strong>ABADÍA DA COVA</strong><br>Mencía<br>17,50 €</p>
            `;
            break;
        case 'vins-rosats':
            menuContent = `
                <h3>Vinos Rosados</h3>
                <p><strong>D.O. PENEDÈS</strong></p>
                <p><strong>AURORA D'ESPIELLS</strong><br>19,50 €</p>
                <p><strong>D.O. EMPORDÀ</strong></p>
                <p><strong>TERRA REMOTA CAMINITO</strong><br>Garnatxa<br>22,00 €</p>
                <p><strong>D.O. RIOJA</strong></p>
                <p><strong>NAVARDIA ROSÉ</strong><br>Garnatxa<br>15,50 €</p>
                <p><strong>VIN DE PROVENCE ROSÉ</strong></p>
                <p><strong>ROSÉ D'UNE NUIT</strong><br>PROVENCE WINE<br>21,00 €</p>
            `;
            break;
        case 'vins-blancs':
            menuContent = `
                <h3>Vinos Blancos</h3>
                <p><strong>D.O. PENEDÈS</strong></p>
                <p><strong>ERMITA D'ESPIELLS</strong><br>Macabeu, Xarel·lo i Parellada<br>17,50 €</p>
                <p><strong>GESSAMÍ BY GRAMONA</strong><br>21,00 €</p>
                <p><strong>SOMIATRUITES</strong><br>16,00 €</p>
                <p><strong>LOVE IS GARNATXA</strong><br>Garnatxa 100%<br>19,00 €</p>
                <p><strong>D.O. EMPORDÀ</strong></p>
                <p><strong>CAP DE CREUS BLANC</strong><br>Garnatxa i Macabeu<br>19,90 €</p>
                <p><strong>D.O. RIOJA</strong></p>
                <p><strong>NAVARDIA BLANC</strong><br>Sauvignon Blan i Garnatxa blanca<br>15,50 €</p>
                <p><strong>D.O. RUEDA</strong></p>
                <p><strong>COLECCIÓN COMENGE</strong><br>Verdejo 100%<br>17,50 €</p>
                <p><strong>CASTILLO DE MIRAFLORES</strong><br>Verdejo<br>17,00 €</p>
                <p><strong>MENADE</strong><br>Verdejo<br>19,80 €</p>
                <p><strong>RIBEIRA SACRA</strong></p>
                <p><strong>ABADÍA DA COVA</strong><br>Albariño<br>19,00 €</p>
            `;
            break;
        default:
            menuContent = '<p>Carta no disponible.</p>';
    }
    document.getElementById('menu-content').innerHTML = menuContent;
}

let lastScroll = window.scrollY;

window.addEventListener('scroll', () => {
    const rows = document.querySelectorAll('.carrousel_row');
    const scrollNow = window.scrollY;
    const direction = scrollNow > lastScroll ? 1 : -1; // 1: scroll abajo, -1: scroll arriba
    const scrollDelta = Math.abs(scrollNow - lastScroll);

    rows.forEach((row, idx) => {
        // Alterna la dirección por fila
        const rowDirection = idx % 2 === 0 ? 1 : -1;
        // Calcula el desplazamiento (ajusta el divisor para más/menos movimiento)
        const offset = direction * rowDirection * (scrollDelta / 3);
        // Aplica el desplazamiento acumulativo
        const current = parseFloat(row.dataset.offset || 0);
        const next = current + offset;
        row.style.transform = `translateY(${next}px)`;
        row.dataset.offset = next;
    });

    lastScroll = scrollNow;
});

document.addEventListener('DOMContentLoaded', function () {
    // Imágenes de platos SIN 'rb'
    const platosImgs = [
        "calamars.JPG",
        "cargols.JPG",
        "entrecot.JPG",
        "esparrecs.JPG",
        "foie.JPG",
        "foie2.JPG",
        "josper.JPG",
        "ousestrellats.JPG",
        "pastis.JPG",
        "pop.JPG",
        "sartencilla.JPG"
    ];

    // Imágenes de postres
    const postresImgs = [
        "postre01.JPG",
        "postre02.JPG",
        "postre03.JPG",
        "postre04.JPG",
        "postre05.JPG"
    ];

    // Selecciona todos los divs del carrusel de platos
    const containers = Array.from(document.querySelectorAll('.container_carrousel_imgs'));

    // Mezcla aleatoriamente las imágenes de platos
    const platosShuffle = platosImgs.sort(() => Math.random() - 0.5);

    // Prepara el array final de fondos
    let backgrounds = [];
    backgrounds = backgrounds.concat(platosShuffle);

    // Si sobran divs, añade postres (mezclados)
    let postresIndex = 0;
    while (backgrounds.length < containers.length) {
        if (postresIndex >= postresImgs.length) postresIndex = 0;
        backgrounds.push(`/brunet/assets/media/img/postres/${postresImgs[postresIndex++]}`);
    }

    // Mezcla el array final para que platos y postres estén repartidos
    backgrounds = backgrounds.sort(() => Math.random() - 0.5);

    // Asigna los fondos mezclados a los divs
    containers.forEach((div, i) => {
        let bg = backgrounds[i];
        if (bg) {
            if (bg.startsWith('/brunet/assets/media/img/postres/')) {
                div.style.backgroundImage = `url('${bg}')`;
            } else {
                div.style.backgroundImage = `url('/brunet/assets/media/img/platos/${bg}')`;
            }
            div.style.backgroundSize = 'cover';
            div.style.backgroundPosition = 'center';
            div.style.backgroundRepeat = 'no-repeat';
        } else {
            div.style.background = '#222';
            div.style.backgroundImage = '';
        }
    });

    // --- EFECTO PARALLAX POR COLUMNA EN EL CARROUSEL DE PLATOS ---
    const carrouselSection = document.querySelector('.fotos_platos');
    const columns = Array.from(document.querySelectorAll('.carrousel_platos .column_carrousel'));
    let lastScrollY = window.scrollY;

    function animateColumns(scrollDelta, direction) {
        columns.forEach((col, idx) => {
            // Alterna dirección: par arriba, impar abajo
            const factor = (idx % 2 === 0 ? 1 : -1) * direction;
            let current = parseFloat(col.dataset.offset || 0);
            // Multiplica el movimiento para que se note más (ajusta el 2 para más o menos movimiento)
            let next = current + factor * scrollDelta * 0.20;
            col.style.transform = `translateY(${next}px)`;
            col.dataset.offset = next;
        });
    }

    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top < window.innerHeight && rect.bottom > 0
        );
    }

    window.addEventListener('scroll', () => {
        const scrollNow = window.scrollY;
        const scrollDelta = Math.abs(scrollNow - lastScrollY);
        const direction = scrollNow > lastScrollY ? 1 : -1;
        // Solo animar si el div está entrando en el viewport
        if (isInViewport(carrouselSection)) {
            animateColumns(scrollDelta, direction);
        }
        lastScrollY = scrollNow;
    }, { passive: true });
});