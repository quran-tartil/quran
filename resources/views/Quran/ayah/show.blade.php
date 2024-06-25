
@extends('layouts.app')

@section('content_body')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Quran/ayah/message.ayah') }}</h1>
                </div>
                @can('edit-AyahController')
                    <div class="col-sm-6">
                        <a href="{{ route('ayahs.edit', $fetchedData->id) }}" class="btn btn-default float-right">
                            <i class="far fa-edit"></i>
                            {{ __('edit') }}
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
                                <label for="nom">{{ __('Quran/ayah/message.quran_uthmani_min') }}:</label>
                                <p>{{ $fetchedData->quran_uthmani_min }}</p>
                            </div>

                            <!-- Description Field -->
                            <div class="col-sm-12">
                                <label for="description">{{ __('Quran/ayah/message.ar_muyassar') }}:</label>
                                @if ($fetchedData->ar_muyassar)
                                    <p>
                                        {!! $fetchedData->ar_muyassar !!}
                                    </p>
                                @else
                                    <p class="text-secondary">Aucune information disponible</p>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>كلمة</td>
                                        <td>جذر الكلمة</td>
                                    </tr>
                                    @foreach ($word_details as $word_detail)
                                    <tr>
                                        <td>{{$word_detail->word_label}}</td>
                                        <td> <a href="{{route("ayahs.index","searchValue=")}}{{$word_detail->root_label}}">{{$word_detail->root_label}}</a>   </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
