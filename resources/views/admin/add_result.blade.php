@extends('index')
@push('css')
@section('title','Item')
@section('content')


	<div id="content" class="span10">
		<ul class="breadcrumb">
				<li>
					<h3>Add Result</h3>
				</li>
		</ul>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
					</div>
					<div class="box-content">
						
						<form class="form-horizontal" action="{{URL::to('/saveResult')}}" method="post" enctype="multipart/form-data">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Subject Code</label>
							  <div class="controls">
								<input type="text" name="subject_code" id="subject_code" class="form-control">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Subject Name</label>
							  <div class="controls">
								<input type="text" name="subject_name" id="subject_name" class="form-control">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Subject Marks</label>
							  <div class="controls">
								<input type="number" name="subject_marks" id="subject_marks" class="form-control">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Result</button>
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

