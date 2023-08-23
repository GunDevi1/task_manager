@extends('layouts.main')
@section('content')

    <div class="container">
        <h2 class="mb-5">Обновить задачу</h2>
        <form action="{{ route('task.update', $task->id) }}" class="w-50" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название задачи</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Введите название.." value="{{ $task->title }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Описание задачи</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Введите описание..">{{ $task->content }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-primary">Обновить</button>
        </form>
    </div>

@endsection
