@extends('layouts.main')
@section('title', 'Выполненные задачи')

@section('content')

    <div class="container mt-5">
        <a href="{{ route('task.create') }}" class="btn btn-outline-primary mb-3">Добавить задачу</a>

        <div class="col-6">
            <table class="table">
                <thead>
                <tr>
                    @auth()
                        @if (auth()->user()->role)
                            <th scope="col">ID</th>
                        @endif
                    @endauth
                    <th scope="col" style="width: 50px;">Выполнено</th>
                    <th scope="col"></th>
                    <th scope="col" class="text-center"></th>
                </tr>
                </thead>
                <tbody style="height: auto; vertical-align: top">
                @foreach($done_tasks as $done_task)
                    <tr class="element-to-hover">
                        @auth()
                            @if (auth()->user()->role)
                                <th>{{ $done_task->id }}</th>
                            @endif
                        @endauth
                        <td class="text-center" style="vertical-align: top;">
                            <form action="{{ route('done.attribute', $done_task->id) }}" method="post" class="m-0">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn-done-page">
                                    <i class="fa-solid fa-x"></i>
                                </button>
                            </form>
                        </td>
                        <td style="max-width: 200px; wrap-option: wrap;"> <div class="mb-2 fs-5">{{ $done_task->title }}</div> <div>{{ $done_task->content }}</div> </td>
                        <td>
                            <div class="options-group text-end">
                                <button type="button" id="group-button" class="bg-transparent border-0"><i
                                        class="fa-solid fa-ellipsis-vertical fs-4"></i></button>
                                <div class="options" id="block-options">
                                    <form action="{{ route('done.destroy', $done_task->id) }}" method="post" class="m-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-transparent border-0">
                                            <i class="fa-solid fa-trash text-danger fs-4" role="button"></i>
                                            <span>Удалить</span>
                                        </button>
                                    </form>
                                </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
