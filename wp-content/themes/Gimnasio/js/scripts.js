function gymWordpress() {
    if(document.querySelector('.swiper')) {
        const opciones = {
            loop: true,
            autoplay: {
                delay: 3000
            }
        }
        new Swiper('.swiper', opciones);
    }
}
document.addEventListener('DOMContentLoaded', gymWordpress)