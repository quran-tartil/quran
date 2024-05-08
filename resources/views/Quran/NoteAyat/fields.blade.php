<form 
    id="noteAyat_form"
    action="{{ $noteAyat ? route('noteAyats.update', $noteAyat->id) : route('noteAyats.store') }}" 
    method="POST">
@csrf
@if ($noteAyat)
@method('PUT')
@endif
<div class="card-body">

<!-- TODO : Question : Simplification de code - Select many to one -->
<div class="form-group">
    <label for="topicInput">{{ __('Quran/topic/message.topic') }}
        <span class="text-danger">*</span>
    </label>
    <select name="topic_id" class="form-control" id="topic_id">
        @foreach ($topics as $item)
            <option value="{{ $item->id }}" 
                selected="{{ $noteAyat && $noteAyat->topic_id == $item->id }}">
                {{ $item}}
            </option>
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
    <select name="ayah_id" class="form-control" id="ayah_id">
        @foreach ($ayahs as $item)
            <option value="{{ $item->id }}" 
                selected="{{ $noteAyat && $noteAyat->ayah_id == $item->id }}">
                {{ $item }}
            </option>
        @endforeach
    </select>
    @error('ayah_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="inputnote">{{ __('app.note') }}</label>
    <textarea name="note" id="editor" class="form-control" rows="7" placeholder="Entrez la note">
        {{ $noteAyat ? $noteAyat->note : old('note') }}
    </textarea>
    @error('note')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
</div>
</form>
