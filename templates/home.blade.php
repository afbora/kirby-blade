@extends('layouts.default')

@section('content')
<main>
    <header class="intro">
        <h1>{{ $site->title() }}</h1>
    </header>

    <ul class="grid">
    @foreach (page('photography')->children()->listed() as $album)
        <li>
            @include("partials.album")
        </li>
        @endforeach
    </ul>
</main>
@endsection
