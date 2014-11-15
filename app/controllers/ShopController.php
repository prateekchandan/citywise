<?php
use Illuminate\Support\MessageBag;
class ShopController extends BaseController {

	public function show_add($value='')
	{
		return View::make('shop.add');
	}

	public function add($value='')
	{
		$shop = new Shop;
		$shop->saveFromInput();
		$shop->save();
		$filename='shop_'.$shop->id.'.png';
		$destinationPath=public_path().'/images/shop';
		if (Input::hasFile('image'))
		{
		    Input::file('image')->move($destinationPath, $filename);
		    $shop->img='images/shop/'.$filename;
		}
		else
			$shop->img='images/shop/default.img';

		$shop->save();
		return Redirect::to('/');

	}

	public function all($value='')
	{
		$shop = new Shop;
		$shop = $shop->where('city','=',Session::get('city'))->get();
		View::share('shops',$shop);
		return View::make('shop.all');
	}

	public function one_shop($id=0)
	{
		$shop=Shop::where('shop_id','=',$id)->first();
		if(is_null($shop))
			return Redirect::route('shops');
		$shops = new Shop;
		$shops = $shops->where('city','=',$shop->city)->orderBy(DB::raw('RAND()'))->take(20)->get();
		$review = DB::table('shop_review')
					->join('users','shop_review.id','=','users.id')
					->where('shop_review.shop_id','=',$id)
					->get();
		View::share('reviews',$review);
		View::share('shops',$shops);
		View::share('shop',$shop);
		View::share('user',User::where('id','=',$shop->id)->first());
		return View::make('shop.one');
	}

	public function add_review($value='')
	{
		$review=new ShopReview;

		$review->shop_id=Input::get('shop_id');
		$review->remarks=Input::get('remarks');
		$review->rate=Input::get('rate');
		$review->id=Auth::User()->id;
		$review->save();
		return Redirect::back();
	}
}