<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Professor - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #e57373;
            /* Red shade similar to Flutter */
            --primary-dark: #d32f2f;
            --text-color: #333;
            --border-color: #ddd;
            --background-color: #f5f5f5;
            --card-bg: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* App Bar */
        .app-bar {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .app-bar h1 {
            font-size: 1.5rem;
            font-weight: 500;
        }

        /* Main Content */
        .content {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Card Container */
        .card {
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-top: 20px;
        }

        /* Form Header */
        .form-header {
            text-align: center;
            margin-bottom: 25px;
            color: var(--primary-dark);
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .text-input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .text-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(229, 115, 115, 0.2);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
        }

        .input-container {
            position: relative;
        }

        /* Checkbox */
        .checkbox-container {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }

        .checkbox-input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .checkbox-label {
            font-weight: 500;
            cursor: pointer;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 14px;
            background-color: var(--primary-dark);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn:hover {
            background-color: var(--primary-color);
        }

        .submit-btn:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        .submit-btn i {
            font-size: 1.2rem;
        }

        /* Loading Spinner */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Add Professor</h1>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>📌 Enter Professor Details</h2>
            </div>

            <!-- Professor Form -->
            <form id="professorForm">
                <!-- Professor Name -->
                <div class="form-group">
                    <label for="professorName">Professor Name</label>
                    <div class="input-container">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="professorName" class="text-input" required>
                    </div>
                </div>

                <!-- Research Interests -->
                <div class="form-group">
                    <label for="researchInterests">Research Interests (comma separated)</label>
                    <div class="input-container">
                        <i class="fas fa-book input-icon"></i>
                        <input type="text" id="researchInterests" class="text-input" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-container">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="email" class="text-input" required>
                    </div>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <div class="input-container">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="tel" id="phone" class="text-input" required>
                    </div>
                </div>

                <!-- Profile Link -->
                <div class="form-group">
                    <label for="profileLink">Profile Link</label>
                    <div class="input-container">
                        <i class="fas fa-link input-icon"></i>
                        <input type="url" id="profileLink" class="text-input" required>
                    </div>
                </div>

                <!-- Availability Checkbox -->
                <div class="checkbox-container">
                    <input type="checkbox" id="isAvailable" class="checkbox-input" checked>
                    <label for="isAvailable" class="checkbox-label">Available</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-check-circle"></i>
                    <span>Submit</span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>