@extends('index')
@push('css')
@section('title','category')
@section('content')


	<div id="content" class="span10">
		<ul class="breadcrumb">
				<li>
					<h3>Add Category</h3>
				</li>
		</ul>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{URL::to('save-category')}}" method="post">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Category Name</label>
							  <div class="controls">
								<input type="text" name="category_name" id="category_name" class="form-control">
							  </div>

							</div>
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Category</button>
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

