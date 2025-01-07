<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Home Page</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
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

    <div class="content">
        <h1>Welcome to the Library Website</h1>
        <div class="table">
            <h2>Library Books Request</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>
                            <form action="{{ route('borrow.book', ['id' => $book->id]) }}" method="POST">
                                @csrf
                                <button type="submit">Borrow</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Your Website</p>
    </footer>
</body>
</html>
