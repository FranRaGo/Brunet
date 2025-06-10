document.addEventListener('mousemove', (e) => {
    const ball = document.querySelector('.mouse-ball');
    const infoContact = document.querySelector('.info_contact');
    const rect = infoContact.getBoundingClientRect();

    // Verifica si el ratón está dentro del div info_contact
    if (
        e.clientX >= rect.left &&
        e.clientX <= rect.right &&
        e.clientY >= rect.top &&
        e.clientY <= rect.bottom
    ) {
        ball.style.left = `${e.clientX - rect.left}px`;
        ball.style.top = `${e.clientY - rect.top}px`;
    } else {
        ball.style.left = '-100px'; // Oculta la bola si el ratón está fuera
        ball.style.top = '-100px';
    }
});