@extends('welcome')

@section('title', '| Book - Lost - Input')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info text-white text-center h3">
                    Book Lost
                </div>
                <div class="card-body border-info text-ca[italize">
                    @if (session('book_is_lost'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Book Is Lost
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('book_not_found'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Book Not Found
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Book Id <span class="text-danger">*</span></label>
                            <input type="number" name="book_id" id="" class="form-control">
                        </div>
                        <input type="submit" value="Find Book" class="btn btn-outline-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
