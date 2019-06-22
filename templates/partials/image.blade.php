<figure>
    <a href="{{ $image->link()->or($image->url()) }}">
        {!! $image->crop(800, 1000) !!}
    </a>
</figure>