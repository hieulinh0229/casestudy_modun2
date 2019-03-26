@extends('layout.index')
@section('title','Danh sách user')
@section('content')
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col"> Email</th>
            <th scope="col"> Role</th>
            <th></th>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    @if($user->role<1)
                    <tr>
                        <th scope="row">{{ $key++ }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                        <td><a href="{{route('admin.editrole',[ 'user' => $user])}}">sửa</a><br>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
