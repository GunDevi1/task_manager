@extends('layouts.main')
@section('title', 'Задачи')

@section('content')

    <div class="container mt-5">
        <a href="{{ route('task.create') }}" class="btn btn-outline-primary mb-3">Добавить задачу</a>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <table class="table">
                <thead>
                <tr>
                    @auth()
                        @if (auth()->user()->role)
                            <th scope="col">ID</th>
                        @endif
                    @endauth
                    <th scope="col" style="width: 50px;">Задачи</th>
                    <th scope="col"></th>
                    <th scope="col" class="text-center"></th>
                </tr>
                </thead>
                <tbody style="height: auto; vertical-align: top">
                @foreach($tasks as $task)
                    <tr class="element-to-hover bg-priority-{{$task->priority}}">
                        @auth()
                            @if (auth()->user()->role)
                                <th>{{ $task->id }}</th>
                            @endif
                        @endauth
                        <td class="text-center" style="vertical-align: top;">
                            <form action="{{ route('task.attribute', $task->id) }}" method="post" class="m-0">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn-done">
                                    <i class="fa-solid fa-check" role="button"></i>
                                </button>
                            </form>
                        </td>
                        <td style="max-width: 200px; wrap-option: wrap;">
                            <div class="mb-2 fs-5">{{ $task->title }}</div>
                            <div>{{ $task->content }}</div>
                        </td>
                        <td>
                            <div class="options-group text-end">
                                <button type="button" id="group-button" class="bg-transparent border-0"><i
                                        class="fa-solid fa-ellipsis-vertical fs-4"></i></button>
                                <div class="options" id="block-options">
                                    <a href="{{ route('task.edit', $task->id) }}"
                                       class="text-decoration-none text-black"><i
                                            class="fa-solid fa-pencil text-info fs-4"></i> <span>Изменить</span></a>
                                    <form action="{{ route('task.destroy', $task->id) }}" method="post"
                                          class="m-0 mt-3">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-transparent border-0">
                                            <i class="fa-solid fa-trash text-danger fs-4" role="button"></i>
                                            <span>Удалить</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
