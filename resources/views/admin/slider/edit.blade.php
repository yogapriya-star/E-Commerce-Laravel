@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Slider</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Slider</h4>
                            <div class="card-header-action">
                                <a href="{{route('admin.slider.index')}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.slider.update', $slider->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img width="200" src="{{asset($slider->banner)}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="banner">Banner</label>
                                    <input id="banner" name="banner" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input id="type" name="type" type="text" class="form-control" value="{{$slider->type}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" name="title" type="text" class="form-control" value="{{$slider->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="starting_price">Starting Price</label>
                                    <input id="starting_price" name="starting_price" type="text" class="form-control" value="{{$slider->starting_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="btn_url">Button URL</label>
                                    <input id="btn_url" name="btn_url" type="text" class="form-control" value="{{$slider->btn_url}}">
                                </div>
                                <div class="form-group">
                                    <label for="serial">Serial</label>
                                    <input id="serial" name="serial" type="text" class="form-control" value="{{$slider->serial}}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{$slider->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                        <option {{$slider->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
