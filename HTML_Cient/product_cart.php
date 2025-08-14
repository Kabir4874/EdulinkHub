<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart | BookStore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #00d4aa;
            --secondary-color: #0091ea;
            --dark-color: #1a237e;
            --light-color: #f5f7fa;
            --danger-color: #ff5252;
            --success-color: #4caf50;
            --text-dark: #333;
            --text-light: #666;
            --transition: all 0.3s ease;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --border-radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f9fafc;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header Styles */
        .cart-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInDown 0.6s ease-out;
        }

        .cart-header h1 {
            font-size: 2.5rem;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .cart-header .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            color: var(--text-light);
        }

        .breadcrumb a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* Main Layout */
        .cart-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .cart-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Cart Items */
        .cart-items {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            animation: fadeInLeft 0.6s ease-out;
        }

        .cart-items h2 {
            margin-bottom: 1.5rem;
            color: var(--dark-color);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr 150px;
            gap: 1.5rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid #eee;
            transition: var(--transition);
        }

        @media (max-width: 576px) {
            .cart-item {
                grid-template-columns: 80px 1fr;
                grid-template-rows: auto auto;
            }
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item:hover {
            background-color: rgba(0, 212, 170, 0.03);
        }

        .cart-item-img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .cart-item-img:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .cart-item-details {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .cart-item-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .cart-item-author {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .cart-item-actions {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .action-btn {
            background: none;
            border: none;
            color: var(--primary-color);
            cursor: pointer;
            font-size: 0.9rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .action-btn:hover {
            color: var(--dark-color);
            text-decoration: underline;
        }

        .action-btn i {
            font-size: 0.8rem;
        }

        .cart-item-price {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
        }

        @media (max-width: 576px) {
            .cart-item-price {
                grid-column: 1 / -1;
                flex-direction: row;
                align-items: center;
                margin-top: 1rem;
            }
        }

        .price-amount {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .original-price {
            text-decoration: line-through;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .discount-badge {
            background-color: var(--danger-color);
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-left: 0.5rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid #ddd;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background: var(--light-color);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .quantity-value {
            min-width: 30px;
            text-align: center;
            font-weight: 600;
        }

        /* Empty Cart */
        .empty-cart {
            text-align: center;
            padding: 3rem 0;
            animation: fadeIn 0.6s ease-out;
        }

        .empty-cart i {
            font-size: 3rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .empty-cart h3 {
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .empty-cart p {
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            padding: 0.8rem 1.5rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            background: #00b894;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 212, 170, 0.3);
        }

        /* Order Summary */
        .order-summary {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            position: sticky;
            top: 2rem;
            animation: fadeInRight 0.6s ease-out;
        }

        .order-summary h2 {
            margin-bottom: 1.5rem;
            color: var(--dark-color);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-totals {
            margin-top: 1.5rem;
        }

        .order-total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.8rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid #f5f5f5;
        }

        .order-total-row.total {
            font-weight: 700;
            font-size: 1.1rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
            border-bottom: none;
        }

        .coupon-form {
            margin-top: 1.5rem;
            display: flex;
            gap: 0.5rem;
        }

        .coupon-input {
            flex: 1;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }

        .coupon-input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .btn-apply {
            padding: 0 1.5rem;
            background: var(--dark-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-apply:hover {
            background: #0d47a1;
        }

        .checkout-btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .checkout-btn:hover {
            background: #00b894;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 212, 170, 0.3);
        }

        .checkout-btn:active {
            transform: translateY(0);
        }

        .payment-security {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-top: 1.5rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Recommendations */
        .recommendations {
            margin-top: 3rem;
            animation: fadeIn 0.6s ease-out;
        }

        .recommendations h2 {
            margin-bottom: 1.5rem;
            color: var(--dark-color);
            font-size: 1.5rem;
        }

        .recommendation-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Pulse Animation */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse {
            animation: pulse 1.5s infinite;
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .loading-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(0, 212, 170, 0.2);
            border-radius: 50%;
            border-top-color: var(--primary-color);
            animation: spin 1s ease-in-out infinite;
            margin-bottom: 1rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="cart-header">
            <h1><i class="fas fa-shopping-cart"></i> Your Shopping Cart</h1>
            <div class="breadcrumb">
                <span><a href="index.php">Home</a></span>
                <span>/</span>
                <span>Shopping Cart</span>
            </div>
        </header>

        <main class="cart-grid">
            <section class="cart-items" id="cartItemsContainer">
                <!-- Cart items will be dynamically inserted here -->
            </section>
            
            <aside class="order-summary">
                <h2><i class="fas fa-receipt"></i> Order Summary</h2>
                
                <div class="order-totals">
                    <div class="order-total-row">
                        <span>Subtotal</span>
                        <span id="subtotal">৳0.00</span>
                    </div>
                    <div class="order-total-row">
                        <span>Shipping</span>
                        <span>৳60.00</span>
                    </div>
                    <div class="order-total-row">
                        <span>Discount</span>
                        <span id="discount">-৳0.00</span>
                    </div>
                    <div class="order-total-row total">
                        <span>Total</span>
                        <span id="total">৳0.00</span>
                    </div>
                </div>
                
                <div class="coupon-form">
                    <input type="text" class="coupon-input" placeholder="Coupon code">
                    <button class="btn-apply">Apply</button>
                </div>
                
                <button class="checkout-btn pulse" id="checkoutBtn">
                    <i class="fas fa-lock"></i> Proceed to Checkout
                </button>
                
                <div class="payment-security">
                    <i class="fas fa-shield-alt"></i>
                    <span>Secure checkout</span>
                </div>
            </aside>
        </main>
        
        <section class="recommendations">
            <h2><i class="fas fa-star"></i> You Might Also Like</h2>
            <div class="recommendation-grid" id="recommendations">
                <!-- Recommendations will be dynamically inserted here -->
            </div>
        </section>
    </div>
    
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
        <p>Updating your cart...</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get cart from localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // DOM Elements
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const subtotalElement = document.getElementById('subtotal');
            const discountElement = document.getElementById('discount');
            const totalElement = document.getElementById('total');
            const checkoutBtn = document.getElementById('checkoutBtn');
            const loadingOverlay = document.getElementById('loadingOverlay');
            const recommendationsContainer = document.getElementById('recommendations');
            
            // Sample recommendation data
            const recommendations = [
                {
                    id: 1,
                    title: "Advanced JavaScript Programming",
                    author: "Dr. Sarah Johnson",
                    price: 850,
                    originalPrice: 1000,
                    image: "https://via.placeholder.com/200x300?text=Advanced+JS"
                },
                {
                    id: 2,
                    title: "Web Design Mastery",
                    author: "Michael Chen",
                    price: 750,
                    originalPrice: 900,
                    image: "https://via.placeholder.com/200x300?text=Web+Design"
                },
                {
                    id: 3,
                    title: "Database Systems",
                    author: "Prof. David Wilson",
                    price: 950,
                    originalPrice: 1100,
                    image: "https://via.placeholder.com/200x300?text=Database"
                },
                {
                    id: 4,
                    title: "Python for Beginners",
                    author: "Emily Rodriguez",
                    price: 650,
                    originalPrice: 800,
                    image: "https://via.placeholder.com/200x300?text=Python"
                }
            ];
            
            // Initialize cart display
            updateCartDisplay();
            displayRecommendations();
            
            // Update cart display function
            function updateCartDisplay() {
                let subtotal = 0;
                let html = '';
                
                if (cart.length === 0) {
                    html = `
                        <div class="empty-cart">
                            <i class="fas fa-shopping-cart"></i>
                            <h3>Your cart is empty</h3>
                            <p>Looks like you haven't added any items to your cart yet.</p>
                            <a href="products.php" class="btn-primary">
                                <i class="fas fa-book-open"></i> Browse Books
                            </a>
                        </div>
                    `;
                    
                    checkoutBtn.style.display = 'none';
                } else {
                    cart.forEach(item => {
                        const itemTotal = item.price * item.quantity;
                        subtotal += itemTotal;
                        
                        html += `
                            <div class="cart-item" data-id="${item.name}">
                                <img src="https://via.placeholder.com/100x120?text=Book" alt="${item.name}" class="cart-item-img">
                                <div class="cart-item-details">
                                    <div>
                                        <h3 class="cart-item-title">${item.name}</h3>
                                        <p class="cart-item-author">By Author Name</p>
                                    </div>
                                    <div class="cart-item-actions">
                                        <button class="action-btn" onclick="cartManager.removeFromCart('${escapeString(item.name)}')">
                                            <i class="fas fa-trash"></i> Remove
                                        </button>
                                        <button class="action-btn">
                                            <i class="fas fa-heart"></i> Save for later
                                        </button>
                                    </div>
                                </div>
                                <div class="cart-item-price">
                                    <div class="price-amount">৳${itemTotal.toFixed(2)}</div>
                                    <div class="quantity-controls">
                                        <button class="quantity-btn" onclick="cartManager.updateQuantity('${escapeString(item.name)}', 'decrease')">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="quantity-value">${item.quantity}</span>
                                        <button class="quantity-btn" onclick="cartManager.updateQuantity('${escapeString(item.name)}', 'increase')">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    
                    checkoutBtn.style.display = 'flex';
                }
                
                cartItemsContainer.innerHTML = html;
                
                // Calculate totals
                const shipping = 60;
                const discount = 0; // Would be calculated from coupons
                const total = subtotal + shipping - discount;
                
                subtotalElement.textContent = `৳${subtotal.toFixed(2)}`;
                discountElement.textContent = `-৳${discount.toFixed(2)}`;
                totalElement.textContent = `৳${total.toFixed(2)}`;
                
                // Update cart count in header
                const cartCount = document.getElementById('cartCount');
                if (cartCount) {
                    cartCount.textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
                }
            }
            
            // Display recommendations
            function displayRecommendations() {
                let html = '';
                
                recommendations.forEach(book => {
                    const discountPercent = Math.round(((book.originalPrice - book.price) / book.originalPrice) * 100);
                    
                    html += `
                        <div class="recommendation-item">
                            <img src="${book.image}" alt="${book.title}" class="recommendation-img">
                            <h3>${book.title}</h3>
                            <p>by ${book.author}</p>
                            <div class="price">
                                <span class="current-price">৳${book.price.toFixed(2)}</span>
                                <span class="original-price">৳${book.originalPrice.toFixed(2)}</span>
                                <span class="discount-badge">${discountPercent}% OFF</span>
                            </div>
                            <button class="btn-primary" onclick="cartManager.addToCart('${escapeString(book.title)}', ${book.price})">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    `;
                });
                
                recommendationsContainer.innerHTML = html;
            }
            
            // Helper function to escape strings for HTML
            function escapeString(str) {
                return str.replace(/'/g, "\\'").replace(/"/g, '&quot;');
            }
            
            // Checkout button click handler
            checkoutBtn.addEventListener('click', function() {
                if (cart.length > 0) {
                    window.location.href = 'payment.php';
                }
            });
            
            // Quantity button handlers (using event delegation)
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('quantity-btn')) {
                    const itemElement = e.target.closest('.cart-item');
                    if (itemElement) {
                        itemElement.classList.add('pulse');
                        setTimeout(() => {
                            itemElement.classList.remove('pulse');
                        }, 1500);
                    }
                }
            });
            
            // Expose update function to cartManager
            window.cartManager.updateCartDisplay = updateCartDisplay;
            
            // Show loading when cart is being updated
            window.cartManager.showLoading = function() {
                loadingOverlay.classList.add('active');
                setTimeout(() => {
                    loadingOverlay.classList.remove('active');
                }, 800);
            };
        });
    </script>
</body>
</html>