<ul>
@foreach ($articles as $article)
    <li>
        <a href=""> {{ $article->title }} </a>
        ({{ $article->updated_at }})
    </li>
@endforeach
</ul>
{{ $articles->links() }}