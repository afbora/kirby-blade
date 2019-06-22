<article class="note">
    <header class="note-header">
        <a href="{{ $note->url() }}">
            <h2>{{ $note->title() }}</h2>
            <time>{{ $note->date()->toDate('d F Y') }}</time>
        </a>
    </header>
</article>