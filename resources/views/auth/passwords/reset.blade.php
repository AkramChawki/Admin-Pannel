@extends('layouts.app')
@section('content')
<img class="wave" src="{{asset('img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset('img/sage.png')}}">
		</div>
		<div class="login-content">
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
            @if($errors->has('password_confirmation'))
                <p class="help-block">
                    {{ $errors->first('password_confirmation') }}
                </p>
            @endif
			<form method="POST" action="{{ route('password.request')}}">
				@csrf
				<img src="{{asset('img/logo.png')}}">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   	<div class="i">
						<i class="fas fa-envelope-open"></i>
           		   	</div>
                    <input name="token" value="{{ $token }}" type="hidden">
           		   	<div class="div">
           		   		<h5>E-mail</h5>
           		   		<input id="email" type="email" name="email" class="input">               			
			   		</div>
           		</div>
           		<div class="input-div pass">
           		   	<div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   	</div>
           		   	<div class="div">
           		    	<h5>Password</h5>
           		    	<input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">						   
					</div>
            	</div>
                <div class="input-div pass">
                    <div class="i"> 
                         <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                         <h5>Confirm Password</h5>
                         <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">    
                    </div>
                </div>
            	<button type="submit" class="btn btn-primary">
                    {{ trans('global.reset_password') }}
                 </button>
            </form>
        </div>
    </div>
@endsection