@extends('layout.master')

@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <img src="/img/{{ $cake->picture }}" class="card-img" style="center;" alt="...">
            </div>
            <div class="col-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $cake->name }}</h5>
                    <p class="card-text">{{ $cake->description }}</p>
                    <p class="card-text">{{ $cake->weight }} кг</p>
                    <p class="card-text">Начинка: {{ $cake->filling }}</p>
                    <p>
                        <span>
                            <span>{{ $cake->price }}&nbsp;
                                <span>
                                    руб.
                                </span>
                            </span>
                        </span>
                    </p>
                    <p>
                        <a href="/" class="btn btn-primary">Вернуться к Ассортименту</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection