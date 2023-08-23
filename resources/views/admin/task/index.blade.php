@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Задачи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v3</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <!-- /.container-fluid -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Статус</th>
                                    <th>Создатель</th>
                                    <th scope="col" colspan="3" class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->content }}</td>
                                        @if($task->is_done)
                                            <td>Выполнено</td>
                                        @else
                                            <td>Не выполнено</td>
                                        @endif
                                        @if($task->user)
                                        <td>{{ $task->user->name }}</td>
                                        @else
                                        <td>Пользователь не найден</td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ route('admin.task.show', $task->id) }}"><i class="fas fa-eye text-success fs-3" role="button"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.task.destroy', $task->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-transparent border-0">
                                                    <i class="fas fa-trash text-danger fs-4" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-center"><a href="{{ route('admin.task.edit', $task->id) }}"><i class="fas fa-pen text-info fs-4"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <a href="{{ route('admin.task.create') }}" class="btn btn-primary">Добавить задачу</a>
        </div>
        <!-- /.content -->
    </div>
@endsection
