@extends('layouts.admin')

@section('content')


<!-- modal start -->
<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('sub-category-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category ID (Name)</label>
                                    <select name="category_id" class="form-control">
                                        <option value="" selected disabled>Select Group</option>
                                        @foreach($category as $cateitem)
                                        <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea rows="4" name="description" class="form-control" placeholder="Enter Description"></textarea>
                            </div>
                        </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Priority</label>
                                    <input type="number" name="priority" class="form-control" placeholder="Enter Priority">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Show / Hide</label>
                                    <input type="checkbox" name="status">
                                </div>
                            </div>
                    </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
                </div>
            </form>
        </div>
        </div>
<!-- modal end -->

<div class="container-fluid mt-5">

<!-- Heading -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-0">
                    Collection / Sub Category
                    <a href="#" class="btn btn-primary btn-sm p-2 float-right" data-toggle="modal" data-target="#exampleModal">ADD Sub Category</a>
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
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Show/Hide</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($subcategory as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                <img src="{{ asset('uploads/subcategoryImage/'.$item->image) }}" width="50" alt="">
                            </td>
                            <td>
                                <input type="checkbox" {{ $item->status == '1' ? 'checked' : '' }}>
                            </td>
                            <td>
                            <a href="{{ url('subcategory-edit/'.$item->id) }}" class="badge btn-primary">Edit</a>
                                <a href="{{ url('subcategory-delete/'.$item->id) }}" class="badge btn-danger">Delete</a>
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