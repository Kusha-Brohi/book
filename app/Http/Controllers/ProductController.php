<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;

use App\newsletter;
use App\Program;
use App\imagetable;
use SoapClient;
use App\Product;
use App\Category;
use App\Banner;
use DB;
use View;
use Session;
use App\Http\Traits\HelperTrait;
use App\orders;
use App\orders_products;


class ProductController extends Controller
{	
	use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 // use Helper;
	 
    public function __construct()
    {
         //$this->middleware('auth');
        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();
             
		$favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first();	 

        View()->share('logo',$logo);
		View()->share('favicon',$favicon);
        //View()->share('config',$config);
    }
	
	public function index()
    {
		 $products = new Product; 	
		 if(isset($_GET['q']) && $_GET['q'] != '') {
			
			$keyword = $_GET['q'];
			
			$products = $products->where(function($query)  use ($keyword) {
							$query->where('product_title', 'like', $keyword);
						 });
		 }	 
		$products = $products->orderBy('id','asc')->get();
		return view('products',['products'=>$products]); 
		
	}

	public function productDetail($id) {
		 
		 $product = new Product; 
		 $product_detail = $product->where('id',$id)->first();
		 $products = DB::table('products')->get()->take(10);
		 return view('product_detail',['product_detail'=>$product_detail, 'products'=>$products]); 
		
	}
	
	public function categoryDetail($id) {
		 
		 $category = new Category; 
		 	
        $category = DB::table('products')->where('category', '=', $id)->get()->toArray();
		return view('shop.category_detail',['category'=>$category]);
		
	}
	

	public function cart() {
		$cartCount=COUNT(Session::get('cart'));
		$language = Session::get('language');
		$product_detail = DB::table('products')->first();
		if(Session::get('cart') && count(Session::get('cart'))>0) {
		    // dd(Session::get('cart'));
			return view('shop.cart',['cart'=>Session::get('cart'),'language'=>$language,'product_detail'=>$product_detail]);
						
		} else {
			Session::flash('flash_message', 'No Product found'); 
			Session::flash('alert-class', 'alert-success'); 
			return redirect('/');
		}
		
    }
	
	public function saveCart() {
		
			$result = array();
			
			$id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
			
			$product_detail = DB::table('products')->where('id',$id )->first();
			$qty = isset($_POST['quantity']) ? intval($_POST['quantity']) : '1';
			$mat_language = isset($_POST['mat_language']) ? $_POST['mat_language'] : '';
			
			$cart = array();
			$cartId = $id;
			if(Session::has('cart')){

				$cart = Session::get('cart');
			}
		
            $price = $product_detail->price;
					
			
			if($id!=""&&intval($qty)>0) {

				if(array_key_exists($cartId,$cart)){
					unset($cart[$cartId]);
				}
						$productFirstrow = Product::where('id',$id)->first(); 
				
					
						$cart[$cartId]['id'] = $id;
						$cart[$cartId]['name'] = $productFirstrow->product_title;
						$cart[$cartId]['baseprice'] = $price;
						$cart[$cartId]['qty'] = $qty;
						$cart[$cartId]['mat_language'] = $mat_language;
				
						Session::put('cart',$cart);
						Session::flash('message', 'Product Added to cart Successfully'); 
						Session::flash('alert-class', 'alert-success'); 
						return redirect('/cart');
					
				
			} else {
				Session::flash('flash_message', 'Sorry! You can not proceed with 0 quantity'); 
				Session::flash('alert-class', 'alert-success');
				return back();	
				
			}
		
	}
	
	public function updateCart()
    {
			$cart = Session::get('cart');
			$result = array();
			$cart = array();
			$j = 0;
			foreach($_POST['product_id'] as $product_id) {
				
					   $productFirstrow = Product::where('id',$product_id)->first(); 
				
						$cart[$product_id]['id'] = $product_id;
						$cart[$product_id]['name'] = $productFirstrow->product_title;
						$cart[$product_id]['baseprice'] = $productFirstrow->price;
						$cart[$product_id]['qty'] = $_POST['qty'][$j];
						
				$j++;
				
			}
			
			Session::put('cart',$cart);
			
			Session::flash('message', 'Your Cart Updated Successfully'); 
			Session::flash('alert-class', 'alert-success'); 
			
			return back();
			
	}
	
	
	public function removeCart($id) {
		
		//$id = isset($_POST['ArrayofArrays'][0]) ? $_POST['ArrayofArrays'][0] : '';

		if($id!=""){

			if(Session::has('cart')){

				$cart = Session::get('cart');

			}

			if(array_key_exists($id,$cart)){

				unset($cart[$id]);

			}

			Session::put('cart',$cart);

		}

		// echo 'success';
		Session::flash('flash_message', 'Product item removed successfully'); 
		Session::flash('alert-class', 'alert-success');
		return back();	

  }
	
    public function shop()
    {
    	$shop = new Product; 	
		 if(isset($_GET['q']) && $_GET['q'] != '') {
			
			$keyword = $_GET['q'];
			
			$shop = DB::table('products')
                ->where('product_title', 'like', '%'.$keyword.'%')
                ->get()->toArray();
		 }	 
		 else{
        $shop = DB::table('products')->get()->toArray();
        }
        
        return view('shop.shop', ['shop'=> $shop]);
    }

    public function shopDetail($id)
    {
		 $product = new Product; 
		 $product_detail = $product->where('id',$id)->first();
		 $english_content = DB::table('contents')->where('id', 1)->first();
		 $arabic_content = DB::table('contents')->where('id', 2)->first();

        $shop = DB::table('products')->where('id', $id)->first();
		$language = Session::get('language');
		$testimonial = DB::table('testimonials')->get();
		$faqs = DB::table('faqs')->get()->toArray();
		$faqs = array_chunk($faqs, 2);
		$products = DB::table('products')->get()->take(10);
        return view('shop.detail', ['shop'=> $shop, 'language'=> $language, 'english_content'=> $english_content, 'arabic_content'=> $arabic_content, 'faqs'=> $faqs, 'testimonial'=> $testimonial, 'product_detail'=>$product_detail,'products'=>$products ]);
    }
	

	public function invoice($id)
    {
		
		$order_id = $id;
		$order = orders::where('id',$order_id)->first();
		$order_products = orders_products::where('orders_id',$order_id)->get();
		
		return view('account.invoice')->with('title','Invoice #'.$order_id)->with(compact('order','order_products'))->with('order_id',$order_id);; 
	}	

	public function checkout() {
		

		
		if(Session::get('cart') && count(Session::get('cart'))>0) {
			$countries = DB::table('countries')
									->get();
			return view('checkout',['cart'=>Session::get('cart'),'countries'=>$countries]);
						
		} else {
			Session::flash('flash_message', 'No Product found'); 
			Session::flash('alert-class', 'alert-success'); 
			return redirect('/');
		}
		
    }
	

    public function language()
    {
		$languages = $_POST['id'];
	
		Session::put('language',$languages);
		
		Session::put('is_select_dropdown',1);	
		// Session::put('language',$languages);
		// $test = Session::get('language');
		
		// Session::put('test',$test);
		
		//return redirect('shop-detail/1', ['test'=>$test]);
    }	
	
	public function shipping (Request $request) {
		
		$PostalCode = $request->country; // Zipcode you are shipping To
		
		define("ENV","demo"); // demo OR live

		if(ENV == 'demo') {
			$client = new SoapClient("https://staging.postaplus.net/APIService/PostaWebClient.svc?wsdl");    
			$Password =  '123456';
			$ShipperAccount =  'DXB51487';
			$UserName =  'DXB51487';
			$CodeStation =  'DXB';
		}
		else {
			$client = new SoapClient("https://etrack.postaplus.net/APIService/PostaWebClient.svc?singleWsdl");
			$Password =  '';
			$ShipperAccount =  '';
			$UserName =  '';
			$CodeStation =  '';
		}

		$params = array(
			'ShipmentCostCalculation' => array(
				'CI' => array(
					'Password' => $Password,
					'ShipperAccount' => $ShipperAccount,
					'UserName' => $UserName,
					'CodeStation' => $CodeStation,
					),
				"OriginCountryCode" => 'AE',
				"DestinationCountryCode" => $PostalCode,
				"RateSheetType" => 'DOC',
				"Width" => 1,
				"Height" => 1,
				"Length" => 1,
				"ScaleWeight" => 1,
			),
		);


		try{
			
			$d = $client->__SoapCall("ShipmentCostCalculation", $params);
			$d = json_decode(json_encode($d), true);
			
			if(isset($d['ShipmentCostCalculationResult']['Message']) AND ($d['ShipmentCostCalculationResult']['Message'] == 'SUCCESS')) {
				$status = true;
				$rate = $d['ShipmentCostCalculationResult']['Amount'];
			}
			else {
				$status = false;
				$messgae = $d['ShipmentCostCalculationResult']['Message'];
			}
		}
		catch (SoapFault $exception) {
			$status = false;
			$messgae = "Error Found Please try Again";
		}
	
		//if($status):
		//	echo $rate;
		//else:
		//	echo $messgae;
		//endif;
						
		//}
		//$cart = Session::get('cart');
		
		
		
		if($status) {
		    
		    $cart = Session::get('cart');	
			$cart['shipping'] = $rate;
			//$cart['shipping_address'] = $_POST['shipping_address'];
			Session::put('cart',$cart); 
			
			// return view('shop.cart', ['rate'=> $rate, 'cart'=> $cart]);
			return redirect('/cart');
						
		} else {
			Session::flash('flash_message', 'Error'); 
			Session::flash('alert-class', 'alert-success'); 
			return view('shop.cart', ['messgae'=> $messgae]);
		}
	return view('shop.cart', ['messgae'=> $messgae, 'cart'=> $cart]);
	
}	
		
}
	