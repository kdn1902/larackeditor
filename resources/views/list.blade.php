@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Статьи</div>

                <div class="panel-body">
                @if (count($posts) > 0)
                <div class="table-responsive">
                	<table class="table table-hover">
                	<thead>
                		<th>Пользователь</th><th>Статья</th>
                	</thead>
                	<tbody>
                	@foreach ($posts as $post)
                		<tr><td colspan='2'></td></tr>
                		<tr class='info'
                		@can('update', $post)
                			onclick="window.location.href='/edit/{{$post->slug}}'"
						@endcan
						>
                    	<td>{!! $post->user->name !!}</td><td>{{ $post->title }}</td></tr>
                    	<tr class="active"
                    	@can('update', $post)
                    	 	onclick="window.location.href='/edit/{{$post->slug}}'" 
                    	@endcan
                    	 >
    					<td colspan='2'>{!! $post->post !!}</td></tr>
    					
					@endforeach
					</tbody>
					</table>
				</div>
				@else
					<p>Нет статей</p>
				@endif
				{{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection