@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Quran/ayah/message.detail') }}</h1>
                </div>
                @can('edit-ProjetController')
                    <div class="col-sm-6">
                        <a href="{{ route('projets.edit', $fetchedData->id) }}" class="btn btn-default float-right">
                            <i class="far fa-edit"></i>
                            {{ __('Quran/ayah/message.edit') }}
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <label for="nom">{{ __('GestionProjets/ayah/message.name') }}:</label>
                                <p>{{ $fetchedData->nom }}</p>
                            </div>

                            <!-- Description Field -->
                            <div class="col-sm-12">
                                <label for="description">{{ __('GestionProjets/ayah/message.description') }}:</label>
                                @if ($fetchedData->description)
                                    <p>
                                        {!! $fetchedData->description !!}
                                    </p>
                                @else
                                    <p class="text-secondary">Aucune information disponible</p>
                                @endif
                            </div>
                            <!-- Description Field -->
                            <div class="col-sm-12">
                                <label for="description">{{ __('GestionProjets/ayah/message.date') }}:</label>
                                <p>{{ __('GestionProjets/ayah/message.startDate') }}: {{ $fetchedData->date_debut }}</p>
                                <p>{{ __('GestionProjets/ayah/message.endDate') }}: {{ $fetchedData->date_de_fin }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
