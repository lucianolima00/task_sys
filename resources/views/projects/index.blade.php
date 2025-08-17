@extends('layouts.interface')

@section('title', 'Projects')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 margin-tb d-flex align-items-center justify-content-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                    {{ __('List') }}
                </h2>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('projects.create') }}" title="Add project"> <i
                        class="fas fa-plus-circle"></i>
                    {{ __('Add') }}
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
@stop
