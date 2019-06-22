@extends('layouts.default')

@section('content')
    <main>
        <header class="intro">
            <h1>{{ $page->title() }}</h1>
        </header>

        <ul class="albums" {{ attr(['data-even' => $page->children()->listed()->isEven()], ' ') }}>
            @foreach($page->children()->listed() as $album)
            <li>
                @include("partials.photography")
            </li>
            @endforeach
        </ul>
    </main>
@endsection
