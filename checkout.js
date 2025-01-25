// Function to load cart items on the checkout page
function loadCheckout() {
    const checkoutItems = document.getElementById('checkoutItems');
    const checkoutTotal = document.getElementById('checkoutTotal');
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    checkoutItems.innerHTML = '';
    let total = 0;

    cart.forEach((item) => {
        total += item.price;
        const li = document.createElement('li');
        li.className = 'list-group-item';
        li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
        checkoutItems.appendChild(li);
    });

    checkoutTotal.textContent = total.toFixed(2);
}

// Function to finalize order
function finalizeOrder() {
    alert('Thank you for your order!');
    localStorage.removeItem('cart');
    window.location.href = 'index.html';
}

// Load cart data on page load
document.addEventListener('DOMContentLoaded', loadCheckout);
