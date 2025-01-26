let cart = []; 

function addToCart(containerId) {
 
    const productContainer = document.getElementById(containerId);

    if (!productContainer) {
        alert('Produto não encontrado!');
        return;
    }


    const productNameElement = productContainer.closest('.product-item').querySelector('.products-list');
    const productName = productNameElement ? productNameElement.textContent.trim() : null;


    const priceElementId = `price${containerId === 'soft' ? 1 : containerId === 'medium' ? 3 : 2}`;
    const priceElement = document.getElementById(priceElementId);
    const productPrice = priceElement ? parseFloat(priceElement.textContent.trim().replace('$', '')) : null;

    if (!productName || isNaN(productPrice)) {
        alert('Informações do produto estão incompletas!');
        return;
    }


    cart.push({ name: productName, price: productPrice });
    updateCartModal();
    alert(`${productName} foi adicionado ao carrinho!`);
}


function updateCartModal() {
    const cartItemsElement = document.getElementById('cartItems');
    const cartCountElement = document.getElementById('cartCount');
    const cartTotalElement = document.getElementById('cartTotal');

    
    cartItemsElement.innerHTML = '';

    
    let total = 0;
    cart.forEach((item, index) => {
        total += item.price;

        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.textContent = `${item.name} - $${item.price.toFixed(2)}`;

       
        const removeButton = document.createElement('button');
        removeButton.className = 'btn btn-danger btn-sm';
        removeButton.textContent = 'Remove';
        removeButton.onclick = () => removeFromCart(index);

        li.appendChild(removeButton);
        cartItemsElement.appendChild(li);
    });

 
    cartCountElement.textContent = cart.length;
    cartTotalElement.textContent = total.toFixed(2);
}




function removeFromCart(index) {
    if (index >= 0 && index < cart.length) {
        cart.splice(index, 1); 
        updateCartModal(); 
    }
}


function toggleCart() {
    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
    cartModal.show(); 
}


function proceedToCheckout() {
    if (cart.length === 0) {
        alert('Seu carrinho está vazio! Adicione alguns itens antes de prosseguir.');
        return;
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    window.location.href = 'checkout.html';
}


function initializeCart() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
        updateCartModal();
    }
}

initializeCart();
