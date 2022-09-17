<?php 
namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ViewModels\ReservationViewModel;
class ReservationController extends Controller
{
    // protected $orderRepository;

    // public function __construct(OrderContract $orderRepository)
    // {
    //     $this->orderRepository = $orderRepository;
    // }

    public function getCheckout()
    {
        return view('checkout');
    }
    public function getCart()
    {
        return view('cart');
    }


   public function img(){

}
public function totalPrice(){


    return $this->nbrplace()*$price;
}
public function nbrPlace(){

    
}

public function show($id)
{
    $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
        ->json();

    $viewModel = new MovieViewModel($movie);

    return view('movies.show', $viewModel);
}
}