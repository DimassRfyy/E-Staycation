// get file name as text
const fileInput = document.getElementById('fileInput');
const filenameDisplay = document.getElementById('Filename');

fileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        filenameDisplay.innerText = file.name;
    } else {
        filenameDisplay.innerText = 'Upload Image';
    }
});