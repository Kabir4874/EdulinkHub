<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage University Admission</title>
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
            --success-color: #4caf50;
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
            font-weight: bold;
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

        textarea.text-input {
            min-height: 100px;
            resize: vertical;
            padding-top: 12px;
            padding-bottom: 12px;
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

        /* Exam Units Section */
        .section-header {
            font-size: 1.1rem;
            font-weight: bold;
            color: var(--primary-dark);
            margin: 20px 0 10px 0;
        }

        .exam-unit {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
            align-items: center;
        }

        .exam-unit-input {
            flex: 1;
        }

        .delete-btn {
            color: #f44336;
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 5px;
        }

        /* Buttons */
        .btn {
            padding: 14px;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-dark);
            width: 100%;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
        }

        .btn-success {
            background-color: var(--success-color);
            padding: 10px 15px;
        }

        .btn-success:hover {
            background-color: #3d8b40;
        }

        .btn i {
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
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Margin Utilities */
        .mb-20 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- App Bar -->
    <div class="app-bar">
        <h1>Manage University Admission</h1>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <!-- Form Header -->
            <div class="form-header">
                <h2>📌 Enter Admission Details</h2>
            </div>

            <!-- Admission Form -->
            <form id="admissionForm">
                <!-- University Name -->
                <div class="form-group">
                    <label for="universityName">University Name</label>
                    <div class="input-container">
                        <i class="fas fa-school input-icon"></i>
                        <input type="text" id="universityName" class="text-input" required>
                    </div>
                </div>

                <!-- Location -->
                <div class="form-group">
                    <label for="location">Location</label>
                    <div class="input-container">
                        <i class="fas fa-map-marker-alt input-icon"></i>
                        <input type="text" id="location" class="text-input" required>
                    </div>
                </div>

                <!-- Program Type -->
                <div class="form-group">
                    <label for="programType">Program Type</label>
                    <div class="input-container">
                        <i class="fas fa-graduation-cap input-icon"></i>
                        <select id="programType" class="dropdown" required>
                            <option value="" disabled selected>Select Program Type</option>
                            <option value="undergraduate">Undergraduate</option>
                            <option value="postgraduate">Postgraduate</option>
                            <option value="Ph.D.">Ph.D.</option>
                        </select>
                    </div>
                </div>

                <!-- Discipline -->
                <div class="form-group">
                    <label for="discipline">Discipline</label>
                    <div class="input-container">
                        <i class="fas fa-book-open input-icon"></i>
                        <textarea id="discipline" class="text-input" required></textarea>
                    </div>
                </div>

                <!-- Application Date -->
                <div class="form-group">
                    <label for="applyDate">Application Date</label>
                    <div class="input-container">
                        <i class="fas fa-calendar-day input-icon"></i>
                        <input type="text" id="applyDate" class="text-input" required readonly>
                    </div>
                </div>

                <!-- Application Deadline -->
                <div class="form-group">
                    <label for="deadline">Application Deadline</label>
                    <div class="input-container">
                        <i class="fas fa-calendar-times input-icon"></i>
                        <input type="text" id="deadline" class="text-input" required readonly>
                    </div>
                </div>

                <!-- Application Link -->
                <div class="form-group">
                    <label for="applyLink">Application Link</label>
                    <div class="input-container">
                        <i class="fas fa-link input-icon"></i>
                        <input type="url" id="applyLink" class="text-input" required>
                    </div>
                </div>

                <!-- Admit Card Download Date -->
                <div class="form-group">
                    <label for="admitCardDate">Admit Card Download Date</label>
                    <div class="input-container">
                        <i class="fas fa-download input-icon"></i>
                        <input type="text" id="admitCardDate" class="text-input" required readonly>
                    </div>
                </div>

                <!-- Image URL -->
                <div class="form-group">
                    <label for="imageUrl">Image URL</label>
                    <div class="input-container">
                        <i class="fas fa-image input-icon"></i>
                        <input type="url" id="imageUrl" class="text-input" required>
                    </div>
                </div>

                <!-- Exam Units Section -->
                <div class="section-header">Exam Units</div>
                <div id="examUnitsContainer">
                    <!-- Exam units will be added here dynamically -->
                </div>

                <!-- Add Exam Unit Button -->
                <button type="button" class="btn btn-success" id="addExamUnitBtn">
                    <i class="fas fa-plus"></i>
                    <span>Add Exam Unit</span>
                </button>

                <!-- Submit Button -->
                <div class="mb-20"></div>
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <i class="fas fa-check-circle"></i>
                    <span>Submit</span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>