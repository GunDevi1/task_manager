@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row content d-flex align-items-center">
            <div class="col-md-6 text-center">
                <h1>Добро пожаловать на сайт Tusk</h1>
                <p>
                    Здесь вы сможете эффективно управлять своими задачами и планировать свои дела. <br>
                    Tusk обеспечивает безупречную организацию ваших задач. <br>
                    Создавайте список дел,
                    присваивайте им приоритеты, устанавливайте сроки выполнения и отслеживайте прогресс.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/checklist.png') }}" alt="man_holding_pencil" class="img-fluid">
            </div>
        </div>
    </div>
@endsection
