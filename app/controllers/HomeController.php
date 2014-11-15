<?php
use Illuminate\Support\MessageBag;
class HomeController extends BaseController {

	public function city($value='Mumbai')
	{
		Session::put('city',$value);
		return Redirect::back();
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
		if(sizeof(DB::table('city')->get())<1){	

			$cities=['Mumbai' , 'Delhi' , 'Vishakhapatnam','Kakinada'];
			foreach ($cities as $key => $value) {
				$city=new City;
				$city->name=$value;
				$city->save();
			}
		}
		echo "Populated cities..<br>";





		echo "<br>GO <a href='".URL::to('/')."'>home</a>";
	}
}