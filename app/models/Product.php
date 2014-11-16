<?php

class Product extends Eloquent{
	protected $table = 'products';


	public function saveFromInput($shopid=0){
		$this->name= Input::get('name');
		$this->shop_id= Input::get('shop_id',$shopid);
		$this->description= Input::get('description');
		$this->exchange_policy= Input::get('exchange_policy');
		$this->warranty_details= Input::get('warranty_details');
		$this->price= Input::get('price');
		$this->quantity= Input::get('quantity');
		$this->department= Input::get('department');
	}
	
}
