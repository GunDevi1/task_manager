@extends('layouts.main')
@section('title', 'Контакты')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Наши контакты</h3>
                <p>Адрес: Болгария, София</p>
                <p>Телефон: +359 886685155</p>
                <p>Email: navi15.info@gmail.com</p>
            </div>
            <div class="col-md-6">
                <h3>Свяжитесь с нами</h3>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Ваше имя</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email адрес</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Сообщение</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
