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
    <div class="container">
        <h2>My Borrowed Books</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    {{-- <th>Author</th> --}}
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($borrowedBooks as $borrowing)
                    <tr>
                        <td>{{ $borrowing->book->title }}</td>
                        {{-- <td>{{ $borrowing->book->author }}</td> --}}
                        <td>{{ $borrowing->borrow_date->format('Y-m-d') }}</td>
                        <td>{{ $borrowing->return_date->format('Y-m-d') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">You have not borrowed any books yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Website</p>
    </footer>
</body>
</html>


