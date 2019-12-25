@extends('layouts.app')

@section('content')
<div class="container col-6 card p-4">
	<form method="post" action="{{url('/store')}}" enctype="multipart/form-data">
	    @csrf
	    <h1 class="text-center">Add New Post</h1>
	    <div class="form-group">
	        <label for="caption" class="h4">Caption :</label>
	        <input type="text" class="form-control" name="caption"/>
	    </div>
	    <div class="form-group">
	        <label for="image" class="h4">Image :</label>
	        <input type="file" class="form-control" name="image"/>
	    </div>
	      <div class="form-group">
	        <input type="submit" class="btn btn-primary float-right" name="submit"/>
	    </div>
	</form>
</div>
@endsection
