@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{ __('GestionProjets/task/message.detail') }} {{ $task->nom }}
                    </h1>
                </div>

                @can('edit-TaskController')
                    <div class="col-sm-6">
                        <a href="{{ route('task.edit', $task->id) }}" class="btn btn-default float-right">
                            <i class="far fa-edit"></i>
                            {{ __('GestionProjets/task/message.edit') }}
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('GestionProjets.task.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
