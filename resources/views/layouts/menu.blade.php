<!-- need to remove -->
@php
    $current_route = $_SERVER['REQUEST_URI'];
@endphp

<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            تريتل القرآن
        </p>
    </a>
</li>

@can('index-SurahController')
    <li class="nav-item">
        <a href="{{ route('surahs.index') }}"
            class="nav-link {{ Request::is('projets*') && !Request::is('*tâches*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                {{ __('Quran/surah/message.surahs') }}
                
            </p>
        </a>
    </li>
@endcan


@can('index-AyahController')
    <li class="nav-item">
        <a href="{{ route('ayahs.index') }}"
            class="nav-link {{ Request::is('ayahs*') && !Request::is('*tâches*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                {{ __('Quran/ayah/message.ayahs') }}
                
            </p>
        </a>
    </li>
@endcan


@can('index-noteAyatController')
    <li class="nav-item">
        <a href="{{ route('noteAyats.index') }}"
            class="nav-link {{ Request::is('noteAyats*') && !Request::is('*tâches*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                {{ __('Quran/noteAyat/message.noteAyats') }}
                
            </p>
        </a>
    </li>
@endcan


@can('index-TopicCategoryController')
    <li class="nav-item">
        <a href="{{ route('topicCategories.index') }}"
            class="nav-link {{ Request::is('topicCategories*') && !Request::is('*tâches*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                {{ __('Quran/topicCategory/message.topicCategories') }}
                
            </p>
        </a>
    </li>
@endcan

@can('index-TopicController')
    <li class="nav-item">
        <a href="{{ route('topics.index') }}"
            class="nav-link {{ Request::is('topics*') && !Request::is('*tâches*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
                {{ __('Quran/topic/message.topics') }}
                
            </p>
        </a>
    </li>
@endcan