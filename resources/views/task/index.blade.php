@extends('layouts.main')
@section('title', 'Задачи')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 col-lg-6 col-sm-12">
                <create :user-id="{{ auth()->user()->id }}"></create>
                <task :tasks="{{ $tasks }}"></task>
            </div>
        </div>
    </div>

@endsection
