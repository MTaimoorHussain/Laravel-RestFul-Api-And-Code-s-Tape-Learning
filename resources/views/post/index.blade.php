<table>
	@if(count($posts) > 0)
	@foreach($posts as $post)
	<tr>
		<td>{{$post->active}}</td>
		<td>{{$post->title}}</td>
	</tr>
	@endforeach
	@endif
</table>
<!-- {{$posts->links()}} -->
{{ $posts->appends(request()->input())->links() }}