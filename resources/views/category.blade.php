@extends('layouts.app')

@section('content')
    <form action="" method="post">
        <div class="input-group">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default">Категории</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                        <li><a href="{{route('homeCategory', ['category_id' => $category->id])}}">{{$category->name}}</a></li>
                    @endforeach
                    <li><a href="{{route('home')}}">Все категории</a></li>
                </ul>
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </div>
            {{ csrf_field() }}
            <input type="text"  name="search" class="form-control" placeholder="Поиск статьи по названию"  aria-label="...">

        </div>
    </form>
    <hr>


    @foreach($articles as $article)
        <div class="panel panel-default">
            <div class="panel-body">


                <a href="{{route('user__profile', ['id' => $article->author])}}"><span class="glyphicon glyphicon-user"> {{$article ->author['name']}}</span></a>
                <span class="glyphicon glyphicon-time" style="color:#dd873c;"></span><span class="article__date">{{$article['created_at']}}</span>



                <a href="{{ route('article', ['id' => $article['id']]) }}"><p class="article__title"><b>{{$article['title']}}</b></p></a>
                <br>
                <a href="{{route('homeCategory', ['category_id' => $article['category_id']])}}">
                    <span class="label label-success">{{$article->category['name']}}</span>
                </a>

            </div>
            <div class="panel-footer">

                <span class="glyphicon glyphicon-eye-open" style="color: #61788f;">{{$article ->views}}</span>
                <span class="glyphicon glyphicon-heart" style="color: #61788f;">{{$article ->rating}}</span>
                <span class="glyphicon glyphicon-comment" style="color: #61788f;">{{$article ->comment->count()}}</span>
            </div>
        </div>
    @endforeach


@endsection