<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\OrderCustom;


class OrdersCustomsController extends Controller
{
    public function index(): View
    {
        return view('orders_сustoms.index');
    }

    public function create(): View
    {
        return view('orders_сustoms.create');
    }

    public function store(): RedirectResponse
    {
        $this->validate(request(), [
            'name' => 'required|alpha',
            'phone' => 'required|digits:9',
            'comment' => 'string|nullable'
        ],
            [
            'required' => 'Поле "Ваше имя" и "Номер Телефона" является обязательным',
            'alpha' => 'Имя должено содержать только буквы',
            'digits' => 'Номер телефона должен содержать :digits цифр',
            'string' => 'Некорректный комментарий'
        ]);

        OrderCustom::create(request()->all());

        return redirect('/orders_customs');
    }
}
