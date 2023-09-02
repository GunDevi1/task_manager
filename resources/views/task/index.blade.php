@extends('layouts.main')
@section('title', 'Задачи')

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
                    <th scope="col" style="width: 50px;">Задачи</th>
                    <th scope="col"></th>
                    <th scope="col" colspan="2" class="text-center"></th>
                </tr>
                </thead>
                <tbody style="height: auto; vertical-align: top">
                @foreach($tasks as $task)
                    <tr>
                        @auth()
                            @if (auth()->user()->role)
                                <th>{{ $task->id }}</th>
                            @endif
                        @endauth
                        <td class="text-center" style="vertical-align: top;">
                            <form action="{{ route('task.attribute', $task->id) }}" method="post" class="m-0">
                                @csrf
                                @method('patch')
                                <button type="submit" class="bg-transparent border-0">
                                    <i class="fa-solid fa-check text-success fs-3" role="button"></i>
                                </button>
                            </form>
                        </td>
                        <td style="max-width: 200px; wrap-option: wrap;"> <div class="mb-2 fs-5">{{ $task->title }}</div> <div>{{ $task->content }}</div> </td>
                        <td class="text-center">
                            <form action="{{ route('task.destroy', $task->id) }}" method="post" class="m-0">
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
    </div>

@endsection
