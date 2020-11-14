@extends('welcome')

@section('title', '| Borrow - Extension Borrow Detail')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="">
        <hr class="border-info">
        <h3 class="text-center">Book Detail</h3>
        <hr class="border-info">
    </div>
    <div class="table-responsive table-hover">
        <table class="table">
            <thead class="bg-info text-center text-white">
                <th>Book</th>
                <th>Info</th>
            </thead>
            <tbody class="text-center text-capitalize">
                <tr>
                    <td>Name</td>
                    <td>{{$book['title']}}</td>
                </tr>
                <tr>
                    <td>author</td>
                    <td>{{$book['author']}}</td>
                </tr>
                <tr>
                    <td>status</td>
                    @if ($book['status'] == 1)
                    <td class="text-success"><i class="fas fa-times"></i></td>
                    @else
                    <td class="text-danger"><i class="far fa-check-circle"></i></td>
                    @endif
                </tr>
                <tr>
                    <td>status borrow</td>
                    @if ($book['status_borrowed'] == 1)
                    <td class="text-success"><i class="fas fa-times"></i></td>
                    @else
                    <td class="text-danger"><i class="far fa-check-circle"></i></td>
                    @endif
                </tr>
                <tr>
                    <td>late charge fines</td>
                    <td>{{$book['late_charge_fines']}}</td>
                </tr>
                <tr>
                    <td>book lost fines</td>
                    <td>{{$book['book_lost_fines']}}</td>
                </tr>
                <tr>
                    <td>category</td>
                    <td>{{$book['category']}}</td>
                </tr>
                <tr>
                    <td>user</td>
                    <td>{{$book['user']}}</td>
                </tr>
                <tr>
                    <td>action</td>
                    <td><a href="{{ route('editBook', ['id' => $book['id']]) }}" class="btn btn-outline-info">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="">
        <hr class="border-info">
        <h3 class="text-center">Borrow Detail</h3>
        <hr class="border-info">
    </div>
    <div class="table-responsive table-hover">
        <table class="table text-capitalize">
            <thead class="bg-info text-white text-capitalize">
                <th></th>
                <th></th>
            </thead>
            <tbody class="text-capitalize text-center">
                <tr>
                    <td>Book</td>
                    <td><a href="{{ route('historyBook', ['id' => $borrow[0]['book']]) }}">{{$borrow[0]['book']}}</a></td>
                </tr>
                <tr>
                    <td>member</td>
                    <td><a href="{{ route('historyBook', ['id' => $borrow[0]['member']]) }}">{{$borrow[0]['member']}}</a></td>
                </tr>
                <tr>
                    <td>date add</td>
                    <td>{{$borrow[0]['date_add']}}</td>
                </tr>
                <tr>
                    <td>date must back</td>
                    <td>{{$borrow[0]['date_must_back']}}</td>
                </tr>
                @if ($borrow[0]['status_fines'] == 0)
                <tr>
                @else
                <tr class="bg-danger text-white">
                @endif
                    <td>status fines</td>
                    @if ($borrow[0]['status_fines'] == 0)
                    <td class="text-danger"><i class="fas fa-times"></i></td>
                    @else
                    <td class="text-success"><i class="far fa-check-circle"></i></td>    
                    @endif
                </tr>
            </tbody>
        </table>
    </div>    
</div>
<div class="container my-5">
    <hr class="border-info">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info text-white text-center h3">
                    Extension Borrow
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Length <span class="text-danger">*</span></label>
                            <select name="length" id="" class="form-control">
                                <option value="7">7 Days</option>
                                <option value="14">14 Days</option>
                            </select>
                        </div>
                        <div class="row justify-content-around">
                            <input type="submit" value="Save" name="Save" class="btn btn-outline-info">
                            <input type="submit" value="Save And Select Another" name="add_another" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
