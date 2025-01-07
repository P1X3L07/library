<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Home Page</title>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
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
                    <th>Author</th>
                    <th>Borrow Date</th>
                    <th>Estimated Return Date</th>
                    <th>Actual Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowedBooks as $borrowing)
                    <tr>
                        <td>{{ $borrowing->book->title }}</td>
                        <td>{{ $borrowing->book->author }}</td>
                        <td>{{ $borrowing->borrow_date->format('Y-m-d') }}</td>
                        <td>{{ $borrowing->borrow_date->addDays(7)->format('Y-m-d') }}</td>
                        <td>
                            @if ($borrowing->return_date !== 'Not returned yet')
                                {{ $borrowing->return_date }}  <!-- Already formatted in controller -->
                            @else
                                <p>Not returned yet</p>
                            @endif
                        </td>
                        <td>
                            @if($borrowing->return_date === null) <!-- Check if the book has not been returned yet -->
                                @php
                                    $estimatedReturnDate = \Carbon\Carbon::parse($borrowing->borrow_date)->addDays(7);
                                @endphp
                        
                                @if(now()->lte($estimatedReturnDate)) <!-- Check if within the estimated return date -->
                                    <form action="{{ route('return.book', $borrowing->book_id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Return</button>
                                    </form>
                                @else
                                    <!-- Overdue if the return date is past the estimated return date -->
                                    Overdue
                                @endif
                            @else
                                <!-- Display the actual return date -->
                                Returned on {{ $borrowing->return_date->format('Y-m-d') }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Your Website</p>
    </footer>
</body>
</html>
