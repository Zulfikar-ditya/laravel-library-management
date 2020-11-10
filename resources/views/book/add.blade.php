@extends('welcome')

@section('title', '| Book - Add Book')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">

                    <div class="card-header bg-info text-white text-center h3">
                        Add
                    </div>

                    <div class="card-body p-4 text-capitalize">
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
                                <label for="">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="" required autofocus class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">author <span class="text-danger">*</span></label>
                                <input type="text" name="author" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">late charge fines <span class="text-danger">*</span></label>
                                <input type="number" name="late_charge_fines" id="" class="form-control" value="5000" min="5000" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="">book lost fines<span class="text-danger">*</span></label>
                                <input type="text" name="book_lost_fines" id="" class="form-control" value="70000" min="50000" required>
                            </div>
                            <div class="form-group">
                                <label for="">category</label>
                                <select name="category" id="" class="form-control">
                                  liat  @foreach ($categories as $item)
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
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