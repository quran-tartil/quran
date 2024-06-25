@extends('adminlte::page')


@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

@section('content')
<div style="direction: rtl;">
    @yield('content_body')
</div>
@stop


@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.1') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong>
@stop


@push('js')
<script>
    $(document).ready(function() {



    });
</script>

@endpush


@push('css')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endpush

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Loading</h4>
@stop