<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use Socialite;
use App\SocialProvider;
use Mail;
use DB;
use Request;


class mailcontroller extends Controller
{
    public function get_lienhe()
    {
    	return view('page.lienhe');
    }
     public function post_lienhe(Request $request){
        $user = new User();
        
        $data = ['hoten'=>Request::input('name'),'email'=>Request::input('email'),'subject'=>Request::input('subject'),'tinnhan'=>Request::input('message')];
        Mail::send('page.blanks',$data, function($msg){
            $msg->from('quoctuanwtf@gmail.com','Quốc Tuấn');
            $msg->to('quoctuanwtfemail@gmail.com', 'Phan Quốc Tuấn')->subject('Đây là mail khách hàng');
        });
        echo "<script>
            alert('Cám ơn bạn đã góp ý .Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất');
            window.location ='".url('/index')."'
                
            </script>";
    }
}