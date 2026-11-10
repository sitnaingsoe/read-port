<!doctype html>
<html class="no-js" lang="en">
    @include('component.head')
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <body>
        @include('vendor.sweetalert.alert')
        <div class="main-wrapper">
            <div class="app" id="app">
                @include('component.header')
                @include('component.sidebar')
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content items-list-page">
                    <div class="title-search-block">
                        <div class="title-block">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="title">
                                        Books Catalog ({{ $books->total() }})
                                        <a href="{{ route('book-create') }}" class="btn btn-primary btn-sm rounded-s" style="margin-left:10px;">
                                            <i class="fa fa-plus"></i> Add New Book
                                        </a>
                                    </h3>
                                    <div style="margin-top:10px; display:flex; gap:8px; flex-wrap:wrap; align-items:center;">
                                        <a href="{{ route('book-list', ['search' => request('search'), 'category_id' => request('category_id')]) }}"
                                           class="btn btn-sm {{ !request('booktype') ? 'btn-primary' : 'btn-secondary' }}">All Types</a>
                                        <a href="{{ route('book-list', ['booktype' => 'premium', 'search' => request('search'), 'category_id' => request('category_id')]) }}"
                                           class="btn btn-sm {{ request('booktype') === 'premium' ? 'btn-primary' : 'btn-secondary' }}">Premium</a>
                                        <a href="{{ route('book-list', ['booktype' => 'free', 'search' => request('search'), 'category_id' => request('category_id')]) }}"
                                           class="btn btn-sm {{ request('booktype') === 'free' ? 'btn-primary' : 'btn-secondary' }}">Free</a>

                                        @if(!empty($categories))
                                            <form method="GET" action="{{ route('book-list') }}" style="display:inline-block; margin-left:8px;">
                                                @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                                                @if(request('booktype')) <input type="hidden" name="booktype" value="{{ request('booktype') }}"> @endif
                                                <select name="category_id" onchange="this.form.submit()" class="form-control form-control-sm" style="display:inline-block; width:auto; height:32px; padding:2px 10px;">
                                                    <option value="">All Categories</option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                                            {{ $cat->categoryName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="items-search">
                            <form class="form-inline" method="GET" action="{{ route('book-list') }}">
                                @if(request('booktype')) <input type="hidden" name="booktype" value="{{ request('booktype') }}"> @endif
                                @if(request('category_id')) <input type="hidden" name="category_id" value="{{ request('category_id') }}"> @endif
                                <div class="input-group">
                                    <input type="text" name="search" value="{{ request('search') }}" class="form-control boxed rounded-s" placeholder="Search title or author...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary rounded-s" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card" style="background:#fff; border-radius:8px; padding:16px; box-shadow:0 1px 3px rgba(0,0,0,0.08);">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" style="margin-bottom:0;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cover</th>
                                        <th>Title & Author</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Published</th>
                                        <th style="text-align:right;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($books as $book)
                                        @php
                                            $isPrem = in_array(strtolower($book->booktype ?? ''), ['premiun', 'premium']);
                                        @endphp
                                        <tr>
                                            <td>{{ ($books->currentPage() - 1) * $books->perPage() + $loop->iteration }}</td>
                                            <td>
                                                <a href="/book-editor/{{ $book->id }}">
                                                    <img src="{{ $book->book_cover ?? 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=200&q=80' }}"
                                                         alt="{{ $book->name }}"
                                                         style="width:44px; height:62px; object-fit:cover; border-radius:5px;"
                                                         onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=200&q=80';">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/book-editor/{{ $book->id }}" style="font-weight:700; color:#111827; text-decoration:none;">
                                                    {{ $book->name }}
                                                </a>
                                                <br>
                                                <small class="text-muted">by {{ $book->author }}</small>
                                            </td>
                                            <td>
                                                <span style="padding:3px 9px; border-radius:6px; background:#f1f5f9; color:#334155; font-size:12px; font-weight:600;">
                                                    {{ $book->category->categoryName ?? 'Uncategorized' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span style="padding:4px 10px; border-radius:999px; font-size:11.5px; font-weight:700; background:{{ $isPrem ? '#fef3c7' : '#d1fae5' }}; color:{{ $isPrem ? '#b45309' : '#065f46' }};">
                                                    {{ $isPrem ? '👑 Premium' : 'Free' }}
                                                </span>
                                            </td>
                                            <td><strong>{{ number_format($book->price) }} Ks</strong></td>
                                            <td><small>{{ $book->created_at?->format('M d, Y') }}</small></td>
                                            <td style="text-align:right;">
                                                <div style="display:inline-flex; gap:6px;">
                                                    <a href="{{ route('books.show', $book->id) }}" target="_blank" class="btn btn-sm btn-secondary" title="View on Store">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="/book-editor/{{ $book->id }}" class="btn btn-sm btn-primary" title="Edit">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                    <form action="/book-delete/{{ $book->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete book {{ addslashes($book->name) }}?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted" style="padding:30px;">No books found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div style="margin-top: 16px;">
                        {{ $books->withQueryString()->links() }}
                    </div>
                </article>
                @include('component.fooder')
            </div>
        </div>
        @include('component.script')
    </body>

</html>
