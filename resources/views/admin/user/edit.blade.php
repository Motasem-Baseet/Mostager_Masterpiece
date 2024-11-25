@extends('layouts.master')


@section('title')
    Users
@endsection

@section('content')
<div class="container-fluid px-4">

<div class="card mt-4">
    <div class="card-header">
        <h4>Edit Users</h4>
            <a href="{{url('admin/users/')}}" class="btn btn-danger btn-sm float-end">Back</a>


    </div>
    <div class="card body">
        <form action="{{ url('admin/update-user/'.$users->id)}}" method="POST">

        @csrf
        @method("PUT")
        <div class="mb-3">
                                <label for="">User Name</label>
                                <input type="text" name="name" value="{{$users->name}}" class="form-control">

                            </div>

                            <div class="mb-3">
                                <label for="">User Email</label>
                                <input type="text" name="email" value="{{$users->email}}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">User Phone</label>
                                <input type="text" name="phone" value="{{$users->phone}}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">User Address</label>
                                <input type="text" name="address" value="{{$users->address}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Role</label>
                                <select name="role_as" id="">
                                    <option value="{{ $users->role_as}}">Current Role </option>
                                    <option value="1" {{ $users->role_as == '1' ? 'selected':''}}>Admin</option>
                                    <option value="0" {{ $users->role_as == '1' ? 'selected':''}}>User</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger">Update User Status</button>
                            </div>

    </form>
</div>
@endsection

