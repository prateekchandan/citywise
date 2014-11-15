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
		View::share('products',$products);
		return View::make('product.shop');

	}

	public function dept($value='')
	{
		echo "coming soon...";
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

}