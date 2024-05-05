<form action="{{ $dataToEdit ? route('noteAyats.update', $dataToEdit->id) : route('noteAyats.store') }}" method="POST">
    @csrf
  
    @if ($dataToEdit)
        @method('PUT')
    @endif
    <div class="card-body">

           <div class="form-group">
                <label for="topicInput">{{ __('Quran/noteAyat/message.topic') }}
                    <span class="text-danger">*</span>
                </label>
             
                <select name="topic_id" class="form-control" id="topicInput">
                    @if (isset($dataToEdit))
                        <option value="{{ $noteAyat->topic->id }}">{{ $noteAyat->topic->nom }}</option>
                    @else
                        <option value="">{{ __('Quran/noteAyat/message.choix') }}</option>
                    @endif
                    @foreach ($topics as $item)
                        @if (!isset($noteAyat) || !$noteAyat->topic || $item->id !== $noteAyat->topic->id)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('topic_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ayahInput">{{ __('Quran/ayah/message.ayah') }}
                    <span class="text-danger">*</span>
                </label>
                <select name="ayah_id" class="form-control" id="ayahInput">
                    @if (isset($ayah))
                        <option value="{{ $ayah->ayah->id }}">{{ $ayah->ayah->quran_simple }}</option>
                    @else
                        <option value="">{{ __('Quran/ayah/message.choix') }}</option>
                    @endif
                    @foreach ($ayahs as $item)
                        @if (!isset($ayah) || !$ayah->ayah || $item->id !== $ayah->ayah->id)
                            <option value="{{ $item->id }}">{{ $item->quran_simple }}</option>
                        @endif
                    @endforeach
                </select>
                @error('ayah_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


       
    
        <div class="form-group">
            <label for="inputnote">{{ __('app.note') }}</label>
            <textarea name="note" id="editor" class="form-control" rows="7" placeholder="Entrez la note">
                {{ $dataToEdit ? $dataToEdit->note : old('note') }}
            </textarea>
            @error('note')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('noteAyats.index') }}"
            class="btn btn-default">{{ __('app.cancel') }}</a>
        <button type="submit"
            class="btn btn-info">{{ $dataToEdit ? __('app.edit') : __('app.add') }}</button>
    </div>
</form>
