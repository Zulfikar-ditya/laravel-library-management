@extends('welcome')

@section('title', '| Borrowing - List')

@section('content')
    <div class="container" style="margin-top: 100px">
        @if (session('add_success'))
        <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
            Success Add New Borrowing
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="table-resposive table-hover">
            <table class="table ">
                <thead class="bg-info text-white text-uppercase">
                    <th scope="col">#</th>
                    <th scope="col">Book</th>
                    <th scope="col">member</th>
                    <th scope="col">satus fines</th>
                    <th scope="col">date add</th>
                    <th scope="col">date must back</th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    @if ($item['status_fines'] == 0)
                    <tr>
                    @else
                    <tr class="bg-danger text-white">
                    @endif
                        <th scope="row">#</th>
                        <td>{{$item['book']}}</td>
                        <td>{{$item['member']}}</td>
                        @if ($item['status_fines'] == 0)
                        <td class="text-danger"><i class="fas fa-times"></i></td>
                        @else
                        <td class="text-success"><i class="far fa-check-circle"></i></td>
                        @endif
                        <td>{{$item['created_at']}}</td>
                        <td>{{$item['date_must_back']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection