@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Статья</div>

                <div class="panel-body">
                	@if ($errors->any())
    				<div class="alert alert-danger">
        				<ul>
            				@foreach ($errors->all() as $error)
                				<li>{{ $error }}</li>
            				@endforeach
        				</ul>
    				</div>
					@endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" role="form">
                    <div class="form-group">
                    	{{ csrf_field() }}
                    	<input type="text" class="form-control" id="title" name="title" placeholder="Название статьи" value="{{ old('title', $post->title) }}" required>
                    	<textarea name="post" id="editor">{!! old('post', $post->post) !!}
	                	</textarea>
	                	<input type="submit" value="Сохранить" class="btn btn-primary">
	                </div>
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> -->
<script>
	var options = {
		extraPlugins: 'uploadimage,image2',
		height: 500,
    	filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    	filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    	filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    	filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
  	};
    CKEDITOR.replace( 'editor' , options);
</script>
@endsection