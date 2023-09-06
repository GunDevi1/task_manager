@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">Добавить новую задачу</h1>
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
                    <form class="w-50" method="post" action="{{ route('admin.task.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Введите название.." name="title">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Описание</label>
                                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="Введите описание.."></textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="priority" class="form-label">Задать приоритет</label>
                                <select class="form-control" id="priority" name="priority">
                                    @foreach($priorities as $value => $priority)
                                        <option value="{{ $value }}">{{ $priority }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="role">Пользователь для добавление задачи</label>
                                <select class="form-control" id="role" name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
