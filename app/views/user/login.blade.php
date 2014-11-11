@extends('template.main')

@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						@if ($errors->has('login.error'))
							<div class="alert alert-error alert-dismissable" style="background-color:#ffbbbb" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							{{ $errors->first('login.error') }}
							</div>
						@endif
						<form action="{{URL::Route('user.login')}}" method="POST">
							<input type="email" placeholder="Email Address" name="email" value="{{ Input::old('email') }}" required/>
							<input type="Password" placeholder="Pasword" name="password" required/>
							<span>
								<input type="checkbox" class="checkbox" name="remember"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						@if ($errors->has('reg.error'))
							<div class="alert alert-error alert-dismissable" style="background-color:#ffbbbb" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							{{ $errors->first('reg.error') }}
							</div>
						@endif
						<form action="{{URL::Route('user.register')}}" method="POST">
							<input type="text" placeholder="Name" name="name1" autocomplete="off" value="{{ Input::old('name1') }}" required/>
							<input type="email" placeholder="Email Address" autocomplete="off" name="email1" value="{{ Input::old('email1') }}" required/>
							<input type="password" placeholder="Password" autocomplete="off" name="password1" required/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection