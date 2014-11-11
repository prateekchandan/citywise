<?php

class Shop extends Eloquent{
	protected $table = 'shop';


	public function saveFromInput(){
		$this->shop_id= Input::get('shop_id');
		$this->name= Input::get('name');
		$this->user_id= Auth::user()->user_id;
		$this->address= Input::get('address');
		$this->city= Input::get('city');
		$this->phone= Input::get('phone');
		$this->lat= Input::get('lat');
		$this->long= Input::get('long');
	}
}
