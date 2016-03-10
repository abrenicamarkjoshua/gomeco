<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Model;
use App\products;
use App\productPictures;
use Cart;
use Auth;
use Illuminate\Http\Request;
use App\purchaseorder;
use App\orders;

use App\Mailers\AppMailer;
use Hash;
use App\User;
use DateTime;
class HomeController extends Controller{
	public function getResendConfirmationEmail($username, AppMailer $mailer){
		$user = User::where('name', html_entity_decode($username))->first();
		$user->token = str_random(30);
		$user->save();
		$mailer->sendEmailConfirmationTo($user);

		return redirect("/auth/login")->with('message', "we've sent you an email verification link. please check your email");

	}
	public function getActivateUser($activation){
		$user = User::where('token', $activation)->first();
		$user->active = 1;
		$user->save();
		$purchaseOrders = purchaseorder::where('user_id', $user->id)->where('userverified', 'unverified')->get();
		foreach($purchaseOrders as $purchaseorder){
			$purchaseorder->userverified = "verified thru email";
			$purchaseorder->save();
		}
		return redirect('/auth/login')->with('message', 'account activated. please log in to continue');
	}
	public function postSearchProduct(Request $request){
		$search = $request->search;
		$count = products::where('productName', 'like', '%'.$search.'%')->count();
		$message = "search result found: $count";
		$data['products'] = products::where('productName', 'like', '%'.$search.'%')->paginate(6);
		$request->session()->flash('affirm', $message);
		return view('search', $data);

	}
	public function getSearchProduct(Request $request){
		$search = $request->search;
		$count = products::where('productName', 'like', '%'.$search.'%')->count();
		$message = "search result found: $count";
		$data['products'] = products::where('productName', 'like', '%'.$search.'%')->paginate(6);
		$request->session()->flash('affirm', $message);
		return view('search', $data);

	}
	public function getIndex(){
		if (Auth::check() && ! Auth::user()->active) {
			$username = Auth::user()->name;
            Auth::logout();
            // return with error
            return \Redirect::route('login')->withErrors(
            array('Account not yet activated. Please see your email for account activation. Or click this <a href = "/resendemailconfirmation/'.$username.'">link</a> to resend the activation email')
            );  
        }
		$data['cartQuantity'] = 0;
		$data['products'] = products::orderBy('id','desc')->paginate(6);
		return view('home', $data);
	}
	public function getFoodService(){
		$data['products'] = products::where('category_id',1)->paginate(6);
		$data['title'] = "Food service";
		return view('mainlayout', $data);
	}
	public function getCookingEquipment(){
		$data['products'] = products::where('category_id',2)->paginate(6);
		$data['title'] = "Cooking equipment";
		return view('mainlayout', $data);
	}
	public function getStorageAndPreparationEquipment(){
		$data['products'] = products::where('category_id',3)->paginate(6);
		$data['title'] = "Storage and preparation equipments";
		return view('mainlayout', $data);
	}
	public function getItemDescription($id){
		$data['product'] = products::find($id);
		$data['productPictures'] = productPictures::where('product_id',$id)->get();
		return view('single', $data);
	}
	public function postItemDescription($id){
		$data['product'] = products::find($id);
		$data['productPictures'] = productPictures::where('product_id',$id)->get();
		if(isset($_POST['addtocart'])){
			Cart::add(
				[
				'id' =>$data['product']->id, 
				'name' => $data['product']->productName,
				'price' => $data['product']->sellingprice,
				'quantity' => 1, 
				'attributes' => array()
				]
				);
			return redirect('/mycart');
		}
		return view('single', $data);
	}
	public function getMyCart(){
		
		return view('mycart');
	}
	public function postMyCart(){
		if(isset($_POST['btnRemoveFromCart'])){
			Cart::remove($_POST['product_id']);
		}

		return view('mycart');
	}
	public function postCheckout(Request $request){
		
		if(Auth::check()){
			return $this->getCheckoutFinal($request);
		}

		
		return view('checkout');
	}

	public function getCheckoutFinal(Request $request){
		if(Cart::isEmpty()){
			return redirect('/home');
		}
		$data['name'] = (Auth::check()) ? Auth::user()->name : $request->name;
		$data['address'] = (Auth::check()) ? Auth::user()->customer_address : $request->address;
		$data['mobile'] =  (Auth::check()) ? Auth::user()->mobileNumber : $request->mobile;
		$data['email'] =  (Auth::check()) ? Auth::user()->email : $request->email;
		$orders = [];
		$items = Cart::getContent();
		if(isset($_POST['placeorder'])){
			$purchaseOrder = new purchaseorder();
			$purchaseOrder->customer_name = $data['name'];
			$purchaseOrder->customer_mobile = $data['mobile'];
			$purchaseOrder->customer_address = $data['address'];
			$purchaseOrder->customer_email = $data['email'];
			$purchaseOrder->status = "pending";
			$deadline = strtotime("+7 day");
			$purchaseOrder->deadline = date('Y-m-d', $deadline);
			if(Auth::check()){
				$purchaseOrder->user_id = Auth::user()->id;
				if(Auth::user()->active == 1){
				$purchaseOrder->userverified = "Verified thru email";
					
				}
			}
			$purchaseOrder->save();

			$items = Cart::getContent();
			foreach($items as $item){
				$order = new orders();
					$product = products::find($item->id);
					$sellingprice = $product->sellingprice;
					$amount = $item->quantity * $sellingprice;
					
				$order->purchaseorders_id = $purchaseOrder->id;
				$order->productName = $item->name;
				$order->quantity = $item->quantity;
				$order->amount = $amount;
				

				$order->save();
			}
			Cart::clear();
			if(Auth::check()){
				return redirect("/myorders")->with('affirm', "Your order has been processed. Please keep your lines up, we will contact you.");
			}

			return redirect("/")->with('affirm', "Your order has been processed. Please keep your lines up, we will contact you.");
			
		}
		

		$data['orders'] = $items;
		return view('checkoutreview', $data);
	}
	public function postCheckoutFinal(Request $request, AppMailer $mailer){
		if(isset($_POST['LoginAndCheckout'])){
			if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            	// Authentication passed...
            	//return redirect()->intended('review');
    		} else{
        		return redirect("/checkout")->with("error", "authentication failed");
    		}
		}
		if(isset($_POST['RegisterAccountcheckout'])){
			

			if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            	// Authentication passed...
            	//return redirect()->intended('review');
    		} else{
    			if(User::where('name', $request->username)->count() > 0){
    				return redirect('/checkout')->with('error', 'User name already exist');
    			}
    			if(User::where('email', $request->email)->count() > 0){
    				return redirect('/checkout')->with('error', 'Email already exist');
    			}
	        	$user = new User();
				$user->lastname = $request->lastname;
				$user->firstname = $request->firstname;
				$user->middleName = $request->middlename;
				$user->email = $request->email;
				$user->customer_address = $request->address;
				$user->name = $request->username;
				$user->password = bcrypt($request->password);
				$user->mobileNumber = $request->mobile;
				$confirmation_code = str_random(30);
				$user->token = $confirmation_code;
				$user->save();
					//return redirect("/checkout")->with("authentication failed");
				$mailer->sendEmailConfirmationTo($user);

				if(Auth::attempt(['email' => $user->email, 'password' => $request->password])){

				}
				else{
					return "error";
				}
			
    		}
		}
		$data['name'] = (Auth::check()) ? Auth::user()->firstname . " " . Auth::user()->lastname : $request->name;
		$data['address'] = (Auth::check()) ? Auth::user()->customer_address : $request->address;
		$data['mobile'] =  (Auth::check()) ? Auth::user()->mobileNumber : $request->mobile;
		$data['email'] =  (Auth::check()) ? Auth::user()->email : $request->email;
		$orders = [];
		$items = Cart::getContent();
		if(isset($_POST['placeorder'])){
			$purchaseOrder = new purchaseorder();
			$purchaseOrder->customer_name = $data['name'];
			$purchaseOrder->customer_mobile = $data['mobile'];
			$purchaseOrder->customer_address = $data['address'];
			$purchaseOrder->customer_email = $data['email'];
			$purchaseOrder->status = "pending";
			$deadline = strtotime("+7 day");
			$purchaseOrder->deadline = date('Y-m-d', $deadline);
			if(Auth::check()){
					$purchaseOrder->user_id = Auth::user()->id;
				}
			$purchaseOrder->save();

			$items = Cart::getContent();
			foreach($items as $item){
				$order = new orders();
					$product = products::find($item->id);
					$sellingprice = $product->sellingprice;
					$amount = $item->quantity * $sellingprice;
					
				$order->purchaseorders_id = $purchaseOrder->id;
				$order->productName = $item->name;
				$order->quantity = $item->quantity;
				$order->amount = $amount;
				

				$order->save();
			}
			Cart::clear();
			if(Auth::check()){
				if(Auth::user()->active){
					return redirect("/myaccount")->with('affirm', "Your order has been processed.");

				} else{
					return redirect("/myaccount")->with('affirm', "Your order has been processed. Please keep your lines up, we will contact you.");
				}
			}


			return redirect("/")->with('affirm', "Your order has been processed. Please keep your lines up, we will contact you.");
			
		}
			

		$data['orders'] = $items;
		return view('checkoutreview', $data);
	}
	public function getMyAccount(){
		$data['error'] = "";
		$data['user'] = Auth::user();
		return view('myaccount', $data);
	}
	public function getRegister(){
		if(Auth::check()){
			return redirect('/myaccount');
		}
		$data['error'] = "";
		$data['user'] = "";
		return view('auth.register', $data);
	}
	public function postRegister(Request $request, AppMailer $mailer){
		if(isset($_POST['register'])){

			$user = new User();
			$user->name = $request->name;
			$user->mobileNumber = $request->mobilenumber;
			$user->email = $request->email;
			$user->customer_address = $request->address;
			$user->password = bcrypt($request->password);
			$confirmation_code = str_random(30);
			if($request->password != $request->retypePassword){
				return redirect('/auth/register')->with('error', 'Passwords must match');
			}
			$user->middleName = $request->middlename;
			$user->token = $confirmation_code;
			$user->save();
			 $mailer->sendEmailConfirmationTo($user);
			return redirect('myaccount')->with('affirm', 'Successfully registered. Please check your email to activate your account');;
		}
	}
	public function postMyAccount(Request $request){

		$error = "";
		
		$user = Auth::user();
		
		if(isset($_POST['save'])){
			
			$user->name = $request->username;
			$user->lastname = $request->lastname;
			$user->firstname = $request->firstname;
			$user->middlename = $request->middlename;
			$user->mobileNumber = $request->mobilenumber;
			$user->email = $request->email;
			$user->customer_address = $request->address;
			$user->save();
			$_SESSION['affirm'] = "User profile saved successfully!";

		}
		if(isset($_POST['changepassword'])){
			if(trim($request->oldpassword) == ''){
				$error = "old password can't be blank";
			}
			elseif(trim($request->newpassword) == '')
			{
				$error = "new password can't be blank";
			
			}
			else{
				if(isset($_POST['changepassword'])){
					if(Hash::check($request->oldpassword, $user->password) == false){
						$error ="Change password failed. Wrong input of old password.";
						//$2y$10$TliCsgcgCs7QKW/Trn1WruWc7LFGc8Ek.yDlh389d4r7PbBQVN1QO

					}else{
						if($request->newpassword != $request->confirmnewpassword){
							$error ="Change password failed. Passwords must match";
						}else{
							$user->password = bcrypt($request->newpassword);
							$user->save();
							$_SESSION['affirm'] = "Password successfully changed.";
						}
					}
				}
			}
		}
		$data['user'] = $user;

		$data['error'] = $error;
		return view('myaccount', $data);
	}
	public function getMyOrders(){
		$data['purchaseorders'] = purchaseorder::where('user_id', Auth::user()->id)->get();
		return view('myorders', $data);
	}
	public function postOrder($id){
		if(isset($_POST['btnCancelOrder'])){
			$order = purchaseorder::where('user_id', Auth::user()->id)->where('id', $id)->first();
			$order->status = "cancelled";
			$order->save();
			return redirect("/order/$id")->with('message', "Order was cancelled");
		}

	}
	public function getOrder($id){
		$match = [
			'purchaseorders_id' => $id,
		];
		$data['orders'] = orders::where($match)->get();
		$data['total'] = $data['orders']->sum('amount');
		$data['totalquantity'] = orders::where('purchaseorders_id',$id)->count();
		$purchaseorder = purchaseorder::find($id);
		if($purchaseorder->user_id != Auth::user()->id){
			return redirect("/home");
		}
		$data['purchaseOrder'] = $purchaseorder;
		$status = "";
		switch($data['purchaseOrder']->status){
			case "pending":
				$status = "<b style = 'color:orange'>pending</b>";
				
			break;
			case "cancelled":
				$status = "<b style = 'color:orange'>cancelled</b>";
				
			break;
			case "on-delivery-process":
				$status = "<b style = 'color:green'>on-delivery-process</b>";
				
			break;
			case "closed":
				$status = "<b style = 'color:green'>closed</b>";
				
			break;
		}
		$data['status'] = $status;
$deadlineColor = "black";
if($purchaseorder->status == "pending" || $purchaseorder->status == "on-delivery-process"){

		$datetime1 = new DateTime(date("Y-m-d"));
		$datetime2 = new DateTime($purchaseorder->deadline);
		$interval = $datetime1->diff($datetime2);
		$days =$interval->days;


		if($days < 3){
			$deadlineColor = "red";
		}else if($days < 5){
			$deadlineColor = "orange";

		}
		else if($days == 7){
			$deadlineColor = "green";

		}
}
		$data['deadlineColor'] = $deadlineColor;
		return view('orderdetails', $data);
	}
}
?>