document.addEventListener("DOMContentLoaded", (event) => {

    setTimeout(() => {
        document.querySelector("#load-iframe-map").innerHTML = `
        <iframe class="contact__iframe" frameborder="0" scrolling="no" marginheigth="0" marginwidth="0" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d894.9497889281906!2d-71.3385505!3d-17.6421123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91445b07eeb2462b%3A0xf91ceb9b25c28cf5!2sIlo!5e0!3m2!1sen!2sus!4v1640696883809!5m2!1sen!2sus"></iframe>`;
    }, 500);
})