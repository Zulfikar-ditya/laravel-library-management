@extends('welcome')

@section('title', '| Member - Add Member')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-info text-center text-white h3">
                        Add Member
                    </div>
                    <div class="card-body border-info text-capitalize">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">address <span class="text-danger">*</span></label>
                                <textarea name="address" id="" cols="30" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">date of birth <span class="text-danger">*</span></label>
                                <input type="date" name="date_of_birth" id="" class="form-control" required>
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