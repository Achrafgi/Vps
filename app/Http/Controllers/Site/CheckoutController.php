<?php 
namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    protected $orderRepository;

    // public function __construct(OrderContract $orderRepository)
    // {
    //     $this->orderRepository = $orderRepository;
    // }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }
    public function getCart()
    {
        return view('site.pages.cart');
    }

    // public function placeOrder(Request $request)
    // {
    //     // Before storing the order we should implement the
    //     // request validation which I leave it to you
    //     $order = $this->orderRepository->storeOrderDetails($request->all());

    //     dd($order);
    // }
}/// -->