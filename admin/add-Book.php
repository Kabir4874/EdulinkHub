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
        <h1>Add Book</h1>
    </div>
    <div class="container">
        <div class="form-title">
            <i class="material-icons">library_books</i>
            <span>Enter Book Details</span>
        </div>
        <div class="form-group">
            <i class="material-icons">book</i>
            <label for="book-name">Book Name</label>
            <input type="text" id="book-name" placeholder="Enter Book Name">
        </div>
        <div class="form-group">
            <i class="material-icons">person</i>
            <label for="author-name">Author Name</label>
            <input type="text" id="author-name" placeholder="Enter Autho Name">
        </div>
        <div class="form-group">
            <i class="material-icons">image</i>
            <label for="image-url">Image URL</label>
            <input type="url" id="image-url" placeholder="Enter Image URL">
        </div>
        <div class="form-group">
            <i class="material-icons">category</i>
            <label for="admission">Admission Category</label>
            <select id="admission" class="form-control">
                <option value="" disabled selected>Select admission category</option>
                <option value="undergraduate">Undergraduate</option>
                <option value="postgraduate">Postgraduate</option>
                <option value="phd">PhD/Research</option>
            </select>
        </div>
        <div class="form-group">
            <i class="material-icons">description</i>
            <label for="description">Description</label>
            <textarea id="description" placeholder="Enter book description"></textarea>
        </div>
        <div class="form-group">
            <i class="material-icons">link</i>
            <label for="pdf-link">PDF Link</label>
            <input type="url" id="pdf-link" placeholder="Enter PDF link">
        </div>
        <div class="form-group">
            <i class="material-icons">school</i>
            <label for="suggested-for">Suggested For (comma-separated)</label>
            <input type="text" id="suggested-for" placeholder="Students, Teachers, Professionals">
        </div>
        <div class="toggle-container">
            <span class="toggle-label">Is Paid?</span>
            <label class="toggle-switch">
                <input type="checkbox" id="is-paid">
                <span class="toggle-slider"></span>
            </label>
        </div>
        <button class="submit-btn">
            <i class="material-icons" style="vertical-align: middle;">check_circle</i> Add Book
        </button>
    </div>  
</body>
</html>