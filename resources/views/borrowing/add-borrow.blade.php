@extends('welcome')

@section('title', '| Borrowing - Add - Select Book')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info text-white text-center h3">
                    Select Book
                </div>
                <div class="card-body">
                    @if (session('book_not_found'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Book Not Fuund
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('book_already_borrowed'))
                    <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                        Book You Input is already borrowed by another member, please check again.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('book_not_exist'))
                    <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
                        Book You Input is lost in my system, please check again.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('add_success'))
                    <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
                        Success Add New Borrowing
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Book Id <span class="text-danger">*</span></label>
                            <input type="number" name="book_id" id="" class="form-control" required autofocus>
                        </div>
                        <input type="submit" value="Add" name="add" class="btn btn-outline-info">
                        <input type="submit" value="Add And Add Another" name="add_another"
                            class="btn btn-outline-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
