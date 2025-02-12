@extends('mainlayouts.mainMaster')


<div class="page-header" style="background: url('{{ asset('assets/img/banner1.jpg') }}');">
<div class="container">
<div class="row">
<div style="padding-top:50px;"class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Forgot Password</h2>
<ol class="breadcrumb">
<li><a href="{{url('main/index')}}">Home /</a></li>
<li class="current">Forgot Password</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<section class="section-padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-12 col-xs-12">
<div class="forgot login-area">
<h3>
Forgot Password
</h3>
<form role="form" class="login-form">
<div class="form-group">
<div class="input-icon">
<i class="icon lni-user"></i>
<input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
</div>
</div>
<div class="text-center">
<button class="btn btn-common log-btn">Send me my Password</button>
</div>
<div class="form-group mt-4">
<ul class="form-links">
<li class="float-left"><a href="{{url('main/register')}}">Don't have an account?</a></li>
<li class="float-right"><a href="{{url('main/login')}}">Back to Login</a></li>
</ul>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
