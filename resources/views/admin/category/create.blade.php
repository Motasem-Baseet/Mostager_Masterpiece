@extends('layouts.master')


@section('title')
    Category
@endsection

@section('content')

                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="">Add Category</h4>
                            </div>
                            <div class="card-body">


                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                <div>{{$error}}</div>
                                @endforeach
                            </div>
                            @endif

                            <form action="{{url('admin/add-category')}}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="">Category Name</label>
                                <input type="text" name="name" class="form-control">

                            </div>

                            <div class="mb-3">
                                <label for="">Category Name</label>
                                <textarea type="text" name="description" class="form-control" ></textarea>

                            </div>

                            <button type="submit" class="btn btn-primary"> Save Category</button>
</form>
                        </div>




                    @endsection

