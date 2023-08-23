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
            @foreach($done_tasks as $done_task)
                <tr>
                    <th>{{ $done_task->id }}</th>
                    <td>{{ $done_task->title }}</td>
                    <td>{{ $done_task->content }}</td>
                    <td class="text-center">
                        <form action="{{ route('done.attribute', $done_task->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="bg-transparent border-0">
                                <i class="fa-solid fa-x text-danger fs-3"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('done.destroy', $done_task->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-transparent border-0">
                                <i class="fa-solid fa-trash text-danger fs-4" role="button"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
