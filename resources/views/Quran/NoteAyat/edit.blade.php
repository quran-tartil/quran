@extends('layouts.app')
@section('content')
    <div class="content-header">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-table"></i>
                                {{ __('Quran/noteAyat/message.edit_noteAyat') }}
                            </h3>
                        </div>
                        <!-- Obtenir le formulaire -->
                        @include('Quran.noteAyat.fields')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
