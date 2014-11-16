<?php

class Shop extends Eloquent{
	protected $table = 'shop';


	public function saveFromInput(){
		$this->name= Input::get('name');
		$this->id= Auth::user()->id;
		$this->address= Input::get('al1').'<br>'.Input::get('al2');
		$this->city= Input::get('city');
		$this->locality= Input::get('locality');
		$this->phone= Input::get('phone');
		$this->lat= Input::get('lat');
		$this->long= Input::get('long');
	}
	
}
