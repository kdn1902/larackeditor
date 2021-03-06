@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Вход
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">
								E-Mail
							</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

								@if ($errors->has('email'))
								<span class="help-block">
									<strong>
										{{ $errors->first('email') }}
									</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">
								Пароль
							</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password" required>

								@if ($errors->has('password'))
								<span class="help-block">
									<strong>
										{{ $errors->first('password') }}
									</strong>
								</span>
								@endif
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<img src="{{ captcha_src() }}" alt="captcha" class="captcha-img" data-refresh-config="default">
								<a href="#" id="refresh">
									<span class="glyphicon glyphicon-refresh">
									</span>
								</a>
							</div>
						</div>
						<div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Капча</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="captcha"/>
								@if ($errors->has('captcha'))
									<span class="help-block">
										<strong>
											{{ $errors->first('captcha') }}
										</strong>
									</span>
								@endif								
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Войти
								</button>

								<a class="btn btn-link" href="{{ route('password.request') }}">
									Забыл пароль?
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
    $('#refresh').on('click',function(){
        var captcha = $('img.captcha-img');
        var config = captcha.data('refresh-config');
        $.ajax({
            method: 'GET',
            url: '/get_captcha/' + config,
        }).done(function (response) {
            captcha.prop('src', response);
        });
    });
</script>
@endsection
