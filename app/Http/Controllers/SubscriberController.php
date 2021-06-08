<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
//use Auth;

class SubscriberController extends Controller
{

	
    public function search(Request $request)
	{
		$subscribers = Subscriber::where('name' , 'LIKE' , '%' . $request->get('searchBox') . '%')->where('user_id' , Auth::user()->id)->get();
		return json_encode($subscribers);
	}

	public function searchDeletedSubscribers(Request $request)
	{
		$subscribers = Subscriber::where('name' , 'LIKE' , '%' . $request->get('searchBox') . '%')->where('user_id' , Auth::user()->id)->onlyTrashed()->get();
		return json_encode($subscribers);
	}


    public function store(Request $request)
    {
    	$subscribers = new Subscriber();
    	$subscribers->name = $request->username;
    	$subscribers->email = $request->email;
    	$subscribers->mobile = $request->mobile;
    	$subscribers->payment_date = $request->p_date;
    	$subscribers->expire_date = $request->expire;
    	$subscribers->price = $request->price;
    	$subscribers->user_id = Auth::user()->id;
    	$subscribers->save();

    	return redirect('/dashboard/'.Auth::user()->id);
    }



    	


		public function update(Request $request , $subscriber_id)
		{
				$subscribers = Subscriber::find($subscriber_id);
				$subscribers->name = $request->name;
				$subscribers->email = $request->email;
				$subscribers->mobile = $request->mobile;
				$subscribers->payment_date = $request->p_date;
				$subscribers->expire_date = $request->e_date;
				$subscribers->price = $request->price;
				$subscribers->update();
				return back();
			}


    public function delete($subscriber_id)
    {
    	$subscribers = Subscriber::find($subscriber_id);
    	if (!$subscribers) {
    		return response()->json(['message'=>'an error occurred']);
    	}
    	$subscribers->delete();
    	return back();
    }

		public function restore($subscriber_id)
		{
			$subscribers = Subscriber::onlyTrashed()->find($subscriber_id);
			$subscribers->expire = 1;
			$subscribers->restore();
			return redirect('/dashboard/'.Auth::user()->id);
		}
		//__________________________________________________________//


		
		


		public function test()
		{
		return Subscriber::select('expire')->get();
		}
}