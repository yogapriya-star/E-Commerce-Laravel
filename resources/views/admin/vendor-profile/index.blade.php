@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Vendor Profile</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Vendor Profile</h4>
                            <div class="card-header-action">
                                <a href="{{route('admin.vendor-profile.index')}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.vendor-profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Preview</label>
                                    <br>
                                    <img width="200" src="{{asset($profile->banner)}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="banner">Banner</label>
                                    <input id="banner" name="banner" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" name="phone" type="text" class="form-control" value="{{$profile->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="email" class="form-control" value="{{$profile->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="address" name="address" type="text" class="form-control" value="{{$profile->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="summernote" name="description">{{$profile->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="fb_link">Facebook</label>
                                    <input id="fb_link" name="fb_link" type="text" class="form-control" value="{{$profile->fb_link}}">
                                </div>
                                <div class="form-group">
                                    <label for="tw_link">Twitter</label>
                                    <input id="tw_link" name="tw_link" type="text" class="form-control" value="{{$profile->tw_link}}">
                                </div>
                                <div class="form-group">
                                    <label for="insta_link">Instagram</label>
                                    <input id="insta_link" name="insta_link" type="text" class="form-control" value="{{$profile->insta_link}}">
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
