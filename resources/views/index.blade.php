@extends('welcome')

@section('content')
@auth
<div class="container" style="margin-top: 150px">
    <div class="row justify-content-around my-5">

        <div class="col-md-4 mb-5">
            <ul class="list-group text-capitalize">
                <li class="list-group-item bg-info text-center text-white h3">Category</li>

                <li class="list-group-item">Add category
                    <a href="{{ route('addCategory')}}" class="btn btn-sm btn-outline-info float-right">
                        Go To Page
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                        </svg>
                    </a>
                </li>

                <li class="list-group-item">list category
                    <a href="{{ route('categoryList') }}" class="btn btn-sm btn-outline-info float-right">
                        Go To Page
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                        </svg>
                    </a>
                </li>

            </ul>
        </div>

        <div class="col-md-4 mb-5">
            <ul class="list-group text-capitalize">
                <li class="list-group-item bg-info text-center text-white h3">Book</li>

                <li class="list-group-item">Add Book
                    <a href="{{ route('addBook')}}" class="btn btn-sm btn-outline-info float-right">
                        Go To Page
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                        </svg>
                    </a>
                </li>

                <li class="list-group-item">list Book
                    <a href="{{ route('bookList') }}" class="btn btn-sm btn-outline-info float-right">
                        Go To Page
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                        </svg>
                    </a>
                </li>

                <li class="list-group-item">Book Lost
                    <a href="" class="btn btn-sm btn-outline-info float-right">
                        Go To Page
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                        </svg>
                    </a>
                </li>

            </ul>
        </div>

        <div class="col-md-4">
            <ul class="list-group text-capitalize">
                <li class="list-group-item bg-info text-center text-white h3">Member</li>

                <li class="list-group-item">Add member
                    <a href="{{ route('addMember')}}" class="btn btn-sm btn-outline-info float-right">
                        Go To Page
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                        </svg>
                    </a>
                </li>

                <li class="list-group-item">member list
                    <a href="{{ route('memberList')}}" class="btn btn-sm btn-outline-info float-right">
                        Go To Page
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                        </svg>
                    </a>
                </li>

            </ul>
        </div>

    </div>

    <div class="row justify-content-around mb-5">
        <div class="col-md-4">
            <ul class="list-group text-capitalize">
                <li class="list-group-item bg-info text-center text-white h3">Borrowing</li>

                <li class="list-group-item">Add Borrowing
                    <a href="{{ route('selectMemberBorrow') }}" class="btn btn-sm btn-outline-info float-right">
                        Go To Page
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-up-right"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                        </svg>
                    </a>
                </li>

            </ul>
        </div>
    </div>

</div>
@else
<div class="container" style="margin-top: 150px">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header bg-info text-white">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('login')}}" class="btn btn-outline-info">Login<i
                            class="fas fa-sign-in-alt mx-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
