<a href="{{ $album->url() }}">
    <figure>
        @if($cover = $album->cover())
            {!! $cover->resize(1024, 1024) !!}
        @endif
        <figcaption>
                        <span>
                            <span class="example-name">{{ $album->title() }}</span>
                        </span>
        </figcaption>
    </figure>
</a>