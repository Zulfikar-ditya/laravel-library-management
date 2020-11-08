@extends('welcome')

@section('title', "| Category - Edit Category")

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-info text-center text-white h3">
                        Edit
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{$data['name']}}" id="" class="form-control" required autofocus>
                            </div>
                            <input type="submit" value="Save" class="btn btn-outline-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection