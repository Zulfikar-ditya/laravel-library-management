@extends('welcome')

@section('title', '| Book - Edit Book')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mb-5">
                    <div class="card-header bg-info text-center text-white h3">
                        Edit Book
                    </div>
                    <div class="card-body text-capitalize">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{$data['title']}}" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Author <span class="text-danger">*</span></label>
                                <input type="text" name="author" value="{{$data['author']}}" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Late Charge Fines<span class="text-danger">*</span></label>
                                <input type="number" name="late_charge_fines" value="{{$data['late_charge_fines']}}" id="" class="form-control" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="">book lost fines <span class="text-danger">*</span></label>
                                <input type="number" name="book_lost_fines" value="{{$data['book_lost_fines']}}" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">category <span class="text-danger">*</span></label>
                                <select name="category" id="" class="form-control">
                                    @foreach ($categories as $item)
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger">Please Select Again</small>
                            </div>
                            <input type="submit" value="Save" class="btn btn-outline-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection