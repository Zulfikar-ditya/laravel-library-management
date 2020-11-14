@extends('welcome')

@section('title', '| Borrow - Detail')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="table-responsive table-hover">
            <table class="table">
                <thead class="bg-info text-white text-capitalize">
                    <th></th>
                    <th></th>
                </thead>
                <tbody class="text-capitalize text-center">
                    <tr>
                        <td>Book</td>
                        <td><a href="{{ route('historyBook', ['id' => $data['book']]) }}">{{$data['book']}}</a></td>
                    </tr>
                    <tr>
                        <td>member</td>
                        <td><a href="{{ route('historyBook', ['id' => $data['member']]) }}">{{$data['member']}}</a></td>
                    </tr>
                    <tr>
                        <td>date add</td>
                        <td>{{$data['date_add']}}</td>
                    </tr>
                    <tr>
                        <td>date must back</td>
                        <td>{{$data['date_must_back']}}</td>
                    </tr>
                    @if ($data['status_fines'] == 0)
                    <tr>
                    @else
                    <tr class="bg-danger text-white">
                    @endif
                        <td>status fines</td>
                        @if ($data['status_fines'] == 0)
                        <td class="text-danger"><i class="fas fa-times"></i></td>
                        @else
                        <td class="text-success"><i class="far fa-check-circle"></i></td>    
                        @endif
                    </tr>
                    <tr>
                        <td>action</td>
                        <td><a href="{{ route('returnBookValid', ['id' => $data['book']]) }}" class="btn btn-outline-info">return</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection