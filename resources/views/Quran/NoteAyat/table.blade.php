<div class="card-body table-responsive p-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Quran/Topic/message.topic') }}</th>
                <th>{{ __('Quran/Ayah/message.ayah') }}</th>
                <th>{{ __('Quran/noteAyat/message.noteAyats') }}</th>
                <th class="text-center">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entities as $entity)
                <tr>
                    <td>{{ $entity->topic->name }}</td>
                    <td>{{ $entity->ayah->quran_uthmani }}</td>
                    <td>{!! $entity->note !!}</td>
                    <td class="text-center">
                        @can('show-NoteAyatController')
                            <a href="{{ route('noteAyats.show', $entity) }}" class="btn btn-default btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        @endcan
                        @can('edit-NoteAyatController')
                            <a href="{{ route('noteAyats.edit', $entity) }}" class="btn btn-sm btn-default">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan
                        @can('destroy-NoteAyatController')
                            <form action="{{ route('noteAyats.destroy', $entity) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce noteAyat ?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center p-2">
    <div class="d-flex align-items-center mb-2 ml-2 mt-2">
        @can('export-NoteAyatController')
            <form action="{{ route('noteAyats.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
                id="importForm">
                @csrf
                <label for="upload" class="btn btn-default btn-sm font-weight-normal">
                    <i class="fa-solid fa-file-arrow-down"></i>
                    {{ __('app.import') }}
                </label>
                <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
            </form>
        @endcan
        @can('import-NoteAyatController')
            <form>
                <a href="{{ route('noteAyats.export') }}" class="btn btn-default btn-sm mt-0 mx-2">
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
