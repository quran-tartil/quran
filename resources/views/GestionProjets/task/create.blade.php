@extends('layouts.app')
@section('content')

    <div class="content-header">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}.
            </div>
        @endif
        @if ($errors->has('task_exists'))
            <div class="alert alert-danger">
                {{ $errors->first('task_exists') }}
            </div>
        @else
            @if ($errors->has('unexpected_error'))
                <div class="alert alert-danger">
                    {{ $errors->first('unexpected_error') }}
                </div>
            @endif
        @endif
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-tasks"></i>
                                {{ __('GestionProjets/task/message.addTask') }}
                            </h3>
                        </div>
                        @include('GestionProjets.task.fields')


                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
