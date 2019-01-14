@extends('index')
<!-- Search form -->
@section('content')

<form class="form-inline md-form form-sm" action="{{URL::to('/PurchaseinvoiceSearchById')}}" method="POST">
	@csrf
	<label>Invoice ID : </label>   
     <i class="fa fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-sm ml-3 w-75" type="number" placeholder="Type Invoice Id" aria-label="Search" name="search">
    <br>
    <button type="submit" class="btn btn-success" style="margin-left: 100px;margin-top: 10px">submit</button>
</form>
	@if(Session::has('message'))
		<div class="col-md-8">
			<div class="row">
			<div class="alert alert-danger">
				<h3>{{Session::get('message')}}</h3>
			</div>
		</div>
		</div>
	@endif
@endsection
	