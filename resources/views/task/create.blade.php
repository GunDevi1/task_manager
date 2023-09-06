@extends('layouts.main')
@section('title', 'Добавить задачу')

@section('content')

    <div class="container">
        <h2 class="mb-5">Новая задача</h2>
        <form action="{{ route('task.store') }}" class="w-50" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название задачи</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Введите название..">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Описание задачи</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Введите описание.."></textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="priority" class="form-label">Задать приоритет</label>
                <select class="form-select" id="priority" name="priority">
                    @foreach($priorities as $value => $priority)
                        <option value="{{ $value }}">{{ $priority }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
            </div>

            <button type="submit" class="btn btn-outline-primary">Добавить</button>
        </form>
    </div>

@endsection
