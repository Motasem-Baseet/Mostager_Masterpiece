@extends('mainlayouts.mainMaster')

<div class="page-header" style="background: url('{{ asset('assets/img/banner1.jpg') }}');">
    <div class="container">
        <div class="row">
            <div style="padding-top:50px;" class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Join Us</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{url('main/index')}}">Home /</a></li>
                        <li class="current">Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="register section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-12 col-xs-12">
                <div class="register-form login-area">
                    <h3>Register</h3>
                    <form class="login-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-user"></i>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Username">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-envelope"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-phone"></i>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-location"></i>
                                <select id="address" class="form-control" name="address" required>
                                    <option value="Amman">Amman</option>
                                    <option value="Salt">Salt</option>
                                    <option value="Naour">Naour</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-lock"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-lock"></i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype Password">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkedall">
                                <label class="custom-control-label" for="checkedall">By registering, you accept our Terms & Conditions</label>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-common log-btn">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
