<?php
use Illuminate\Support\MessageBag;
class ProductController extends BaseController {

	public function by_shop($id=0)
	{
		$shop=Shop::where('shop_id','=',$id)->first();
		if(is_null($shop))
			return Redirect::route('shops');

		$products = Product::where('shop_id','=',$shop->shop_id)->get();

		View::share('shop',$shop);
		View::share('title',"Browse Products in ".$shop->name);
		View::share('products',$products);
		return View::make('product.all');

	}

	public function dept($value='')
	{
		$dept=Department::get();
		View::share('depts',$dept);
		return View::make('product.depts');
	}

	public function dept_one($dept)
	{
		$product=Product::where('department','=',$dept)->get();
		View::share('products',$product);
		View::share('title',"Browse products from ".$dept);
		return View::make('product.all');
	}

	public function view_add($id=0)
	{
		$shop=Shop::where('shop_id','=',$id)->first();
		
		if(is_null($shop))
			return Redirect::route('shops');

		View::share('shop',$shop);
		return View::make('product.add');
	}

	public function add($id=0)
	{
		$shop=Shop::where('shop_id','=',$id)->first();
		
		if(is_null($shop))
			return Redirect::route('shops');

		Input::merge(array('shop_id',$id));

		$p = new Product;
		$p->saveFromInput($id);
		$p->save();

		$filename='product_'.$p->id.'.png';
		$destinationPath=public_path().'/images/product';
		if (Input::hasFile('image'))
		{
		    Input::file('image')->move($destinationPath, $filename);
		}
		
		return Redirect::to('shop'.'/'.$id.'/products');
			

	}


	public function view($id=0)
	{
		$p=Product::where('product_id','=',$id)->first();
		if(is_null($p))
			return Redirect::to('/');

		View::share('product',$p);
		View::share('others',Product::where('shop_id','=',$p->shop_id)->get());

		$review = DB::table('product_review')
					->join('users','product_review.id','=','users.id')
					->where('product_review.product_id','=',$id)
					->get();
		View::share('reviews',$review);
		return View::make('product.one');
	}
}