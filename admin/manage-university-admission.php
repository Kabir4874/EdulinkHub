<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLink Hub</title>
    <link rel="icon" href="Edulink Hub logo.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <i class="material-icons">menu</i>
        <h2>Manage University Admission</h2>
    </div>

    <div class="container">
        <div class="form-title">
            <i class="material-icons">push_pin</i>
            <span>Enter Admission Details</span>
        </div>
        <div class="form-group">
            <i class="material-icons">school</i>
            <input type="text" id="University Name" placeholder="University Name" />
        </div>
        <div class="form-group">
            <i class="material-icons">location_city</i>
            <input type="text" id="location" placeholder="Enter location" />
        </div>
        <div class="form-group">
            <i class="material-icons">menu_book</i>
            <select>
                <option>Select Program Type</option>
                <option>Undergraduate</option>
                <option>Graduate</option>
                <option>PhD</option>
            </select>
        </div>
        <div class="form-group">
            <i class="material-icons">subject</i>
            <textarea placeholder="Discipline"></textarea>
        </div>
        <div class="form-group">
            <i class="material-icons">calendar_today</i>
            <input type="datetime" placeholder="Application Date" />
        </div>
        <div class="form-group">
            <i class="material-icons">calendar_today</i>
            <input type="datetime" placeholder="Application Deadline" />
        </div>
        <div class="form-group">
            <i class="material-icons">link</i>
            <input type="url" placeholder="Application Link" />
        </div>
        <div class="form-group">
            <i class="material-icons">calendar_today</i>
            <input type="datetime" placeholder="Admit Card Download Date" />
        </div>
        <div class="form-group">
            <i class="material-icons">image</i>
            <input type="url" placeholder="Image URL" />
        </div>
        <div class="exam-units">
            <h4>Exam Units</h4>
            <button class="add-button">
                <i class="material-icons">add</i>Add Exam Unit
            </button>
        </div>
        <button class="submit-btn">
            <i class="material-icons" style="vertical-align: middle;">check_circle</i> Submit
        </button>     
</div>
</body>
</html>