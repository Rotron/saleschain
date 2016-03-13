<?php

namespace App\Http\Controllers;

use Auth;
use \App\Order;
use App\Http\Requests;
use Illuminate\Http\Request;


class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('approved');
    }

    /**
     * AJAX
     * 
     * @param  Request $requset cart
     * @return Boolean  1/0
     */
    public function purchase(Request $requset)
    {
        $cart       = $requset['cart'];
        $orders     =[];
        $user_id    = Auth::user()->id;
        $receipt_id = $user_id.'_'.time();

        foreach($cart as $order) {
            $orders[] = array(
                'item_id'     => $order['id'],
                'user_id'     => $user_id,
                'qty'         => $order['qty'],
                'receipt_id'  => $receipt_id,
                'created_at'  => new \DateTime
            );
        }

        if (Order::insert($orders)) {
            return 1;
        }
        return 0;
    }
}
