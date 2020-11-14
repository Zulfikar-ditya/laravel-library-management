@extends('welcome')

@section('title', '| Book - Lost - Detail')

@section('content')
<div class="container" style="margin-top: 100px">
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
                    <td class="text-danger"><i class="fas fa-times"></i></td>
                    @endif
                </tr>
                <tr>
                    <td>status borrow</td>
                    @if ($book['status_borrowed'] == 1)
                    <td class="text-success"><i class="far fa-check-circle"></i></td>
                    @else
                    <td class="text-danger"><i class="fas fa-times"></i></td>
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
            </tbody>
        </table>
    </div>
</div>
<div class="container my-5">
@if ($borrow_status == false)
    <hr class="border-info">
    <h3 class="text-center">Not Borrowed</h3>
    <hr class="border-info">
@else
    <hr class="border-info">
    <h3 class="text-center">Borrowed</h3>
    <hr class="border-info">
    <div class="table-resposive table-hover">
        <table class="table text-center">
            <thead class="bg-info text-white text-capitalize">
                <th scope="col"></th>
                <th scope="col"></th>
            </thead>
            <tbody>
                <tr>
                    <td>Book</td>
                    <td><a href="{{ route('historyBook', ['id' => $item[0]['book']]) }}">{{$item[0]['book']}}</a></td>
                </tr>
                <tr>
                    <td>member</td>
                    <td><a href="{{ route('detailMember', ['id' => $item[0]['member']]) }}">{{$item[0]['member']}}</a></td>
                </tr>
                <tr>
                    <td>date add</td>
                    <td>{{$item[0]['date_add']}}</td>
                </tr>
                <tr>
                    <td>date must back</td>
                    <td>{{$item[0]['date_must_back']}}</td>
                </tr>
                @if ($item[0]['status_fines'] == 0)
                <tr>
                @else
                <tr class="bg-danger text-white">
                @endif
                    <td>status fines</td>
                    @if ($item[0]['status_fines'] == 0)
                    <td class="text-danger"><i class="fas fa-times"></i></td>
                    @else
                    <td class="text-success"><i class="far fa-check-circle"></i></td>    
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
@endif
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-info text-white text-center h3">
                    Confirm Lost
                </div>
                <div class="card-body border-info">
                    <form action="" method="post" class="row justify-content-around">
                        @csrf
                        <input type="submit" name="Lost" value="Confirm" class="btn btn-outline-info">
                        <input type="submit" name="LostAgain" value="Confirm And Find Another Another" class="btn btn-outline-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
