	<div class="col-md-6">
	  					<h3>Add New Category</h3>


				  			{!! Form::open(['route'=>'create.new']) !!}


				  				@if ($message = Session::get('success'))
									<div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
									        <strong>{{ $message }}</strong>
									</div>
								@endif


				  				<div class="form-group {{ $errors->has('cat_name') ? 'has-error' : '' }}">
									{!! Form::label('Category name:') !!}
									{!! Form::text('cat_name', old('cat_name'), ['class'=>'form-control', 'placeholder'=>'Enter category name']) !!}
									<span class="text-danger">{{ $errors->first('cat_name') }}</span>
								</div>


								<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
									{!! Form::label('Category:') !!}
									{!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) !!}
									<span class="text-danger">{{ $errors->first('parent_id') }}</span>
								</div>


								<div class="form-group">
									<button class="btn btn-success">Add New</button>
								</div>


				  			{!! Form::close() !!}


	  				</div>