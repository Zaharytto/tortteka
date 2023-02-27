@extends('layout.master')

@section('content')
<main>
  <div class="album py-5 bg-light">
    <div class="text-center">
      <h2>Мы предоставляем услугу по изготовлению тортов на заказ на любой вкус</h2>
      <a href="/orders_customs/create" class="btn btn-primary">Заказать</a>
    </div>
    <hr>
    <div>
      <h2 class="container fw-light text-center">Наш Ассортимент</h2>
    </div>
    <p></p>
    <div class="container">
      <div class="row">
        @foreach ($cakes as $cake)
        <div class="col-md-4">
          <div class="card-deck-wrapper">
            <form action="/" method="post">
            @csrf
              <div class="card" style="width: 18rem;">
                <a href="/cakes/{{ $cake->id }}">
                  <img src="/img/{{ $cake->picture }}" class="card-img-top" alt="...">
                </a>
                <input type="hidden" value="{{ $cake->picture }}" name="picture">
                <input type="hidden" value="{{ session()->getId() }}" name="session_id">
                <div class="card-body">
                  <h5 class="card-title">"{{ $cake->name }}"</h5>
                  <input type="hidden" value="{{ $cake->name }}" name="name">
                  <p class="card-text">{{ $cake->description }}</p>
                  <p class="card-text">Начинка: {{ $cake->filling }}</p>
                  <span>
                    <span>{{ $cake->price }}&nbsp;
                      <input type="hidden" value="{{ $cake->price }}" name="price">
                      <span>
                        руб.
                      </span>
                    </span>
                  </span>
                  <button type="submit" class="btn btn-primary">Добавить в корзину</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</main>
@endsection
