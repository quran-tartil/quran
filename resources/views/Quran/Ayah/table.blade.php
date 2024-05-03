<div class="card-body table-responsive p-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Quran/ayah/message.surah_number') }}</th>
                <th>{{ __('Quran/ayah/message.quran_uthmani_min') }}</th>
                <th class="text-center">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entities as $entity)
                <tr>
                    <td>{{ $entity->surah_number }}-{{ $entity->number_in_surah }}</td>
                 
                    <td>{{ $entity->quran_uthmani_min }}</td>

                    <td class="text-center">
                        @can('show-AyahController')
                            <a href="{{ route('ayahs.show', $entity) }}" class="btn btn-default btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center p-2">
    <div class="d-flex align-items-center mb-2 ml-2 mt-2">
        @can('export-AyahController')
            <form action="{{ route('ayahs.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
                id="importForm">
                @csrf
                <label for="upload" class="btn btn-default btn-sm font-weight-normal">
                    <i class="fa-solid fa-file-arrow-down"></i>
                    {{ __('app.import') }}
                </label>
                <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
            </form>
        @endcan
        @can('import-AyahController')
            <form>
                <a href="{{ route('ayahs.export') }}" class="btn btn-default btn-sm mt-0 mx-2">
                    <i class="fa-solid fa-file-export"></i>
                    {{ __('app.export') }}</a>
            </form>
        @endcan

    </div>
    <div class="">
        <ul class="pagination  m-0 float-right">
            {{ $entities->links() }}
        </ul>
    </div>
</div>
