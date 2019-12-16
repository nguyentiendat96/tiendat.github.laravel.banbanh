<?php

namespace App\Http\Controllers;
use Session;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Http\Request;


class DemoController extends Controller
{
    public function index(){
        return view('demo.demo');
    }
    public function demo1(Request $p_request){
        $bien1 = $p_request->input('bien1');
        $result = [];
        $m = ['ccc','ddd','kkk'];
        $result['var1'] = $m;
        $result['var2'] = $bien1;
        $result['var3'] = 'var3';
        $result['var4'] = 'var4';
        $result['status'] = 1;
        return $result;
        die('gggg');
    }
}
