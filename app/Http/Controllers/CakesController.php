<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Basket;
use App\Models\Cake;

class CakesController extends Controller
{
    public function index(): View
    {
        $cakes = Cake::get();
        $sum = BasketsController::sum();
        $baskets = Basket::get();

        return view('welcome', compact('cakes', 'baskets', 'sum'));
    }

    public function show($id): View
    {
        $cake = Cake::find($id);

        return view('cakes.index', compact('cake'));
    }

    public function store(): RedirectResponse
    {
        Basket::create(request()->all());

        return redirect('/baskets/create');
    }

}