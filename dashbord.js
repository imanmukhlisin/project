// Fungsi untuk filter produk berdasarkan input pencarian
function filterProducts(searchTerm) {
  const productGrids = document.querySelectorAll('.product-grid');
  productGrids.forEach((grid) => {
      const productCards = grid.querySelectorAll('.product-card');
      productCards.forEach((card) => {
          const productName = card.querySelector('p').textContent.toLowerCase();
          card.style.display = productName.includes(searchTerm) ? 'block' : 'none';
      });
  });
}

// Event listeners untuk input pencarian
searchButton.addEventListener('click', () => {
  const searchTerm = searchInput.value.toLowerCase();
  filterProducts(searchTerm);
});

searchInput.addEventListener('keyup', () => {
  const searchTerm = searchInput.value.toLowerCase();
  filterProducts(searchTerm);
});

// Fungsi untuk menampilkan tab yang dipilih
function showTab(tab) {
  const drinksGrid = document.querySelector('.product-grid.drinks');
  const foodGrid = document.querySelector('.product-grid.food');
  if (tab === 'drinks') {
      drinksGrid.style.display = 'flex';
      foodGrid.style.display = 'none';
      document.querySelector('.tab.active').classList.remove('active');
      document.querySelector('.tab:nth-child(1)').classList.add('active');
  } else {
      drinksGrid.style.display = 'none';
      foodGrid.style.display = 'flex';
      document.querySelector('.tab.active').classList.remove('active');
      document.querySelector('.tab:nth-child(2)').classList.add('active');
  }
}

// Fungsi untuk menambahkan produk ke ringkasan pesanan
function addProduct(name, price, type) {
  let productElement = document.createElement('p');
  productElement.innerHTML = `<span>${name}</span><span>Rp. ${price.toLocaleString('id-ID')}</span>`;
  orderSummary.appendChild(productElement);
  
  total += price;
  totalElement.textContent = `Total: Rp. ${total.toLocaleString('id-ID')}`;
  items.push({ name, price });
}

// Fungsi untuk menghapus pesanan
function clearOrder() {
  total = 0;
  totalElement.textContent = `Total: Rp. 0`;
  orderSummary.innerHTML = '';
  items = [];
}

// Fungsi untuk mengirim pesanan ke backend
async function sendOrder() {
  if (items.length === 0) {
      alert('Tidak ada produk yang dipilih!');
      return;
  }

  try {
      // Kirim data ke backend Python
      const response = await fetch('send_whatsapp', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ items }),
      })

      const result = await response.json();
      if (result.status === 'success') {
          alert(result.message);
          clearOrder();  // Reset pesanan setelah berhasil dikirim
      } else {
          alert('Gagal mengirim pesanan: ' + result.message);
      }
  } catch (error) {
      alert('Terjadi kesalahan: ' + error.message);
  }
}