document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById('toggleMessageButton');
    const message = document.getElementById('message');

    toggleButton.addEventListener("click", () => {
        if (message.classList.contains('hidden')) {
            message.classList.remove('hidden');
        } else {
            message.classList.add('hidden');
        }
    });
});
