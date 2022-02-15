@extends('layouts.app')
@section('content')
<img class="wave" src="{{asset('img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset('img/logo.png')}}">
		</div>
		<div class="login-content">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
				<img class="image1" src="{{asset('img/sage.png')}}">
				<img class="image2" src="{{asset('img/logo.png')}}">
				<h2 class="title">Welcome</h2>
					@if($errors->has('email'))
						<p class="help-block">
							{{ $errors->first('email') }}
						</p>
					@endif
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
           		   </div>
           		</div>
            	<button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
        </div>
    </div>
@endsection