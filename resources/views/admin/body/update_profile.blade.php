@extends('admin.admin_master')


@section('admin')

    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Update Profile</h2>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{(session('success'))}}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{route('update.user.profile')}}" class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">User Email</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control"  placeholder="User email">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection