@extends('layouts.default')

@section('content')
    <main class="album">
        <article>
            <header>
                @if($cover = $page->cover())
                    <figure class="album-cover">
                        {!! $cover->crop(1024, 768) !!}
                        <figcaption>
                            <h1>{{ $page->headline()->or($page->title()) }}</h1>
                        </figcaption>
                    </figure>
                @endif
            </header>
            <div class="album-text text">
                {!! $page->description()->kt() !!}

                @if ($page->tags()->isNotEmpty())
                    <p class="album-tags tags">{{ $page->tags() }}</p>
                @endif
            </div>
            <ul class="album-gallery" {{ attr(['data-even' => $gallery->isEven(), 'data-count' => $gallery->count()
            ], ' ') }}>
                @foreach ($gallery as $image)
                <li>
                    @include("partials.image")
                </li>
                @endforeach
            </ul>
        </article>
    </main>
@endsection
