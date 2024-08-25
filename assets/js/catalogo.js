document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);
    const categoria = params.get('categoria');

    document.getElementById('categoria-title').textContent = 'Catálogo de ' + categoria;

    // Llamada AJAX para obtener productos de la base de datos
    fetch('ObtenerCategoriadelCatalogo.php?categoria=' + categoria)
        .then(response => response.json())
        .then(data => {
            let catalogoDiv = document.getElementById('catalogo');
            if (data.length > 0) {
                let list = '<ul>';
                data.forEach(item => {
                    list += '<li>' + item.nombre + ': ' + item.descripcion + '</li>';
                });
                list += '</ul>';
                catalogoDiv.innerHTML = list;
            } else {
                catalogoDiv.innerHTML = '<p>No hay productos disponibles en la base de datos para esta categoría.</p>';
            }
        })
        .catch(error => console.error('Error:', error));

    // Lista de productos de ejemplo para cada categoría
    const exampleProducts = {
        'Acabados': [
            { name: 'Pintura', img: 'img/pintura.jpg', description: 'Pintura para interiores y exteriores de alta calidad, disponible en varios colores.' },
            { name: 'Azulejos', img: 'img/azulejos.jpg', description: 'Azulejos de cerámica y porcelana en diversos diseños y tamaños.' },
            { name: 'Barniz', img: 'img/barniz.jpg', description: 'Barniz para madera y metal, ofrece protección y acabado brillante.' },
            { name: 'Yeso', img: 'img/yeso.jpg', description: 'Yeso para acabados de construcción, ideal para paredes y techos.' }
        ],
        'Construcción': [
            { name: 'Cemento', img: 'img/cemento.jpg', description: 'Cemento para construcción de alta resistencia, ideal para estructuras.' },
            { name: 'Arena', img: 'img/arena.jpg', description: 'Arena fina y gruesa para mezclas de concreto y mortero.' },
            { name: 'Grava', img: 'img/piedra.jpg', description: 'Grava para construcción, usada en la fabricación de concreto.' },
            { name: 'Ladrillos', img: 'img/ladrillos.jpg', description: 'Ladrillos de arcilla y concreto para muros y estructuras.' }
        ],
        'Hogar': [
            { name: 'Muebles', img: 'img/muebles.jpg', description: 'Muebles para el hogar, incluyendo sofás, mesas y sillas.' },
            { name: 'Electrodomésticos', img: 'img/electrodomesticos.jpg', description: 'Electrodomésticos de cocina como refrigeradores, estufas y microondas.' },
            { name: 'Decoración', img: 'img/decoracion.jpg', description: 'Artículos de decoración para el hogar, como cuadros y jarrones.' },
            { name: 'Iluminación', img: 'img/iluminacion.jpg', description: 'Lámparas y sistemas de iluminación para interiores y exteriores.' }
        ],
        'Herramientas': [
            { name: 'Taladro', img: 'img/taladro.jpg', description: 'Taladro inalámbrico con múltiples velocidades y brocas intercambiables.' },
            { name: 'Martillo', img: 'img/martillo.jpg', description: 'Martillo de acero de alta resistencia para trabajos pesados.' },
            { name: 'Llave inglesa', img: 'img/llave-inglesa.jpg', description: 'Llave inglesa ajustable de diferentes tamaños.' },
            { name: 'Sierra', img: 'img/sierra.jpg', description: 'Sierra manual y eléctrica para cortar madera y metal.' }
        ]
    };

    // Obtener el contenedor de productos de ejemplo
    const productGrid = document.getElementById('product-grid');
    productGrid.innerHTML = '';

    // Cargar los productos de ejemplo correspondientes a la categoría
    if (exampleProducts[categoria]) {
        exampleProducts[categoria].forEach(product => {
            const productItem = document.createElement('div');
            productItem.classList.add('product-item');
            productItem.innerHTML = `
                <img src="${product.img}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
            `;
            productGrid.appendChild(productItem);
        });
    } else {
        productGrid.innerHTML = '<p>No hay productos disponibles en esta categoría.</p>';
    }
});
