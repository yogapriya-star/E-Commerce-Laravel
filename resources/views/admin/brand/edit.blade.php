@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Brand</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Brand</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Brand</h4>
                            <div class="card-header-action">
                                <a href="{{route('admin.brand.index')}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.brand.update', $brand->id)}}"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img width="200" src="{{asset($brand->logo)}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input id="logo" name="logo" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{$brand->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="is_featured">Is Featured</label>
                                    <select name="is_featured" id="is_featured" class="form-control">
                                        <option {{$brand->is_featured == 1 ? 'selected' : ''}} value="1">Yes</option>
                                        <option {{$brand->is_featured == 0 ? 'selected' : ''}} value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{$brand->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$brand->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
