@extends('layouts.interface')

@section('title', 'Projects')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                    {{ __('Create project') }}
                </h2>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div class="row">
                @include('projects._form')
            </div>
        </form>
    </div>
@stop
