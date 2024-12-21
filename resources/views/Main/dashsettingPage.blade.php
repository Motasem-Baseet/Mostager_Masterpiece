@extends('mainlayouts.user-dashboard')

@section('usercontent')
<div class="page-header" style="background: url('{{ asset('assets/img/banner1.jpg') }}');">
    <div class="container">
        <div class="row">
            <div style="padding-top:50px;" class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Profile Settings</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('main/index') }}">Home /</a></li>
                        <li class="current">Profile Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="section-padding">
    <div class="container">
        <div class="row">
            @include('mainlayouts.inc.user-dashboard-sidebar')

            <div class="col-sm-12 col-md-8 col-lg-9">
                <div class="row page-content">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                        <div class="inner-box">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">Ad Detail</h2>
                            </div>

                            <!-- Form Starts -->
                            <form action="{{ url('main/profile-setting') }}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF token -->
                                <div class="dashboard-wrapper">
                                    <div class="form-group mb-3">
                                        <label class="control-label">Product Title</label>
                                        <input class="form-control input-md" name="name" placeholder="Product Name" type="text" required>
                                    </div>

                                    <div class="form-group mb-3 tg-inputwithicon">
                                        <label class="control-label">Categories</label>
                                        <div class="tg-select form-control">
                                            <select name="category_id">
                                                <option value="none">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label">Price per Day</label>
                                        <input class="form-control input-md" name="price_per_day" placeholder="Enter Price" type="text"required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control" name="description" rows="4" placeholder="Enter a description"required></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label">Quantity</label>
                                        <input type="number" class="form-control" name="quantity" min="1" required></input>
                                    </div>


                                    <div class="form-group mb-3">
                                        <label class="control-label">Upload Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-common">Post Ad</button>
                                </div>
                            </form>
                            <!-- Form Ends -->
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                        <div class="inner-box">
                            <div class="tg-contactdetail">
                                <div class="dashboard-box">
                                    <h2 class="dashbord-title">Contact Detail</h2>
                                </div>
                                <div class="dashboard-wrapper">
                                    <div class="form-group mb-3">
                                        <label class="control-label">First Name*</label>
                                        <input class="form-control input-md" name="first_name" type="text">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label">Last Name*</label>
                                        <input class="form-control input-md" name="last_name" type="text">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label">Phone*</label>
                                        <input class="form-control input-md" name="phone" type="text">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label">Address</label>
                                        <input class="form-control input-md" name="address" type="text">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label">City</label>
                                        <input class="form-control input-md" name="city" type="text">
                                    </div>
                                    <button type="submit" class="btn btn-common">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
