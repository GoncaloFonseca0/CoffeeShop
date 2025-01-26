document.addEventListener("DOMContentLoaded", () => {
    const checkoutForm = document.getElementById("checkoutForm");

    checkoutForm.addEventListener("submit", (e) => {
        e.preventDefault();
        console.log("Form submitted!"); // Debugging point
        
        const data = {
            fullName: document.getElementById("fullName").value,
            email: document.getElementById("email").value,
            address: document.getElementById("address").value,
            city: document.getElementById("city").value,
            zip: document.getElementById("zip").value,
            country: document.getElementById("country").value,
        };

        if (document.getElementById("saveInfo").checked) {
            localStorage.setItem("userInfo", JSON.stringify(data));
        }

        alert("Order placed successfully!");
        window.location.href = "order-confirmation.html"; // Redirect here
    });
});
