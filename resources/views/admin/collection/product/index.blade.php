@extends('layouts.admin')

@section('content')


<div class="container-fluid mt-5">

<!-- Heading -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-0">
                    Collection / Products
                    <a href="#" class="btn btn-primary btn-sm p-2 float-right">Deleted Records</a>
                    <a href="{{ url('add-products') }}" class="btn btn-primary btn-sm p-2 float-right" >ADD Products</a>
                </h6>
            </div>
        </div>
    </div>
</div>
<!-- Heading -->

<div class="row  mt-3">
    <div class="col-md-12">
        <div class="card">
                 <!-- alert msg start  -->
                 @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong></strong>{{ session('status') }}
                    </div>
                @endif
                <!-- alert msg end  -->
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Subcategory Name</th>
                            <th>Image</th>
                            <th>Show/Hide</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($products as $pitem)
                        <tr class="text-center">
                            <td>{{ $pitem->id }}</td>
                            <td>{{ $pitem->name }}</td>
                            <td>{{ $pitem->subcategory->name }}</td>
                            <td>
                                <img src="{{ asset('uploads/productImage/'.$pitem->image) }}" width="50px" alt="">
                            </td>
                            <td>
                                <input type="checkbox" {{ $pitem->status_products == '1' ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="{{ url('edit-product/'.$pitem->id) }}" class="badge rounded btn-info">Edit</a>
                                <a href="{{ url('delete-product/'.$pitem->id) }}" class="badge rounded btn-danger">Delete</a>
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