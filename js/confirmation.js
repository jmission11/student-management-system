function openConfirmationPopup(event) {
    event.preventDefault(); // Prevent the default form submission
    var confirmation = window.confirm("Are you sure you want to delete this record?");
    if (confirmation) {
        // If the user confirms, submit the form
        document.getElementById("detailsPage").submit();
    } else {
        // If the user cancels, do nothing
        return false;
    }
}