<?php

class Department extends Eloquent{
	protected $table = 'department';


	public function saveFromInput(){
		$this->department= Input::get('department');
	}
}
