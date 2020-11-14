@extends('welcome')

@section('title', '| Member - List Member')

@section('content')
    <div class="container" style="margin-top: 100px">
        @if (session('add-success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Succcess Add Data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="" class="form-inline mb-4 text-capitalize" method="get">
            <div class="form-group">
                <select name="field" id="" class="form-control mr-3 mb-3">
                    <option value="name">name</option>
                    <option value="email">email</option>
                </select>
                <input type="search" name="search" id="" placeholder="Search..." class="form-control mr-3 mb-3" required>
                <button type="submit" class="btn btn-outline-info mb-3">Search <i class="fas fa-search"></i></button>
            </div>
        </form>

        <form action="" method="get" class="form-inline mb-4">
            <div class="form-group">
                <label for="" class="mr-3">Filter </label>
                <select name="filter" id="" class="form-control mr-3 mb-3" required>
                    <option value="" selected>--------</option>
                    <option value="status_true">Status True</option>
                    <option value="status_false">Status false</option>
                </select>
                <button class="btn btn-outline-info mb-3" type="submit">Go <i class="fas fa-external-link-alt"></i></button>
            </div>
        </form>
        
        <div class="table-responsive">
            <table class="table text-capitalize table-hover">
                <thead class="bg-info text-white">
                    <th scope="col">Id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">date of birth</th>
                    <th scope="col">status</th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$item['id']}}</th>
                        <td><a href="{{ route('detailMember', ['id' => $item['id']])}}">{{$item['name']}}</a></td>
                        <td>{{$item['email']}}</td>
                        <td>{{$item['date_of_birth']}}</td>
                        @if ($item['status'] == 1) 
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
    <div class="container my-4">
        {{ $data->links() }}
    </div>  
@endsection