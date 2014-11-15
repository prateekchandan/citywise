<?php
use Illuminate\Support\MessageBag;
class ProductController extends BaseController {

	public function by_shop($id=0)
	{
		$shop=Shop::where('shop_id','=',$id)->first();
		if(is_null($shop))
			return Redirect::route('shops');

		$products = new Product;

	}

	public function dept($value='')
	{
		echo "coming soon...";
	}

}