@extends('layouts.app')
@section('content')
<img class="wave" src="{{asset('img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset('img/logo.png')}}">
		</div>
		<div class="login-content">
			<form method="POST" action="{{ route('register') }}">
				@csrf
				<img class="image1" src="{{asset('img/sage.png')}}">
				<img class="image2" src="{{asset('img/logo.png')}}">
				<h2 class="title">Bienvenue</h2>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
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
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div{{ $errors->has('name') ? ' has-error' : '' }}">
           		   		<h5>Name</h5>
           		   		<input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">		
			    	</div>
           		</div>
			<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope-open"></i>
           		   </div>
           		   <div class="div{{ $errors->has('name') ? ' has-error' : '' }}">
           		   		<h5>Email</h5>
           		   		<input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">							
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div{{ $errors->has('password') ? ' has-error' : '' }}">
           		    	<h5>Password</h5>
           		    	<input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            	   </div>
            	</div>
                <div class="input-div pass" style="margin-bottom: 30px">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
            	   </div>
            	</div>
                	<a href="{{ route('login') }}">
                                        {{ __('already have an account? Sign IN.') }}
                        </a>
            	<button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
            </form>
        </div>
    </div>
@endsection