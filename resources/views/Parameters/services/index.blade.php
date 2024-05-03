@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('models/services.management')
                      {{strtolower(__('models/services.plural'))}}</h1>
                </div>
                <div class="col-sm-6">
                    @can('create-Service')
                    <a class="btn btn-primary float-right"
                       href="{{ route('services.create') }}">
                         @lang('crud.add_new')  {{strtolower(__('models/services.singular'))}}
                    </a>
                    @endcan
                </div>
            </div>
        </div>
    </section>



    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="card-header">
            <div class="col-sm-12 d-flex justify-content-between p-0">
                <div>
                </div>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input type="search" class="form-control form-control-lg" placeholder="@lang('crud.search')">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" id="table-container">
            @include('Parameters.services.table')
        </div>

        {{-- <div class="card" id="table-container">
            @include('fonctions.table')
        </div> --}}
    </div>

@endsection
@push('page_scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>


        const tableContainer = $('#table-container')
        var searchQuery = ''

        const search = (query = '', page = 1) => {
            $.ajax('{{ route('services.index') }}', {
                data: {
                    query: query,
                    page: page
                },
                success: (data) => updateTable(data)
            })
            history.pushState(null, null, '?query=' + query + '&page=' + page)
        }

        const updateTable = (html) => {
            tableContainer.html(html)
            updatePaginationLinks()
        }

        const updatePaginationLinks = () => {
            $('button[page-number]').each(function() {
                $(this).on('click', function() {
                    pageNumber = $(this).attr('page-number')
                    search(searchQuery, pageNumber)
                })
            })
        }

        $(document).ready(() => {
            $('[type="search"]').on('input', function() {
                searchQuery = $(this).val()
                search(searchQuery)
            })
            updatePaginationLinks()
        })
    </script>
@endpush