<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Products</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css" />
</head>
<body>
    <div class="header">
        <h1>PWL Coffee Shop</h1>
        <nav class="nav-links">
            <a href="login.php">Logout</a>
        </nav>
    </div>
    <div class="container">
        <div class="left-panel">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="search-input" placeholder="Cari produk..." />
                <button id="search-button">Cari</button>
            </div>
            <div class="tabs">
                <div class="tab " onclick="showTab('drinks')">Minuman</div>
                <div class="tab " onclick="showTab('food')">Makanan</div>
            </div>
            <div class="product-grid drinks">
                <div class="product-card" onclick="addProduct('Cappuccino', 28000, 'drink')">
                    <img src="cappucino.jpeg" alt="Cappuccino" />
                    <p>Cappuccino</p>
                    <p>Rp. 28,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Espresso', 25000, 'drink')">
                    <img src="espresoow.jpeg" alt="Espresso" />
                    <p>Espresso</p>
                    <p>Rp. 25,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Americano', 32000, 'drink')">
                    <img src="americano.jpeg" alt="Americano" />
                    <p>Americano</p>
                    <p>Rp. 32,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Arabica', 18000, 'drink')">
                    <img src="arabica.jpeg" alt="Arabica" />
                    <p>Arabica</p>
                    <p>Rp. 18,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Matcha Latte', 28000, 'drink')">
                    <img src="matcha latte.jpeg" alt="Matcha Latte" />
                    <p>Matcha Latte</p>
                    <p>Rp. 28,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Milk Drink', 28000, 'drink')">
                    <img src="cappucino.jpeg" alt="Milk Drink" />
                    <p>Milk Drink</p>
                    <p>Rp. 28,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Chocolate Drink', 28000, 'drink')">
                    <img src="coklat.jpeg" alt="Chocolate Drink" />
                    <p>Chocolate Drink</p>
                    <p>Rp. 28,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Chocolate Coffee', 28000, 'drink')">
                    <img src="coklatcoffe.jpeg" alt="Chocolate Coffee" />
                    <p>Chocolate Coffee</p>
                    <p>Rp. 28,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Kopi Hitam', 28000, 'drink')">
                    <img src="kopihitam.jpeg" alt="Kopi Hitam" />
                    <p>Kopi Hitam</p>
                    <p>Rp. 28,000</p>
                </div>
            </div>
            <div class="product-grid food" style="display: none;">
                <div class="product-card" onclick="addProduct('Cireng', 15000, 'food')">
                    <img src="cireng.jpeg" alt="Cireng" />
                    <p>Cireng</p>
                    <p>Rp. 15,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Pisang Goreng', 20000, 'food')">
                    <img src="pisang.jpeg" alt="Pisang Goreng" />
                    <p>Pisang Goreng</p>
                    <p>Rp. 20,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Roti Bakar', 20000, 'food')">
                    <img src="roti.jpeg" alt="Roti Bakar" />
                    <p>Roti Bakar</p>
                    <p>Rp. 20,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Tahu Crispy', 15000, 'food')">
                    <img src="tahu.jpeg" alt="Tahu Crispy" />
                    <p>Tahu Crispy</p>
                    <p>Rp. 15,000</p>
                </div>
                <div class="product-card" onclick="addProduct('Tempe Crispy', 15000, 'food')">
                    <img src="tempe.jpeg" alt="Tempe Crispy" />
                    <p>Tempe Crispy</p>
                    <p>Rp. 15,000</p>
                </div>
            </div>
        </div>
        <div class="right-panel">
            <div class="sales-details">
                <h2>Total Pembelian</h2>
                <p id="total">Total: Rp. 0</p>
            </div>
            <div class="order-summary" id="order-summary">
                <!-- Informasi produk akan ditampilkan di sini -->
            </div>
            <div class="footer">
                <button class="clear-all" onclick="clearOrder()">Hapus</button>
                <button class="make-payment" onclick="sendOrder()">Pesan</button>
            </div>
        </div>
    </div>

    <script>
        let total = 0;
        let orderSummary = document.getElementById('order-summary');
        let totalElement = document.getElementById('total');
        let items = [];

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

        function addProduct(name, price, type) {
            let productElement = document.createElement('p');
            productElement.innerHTML = `<span>${name}</span><span>Rp. ${price.toLocaleString('id-ID')}</span>`;
            orderSummary.appendChild(productElement);
        
            total += price;
            totalElement.textContent = `Total: Rp. ${total.toLocaleString('id-ID')}`;
            items.push({ name, price });
        }

        function clearOrder() {
            total = 0;
            totalElement.textContent = `Total: Rp. 0`;
            orderSummary.innerHTML = '';
            items = [];
        }

        async function sendOrder() {
            const response = await fetch('/calculate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ items }),
            });

            const result = await response.json();
            alert(`Total: Rp. ${result.total}`);
        }

        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const productGrids = document.querySelectorAll('.product-grid');

        searchButton.addEventListener('click', () => {
            const searchTerm = searchInput.value.toLowerCase();
            productGrids.forEach((grid) => {
                const productCards = grid.querySelectorAll('.product-card');
                productCards.forEach((card) => {
                    const productName = card.querySelector('p').textContent.toLowerCase();
                    if (productName.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        searchInput.addEventListener('keyup', () => {
            const searchTerm = searchInput.value.toLowerCase();
            productGrids.forEach((grid) => {
                const productCards = grid.querySelectorAll('.product-card');
                productCards.forEach((card) => {
                    const productName = card.querySelector('p').textContent.toLowerCase();
                    if (productName.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <script src="dashbord.js"></script>
</body>
</html> 