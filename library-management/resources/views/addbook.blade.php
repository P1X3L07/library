<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- Link to CSS file stored in the public folder -->
    <link 
        href="{{asset('css/style.css')}}"
        rel="stylesheet"
        type="text/css"
        media="all" 
    />
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-item"><a href="/home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/borrowed-books" class="nav-link">Borrow Books</a></li>
                <li class="nav-item"><a href="/addbook" class="nav-link">Add Books</a></li>
                <li class="nav-item"><a href="/delete" class="nav-link">Delete Books</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="content">
        <h1>Add a New Book</h1>

        <!-- Add Book Form -->
        <div class="add-book-form">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf <!-- CSRF token for security -->
                
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required><br>
                
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" required><br>
                
                <label for="genre">Genre:</label>
                <input type="text" name="genre" id="genre" required><br>

                <button type="submit">Add Book</button>
            </form>
        </div>

        <!-- Display Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Website</p>
    </footer>
</body>
</html>
