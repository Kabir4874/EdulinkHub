document.addEventListener('DOMContentLoaded', function() {
    // Form elements
    const paymentForm = document.getElementById('paymentForm');
    const cardNumberInput = document.getElementById('cardNumber');
    const expiryDateInput = document.getElementById('expiryDate');
    const cvvInput = document.getElementById('cvv');
    const paymentMethods = document.querySelectorAll('input[name="payment-method"]');
    const cardDetailsSection = document.querySelector('.card-details');
    const payButton = document.querySelector('.pay-button');

    // Card number formatting
    cardNumberInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
        
        if (formattedValue.length > 19) {
            formattedValue = formattedValue.substring(0, 19);
        }
        
        e.target.value = formattedValue;
        
        // Card type detection
        detectCardType(value);
        
        // Validation
        validateCardNumber(value);
    });

    // Expiry date formatting
    expiryDateInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        
        e.target.value = value;
        validateExpiryDate(value);
    });

    // CVV validation
    cvvInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^0-9]/gi, '');
        e.target.value = value;
        validateCVV(value);
    });

    // Payment method switching
    paymentMethods.forEach(method => {
        method.addEventListener('change', function() {
            // Remove active class from all methods
            document.querySelectorAll('.payment-method').forEach(pm => {
                pm.classList.remove('active');
            });
            
            // Add active class to selected method
            this.closest('.payment-method').classList.add('active');
            
            // Show/hide card details
            if (this.value === 'card') {
                cardDetailsSection.style.display = 'block';
                cardDetailsSection.style.animation = 'fadeInUp 0.3s ease-out';
            } else {
                cardDetailsSection.style.display = 'none';
            }
        });
    });

    // Form validation
    function validateCardNumber(cardNumber) {
        const formGroup = cardNumberInput.closest('.form-group');
        const cleanNumber = cardNumber.replace(/\s/g, '');
        
        if (cleanNumber.length === 0) {
            setFieldState(formGroup, 'normal');
            return false;
        }
        
        if (cleanNumber.length < 13 || cleanNumber.length > 19) {
            setFieldState(formGroup, 'error', 'Please enter a valid card number');
            return false;
        }
        
        if (luhnCheck(cleanNumber)) {
            setFieldState(formGroup, 'success');
            return true;
        } else {
            setFieldState(formGroup, 'error', 'Please enter a valid card number');
            return false;
        }
    }

    function validateExpiryDate(expiryDate) {
        const formGroup = expiryDateInput.closest('.form-group');
        
        if (expiryDate.length === 0) {
            setFieldState(formGroup, 'normal');
            return false;
        }
        
        if (expiryDate.length !== 5) {
            setFieldState(formGroup, 'error', 'Please enter MM/YY format');
            return false;
        }
        
        const [month, year] = expiryDate.split('/');
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear() % 100;
        const currentMonth = currentDate.getMonth() + 1;
        
        if (parseInt(month) < 1 || parseInt(month) > 12) {
            setFieldState(formGroup, 'error', 'Please enter a valid month');
            return false;
        }
        
        if (parseInt(year) < currentYear || (parseInt(year) === currentYear && parseInt(month) < currentMonth)) {
            setFieldState(formGroup, 'error', 'Card has expired');
            return false;
        }
        
        setFieldState(formGroup, 'success');
        return true;
    }

    function validateCVV(cvv) {
        const formGroup = cvvInput.closest('.form-group');
        
        if (cvv.length === 0) {
            setFieldState(formGroup, 'normal');
            return false;
        }
        
        if (cvv.length < 3 || cvv.length > 4) {
            setFieldState(formGroup, 'error', 'Please enter a valid CVV');
            return false;
        }
        
        setFieldState(formGroup, 'success');
        return true;
    }

    function setFieldState(formGroup, state, message = '') {
        formGroup.classList.remove('error', 'success', 'normal');
        formGroup.classList.add(state);
        
        let errorMessage = formGroup.querySelector('.error-message');
        if (!errorMessage) {
            errorMessage = document.createElement('div');
            errorMessage.className = 'error-message';
            formGroup.appendChild(errorMessage);
        }
        
        errorMessage.textContent = message;
    }

    // Luhn algorithm for card validation
    function luhnCheck(cardNumber) {
        let sum = 0;
        let isEven = false;
        
        for (let i = cardNumber.length - 1; i >= 0; i--) {
            let digit = parseInt(cardNumber.charAt(i));
            
            if (isEven) {
                digit *= 2;
                if (digit > 9) {
                    digit -= 9;
                }
            }
            
            sum += digit;
            isEven = !isEven;
        }
        
        return sum % 10 === 0;
    }

    // Card type detection
    function detectCardType(cardNumber) {
        const cardIcons = document.querySelectorAll('.card-icons i');
        cardIcons.forEach(icon => icon.style.opacity = '0.3');
        
        if (cardNumber.startsWith('4')) {
            // Visa
            document.querySelector('.fa-cc-visa').style.opacity = '1';
        } else if (cardNumber.startsWith('5') || cardNumber.startsWith('2')) {
            // Mastercard
            document.querySelector('.fa-cc-mastercard').style.opacity = '1';
        } else if (cardNumber.startsWith('3')) {
            // American Express
            document.querySelector('.fa-cc-amex').style.opacity = '1';
        }
    }

    // Form submission
    paymentForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        payButton.classList.add('loading');
        payButton.disabled = true;
        
        // Simulate payment processing
        setTimeout(() => {
            // Hide loading state
            payButton.classList.remove('loading');
            payButton.disabled = false;
            
            // Show success message
            showSuccessMessage();
        }, 3000);
    });

    function showSuccessMessage() {
        const successModal = document.createElement('div');
        successModal.className = 'success-modal';
        successModal.innerHTML = `
            <div class="success-content">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2>Payment Successful!</h2>
                <p>Your payment has been processed successfully. You will receive a confirmation email shortly.</p>
                <button class="success-button" onclick="this.closest('.success-modal').remove()">
                    Continue
                </button>
            </div>
        `;
        
        document.body.appendChild(successModal);
        
        // Add styles for success modal
        const style = document.createElement('style');
        style.textContent = `
            .success-modal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                animation: fadeIn 0.3s ease-out;
            }
            
            .success-content {
                background: white;
                padding: 40px;
                border-radius: 20px;
                text-align: center;
                max-width: 400px;
                width: 90%;
                animation: slideUp 0.3s ease-out;
            }
            
            .success-icon {
                font-size: 64px;
                color: #10b981;
                margin-bottom: 20px;
            }
            
            .success-content h2 {
                font-size: 24px;
                color: #1f2937;
                margin-bottom: 12px;
            }
            
            .success-content p {
                color: #6b7280;
                margin-bottom: 24px;
                line-height: 1.6;
            }
            
            .success-button {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
                color: white;
                border: none;
                padding: 12px 24px;
                border-radius: 8px;
                font-weight: 600;
                cursor: pointer;
                transition: transform 0.2s ease;
            }
            
            .success-button:hover {
                transform: translateY(-2px);
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        `;
        document.head.appendChild(style);
    }

    // Real-time validation for all required fields
    const requiredFields = ['cardName', 'email', 'address', 'city', 'zip'];
    requiredFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('blur', function() {
                validateRequiredField(this);
            });
        }
    });

    function validateRequiredField(field) {
        const formGroup = field.closest('.form-group');
        
        if (field.value.trim() === '') {
            setFieldState(formGroup, 'error', 'This field is required');
            return false;
        }
        
        if (field.type === 'email' && !isValidEmail(field.value)) {
            setFieldState(formGroup, 'error', 'Please enter a valid email address');
            return false;
        }
        
        setFieldState(formGroup, 'success');
        return true;
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Smooth scrolling for mobile
    if (window.innerWidth <= 768) {
        const inputs = document.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                setTimeout(() => {
                    this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 300);
            });
        });
    }

    // Auto-advance to next field
    cardNumberInput.addEventListener('input', function() {
        if (this.value.replace(/\s/g, '').length === 16) {
            expiryDateInput.focus();
        }
    });

    expiryDateInput.addEventListener('input', function() {
        if (this.value.length === 5) {
            cvvInput.focus();
        }
    });

    cvvInput.addEventListener('input', function() {
        if (this.value.length === 3 || this.value.length === 4) {
            document.getElementById('cardName').focus();
        }
    });
});

