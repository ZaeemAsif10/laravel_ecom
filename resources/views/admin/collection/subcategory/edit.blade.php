@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">

<!-- Heading -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-0">
                    Collection / Edit - Sub Category
                    <a href="{{ url('sub-category') }}" class="btn btn-danger btn-sm p-2 float-right">Back</a>
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
            <div class="row">
                        <div class="col-md-12">

                        <form action="{{ url('sub-category-update/'.$subcategory->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Category ID (Name)</label>
                                        <select name="category_id" class="form-control">
                                            <option value="{{ $subcategory->category_id }}">{{ $subcategory->category->name }}</option>
                                            @foreach($category as $cateitem)
                                            <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{ $subcategory->name }}" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea rows="4" name="description" class="form-control" placeholder="Enter Description"> {{ $subcategory->description }} </textarea>
                                    </div>
                                </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" name="image" class="form-control">
                                            <img src="{{ asset('uploads/subcategoryImage/'.$subcategory->image) }}" class="mt-4" width="50" alt="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Priority</label>
                                            <input type="number" name="priority" value="{{ $subcategory->priority }}" class="form-control" placeholder="Enter Priority">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Show / Hide</label>
                                            <input type="checkbox" {{ $subcategory->status == '1' ? 'checked' : '' }} name="status">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>

                            </form>
                    </div>
            </div>
        </div>
    </div>
</div>


</div>

@endsection