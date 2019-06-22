@extends('layouts.default')

@section('content')
    <main>
        <header class="intro">
            <h1>{{ $page->title() }}</h1>
        </header>
        <div class="notes">
            @foreach ($page->children()->listed()->sortBy('date', 'desc') as $note)
                @include("partials.note")
            @endforeach
        </div>
    </main>
@endsection
