@extends('layout.master')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <h1 class="fw-light">Торт на заказ</h1>
        <p class="lead text-muted">Вы ищете самый вкусный и оригинальный торт для юбилея, свадьбы или праздника?
            Тогда Вы попали по адресу! Мы предоставляем услугу по изготовлению тортов на заказ на любой вкус. Вы можете подобрать и создать набор из наших уникальных вкусов, каждый из которых будет специально приготовлен для Вас. Наши профессиональные пекари имеют большой опыт приготовления тортов, поэтому мы гарантируем качество и оригинальность.
            Наши торты могут быть оформлены в различные стили и дизайны, а также созданы по Вашим требованиям. Наша производственная команда имеет опыт в изготовлении тортов для любых праздничных случаев. Мы будем рады помочь Вам создать незабываемый праздник.
            Надеемся, что Вы полюбите наши услуги и обратитесь к нам при планировании Ваших будущих праздников.
        </p>
        <h3>Создание заказа</h3>

        @include('layout.errors')

        <form method="post" action="/orders_customs">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Ваше Имя</label>
                <input type="text" class="form-control" id="name" placeholder="Татьяна" name="name" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Номер телефона</label>
                <input type="tel" class="form-control" id="phone" placeholder="441234567" name="phone" required>
            </div>
            <div class="form-group">
                <label for="Textarea">Комментарий</label>
                <textarea type="text" class="form-control" id="Textarea" rows="3" placeholder="Вкратце опишите Вашу идею" name="comment"></textarea>
            </div>
            <p></p>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</div>

@endsection