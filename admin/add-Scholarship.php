<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Scholarship - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ef9a9a;
            /* Red shade similar to Flutter */
            --primary-dark: #e57373;
            --text-color: #333;
            --border-color: #ddd;
            --background-color: #f5f5f5;
            --card-bg: #ffffff;
            --error-color: #f44336;
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
            color: var(--primary-color);
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
            box-shadow: 0 0 0 2px rgba(239, 154, 154, 0.2);
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

        /* Dropdown */
        .dropdown {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            appearance: none;
            background-color: white;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23ef9a9a%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 12px auto;
        }

        /* Loading State */
        .loading-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 15px 12px 45px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background-color: white;
        }

        .loading-spinner {
            width: 20px;
            height: 20px;
            border: 3px solid rgba(239, 154, 154, 0.3);
            border-radius: 50%;
            border-top-color: var(--primary-color);
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Error State */
        .error-container {
            padding: 12px 15px 12px 45px;
            border: 1px solid var(--error-color);
            border-radius: 8px;
            background-color: white;
            color: var(--error-color);
            display: flex;
            align-items: center;
        }

        .error-icon {
            margin-right: 10px;
            color: var(--error-color);
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

        /* Loading Button State */
        .btn-spinner {
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
        }
    </style>
</head>

<body>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Add Scholarship</h1>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>📌 Enter Scholarship Details</h2>
            </div>

            <!-- Scholarship Form -->
            <form id="scholarshipForm">
                <!-- Type Dropdown -->
                <div class="form-group">
                    <label for="type">Type</label>
                    <div class="input-container">
                        <i class="fas fa-tag input-icon"></i>
                        <select id="type" class="dropdown" required>
                            <option value="" disabled selected>Select type</option>
                            <option value="scholarship">Scholarship</option>
                            <option value="professor">Professor</option>
                        </select>
                    </div>
                </div>

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <div class="input-container">
                        <i class="fas fa-heading input-icon"></i>
                        <input type="text" id="title" class="text-input" required>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <div class="input-container">
                        <i class="fas fa-align-left input-icon"></i>
                        <input type="text" id="description" class="text-input" required>
                    </div>
                </div>

                <!-- Link -->
                <div class="form-group">
                    <label for="link">Link</label>
                    <div class="input-container">
                        <i class="fas fa-link input-icon"></i>
                        <input type="url" id="link" class="text-input" required>
                    </div>
                </div>

                <!-- Eligibility Criteria -->
                <div class="form-group">
                    <label for="eligibility">Eligibility Criteria</label>
                    <div class="input-container">
                        <i class="fas fa-clipboard-check input-icon"></i>
                        <input type="text" id="eligibility" class="text-input" required>
                    </div>
                </div>

                <!-- Apply Date -->
                <div class="form-group">
                    <label for="applyDate">Apply Date (MM/DD/YYYY)</label>
                    <div class="input-container">
                        <i class="fas fa-calendar-day input-icon"></i>
                        <input type="text" id="applyDate" class="text-input" required readonly>
                    </div>
                </div>

                <!-- Application Deadline -->
                <div class="form-group">
                    <label for="deadline">Application Deadline (MM/DD/YYYY)</label>
                    <div class="input-container">
                        <i class="fas fa-calendar input-icon"></i>
                        <input type="text" id="deadline" class="text-input" required readonly>
                    </div>
                </div>

                <!-- University -->
                <div class="form-group">
                    <label for="university">University</label>
                    <div class="input-container">
                        <i class="fas fa-university input-icon"></i>
                        <input type="text" id="university" class="text-input" required>
                    </div>
                </div>

                <!-- Department -->
                <div class="form-group">
                    <label for="department">Department</label>
                    <div class="input-container">
                        <i class="fas fa-building input-icon"></i>
                        <input type="text" id="department" class="text-input" required>
                    </div>
                </div>

                <!-- Professor Dropdown (Conditional) -->
                <div class="form-group" id="professorGroup" style="display: none;">
                    <label for="professor">Professor</label>
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                        <span>Loading professors...</span>
                    </div>
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