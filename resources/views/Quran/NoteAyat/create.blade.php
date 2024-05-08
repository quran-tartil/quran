@extends('layouts.app')
@section('content')
    <div class="content-header">
        @if ($errors->has('NoteAyat_exists'))
            <div class="alert alert-danger">
                {{ $errors->first('NoteAyat_exists') }}
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
                                {{ __('app.add') }} {{ __('Quran/noteAyat/message.noteAyat') }}
                            </h3>
                        </div>
                        @include('Quran.noteAyat.fields')
                        <div class="card-footer">
                            <a href="{{ route('noteAyats.index') }}"
                            class="btn btn-default">{{ __('app.cancel') }}</a>
                            <button type="submit"
                            class="btn btn-info">{{ $noteAyat ? __('app.edit') : __('app.add') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
