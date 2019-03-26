@extends('layout.index')
@section('title',' user')
@section('content')
<div class="container">
    <form method="Post" action="{{ route('admin.updaterole', $user) }}" >
        @csrf
        <label for="">Ten user: {{$user->name}}</label>
        <select name="role" id=""class="form-control">
            <option value="1" {{ !($user->role == 1) ?: 'selected'}}>Admin</option>
            <option value="0"{{ !($user->role == 0) ?: 'selected'}}>User</option>
        </select>

        <input type="submit" value="Submit">

    </form>
</div>

@endsection
