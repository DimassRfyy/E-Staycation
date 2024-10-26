// function to get date value
function handleDateButtonClick(inputId) {
    const dateInput = document.getElementById(inputId);
    dateInput.showPicker();

    // Listen for date input changes
    dateInput.addEventListener("change", () => {
        const selectedDate = new Date(dateInput.value);
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const formattedDate = `${selectedDate.getDate()} ${monthNames[selectedDate.getMonth()]} ${selectedDate.getFullYear()}`;

        // Update button text
        dateInput.previousElementSibling.innerText = formattedDate;
        dateInput.previousElementSibling.classList.remove('text-[#757C98]', 'font-medium');
        dateInput.previousElementSibling.classList.add('font-semibold');
    });
}