@extends('layout.layout')


@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
		  <div class="panel-heading">
		  	<div class="level">
		  		<span class="flex">
			  	<a href="{{route('profile', $thread->creator)}}"> 
			  	{{$thread->creator->name}}</a>:posted
			  	{{$thread->title}}
			  </span>
			@can ('update', $thread)
			  <form action="{{$thread->path()}}" method="POST"> 
			  	{{csrf_field()}}
			  	{{method_field('DELETE')}}
			  	<button type="submit" class="btn btn-link">Delete Forum</button>
			  </form>
			 @endcan
		  </div>

		  </div>
		  <div class="panel-body"><h6>{{$thread->body}}</h6></div>
		</div>

	
	@foreach ($replies as $reply)
		@include('threads.reply')	
	@endforeach

	{{$replies->links()}}

	@if(auth()->check())
		<form method="POST" action="{{$thread->path() .'/replies'}}">
			<div class="form-group">
			  {{csrf_field()}}
			  <textarea 
			   class="form-control"
			   rows="5"
			   name="body"
			   placeholder="Have something to say? " 
			   id="comment"></textarea>
			</div>
			<button type="submit" class="btn btn-primary" >Post</button>
		</form>
	@else
		<p><a href="{{route('login')}}"> Please sign in to participate in this discussion.</a> </p>
	@endif
</div>
<div class="col-md-4"> 
<div class="panel panel-default">
  
  <div class="panel-body">
  	<p> This Forum is published by {{$thread->created_at->diffForHumans()}} 
  		by 
  		<a href="#">{{$thread->creator->name}} </a> and currenetly has
  		{{$thread->replies_count}} {{str_plural('comment', $thread->replies_count)}} comments. 
  	</p>
  </div>
</div>

</div>
 </div>



@endsection