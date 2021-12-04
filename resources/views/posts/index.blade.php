<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <p class='create'>[<a href='/posts/create'>投稿作成</a>]</p>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                </div>
                <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
                <form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
                    @csrf
                    @method('delete')
                    <input type="submit" style="display:none">
                    <p class='delete'>[<span onclick="return deletePost(this);">削除</span>]</p>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(e) {
                'use strict';
                if (confirm('削除すると復元できません。\n本当に削除しますか。')) {
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>