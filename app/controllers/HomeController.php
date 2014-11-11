<?php
use Illuminate\Support\MessageBag;
class HomeController extends BaseController {

	public function city($value='Mumbai')
	{
		Session::put('city',$value);
		return Redirect::to('/');
	}

	public function populate()
	{
		if(sizeof(DB::table('department')->get())<1){	
			$ins=array(
					array('department'=>'Bags'),
					array('department'=>'Watches'),
					array('department'=>'Accesories'),
					array('department'=>'Babycare'),
					array('department'=>'Beauty & Cosmetics'),
					array('department'=>'Clothing'),
					array('department'=>'Footwear'),
					array('department'=>'Health & Medicines'),
					array('department'=>'Jwellery & Valuables'),
					array('department'=>'Sports'),
					array('department'=>'Music, Games & movies'),
					array('department'=>'Books and Stationary'),
					array('department'=>'Electronics'),
					array('department'=>'Food & Hotels'),
					array('department'=>'Gifts & Toys'),
					array('department'=>'Household and Furnitures'),
					array('department'=>'Services'),
				);
			foreach ($ins as $key => $value) {

				$dept = new Department;
				$dept->department=$value['department'];
				$dept->save();
			}
		}
		echo "Populated Departments..<br>";







		echo "<br>GO <a href='".URL::to('/')."'>home</a>";
	}
}