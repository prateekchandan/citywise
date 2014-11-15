<?php
use Illuminate\Support\MessageBag;
class UserController extends BaseController {

	

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showlogin()
	{
		return View::make('user.login');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function login()
	{
		$email=Input::get('email');
		$password=Input::get('password');
		$remember=Input::get('remember');
		if($remember=="on")
			$remember=true;
		else $remember=false;

		if (Auth::attempt(array('email' => $email, 'password' => $password), $remember))
		{
		    return Redirect::to('/');
		}
		else{
			$messageBag = new MessageBag;
			$messageBag->add('login.error', 'Email Id / Password Mismatch');
			return Redirect::back()
			->withInput()
			->withErrors($messageBag);
		}
	}

	public function register()
	{
		$email=Input::get('email1');
		$password=Input::get('password1');
		$name=Input::get('name1');

		if($email == null || $email=="")
		{
			$messageBag = new MessageBag;
			$messageBag->add('reg.error', 'Email Cant be Empty');
			return Redirect::back()
			->withInput()
			->withErrors($messageBag);
		}
		if($name == null || $name=="")
		{
			$messageBag = new MessageBag;
			$messageBag->add('reg.error', 'Name Cant be Empty');
			return Redirect::back()
			->withInput()
			->withErrors($messageBag);
		}
		if($password == null || $password=="")
		{
			$messageBag = new MessageBag;
			$messageBag->add('reg.error', 'Pasword Cant be Empty');
			return Redirect::back()
			->withInput()
			->withErrors($messageBag);
		}
		$user=User::where('email','=',$email)->first();
		if(is_null($user)){
			$user = new User();
			$user->name=$name;
			$user->email=$email;
			$user->password = Hash::make($password);
			$user->save();
			Auth::login($user);
			return Redirect::to('/');
		}
		else{
			$messageBag = new MessageBag;
			$messageBag->add('reg.error', 'Email already exists. Please login');
			return Redirect::back()
			->withInput()
			->withErrors($messageBag);
		}
	}

}
