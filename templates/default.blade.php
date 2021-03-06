@extends('layouts.default')

@section('content')
    <main>
        <header class="intro">
            <h1>{{ $page->title() }}</h1>
        </header>
        <div class="text">
            {!! $page->text()->kt() !!}
        </div>
    </main>
@endsection
