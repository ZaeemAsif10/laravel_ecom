@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-5">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6>Collection / Groups</h6>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('group-store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea rows="4" class="form-control" name="descrip" placeholder="Enter Description"></textarea>
                                </div>
                            </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" name="status" placeholder="Enter Name">
                                    </div>
                                </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
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