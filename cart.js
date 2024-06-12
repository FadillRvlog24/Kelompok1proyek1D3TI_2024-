// Fungsi untuk menambah jumlah produk
  function increaseQuantity(input) {
    var currentValue = parseInt(input.value);
    input.value = currentValue + 1;
    updateTotal();
  }

  // Fungsi untuk mengurangi jumlah produk
  function decreaseQuantity(input) {
    var currentValue = parseInt(input.value);
    if (currentValue > 1) {
      input.value = currentValue - 1;
      updateTotal();
    }
  }

  // Fungsi untuk menghapus produk dari keranjang belanja
  function removeProduct(row) {
    row.parentNode.removeChild(row);
    updateTotal();
  }

  // Fungsi untuk memperbarui total biaya
  function updateTotal() {
    var total = 0;
    var items = document.querySelectorAll('.product-price');
    items.forEach(function(item) {
      var price = parseFloat(item.innerText.replace('Rp.', '').replace(',', ''));
      var quantity = parseInt(item.parentElement.querySelector('.quantity-amount').value);
      total += price * quantity;
    });
    document.getElementById('total').innerText = 'Rp.' + total.toFixed(2);
  }
