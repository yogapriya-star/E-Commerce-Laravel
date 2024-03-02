@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Product</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product</h4>
                            <div class="card-header-action">
                                <a href="{{route('admin.product.index')}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.product.update', $product->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img width="200" src="{{asset($product->thumb_image)}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input id="image" name="image" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{$product->name}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control main-category">
                                                <option value="">Select</option>
                                                @foreach($categories as $category)
                                                    <option {{$category->id == $product->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sub_category">Sub Category</label>
                                            <select name="sub_category" id="sub_category" class="form-control sub-category">
                                                <option value="">Select</option>
                                                @foreach($subCategories as $subCategory)
                                                    <option {{$subCategory->id == $product->sub_category_id ? 'selected' : ''}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="child_category">Child Category</label>
                                            <select name="child_category" id="child_category" class="form-control child-category">
                                                <option value="">Select</option>
                                                @foreach($childCategories as $childCategory)
                                                    <option {{$childCategory->id == $product->child_category_id ? 'selected' : ''}} value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($brands as $brand)
                                            <option {{$brand->id == $product->brand_id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sku">SKU</label>
                                    <input id="sku" name="sku" type="text" class="form-control" value="{{$product->sku}}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input id="price" name="price" type="text" class="form-control" value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="offer_price">offer Price</label>
                                    <input id="offer_price" name="offer_price" type="text" class="form-control" value="{{$product->offer_price}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="offer_start_date">offer Start Date</label>
                                            <input id="offer_start_date" name="offer_start_date" type="text" class="form-control datepicker" value="{{$product->offer_start_date}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="offer_end_date">offer End Date</label>
                                            <input id="offer_end_date" name="offer_end_date" type="text" class="form-control datepicker" value="{{$product->offer_end_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Stock Quantity</label>
                                    <input id="qty" name="qty" type="number" min="0" class="form-control" value="{{$product->qty}}">
                                </div>
                                <div class="form-group">
                                    <label for="video_link">Video Link</label>
                                    <input id="video_link" name="video_link" type="text" class="form-control" value="{{$product->video_link}}">
                                </div>
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea id="short_description" name="short_description" class="form-control summernote"> {!! $product->short_description !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="long_description">Long Description</label>
                                    <textarea id="long_description" name="long_description" class="form-control summernote">{!! $product->long_description !!} </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="product_type">Product Type</label>
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option {{$product->product_type == "new_arrival" ? 'selected' : ''}} value="new_arrival">New Arrival</option>
                                        <option {{$product->product_type == "featured_product" ? 'selected' : ''}} value="featured_product">Featured</option>
                                        <option {{$product->product_type == "top_product     " ? 'selected' : ''}} value="top_product">Top Product</option>
                                        <option {{$product->product_type == "best_product" ? 'selected' : ''}} value="best_product">Best Product</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="seo_title">SEO Title</label>
                                    <input id="seo_title" name="seo_title" type="text" class="form-control" value="{{$product->seo_title}}">
                                </div>
                                <div class="form-group">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea id="seo_description" name="seo_description" class="form-control">{!! $product->seo_description !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{$product->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$product->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
@push('scripts')
    <script>
        $(document).ready(function(){
            $('body').on('change', '.main-category', function(e){
                $('.child-category').html('<option value="">Select</option>')
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.product.get-subcategories')}}",
                    data: {
                        id:id
                    },
                    success: function (data){
                        $('.sub-category').html('<option value="">Select</option>')
                        $.each(data, function(i, item){
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)

                        })
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
            $('body').on('change', '.sub-category', function(e){
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.product.get-childcategories')}}",
                    data: {
                        id:id
                    },
                    success: function (data){
                        $('.child-category').html('<option value="">Select</option>')
                        $.each(data, function(i, item){
                            $('.child-category').append(`<option value="${item.id}">${item.name}</option>`)

                        })
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
