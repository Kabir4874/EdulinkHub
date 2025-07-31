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
        <i class="material-icons">arrow_back</i>
        <h1>Add Scholarship</h1>
    </div>

    <div class="container">
        <div class="form-title">
            <i class="material-icons">push_pin</i>
            <span>Enter Scholarship Details</span>
        </div>

        <div class="form-group">
            <i class="material-icons">category</i>
            <select>
                <option value="">Type</option>
                <option value="merit">Merit</option>
                <option value="need">Need-Based</option>
                <option value="athletic">Athletic</option>
                <option value="academic">Academic</option>
            </select>
        </div>

        <div class="form-group">
            <i class="material-icons">title</i>
            <input type="text" placeholder="Title" />
        </div>

         <div class="form-group">
            <i class="material-icons">description</i>
            <textarea rows="2" placeholder="Description" ></textarea>
        </div>

        <div class="form-group">
            <i class="material-icons">link</i>
            <input type="url" placeholder="Link" />
        </div>

         <div class="form-group">
            <i class="material-icons">rule</i>
            <textarea rows="2" placeholder="Eligibility Criteria" ></textarea>
        </div>

         <div class="form-group">
            <i class="material-icons">date_range</i>
            <input type="datetime" placeholder="Apply Date (MM/DD/YYYY)" />
        </div>

        <div class="form-group">
            <i class="material-icons">event</i>
            <input type="datetime" placeholder="Application Deadline (MM/DD/YYYY)"/>
        </div>

         <div class="form-group">
            <i class="material-icons">school</i>
            <input type="text" placeholder="University" />
        </div>

        <div class="form-group">
            <i class="material-icons">apartment</i>
            <input type="text" placeholder="Department" />
        </div>

        <div class="form-group">
            <i class="material-icons">person</i>
            <select>
                <option value="">Professor</option>
                <option value="prof1">Prof. A</option>
                <option value="prof2">Prof. B</option>
                <option value="prof2">Prof. C</option>
            </select>
        </div>
        <button class="submit-btn">
            <i class="material-icons" style="vertical-align: middle;">check_circle</i> Submit
        </button>
    </div> 
</body>
</html>