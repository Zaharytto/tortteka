@extends('layout.master')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        @include('layout.errors')
        <form method="post" action="/orders">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ваше Имя</label>
                <input type="text" class="form-control" id="name" placeholder="Татьяна" name="name" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Номер телефона</label>
                <input type="tel" class="form-control" id="phone" placeholder="+375 (44) 123-45-67" name="phone" required>
                <small class="form-text text-muted">Оставьте свой номер телефона и наш менеджер с Вами свяжется</small>
            </div>
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
                                        <span>
                                            руб.
                                        </span>
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
                            <span>
                                руб.
                            </span>
                        </span>
                    </span>
                </h3>
            </div>
            <p></p>
            <button type="submit" class="btn btn-primary">Заказать</button>
        </form>
    </div>
</div>

@endsection
