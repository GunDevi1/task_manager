@extends('layouts.main')
@section('content')

    <div class="container mt-5">
        <a href="{{ route('task.create') }}" class="btn btn-outline-success mb-3">Добавить задачу</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название задачи</th>
                <th scope="col">Описание задачи</th>
                <th scope="col" colspan="3" class="text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th>{{ $task->id }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->content }}</td>
                    <td class="text-center">
                        <form action="{{ route('task.attribute', $task->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="bg-transparent border-0">
                                <i class="fa-solid fa-check text-success fs-3" role="button"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('task.destroy', $task->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-transparent border-0">
                                <i class="fa-solid fa-trash text-danger fs-4" role="button"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-center"><a href="{{ route('task.edit', $task->id) }}"><i class="fa-solid fa-pencil text-info fs-4"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
