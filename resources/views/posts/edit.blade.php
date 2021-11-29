<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                @if( old('post.title') != NULL )
                    <input type="text" name="post[title]" value="{{ old('post.title') }}"/>
                @else
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                @endif
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                @if( old('post.body') != NULL )
                    <textarea name="post[body]">{{ old('post.body') }}</textarea>
                @else
                    <textarea name="post[body]">{{ $post->body }}</textarea>
                @endif
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存">
        </form>
        </div>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>