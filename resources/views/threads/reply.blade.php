

<div class="panel panel-default">
		<div class="panel-heading">
			 <a href="{{ route('profile', $reply->owner)}}" class="list-group-item"> 
			 	{{$reply->owner->name}} 
			 	said {{$reply->created_at->diffForHumans()}}
			 </a>

			 <div> 
			 	<form method="POST" action="/replies/{{$reply->id}}/favorites">
			 		{{csrf_field()}}
			 		<button type="submit" class="btn btn-default" {{$reply-> isFavorited ()? 'disabled': ''}}>Favorite</button>
			 		{{$reply->favorites_count}} {{str_plural('Favorite', $reply->favorites_count)}}
			 	</form>
			 </div>
		 </div>
		 <div  class="panel-body">
			 {{$reply->body}}
		 </div
</div>