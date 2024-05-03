    <form action="{{ $dataToEdit ? route('task.update', $dataToEdit->id) : route('task.store') }}" method="POST">
        @csrf
        @if ($dataToEdit)
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="projectInput">{{ __('GestionProjets/task/message.project') }}
                    <span class="text-danger">*</span>
                </label>
                <select name="project_id" class="form-control" id="projectInput">
                    @if (isset($task))
                        <option value="{{ $task->project->id }}">{{ $task->project->nom }}</option>
                    @else
                        <option value="">{{ __('GestionProjets/task/message.choix') }}</option>
                    @endif
                    @foreach ($projects as $item)
                        @if (!isset($task) || !$task->project || $item->id !== $task->project->id)
                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endif
                    @endforeach
                </select>
                @error('project_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="uderInput">{{ __('GestionProjets/task/message.member') }} <span
                        class="text-danger">*</span></label>
                <select name="user_id" class="form-control" id="uderInput">
                    @if (!isset($task))
                        <option value="">{{ __('GestionProjets/task/message.choixUser') }}</option>
                    @endif
                    @foreach ($users as $item)
                        <option {{ isset($task) && $item->id === $task->user->id ? 'selected' : '' }}
                            value="{{ $item->id }}">
                            {{ $item->prenom . ' ' . $item->nom }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nameInput">{{ __('GestionProjets/task/message.name') }} <span
                        class="text-danger">*</span></label>
                <input name="nom" type="text" class="form-control" id="nameInput" placeholder="Entrer le nom"
                    value="{{ isset($task) ? $task->nom : old('nom') }}">
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="startDateInput">{{ __('GestionProjets/task/message.startDate') }}
                    <span class="text-danger">*</span>
                </label>
                <input name="date_debut" type="date" class="form-control" id="startDateInput"
                    placeholder="Mot de passe" value="{{ isset($task) ? $task->date_debut : old('date_debut') }}">
                @error('date_debut')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="endDateInput">{{ __('GestionProjets/task/message.endDate') }}
                    <span class="text-danger">*</span>
                </label>
                <input name="date_de_fin" type="date" class="form-control" id="endDateInput"
                    placeholder="Mot de passe" value="{{ isset($task) ? $task->date_de_fin : old('date_de_fin') }}">
                @error('date_de_fin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputDescription">{{ __('GestionProjets/task/message.description') }} </label>
                <textarea name="description" class="form-control" rows="7" id="editor" placeholder="Entrez la description">
                    {{ isset($task) ? $task->description : old('description') }}
                </textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <a href="{{ route('task.index') }}"
                class="btn btn-default">{{ __('GestionProjets/task/message.cancel') }}</a>
            <button type="submit" class="btn btn-info">
                @if ($dataToEdit)
                    {{ __('GestionProjets/task/message.edit') }}
                @else
                    {{ __('GestionProjets/task/message.add') }}
                @endif
            </button>
        </div>
    </form>
