<form action="{{ $dataToEdit ? route('topics.update', $dataToEdit->id) : route('topics.store') }}" method="POST">
    @csrf
  
    @if ($dataToEdit)
        @method('PUT')
    @endif
    <div class="card-body">
        <div class="form-group">
            <label for="name">{{ __('Quran/topic/message.name') }} <span
                    class="text-danger">*</span></label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Entrez le titre"
                value="{{ $dataToEdit ? $dataToEdit->name : old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="inputDescription">{{ __('app.description') }}</label>
            <textarea name="description" id="editor" class="form-control" rows="7" placeholder="Entrez la description">
                {{ $dataToEdit ? $dataToEdit->description : old('description') }}
            </textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('topics.index') }}"
            class="btn btn-default">{{ __('app.cancel') }}</a>
        <button type="submit"
            class="btn btn-info">{{ $dataToEdit ? __('app.edit') : __('app.add') }}</button>
    </div>
</form>
