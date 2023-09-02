@extends('layouts.main')
@section('title', 'Tusk')

@section('content')

        <div class="container">
            <div class="row content d-flex align-items-center mb-5">
                <div class="col-md-6 text-center mb-5">
                    <h1>Добро пожаловать на сайт Tusk</h1>
                    <p>
                        Здесь вы сможете эффективно управлять своими задачами и планировать свои дела. <br>
                        Tusk обеспечивает безупречную организацию ваших задач. <br>
                        Создавайте список дел,
                        присваивайте им приоритеты, устанавливайте сроки выполнения и отслеживайте прогресс.
                    </p>
                </div>
                <div class="col-md-6 mb-5">
                    <img src="{{ asset('images/checklist.png') }}" alt="man_holding_pencil" class="img-fluid">
                </div>
            </div>
        </div>

        <section id="benefits" class="py-5" style="background-image: url(' {{ asset('images/banner.jpg') }} '); background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <h2 class="text-center mb-5 text-white">Преимущества</h2>
                <div class="row mb-3">
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 h-100 text-center">
                            <div class="card-body">
                                <h3 class="card-title">Эффективное управление задачами</h3>
                                <p class="card-text">Tusk позволяет эффективно управлять вашими задачами, помогая вам упорядочить их и повысить производительность.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 h-100 text-center">
                            <div class="card-body">
                                <h3 class="card-title">Многозадачность</h3>
                                <p class="card-text">С Tusk вы сможете легко управлять несколькими задачами и проектами одновременно.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 h-100 text-center">
                            <div class="card-body">
                                <h3 class="card-title">Интеграция и совместная работа</h3>
                                <p class="card-text">Tusk предоставляет возможность интеграции с другими приложениями и совместной работы в команде.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-outline-light">Узнать больше</a>
                </div>
            </div>
        </section>

        <section id="testimonials" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">Отзывы довольных клиентов</h2>
                <div class="testimonials d-flex justify-content-between mt-5">
                    <div class="col-md-5">
                        <div class="">
                            <div class="testimonial">
                                <h4>Отзыв от Ивана</h4>
                                <p>"Tusk - это именно то, что мне было нужно для эффективного управления моими задачами. Теперь я могу легко создавать списки дел, устанавливать сроки выполнения и отслеживать свой прогресс. Спасибо за такой удобный инструмент!"</p>
                            </div>
                        </div>
                        <div class="">
                            <div class="testimonial">
                                <h4>Отзыв от Анны</h4>
                                <p>"Я долгое время искала приложение, которое поможет мне организовать мои проекты и задачи. Tusk оказался отличным решением! С его помощью я могу вести несколько задач одновременно и всегда оставаться на пути к достижению своих целей."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="testimonial-text text-center fs-5">
                            <p>Мы гордимся тем, что наши клиенты довольны нашими продуктами и услугами. Присоединяйтесь к нам сегодня!</p>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn send-button">Присоединиться -></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
