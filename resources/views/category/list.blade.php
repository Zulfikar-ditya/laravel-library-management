@extends('welcome')

@section('title', '| Category - Category list')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="table-responseive">
            <table class="table text-capitalize">
                <thead class="bg-info text-white">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">action</th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$item['id']}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                        <a href="{{ route('editCategory', ['id' => $item['id'] ] ) }}" class="btn btn-outline-success">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container my-4">
        {{ $data->links() }}
    </div>

@endsection