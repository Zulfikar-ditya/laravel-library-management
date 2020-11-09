@extends('welcome')

@section('title', '| Category - Add Category')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-info text-white text-center h3">
                        Add Category
                    </div>
                    <div class="card-body border-info">
                        @if (session('add-success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Succcess Add Data
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="" class="form-control" required autofocus>
                            </div>
                            <input type="submit" value="Add" name="add" class="btn btn-outline-info">
                            <input type="submit" value="Add And Add Another" name="add_and_add_another" class="btn btn-outline-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection