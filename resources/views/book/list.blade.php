@extends('welcome')

@section('title', '| Book - Book List')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="table-responsive">
            <table class="table text-capitalize">
                <thead class="bg-info text-white">
                    <th scope="col">ID</th>
                    <th scope="col">title</th>
                    <th scope="col">author</th>
                    <th scope="col">late charge fines</th>
                    <th scope="col">lost charge fines</th>
                    <th scope="col">status</th>
                    <th scope="col">category</th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$item['id']}}</th>
                        <td>{{$item['title']}}</td>
                        <td>{{$item['author']}}</td>
                        <td>{{$item['late_charge_fines']}}</td>
                        <td>{{$item['book_lost_fines']}}</td>
                        @if ($item['status'] == 1) 
                            <td class="text-success"><i class="far fa-check-circle"></i></td>
                        @else
                            <td class="text-danger"><i class="fas fa-times"></i></td>
                        @endif
                        <td>{{$item['category']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection