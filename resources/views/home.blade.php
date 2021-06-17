@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                @role('admin')
                <tbody>
                @foreach($users as $user)
                <tr>

                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    <a href="editUser/{{$user->id}}">Edit</a>

                    <a href="deleteUser/{{$user->id}}">delete</a>

                    </td>
                </tr>
                @endforeach

                </tbody>
                @endrole

                @role('user')
                <tbody>

                    <tr>

                        <th scope="row">{{$userData->id}}</th>
                        <td>{{$userData->name}}</td>
                        <td>{{$userData->email}}</td>
                        <td>
                            <a href="editUser/{{$userData->id}}">Edit</a>
                        </td>
                    </tr>

                </tbody>
                @endrole
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
