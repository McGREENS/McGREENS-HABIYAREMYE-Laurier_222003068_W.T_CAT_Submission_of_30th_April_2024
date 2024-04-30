/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("appointmentForm");
    const successMessage = document.getElementById("successMessage");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); 

        const formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            body: formData,
        })
        .then(response => {
            if (response.ok) {
                successMessage.style.display = "block"; 
            }
            throw new Error("Network response was not ok.");
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});
    
//<!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
//<!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->

