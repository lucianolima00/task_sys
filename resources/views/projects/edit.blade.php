@extends('layouts.interface')

@section('title', 'Projects')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                    {{ __('Update project') }}
                </h2>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('projects.update', ['project' => $project]) }}">
        @csrf
        @method('PUT')
        <div class="row">
            @include('projects._form')
        </div>
    </form>
@stop
