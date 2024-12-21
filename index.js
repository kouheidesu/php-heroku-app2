function toggleMessage() {
    const message = document.getElementById('message');
    if (message.classList.contains('hidden')) {
        message.classList.remove('hidden');
    } else {
        message.classList.add('hidden');
    }
}
