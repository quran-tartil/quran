@extends('layouts.app')
@section('content')
    <div class="content-header">
        @if ($errors->has('Surah_exists'))
            <div class="alert alert-danger">
                {{ $errors->first('Surah_exists') }}
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
                                <i class="nav-icon fas fa-table"></i>
                                {{ __('app.add') }} {{ __('Quran/surah/message.surah') }}
                            </h3>
                        </div>
                        <!-- Obtenir le formulaire -->
                        @include('Quran.surah.fields')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
