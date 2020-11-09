@extends('welcome')

@section('title', '| Borrowing - Add - Select Member ')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-info text-white text-center h3">
                        Select Member Id
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Member Not Found
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Member Id</label>
                                <input type="number" name="id" id="" class="form-control" required autofocus>
                            </div>
                            <input type="submit" value="Find Member" class="btn btn-outline-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection