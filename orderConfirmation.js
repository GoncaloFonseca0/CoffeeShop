function proceedToCheckout() {
    if (cart.length === 0) {
        alert('Seu carrinho está vazio! Adicione itens antes de continuar.');
        return;
    }

    localStorage.setItem("cart", JSON.stringify(cart)); // Salva os itens no carrinho
    window.location.href = "checkout.html"; // Redireciona para a página de checkout
}
