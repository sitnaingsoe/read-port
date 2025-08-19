<!DOCTYPE html>
<html>
<head>
    <title>Submit Review</title>
</head>
<body>
    @include('vendor.sweetalert.alert')
    <h1>Submit Your Review</h1>

    <!-- Display errors -->
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('reviews.store') }}" method="POST" class="book-form">
                  @csrf <!-- Required to prevent Page Expired -->

                  {{-- Hidden book id --}}
                  <input type="hidden" name="book_id" value="{{ $book->id }}">

                  <div class="row">
                      <label for="rating">Rating (1-5)</label>
                      <input type="number" name="rating" id="rating" min="1" max="5" required>
                  </div>

                  <div class="row">
                      <label for="comment">Comment</label>
                      <textarea name="comment" id="comment" rows="4" required></textarea>
                  </div>

                  <div class="book-actions">
                      <button type="reset">Clear</button>
                      <button type="submit" class="primary">Submit Review</button>
                  </div>
              </form>

    <form action="/reviews" method="POST">
        @csrf <!-- CSRF token for security -->
        <label for="book_id">Book ID:</label><br>
        <input type="number" name="book_id" id="book_id" required><br><br>

        <label for="rating">Rating (1-5):</label><br>
        <input type="number" name="rating" id="rating" min="1" max="5" required><br><br>

        <label for="comment">Comment:</label><br>
        <textarea name="comment" id="comment" rows="4" required></textarea><br><br>

        <button type="submit">Submit Review</button>
    </form>
</body>
</html>
