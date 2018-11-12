<!DOCTYPE html>
<html>
<head>
	<title>Hostinger Task</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="/css/treeview.css" rel="stylesheet">
</head>
<body>
    @include('notification')
	<div class="container">     
		<div class="panel panel-primary">
                    <div class="panel-heading"><a href="/recursiveTree">Recursive Tree</a><a href="/iterativeTree">Iterative Tree</a></div>
	  		<div class="panel-body">
	  			<div class="row">
	  				<div class="col-md-6">
	  					<h3>Recursive Category List</h3>
				        <ul id="tree1">
				            @foreach($categories as $category)
                                                <li>
                                                    {{ $category->cat_name }}
				                    @if(count($category->childs))
				                        @include('manageChild',['childs' => $category->childs])
				                    @endif
                                                </li>
				            @endforeach
				        </ul>
	  				</div>
	  				@include('addCategory')

	  			
	  		</div>
        </div>
           @Jonas Lankelis, 2018
    </div>
    <script src="/js/treeview.js"></script>
</body>
</html>