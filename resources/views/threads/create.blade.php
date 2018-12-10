@extends('layout.layout'); 



@section('content')
<div class="row">
	<div class="col-2"> </div>
	<div class="col-8">
		<form method="POST" action="/threads">
			{{csrf_field()}}

		 <div class="form-group"> 	
		 	<label>Choose a Channel:</label>
		 	<select name="channel_id" class="form-control" required>
		 		<option value="">Choose One</option>
		 		@foreach($channels as $channel)
		 		<option value="{{$channel->id}}" {{old('chanel_id') == $channel->id? 'selected': ''}}>
		 			{{$channel->name}}	
		 		</option>
		 		@endforeach

		 	</select>
		 </div>
		  <div class="form-group">	
		  	<label for="title">title</label> 
		  	<input type="title" 
		  	name="title"
		  	value="{{old('title')}}" 
		  	class="form-control"  
		  	placeholder="title">
		  </div>
		  <div class="form-group">
		  	<label for="body">body</label> 
		  	 <textarea 
			   class="form-control"
			   rows="5"
			   name="body"
			   placeholder="What is in your mind" 
			   id="comment">{{old('body')}}</textarea>
		  </div>
		  <button type="submit" class="btn btn-primary" >Publish</button>
	     </form>

	     @if(count($errors))

	     <ul class="alert alert-danger"> 
	     	@foreach($errors->all() as $error)
	     		<li> {{$error}}</li>
	     	@endforeach
	     </ul>
	     @endif
	</div>
</div>

@endsection