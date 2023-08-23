@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
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
                                    <th>Имя</th>
                                    <th>Почта</th>
                                    <th>Привилегии</th>
                                    <th scope="col" colspan="3" class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @if($user->role)
                                            <td>Администратор</td>
                                        @else
                                            <td>Пользователь</td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ route('admin.user.show', $user->id) }}"><i class="fas fa-eye text-success fs-3" role="button"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-transparent border-0">
                                                    <i class="fas fa-trash text-danger fs-4" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-center"><a href="{{ route('admin.user.edit', $user->id) }}"><i class="fas fa-pen text-info fs-4"></i></a></td>
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

            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Добавить пользователя</a>
        </div>
        <!-- /.content -->
    </div>
@endsection
