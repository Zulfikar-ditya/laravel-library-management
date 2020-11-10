@extends('welcome')

@section('title', '| Member - Add Member')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info text-center text-white h3">
                    Edit Member
                </div>
                <div class="card-body border-info text-capitalize">

                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="" value="{{$data['name']}}" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">address <span class="text-danger">*</span></label>
                            <textarea name="address" id="" cols="30" rows="5" class="form-control" required>{{$data['address']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="" value="{{$data['email']}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">date of birth <span class="text-danger">*</span></label>
                            <input type="date" name="date_of_birth" id="" value="{{$data['date_of_birth']}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            @if ($data['status'] == 1)
                            <input type="checkbox" name="status" value="1" id="" checked>
                            @else
                            <input type="checkbox" name="status" value="0" id="">
                            @endif
                            <label for="">status </label>
                        </div>
                        <input type="submit" value="Add" name="Save" class="btn btn-outline-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
