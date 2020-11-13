@extends('welcome')

@section('title', '| Borrow - Return Validation')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="table-responsive table-hover">
            <table class="table">
                <thead class="bg-info">
                    <th></th>
                    <th></th>
                </thead>
                <tbody class="text-capitalize text-center">
                    <tr>
                        <td>title</td>
                        <td>{{$borrow[0]->book}}</td>
                    </tr>
                    <tr>
                        <td>member</td>
                        <td>{{$borrow[0]->member}}</td>
                    </tr>
                    @if ($borrow[0]->status_fines == 0)
                    <tr>
                    @else
                    <tr class="bg-danger text-white">
                    @endif
                        <td>Status fine</td>
                        @if ($borrow[0]->status_fines == 0)
                        <td class="text-danger"><i class="fas fa-times"></i></td>
                        @else
                        <td><i class="far fa-check-circle"></i></td>
                        @endif
                    </tr>
                    <tr>
                        <td>date borrow</td>
                        <td>{{$borrow[0]->created_at}}</td>
                    </tr>
                    <tr>
                        <td>date must back</td>
                        <td>{{$borrow[0]->date_must_back}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-info text-white text-center h3">
                        Return Book
                    </div>
                    <div class="card-body border-info">
                        <form action="" method="post" class="row justify-content-around">
                            @csrf
                            <input type="submit" name="return_book" value="Return" class="btn btn-outline-info">
                            <input type="submit" name="return_and_return_another" value="Return And Return Another" class="btn btn-outline-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection