@extends('welcome')

@section('title', '| Member - Detail and History')

@section('content')
    <div class="container" style="margin-top: 100px">
        @if (session('success-edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Succcess Edit Data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="table-responsive table-hover">
            <table class="table">
                <thead class="bg-info text-center text-white">
                    <th>Member</th>
                    <th>Info</th>
                </thead>
                <tbody class="text-center text-capitalize">
                    <tr>
                        <td>Name</td>
                        <td>{{$member['name']}}</td>
                    </tr>
                    <tr>
                        <td>address</td>
                        <td>{{$member['address']}}</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>{{$member['email']}}</td>
                    </tr>
                    <tr>
                        <td>date of birth</td>
                        <td>{{$member['date_of_birth']}}</td>
                    </tr>
                    <tr>
                        <td>status</td>
                        @if ($member['status'] == 1)
                        <td class="text-success"><i class="far fa-check-circle"></i></td>
                        @else
                        <td class="text-danger"><i class="fas fa-times"></i></td>
                        @endif
                    </tr>
                    <tr>
                        <td>action</td>
                    <td><a href="{{ route ('editMember', ['id' => $member['id']])}}" class="btn btn-outline-info">Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container p-2">
        <hr class="border-info">
        <h3 class="text-center">Member History</h3>
        <hr class="border-info">
    </div>
    <div class="container my-4">
        <div class="table-responsive table-hover">
            <table class="table text-capitalize">
                <thead class="bg-info text-white">
                    <th scope="col">ID</th>
                    <th scope="col">book</th>
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
                        <td>{{$item['book']}}</td>
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
    <div class="container my-4">
        {{ $borrow->links() }}
    </div> 
@endsection