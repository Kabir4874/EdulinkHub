<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EduHub - Payment</title>
  <link rel="stylesheet" href="../CSS/payment.css" />
  <link rel="icon" href="../images/logo.png" type="image/png" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

  <div class="container">
    <div class="payment-wrapper">

      <!-- Header -->
      <header class="payment-header">
        <div class="logo">
          <i class="fas fa-shield-alt"></i>
          <span>EduHub Checkout</span>
        </div>
        <div class="security-badge">
          <i class="fas fa-lock"></i>
          <span>Secure Payment</span>
        </div>
      </header>

      <!-- Payment Section -->
      <div class="payment-container">

        <!-- Left: Payment Form -->
        <div class="payment-form-section">
          <h1>Complete Your Payment</h1>
          <p class="subtitle">Enter your payment details below</p>

          <!-- Order Summary -->
          <div class="order-summary">
            <h3>Order Summary</h3>
            <div class="order-item">
              <span>Premium Access</span>
              <span>800 Taka</span>
            </div>
            <div class="order-item">
              <span>Tax</span>
              <span>200 Taka</span>
            </div>
            <div class="order-total">
              <span>Total</span>
              <span>1000 Taka</span>
            </div>
          </div>

         <!-- Payment Method -->
            <div class="form-section">
              <h3>Payment Method</h3>
              <div class="payment-methods">

                <label class="payment-method">
                  <input type="radio" name="method" />
                  <div class="method-content">
                    <img src="../images/bkash.png" alt="Bkash" class="method-icon" />
                    <span>Bkash</span>
                  </div>
                </label>

                <label class="payment-method">
                  <input type="radio" name="method" />
                  <div class="method-content">
                    <img src="../images/nagad.png" alt="Nagad" class="method-icon" />
                    <span>Nagad</span>
                  </div>
                </label>

                <label class="payment-method">
                  <input type="radio" name="method" />
                  <div class="method-content">
                    <img src="../images/rocket.png" alt="Rocket" class="method-icon" />
                    <span>Rocket</span>
                  </div>
                </label>

                <label class="payment-method">
                  <input type="radio" name="method" />
                  <div class="method-content">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Cash ON Delivery</span>
                  </div>
                </label>

              </div>
            </div>

          <!-- Card Info -->
          <div class="form-section card-details">
            <h3>Card Details</h3>
            <div class="form-group">
              <label>Card Number</label>
              <div class="input-wrapper">
                <input type="text" placeholder="1234 5678 9012 3456" />
                <div class="card-icons">
                  <i class="fab fa-cc-visa"></i>
                  <i class="fab fa-cc-mastercard"></i>
                  <i class="fab fa-cc-amex"></i>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label>Expiry Date</label>
                <input type="text" placeholder="MM/YY" />
              </div>
              <div class="form-group">
                <label>CVV</label>
                <div class="input-wrapper">
                  <input type="text" placeholder="123" />
                  <i class="fas fa-question-circle cvv-help"></i>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Cardholder Name</label>
              <input type="text" placeholder="John Doe" />
            </div>
          </div>

          <!-- Billing -->
          <div class="form-section">
            <h3>Billing Address</h3>
            <div class="form-group">
              <label>Email</label>
              <input type="email" placeholder="john@example.com" />
            </div>
            <div class="form-group">
              <label>Street Address</label>
              <input type="text" placeholder="123 Main St" />
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>City</label>
                <input type="text" placeholder="New York" />
              </div>
              <div class="form-group">
                <label>State</label>
                <select>
                  <option value="">Select</option>
                  <option>NY</option>
                  <option>CA</option>
                  <option>TX</option>
                </select>
              </div>
              <div class="form-group">
                <label>ZIP</label>
                <input type="text" placeholder="10001" />
              </div>
            </div>
          </div>

          <!-- Terms -->
          <div class="form-section">
            <label class="checkbox-wrapper">
              <input type="checkbox" required />
              <span class="checkmark"></span>
              <span>I agree to <a href="#">Terms</a> and <a href="#">Privacy</a></span>
            </label>
          </div>

          <!-- Pay Button -->
          <button class="pay-button">
            <i class="fas fa-lock"></i>
            <span>Pay $32.39</span>
          </button>

          <!-- Security Info -->
          <div class="security-info">
            <div class="security-item"><i class="fas fa-shield-alt"></i> SSL Encrypted</div>
            <div class="security-item"><i class="fas fa-credit-card"></i> PCI Compliant</div>
            <div class="security-item"><i class="fas fa-undo"></i> 30-day Refund</div>
          </div>
        </div>

        <!-- Right: Info & Testimonial -->
        <div class="side-panel">
          <div class="product-info">
            <div class="product-image"><i class="fas fa-crown"></i></div>
            <h3>Premium Subscription</h3>
            <p>Get unlimited access to books, professors, and resources.</p>
            <div class="features">
              <div class="feature"><i class="fas fa-check"></i> Unlimited downloads</div>
              <div class="feature"><i class="fas fa-check"></i> Priority support</div>
              <div class="feature"><i class="fas fa-check"></i> Weekly updates</div>
            </div>
          </div>

          <div class="testimonial">
            <p>"EduHub made my learning 10x faster. Worth every cent!"</p>
            <div class="testimonial-author">
              <div class="author-avatar"><i class="fas fa-user"></i></div>
              <div class="author-info">
                <span class="author-name">Zerin A.</span>
                <span class="author-title">Student, BSc CSE</span>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

</body>
</html>
