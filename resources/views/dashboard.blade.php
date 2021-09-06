@extends('layouts.main')
@section('title') User Login | @env('APP_NAME') @endenv @stop()

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <form action="{{ route('search') }}" method="GET" class="d-flex row">
                        <input type="text" name="search" required class="form-control-lg col-md-7 mx-2"
                            placeholder="Search by Name, username, email, mobile, etc..."
                            value="{{ old('search') ?? ($search ?? '') }}" />
                        <button type="submit" class='btn btn-success col-2 mx-2'>Search</button>
                        <a href={{ route('dashboard') }} class='btn btn-warning mx-2 col-2 pt-3'>Clear Search</a>
                    </form>

                    <table class="table table-bordered table-responsive-lg mt-3">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            {{-- <th>Date Created</th> --}}
                            <th width="280px">Action</th>
                        </tr>

                        @if (!$users || count($users) == 0)
                            <tr>
                                <td colspan="10" align="center">No Users found...</td>
                            </tr>
                        @endif
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td >
                                    <div class="d-flex">
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" title="show"
                                            class="btn btn-dark mx-1" >
                                            <i class="fas fa-eye text-success  fa-lg"></i>
                                            Edit
                                        </a>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info mx-1">
                                            <i class="fas fa-edit  fa-lg"></i>
                                            Show
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="delete" class="btn btn-danger mx-1">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

@stop()
