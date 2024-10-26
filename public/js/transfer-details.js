// copy function
const copyBtns = document.querySelectorAll('.copy-btn');

copyBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        const copyElement = document.querySelectorAll('.copy')[index];
        const tempInput = document.createElement('input');
        tempInput.value = copyElement.textContent;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
    });
});

// enable button submit if proof provided
const submitButton = document.getElementById('submitButton');

fileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        submitButton.removeAttribute('disabled');
    } else {
        submitButton.setAttribute('disabled', true);
    }
});