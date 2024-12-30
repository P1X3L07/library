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
            <li class="nav-item"><a href="/books" class="nav-link">Books</a></li>
            <li class="nav-item"><a href="/addbook" class="nav-link">Add Books</a></li>
            <li class="nav-item"><a href="/delete" class="nav-link">Delete Books</a></li>
            <!-- Other navigation items -->
        </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome to the Library Website</h1>
        

        <!-- table -->
        <div class="table">
            <h2>Library Books Request</h2>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        {{-- <th>Availability</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        {{-- <td>{{ $book->book_id }}</td> --}}
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

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Website</p>
    </footer>
</body>
</html>


