async function fetchProducts() {
    try {
        // Faz a requisição para o PHP
        const response = await fetch('Getproducts.php');
        if (!response.ok) {
            throw new Error(`Erro HTTP! Status: ${response.status}`);
        }

        // Converte a resposta para JSON
        const products = await response.json();

        // Seleciona os containers para cada intensidade
        const softContainer = document.getElementById('soft');
        const mediumContainer = document.getElementById('medium');
        const hardContainer = document.getElementById('hard');
        const descri1Container = document.getElementById('descr1');
        const descri2Container = document.getElementById('descr2');
        const descri3Container = document.getElementById('descr3');
        const price1Container = document.getElementById('price1');
        const price2Container = document.getElementById('price2');
        const price3Container = document.getElementById('price3');

        // Inicializa os containers
        softContainer.innerHTML = '';
        mediumContainer.innerHTML = '';
        hardContainer.innerHTML = '';
        descri1Container.innerHTML = '';
        descri2Container.innerHTML = '';
        descri3Container.innerHTML = '';
        price1Container.innerHTML = '';
        price2Container.innerHTML = '';
        price3Container.innerHTML = '';

        // Itera pelos produtos para Strength
        products.forEach(product => {
            const productDiv = document.createElement('div');
            productDiv.classList.add('product-item');
            productDiv.innerHTML = `<h3>${product.ProductName}</h3>`;

            if (product.Strength === 'Soft') {
                softContainer.appendChild(productDiv);
            } else if (product.Strength === 'Medium') {
                mediumContainer.appendChild(productDiv);
            } else if (product.Strength === 'Strong') {
                hardContainer.appendChild(productDiv);
            }
        });

       
        products.forEach(descriptions => {
            const descrDiv = document.createElement('div');
            descrDiv.classList.add('description-item');
            descrDiv.innerHTML = `<p>${descriptions.Description}</p>`;

            if (descriptions.Strength === 'Soft') {
                descri1Container.appendChild(descrDiv);
            } else if (descriptions.Strength === 'Medium') {
                descri2Container.appendChild(descrDiv);
            } else if (descriptions.Strength === 'Strong') {
                descri3Container.appendChild(descrDiv);
            }
        });

        products.forEach(prices => {
            const priceDiv = document.createElement('div');
            priceDiv.classList.add('price-list');
            priceDiv.innerHTML = `<p>${prices.Price}</p>`;

            if (prices.Strength === 'Soft') {
                price1Container.appendChild(priceDiv);
            } else if (prices.Strength === 'Medium') {
                price2Container.appendChild(priceDiv);
            } else if (prices.Strength === 'Strong') {
                price3Container.appendChild(priceDiv);
            }
        });
    } catch (error) {
        console.error('Erro ao carregar produtos:', error);

  
        document.getElementById('soft').innerHTML = '<p>Erro ao carregar os produtos.</p>';
        document.getElementById('medium').innerHTML = '<p>Erro ao carregar os produtos.</p>';
        document.getElementById('hard').innerHTML = '<p>Erro ao carregar os produtos.</p>';
        document.getElementById('descr1').innerHTML = '<p>Erro ao carregar descrição.</p>';
        document.getElementById('descr2').innerHTML = '<p>Erro ao carregar descrição.</p>';
        document.getElementById('descr3').innerHTML = '<p>Erro ao carregar descrição.</p>';
    }
}


fetchProducts();
