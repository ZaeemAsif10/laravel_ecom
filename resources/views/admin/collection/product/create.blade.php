@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6>Collection / Product Form</h6>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
               
                <!-- alert msg start  -->
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>{{ session('status') }}
                    </div>
                @endif
                <!-- alert msg end  -->

                <div class="card-body">
                    <form action="{{ url('store-products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="home">Product</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="profile">Description</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="profile">Seo</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="product_status-tab" data-toggle="tab" href="#product_status" role="tab" aria-controls="contact">Status</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row mt-3">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="">Product Name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Select Sub-category (Eg. Brands)</label>
                                                    <select name="sub_category_id" class="form-control">
                                                        <option value="" selected disabled>Select Sub Category</option>
                                                        @foreach($subcategory as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Custom Url (Slug)</label>
                                                    <input type="text" name="url" class="form-control" placeholder="URL..">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Small Description</label>
                                                    <textarea rows="4" name="small_description" class="form-control" placeholder="Small Description"></textarea>
                                                </div>
                                            </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Image</label>
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Original Price</label>
                                                        <input type="number" name="original_price" class="form-control" placeholder="Original Price">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Offer Price</label>
                                                        <input type="number" name="offer_price" class="form-control" placeholder="Offer Price">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Quantity</label>
                                                        <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Priority</label>
                                                        <input type="number" name="priority" class="form-control" placeholder="Priority">
                                                    </div>
                                                </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Meta Title</label>
                                                <input type="text" name="meta_title" class="form-control" placeholder="Meta Title">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Meta Description</label>
                                                <textarea name="meta_description" rows="4" class="form-control" placeholder="Meta Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Meta Keywords</label>
                                                <textarea name="meta_keyword" rows="4" class="form-control" placeholder="Meta Keywords"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary float-right">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">High-Lights</label>
                                                <input type="text" name="p_high_heading" class="form-control" placeholder="High-lights">
                                                <textarea name="p_highlights" rows="4" class="form-control mt-2" placeholder="High-lights Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Product Description</label>
                                                <input type="text" name="p_des_heading" class="form-control" placeholder="Product Description">
                                                <textarea name="p_description" rows="4" class="form-control mt-2" placeholder="Product Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Product Details/Specification</label>
                                                <input type="text" name="p_det_heading" class="form-control" placeholder="Product Details/Specification">
                                                <textarea name="p_details" rows="4" class="form-control mt-2" placeholder="Product Details/Specification"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary float-right">Save</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="product_status" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">New Arrival</label>
                                                        <input type="checkbox" name="new_arrival_products" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Featured Products</label>
                                                        <input type="checkbox" name="featured_products" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Popular Products</label>
                                                        <input type="checkbox" name="popular_products" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Offer Products</label>
                                                        <input type="checkbox" name="offers_products" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Status Products</label>
                                                        <input type="checkbox" name="status_products" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary float-right">Save</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                        </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
