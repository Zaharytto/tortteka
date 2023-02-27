@extends('layout.master')

@section('content')

<main>
  <div class="album py-5 bg-light">
    <div class="text-center">
      <h2>Мы предоставляем услугу по изготовлению тортов на заказ на любой вкус</h2>
      <a href="/orders_customs/create" class="btn btn-primary">Заказать</a>
    </div>
    <hr>
    <p></p>
    <div class="container">
      <form method="post" action="/">
      @csrf
        <div class="mb-3">
          @foreach ($baskets as $basket )
            @if ($basket->session_id === session()->getId())
              <input type="hidden" value="{{ $basket->session_id }}" name="session_id">
              <ol class="list-group list-group-numbered">
                <li class="list-group-item">
                  <img src="/img/{{ $basket->picture ?? ''}}" class="card-img-top" alt="..." style="width: 5rem;">
                  {{ $basket->name ?? ''}}
                  <span>
                    <span>{{ $basket->price ?? ''}}&nbsp;
                      <span>руб.</span>
                    </span>
                  </span>
                </li>
              </ol>
            @endif
          @endforeach
        </div>
        <div>
          <h4>
            <label for="sun" class="form-label">Общая сумма:</label>
          </h4>
          <h3>
            <span>
              <span>{{ $sum ?? 0}}&nbsp;
                <input type="hidden" value="{{ $sum }}" name="sum">
                  <span>руб.</span>
              </span>
            </span>
          </h3>
        </div>
        <p></p>
      </form>
    <a href="/orders/create" class="btn btn-primary">Переход к Заказу</a>
    </div>
  </div>
  <div class="album py-5 bg-light">
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