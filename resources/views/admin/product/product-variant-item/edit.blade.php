@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Product Variant Item</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Product Variant Item</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product Variant Item</h4>
                            <div class="card-header-action">
                                <a href="{{route('admin.category.index')}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.products-variant-item.update', $category->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="variant_name">Variant Name</label>
                                    <input id="variant_name" name="variant_name" type="text" class="form-control" readonly value="">
                                </div>
                                <div class="form-group">
                                    <label for="name">Item Name</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{$variantItem->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price <code>(Set 0 for make it free)</code></label>
                                    <input id="price" name="price" type="text" class="form-control" value="{{$variantItem->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="is_default">IsDefault</label>
                                    <select name="is_default" id="is_default" class="form-control">
                                        <option value="">Select</option>
                                        <option {{$variantItem->is_default == 1 ? 'selected' : ''}} value="1">Yes</option>
                                        <option {{$variantItem->is_default == 1 ? 'selected' : ''}} value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{$category->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$category->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
