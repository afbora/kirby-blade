<a href="{{ $album->url() }}">
    <figure>
        @if($cover = $album->cover())
            {!! $cover->crop(800, 1000) !!}
        @endif
        <figcaption>{{ $album->title() }}</figcaption>
    </figure>
</a>