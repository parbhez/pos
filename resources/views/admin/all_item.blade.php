@extends('index')
@section('title','Item')
@push('css')
@endpush
@section('content')


	<div id="content" class="span10">
		<ul class="breadcrumb">
				<li>
					<h3>All Item</h3>
				</li>
		</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon item"></i><span class="break"></span>Item</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" style="width:100%">
						  <thead>
						  	
							  <tr>
								  <th>Serial No</th>
								  <th>Name</th>
								  <th>Category Name</th>
								  <th>Brand Name</th>
								  <!-- <th>Supplier Name</th> -->
								  <th>Quantity</th>
								  <th>Price</th>
								  <th>Actions</th>
							  </tr>
							 
						  </thead>   
						  <tbody>
						  	@foreach($allItem as $item)
							<tr>
								<td class="center">{{$item->item_id}}</td>
								<td class="center">{{$item->item_name}}</td>
								<td class="center">{{$item->category_name}}</td>
								<td class="center">{{$item->brand_name}}</td>
								<!-- <td class="center">{{$item->supplier_name}}</td> -->
								<td class="center">{{$item->item_quantity}}</td>
								<td class="center">{{$item->item_price}}</td>
								<!-- <td class="center">
									<span class="label label-success">Active</span>
								</td> -->
								 <td class="center">
								    <a class="btn btn-success" href="{{URL::to('/itemsale')}}/{{$item->item_id}}">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-primary" href="{{URL::to('/itemPurchase')}}/{{$item->item_id}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								    <a class="btn btn-info" href="{{URL::to('/edit-item')}}/{{$item->item_id}}">
										<i class="halflings-icon white edit"></i>  
									</a>
								    
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td> 

							</tr>

						@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div>
	</div>


@endsection
@push('scripts')
@endpush

