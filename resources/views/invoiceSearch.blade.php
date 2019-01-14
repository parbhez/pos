@extends('index')
<!-- Search form -->
@section('content')

<form class="form-inline md-form form-sm" action="{{URL::to('/invoiceSearchById')}}" method="POST">
	@csrf
	<label>Invoice Search:</label>   
     <i class="fa fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-sm ml-3 w-75" type="number" placeholder="Type Invoice Id" aria-label="Search" name="search">
    <br>
    <button type="submit" class="btn btn-success" style="margin-left: 100px;margin-top: 10px">submit</button>
</form>

	@if(Session::has('message'))
		{{Session::get("message")}}
	@endif
@endsection