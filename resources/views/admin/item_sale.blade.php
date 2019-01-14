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
						<!-- <a class="btn btn-success btn-sm pull-right" href="{{URL::to('/saveItem')}}">Save</a> -->
						<table class="table table-striped table-bordered bootstrap-datatable datatable" style="width:100%">
						  <thead>
						  	
							 <th scope="col">Item Id</th>
		                    <th scope="col">Name</th>
		                    <!-- <th scope="col">Ava: Quantity</th> -->
		                    <th scope="col">Quantity</th>
		                    <th scope="col">Sale Quantity</th>
		                    <th scope="col">Item price</th>
		                    <th scope="col">Total</th>
		                    <th scope="col">Action</th>
							 
						  </thead>   
						  <tbody>
						  @if(Session::has('itemInfo'))
						 <?php 
						 		$totalAmount=0;
						  ?>
                        @foreach(Session::get('itemInfo') as $item)
                        <?php 
                        	$totalAmount+=$item->total;
                         ?>
                        
                        <form action="{{URL::to('/updatesale')}}/{{$item->item_id}}" method="post">
                        	@csrf
							<tr>
								<td class="center">{{$item->item_id}}</td>
								<td class="center">{{$item->item_name}}</td>
								<td class="center">{{$item->item_quantity}}</td>
								<td class="center">
									<input type="text" name="update_quantity" class="form-control input input-sm" value="{{$item->sale_quantity}}">
								</td>

								
								<td class="center">{{$item->item_price}}</td>
								<td class="center">{{$item->total}}</td>
								
								 <td class="center">
								    
								    <button class="btn btn-info" type="submit">
										<i class="halflings-icon white edit"></i>  
									</button>
								    
								</td> 

							</tr>
						</form>
						@endforeach
						@endif
						<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>SubTotal</td>
									<td>{{$totalAmount}}</td>
								</tr>
					  <form action="{{URL::to('/completeSale')}}" method="post">
					  	@csrf
					  		<tr>
					  			<td></td>
					  			<td></td>
					  			<td></td>
					  			<td></td>
					  			<td>Discount</td>
					  			<td><input type="number" name="discount"></td>
					  		</tr>

					  		<tr>
					  			<td></td>
					  			<td></td>
					  			<td></td>
					  			<td></td>
					  			<td>Payment</td>
					  			<td><input type="number" name="payment"></td>
					  		</tr>
					  	<tr>
					  	<td></td>
					  	<td></td>
					  	<td></td>
					  	<td></td>
					  	<td><button class="btn btn-success btn-sm pull-right" type="submit" ">Complete Sale</button></td>
					  	</tr>
					  </form>
					</tbody>
					  </table>           
					</div>
				</div><!--/span-->
			</div>
	</div>


@endsection
@push('scripts')
@endpush

