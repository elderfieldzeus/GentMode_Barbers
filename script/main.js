document.getElementById("newsletter_form").addEventListener("submit", function(event) {
    event.preventDefault();

    const val = document.querySelector(".news_email");
    if (val.value) {
        document.getElementById("subscribe_message").style.display = "block";
    } else {
        document.getElementById("subscribe_message").style.display = "none";
    }
});

document.getElementById("contact_form").addEventListener("submit", function(event) {
    event.preventDefault();

    const inputs = document.querySelectorAll(".contact_form > input");

    let isBlank = 0;

    inputs.forEach((input) => {
        if (!input.value) {
            isBlank = 1;
        }
    });

    if (isBlank == 0) {
        document.getElementById("contact_message").style.display = "block";
        document.getElementById("message").insertAdjacentHTML('afterend', '<div id="contact_message" style="display: block;">Message sent successfully!</div>');
        document.getElementById("name").style.display = "none";
        document.getElementById("email").style.display = "none";
        document.getElementById("number").style.display = "none";
        document.getElementById("message").style.display = "none";
        document.getElementById("form_submit").style.display = "none";

        const labels = document.querySelectorAll(".contact_form > label");

        labels.forEach((label) => {
            label.style.display = "none";
        });
    }

});

// Debounce function to limit the frequency of the scroll event firing
function debounce(func, delay) {
    let timeout;
    return function() {
        const context = this;
        const args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), delay);
    };
}

// Toggle the 'scrolled' class smoothly
function toggleScrolledClass() {
    const nav = document.querySelector('nav');
    if (window.scrollY > 0) {
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
}

window.addEventListener('scroll', debounce(toggleScrolledClass, 10)); // Adjust the delay as needed