<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Order;
use App\Models\Basket;

class OrdersController extends Controller
{

    public function create(): View
    {
        $sum = BasketsController::sum();
        $baskets = Basket::get();

        return view('orders.create', compact('baskets', 'sum'));
    }

    public function success(): View
    {
        return view('orders.success');
    }

    public function store(): RedirectResponse
    {
        $this->validate(request(), [
            'name' => 'required|alpha',
            'phone' => 'required|digits:9'
        ],
            [
            'required' => 'Поле "Ваше имя" и "Номер Телефона" является обязательным.',
            'alpha' => 'Имя должено содержать только буквы.',
            'digits' => 'Номер телефона должен содержать :digits цифр'
        ]);

        Order::create(request()->all());

        return redirect('/orders/success');
    }
}
