@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">

<!-- Heading -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-0">
                    Collection / Category
                    <a href="{{ url('category-deleted-records') }}" class="btn btn-primary btn-sm p-2 ml-2 float-right">Deleted Record</a>
                    <a href="{{ url('category-add') }}" class="btn btn-primary btn-sm p-2 float-right">ADD Category</a>
                </h6>
            </div>
        </div>
    </div>
</div>
<!-- Heading -->

<div class="row  mt-3">
    <div class="col-md-12">
        <div class="card">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            <div class="card-body">
                    <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Group Name</th>
                            <th>Image</th>
                            <th>Icon</th>
                            <th>Show/Hide</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $item)
                        <tr class="text-center">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->group->name }}</td>
                            <td>
                                <img src="{{ asset('uploads/categoryImage/'.$item->image) }}" width="50px" alt="">
                            </td>
                            <td>
                                <img src="{{ asset('uploads/categoryicon/'.$item->icon) }}" width="50px" alt="">
                            </td>
                            <td>
                                <input type="checkbox" {{ $item->status == '1' ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="{{ url('category/'.$item->id) }}" class="badge btn-primary">Edit</a>
                                <a href="{{ url('category-delete/'.$item->id) }}" class="badge btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</div>

@endsection