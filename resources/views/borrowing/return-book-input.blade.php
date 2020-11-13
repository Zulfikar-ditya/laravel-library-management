@extends('welcome')

@section('title', '| Borrow - Return Book Input')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info text-white text-center h3">
                    Return Book
                </div>
                <div class="card-body border-info text-capitalize">
                    @if (session('book_not_found'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Book Not Found
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('book_not_borrowed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Book Not Borrowed
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('book_not_exist'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Book Is Lost
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('book_already_returned'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Book Already Retunrned
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Book Id <span class="text-danger">*</span></label>
                            <input type="number" name="bookid" id="" class="form-control" required autofocus>
                        </div>
                        <input type="submit" value="Find Book" class="btn btn-outline-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
