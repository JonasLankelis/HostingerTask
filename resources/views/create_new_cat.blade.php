<h1>Registration Form</h1><hr>
<h3>Add new category: </h3>
{{Form::open(array('url'=>'/create','method'=>'post'))}}
<div class="form-group">
<input type="text" name="cat_name" placeholder="Category name">
{!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) !!}

<input type="submit" value="Create">
</div>
{{Form::close()}}

