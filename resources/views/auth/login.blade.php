@extends('layouts.app')
@section('content')
	<img class="wave" src="{{asset('img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset('img/logo.png')}}">
		</div>
		<div class="login-content">
			<form method="POST" action="{{ route('login')}}">
				@csrf
				<img class="image1" src="{{asset('img/sage.png')}}">
				<img class="image2" src="{{asset('img/logo.png')}}">
				<h2 class="title">Bienvenue</h2>
				@if(session()->has('message'))
            		<p class="alert alert-info">
                		{{ session()->get('message') }}
            		</p>
        		@endif
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                @if($errors->has('password'))
					<p class="help-block">
						{{ $errors->first('password') }}
					</p>
				@endif
           		<div class="input-div one">
           		   	<div class="i">
						<i class="fas fa-envelope-open"></i>
           		   	</div>
           		   	<div class="div{{ $errors->has('email') ? ' has-error' : '' }}">
           		   		<h5>E-mail</h5>
           		   		<input id="email" type="email" name="email" class="input" value="{{ old('email', null) }}">
			   		</div>
           		</div>
           		<div class="input-div pass" style="margin-bottom: 30px">
           		   	<div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   	</div>
           		   	<div class="div{{ $errors->has('password') ? ' has-error' : '' }}">
           		    	<h5>Password</h5>
           		    	<input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					</div>
            	</div>
                <a href="{{ route('password.request') }}" style="text-align: left">
                    {{ trans('global.forgot_password') }}
                </a>
                <a href="{{ route('register') }}" style="margin-top: -25px">{{ trans('global.register') }}</a>
            	<button type="submit" class="btn btn-primary">
						{{ trans('global.login') }}
                 </button>
            </form>
			
        </div>
    </div>
	@endsection

@section('scripts')
@endsection



