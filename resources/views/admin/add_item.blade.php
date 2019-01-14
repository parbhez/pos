@extends('index')
@push('css')
@section('title','Item')
@section('content')


	<div id="content" class="span10">
		<ul class="breadcrumb">
				<li>
					<h3>Add Item</h3>
				</li>
		</ul>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
					</div>
					<div class="box-content">
						<p style="font-size: 18px; color: green;">
								<?php 
									$message = Session::get('message');
									if ($message) {
										echo $message;
										Session::put('message', null);
									}
								 ?>
						 </p>
						<form class="form-horizontal" action="{{URL::to('save-item')}}" method="post" enctype="multipart/form-data">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Item Name</label>
							  <div class="controls">
								<input type="text" name="item_name" id="item_name" class="form-control">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Category Name</label>
							  <div class="controls">
							  	<?php 
							  		$categories = DB::table('tbl_category')->get();
							  	 ?>
							<select name="category_id">
								<option>Select Category</option>
								@foreach($categories as $category)	
									<option value="{{$category->category_id}}">{{$category->category_name}}</option>
								@endforeach
							</select>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Brand Name</label>
							  <div class="controls">
							  	<?php 
							  		$brands = DB::table('tbl_brand')->get();
							  	 ?>
								<select name="brand_id">
									<option>Select Brand</option>
									@foreach($brands as $brand)
									<option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
									@endforeach
								</select>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Supplier Name</label>
							  <div class="controls">
							  	<?php 
							  		$suppliers = DB::table('tbl_supplier')->get();
							  	 ?>
								<select name="supplier_id">
									<option>Select Supplier</option>
									@foreach($suppliers as $supplier)
									<option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
									@endforeach
								</select>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="item_description"></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Quantity</label>
							  <div class="controls">
								<input type="number" name="item_quantity" id="item_quantity" class="form-control">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Price</label>
							  <div class="controls">
								<input type="number" name="item_price" id="item_price" class="form-control">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Item Image</label>
							  <div class="controls">
								<input type="file" name="item_image" id="item_image" class="form-control">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Item</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
	</div>

@endsection
@push('scripts')
@endpush

