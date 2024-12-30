<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Home Page</title>
    <!-- Link to CSS file stored in the public folder -->
    <link 
        href="{{asset('css/style.css')}}"
        rel="stylesheet"
        type="text/css"
        media="all" 
    />
    <!-- Add your CSS files or styles here -->
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
        <h2>Select a Book to Delete</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('books.delete') }}" method="POST">
                @csrf
                @method('POST') <!-- This specifies that this form is a POST request -->
        
                <label for="book_id">Choose a book to delete:</label>
                <select name="book_id" id="book_id" required>
                    <option value="">-- Select a Book --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }} by {{ $book->author }}</option>
                    @endforeach
                </select>
        
                <button type="submit">Delete Book</button>
            </form>
    </div>
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Website</p>
    </footer>
</body>
</html>


