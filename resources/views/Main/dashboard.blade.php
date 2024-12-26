@extends('mainlayouts.user-dashboard')





@section('usercontent')




<<div class="page-header" style="background: url('{{ asset('assets/img/banner1.jpg') }}');">
<div class="container">
<div class="row">
<div style="padding-top:50px;" class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Dashbord</h2>
<ol class="breadcrumb">
<li><a href="#">Home /</a></li>
<li class="current">Dashboard</li>
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
<h2 class="dashbord-title">Dashboard</h2>
</div>
<div class="dashboard-wrapper">
<div class="dashboard-sections">
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
<div class="dashboardbox">
<div class="icon"><i class="lni-write"></i></div>
<div class="contentbox">
<h2><a href="#">Total Ad Posted</a></h2>
<h3>480 Add Posted</h3>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
<div class="dashboardbox">
<div class="icon"><i class="lni-add-files"></i></div>
<div class="contentbox">
<h2><a href="#">Featured Ads</a></h2>
<h3>80 Add Posted</h3>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
<div class="dashboardbox">
<div class="icon"><i class="lni-support"></i></div>
<div class="contentbox">
<h2><a href="#">Offers / Messages</a></h2>
<h3>2040 Messages</h3>
</div>
</div>
</div>
</div>
</div>
<table class="table table-responsive dashboardtable tablemyads">
<thead>
<tr>
<th>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="checkedall">
<label class="custom-control-label" for="checkedall"></label>
</div>
</th>
<th>Photo</th>
<th>Title</th>
<th>Category</th>
<th>Ad Status</th>
<th>Price</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    @forelse ($products as $item)


<tr data-category="active">
<td>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="product-{{$item->id}}">
<label class="custom-control-label" for="product-{{$item->id}}"></label>
</div>
</td>
<td class="photo"><img style="width: 80px; height:80px; " class="img-fluid" src="{{ asset($item->product_image) }}" alt="{{ $item->name }}" ></td>
<td data-title="Title">
<h3>{{$item->name}}</h3>
<span>Ad ID:{{$item->id}}</span>
</td>
<td data-title="Category"><span class="adcategories">{{$item->category->name}}</span></td>
<td data-title="Ad Status"><span class="adstatus adstatusactive">{{strtolower($item->status)}}</span></td>
<td data-title="Price">
<h3>{{$item->price_per_day}}</h3>
</td>
<td data-title="Action">
<div class="btns-actions">
<a class="btn-action btn-view" href="#"><i class="lni-eye"></i></a>
<a class="btn-action btn-edit" href="#"><i class="lni-pencil"></i></a>
<a class="btn-action btn-delete" href="#"><i class="lni-trash"></i></a>
</div>
</td>
</tr>
<tr data-category="active">
    @empty
    <tr>
        <td colspan="7">No products found.</td>
    </tr>

@endforelse
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
