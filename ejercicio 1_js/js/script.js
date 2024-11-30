document.getElementById('product-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Obtener los valores ingresados por el usuario
    const productName = document.getElementById('product-name').value;
    const category = document.getElementById('category').value;
    const unitPrice = parseFloat(document.getElementById('unit-price').value);
    const units = parseInt(document.getElementById('units').value);

    // Validar que los datos sean correctos
    if (isNaN(unitPrice) || isNaN(units) || unitPrice <= 0 || units <= 0) {
        alert("Por favor, ingrese datos válidos.");
        return;
    }

    // Calcular el precio total
    const totalPrice = unitPrice * units;

    // Calcular el descuento según la categoría y las unidades
    let discountPercentage = 0;
    if (category === 'A') {
        if (units >= 1 && units <= 10) {
            discountPercentage = 1;
        } else if (units >= 11 && units <= 20) {
            discountPercentage = 1.5;
        } else if (units > 20) {
            discountPercentage = 2;
        }
    } else if (category === 'B') {
        if (units >= 1 && units <= 10) {
            discountPercentage = 1.2;
        } else if (units >= 11 && units <= 20) {
            discountPercentage = 2;
        } else if (units > 20) {
            discountPercentage = 3;
        }
    } else if (category === 'C') {
        if (units >= 1 && units <= 10) {
            discountPercentage = 0;
        } else if (units >= 11 && units <= 20) {
            discountPercentage = 0.5;
        } else if (units > 20) {
            discountPercentage = 1;
        }
    }

    // Calcular el valor del descuento
    const discountValue = (totalPrice * discountPercentage) / 100;
    const totalAfterDiscount = totalPrice - discountValue;

    // Mostrar los resultados
    const resultDiv = document.getElementById('result');
    resultDiv.innerHTML = `
        <table>
            <tr>
                <th>Producto</th><td>${productName}</td>
            </tr>
            <tr>
                <th>Categoría</th><td>${category}</td>
            </tr>
            <tr>
                <th>Unidades</th><td>${units}</td>
            </tr>
            <tr>
                <th>Precio Unitario</th><td>$${unitPrice.toFixed(2)}</td>
            </tr>
            <tr>
                <th>Precio Total</th><td>$${totalPrice.toFixed(2)}</td>
            </tr>
            <tr class="${category}">
                <th>Descuento (%)</th><td>${discountPercentage}%</td>
            </tr>
            <tr class="${category}">
                <th>Valor del Descuento</th><td>$${discountValue.toFixed(2)}</td>
            </tr>
            <tr class="${category}">
                <th>Total Después del Descuento</th><td>$${totalAfterDiscount.toFixed(2)}</td>
            </tr>
        </table>
    `;
});
