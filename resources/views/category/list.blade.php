@extends('welcome')

@section('title', '| Category - Category list')

@section('content')
    <div class="container" style="margin-top: 100px;">
        @if (session('add-success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Succcess Add Data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @if (session('edit-success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Succcess edit Data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        
        <form action="" class="form-inline mb-4 text-capitalize" method="get">
            <div class="form-group">
                <input type="search" name="search" id="" placeholder="Search..." class="form-control mr-3 mb-3" required>
                <button type="submit" class="btn btn-outline-info mb-3">Search <i class="fas fa-search"></i></button>
            </div>
        </form>

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