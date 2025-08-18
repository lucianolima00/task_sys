@extends('layouts.interface')

@section('title', 'Tasks')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                    {{ __('Update task') }}
                </h2>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            @include('tasks._form')
        </div>
    </form>
@stop
