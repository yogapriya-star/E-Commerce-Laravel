@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Child-Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Child-Category</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Child-Category</h4>
                            <div class="card-header-action">
                                <a href="{{route('admin.child-category.index')}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.child-category.update', $childCategory->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="subCategory">Select Sub-Category</label>
                                    <select name="subCategory" id="subCategory" class="form-control">
                                        <option value="">Select </option>
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{$subCategory->id}}" {{ $subCategory->id == $childCategory->sub_category_id ? 'selected' : '' }}>{{$subCategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{$childCategory->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{$childCategory->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$childCategory->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
