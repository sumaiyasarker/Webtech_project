function increaseQuantity() {
    let quantity = document.getElementById('quantity');
    let totalPrice = document.getElementById('total_price');
    let price = parseFloat(document.querySelector('input[name="price"]').value);

    quantity.value = parseInt(quantity.value) + 1;
    totalPrice.innerText = (price * quantity.value).toFixed(2);
}

function decreaseQuantity() {
    let quantity = document.getElementById('quantity');
    let totalPrice = document.getElementById('total_price');
    let price = parseFloat(document.querySelector('input[name="price"]').value);

    if (quantity.value > 1) {
        quantity.value = parseInt(quantity.value) - 1;
        totalPrice.innerText = (price * quantity.value).toFixed(2);
    }

  
}

//alert('Profile deleted successfully. Redirecting to login page.')