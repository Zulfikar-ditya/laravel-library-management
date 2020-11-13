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
                    <td class="text-success"><i class="far fa-check-circle"></i></td>
                    @else
                    <td class="text-success"><i class="fas fa-times"></i></td>
                    @endif
                </tr>
                <tr>
                    <td>status borrow</td>
                    @if ($book['status_borrowed'] == 1)
                    <td class="text-success"><i class="far fa-check-circle"></i></td>
                    @else
                    <td class="text-success"><i class="fas fa-times"></i></td>
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
            <thead class="bg-info text-white">
                <th scope="col">ID</th>
                <th scope="col">member</th>
                <th scope="col">date add</th>
                <th scope="col">date must back</th>
                <th scope="col">date back</th>
                <th scope="col">status</th>
                <th scope="col">status fine</th>
            </thead>
            <tbody>
                @foreach ($borrow as $item)
                @if ($item['status_fines'] == 1)
                <tr class="bg-danger text-white">
                @else
                <tr>
                @endif
                    <th scope="row">{{$item['id']}}</th>
                    <td>{{$item['member']}}</td>
                    <td>{{$item['date_add']}}</td>
                    <td>{{$item['date_must_back']}}</td>
                    @if ($item['date_back'] == NULL)
                    <td>-</td>
                    @else
                    <td>{{$item['date_back']}}</td>
                    @endif
                    @if ($item['status'] == 1)
                    <td class="text-success"><i class="far fa-check-circle"></i></td>
                    @else
                    <td class="text-danger"><i class="fas fa-times"></i></td>
                    @endif
                    @if ($item['status_fines'] == 1)
                    <td class="text-success"><i class="far fa-check-circle"></i></td>
                    @else
                    <td class="text-danger"><i class="fas fa-times"></i></td>
                    @endif
                </tr>
                @endforeach
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
