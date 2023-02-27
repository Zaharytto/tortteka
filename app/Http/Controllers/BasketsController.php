<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;
use App\Models\Basket;
use App\Models\Cake;


class BasketsController extends Controller
{

    public static function sum(): float|null
    {
        $baskets = Basket::get();
        $sum = null;

        foreach($baskets as $basket)
        {
            if ($basket->session_id === session()->getId())
            {
                $sum += $basket->price;
            }
        }

        return $sum;
    }

    public function index(): View
    {
        $cakes = Cake::get();
        $sum = self::sum();
        $baskets = Basket::get();

        return view('baskets.create', compact('cakes','baskets', 'sum'));
    }

    public function store(): Redirector
    {
        Basket::create(request()->all());

        return redirect('/');
    }


}
