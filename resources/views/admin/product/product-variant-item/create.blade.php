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
                            <h4>Create Product Variant Item</h4>
                            <div class="card-header-action">
                                <a href="{{route('admin.products-variant.index',['product' => $product->id])}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.products-variant-item.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="variant_name">Variant Name</label>
                                    <input id="variant_name" name="variant_name" type="text" class="form-control" readonly value="{{$variant->name}}">
                                </div>
                                <div class="form-group">
                                    <input id="variant_id" name="variant_id" type="hidden" class="form-control" value="{{$variant->id}}">
                                </div>
                                <div class="form-group">
                                    <input id="product_id" name="product_id" type="hidden" class="form-control" value="{{$product->id}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Item Name</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price <code>(Set 0 for make it free)</code></label>
                                    <input id="price" name="price" type="text" class="form-control" value="{{old('price')}}">
                                </div>
                                <div class="form-group">
                                    <label for="is_default">IsDefault</label>
                                    <select name="is_default" id="is_default" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
