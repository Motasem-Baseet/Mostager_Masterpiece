@extends('mainlayouts.user-dashboard')

@section('usercontent')



<div class="page-header" style="background: url('{{ asset('assets/img/banner1.jpg') }}');">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Payments</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Payments</li>
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
<div class="page-content">
<div class="inner-box">
<div class="dashboard-box">
<h2 class="dashbord-title">Payments</h2>
</div>
<div class="dashboard-wrapper">
<div class="row">
<div class="col-md-6 col-sm-6 col-sx-12">
<div class="order-details">
<div class="dashboardboxtitle">
<h2>Your Order</h2>
</div>
<div class="order_review mb-3">
<table class="table table-responsive dashboardtable table-review-order">
<thead>
<tr>
<th class="product-name">Product</th>
<th class="product-total">Total</th>
</tr>
</thead>
<tbody>
<tr>
<td><p>Challenge Battery Hammer Drill</p></td>
<td><p class="price">$190.00</p></td>
</tr>
<tr>
<td><p>Power X Change Battery - 3.0 mAh</p></td>
<td><p class="price">$34.00</p></td>
</tr>
<tr>
<td><p>Percussion Hammer Drill</p></td>
<td><p class="price">$87.00</p></td>
</tr>
</tbody>
<tfoot>
<tr>
<th>Subtotal</th>
<td>
<p class="price">$87.00</p>
</td>
</tr>
<tr>
<th>Shipping</th>
<td>
<form action="#" class="shipping">
<div class="radio">
<label><input checked="" type="radio"> <span>Free Shipping</span></label>
</div>
<div class="radio">
<label><input type="radio"> <span>Flat Rate:</span> </label><span class="price"> $10.00</span>
</div>
</form>
</td>
</tr>
<tr>
<th>Total</th>
<td><p class="price">$197.00</p></td>
</tr>
</tfoot>
</table>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-sx-12">
<div class="dashboardboxtitle">
<h2>Payment Method</h2>
</div>

<div class="form-group mb-3">
<label>Name on Card <sup>*</sup></label>
<input class="form-control" type="text">
</div>
<div class="form-group mb-3 tg-inputwithicon">
<label class="control-label">Credit Card Type <sup>*</sup></label>
<div class="tg-select form-control">
<select>
<option value="none">Select State</option>
<option value="none">Select State</option>
<option value="none">Select State</option>
</select>
</div>
</div>
<div class="form-group mb-3">
<label>Credit Card Number <sup>*</sup></label>
<input class="form-control" type="text">
 </div>
<div class="form-group">
<label>Card Verification Number<sup>*</sup></label>
<input class="form-control" type="text">
</div>

<div class="card card--padding fill-bg">
<table class="table-total-checkout">
<tbody>
<tr>
<th>GRAND TOTAL:</th>
<td>$197.00</td>
</tr>
</tbody>
</table>
<a href="#" class="btn btn-common btn-full">Place Order Now</a>
</div>

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