@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         # {{$article['id']}} {{$article['title']}}
                    </div>

                    <div class="panel-body">

                        <p>{{$article['text']}}</p>



                        <div class="well"><p>Дата публикации: {{$article['created_at']}}</p>
                            @if($article['created_at'] != $article['updated_at'])


                                <i>Обновлена: {{$article['updated_at']}}</i>

                            @endif
                            <i>Автор статьи: {{$author->name}}</i>
                            <br> @if(Auth::user()->id == $article['user_id'])

                                <br>

                                <i>Вы автор данной статьи</i>

                                <hr>

                                <p><b>Другие ваши статьи</b></p>


                                @foreach($articles as $item)

                                <a href="{{route('article',['id' => $item->id])}}"><p><b>{{$item['id']}}. {{$item['title']}}</b></p></a>

                                @endforeach

                            @endif
<p>Текущий голос:   {{$vote['vote']}}</p>
                            <span><b>Рейтинг статьи: {{$article['rating']}} </b></span>

                            @if(Auth::user()->id != $article['user_id'])

                                @if($vote['vote'] === NULL)
                                    <a href="{{route('upRating',['id' => $article->id])}}" class="btn btn-success">+</a>
                                    <a href="{{route('downRating',['id' => $article->id])}}" class="btn btn-danger">-</a>

                                @endif

                                @if($vote['vote'] === 1)
                                        <a class="btn btn-success" disabled title="Вы уже проголосовали за">+</a>
                                    <a href="{{route('downRating',['id' => $article->id])}}" class="btn btn-danger">-</a>

                                    @endif

                                    @if($vote['vote'] === 0)
                                        <a href="{{route('upRating',['id' => $article->id])}}" class="btn btn-success">+</a>
                                        <a class="btn btn-danger" disabled title="Вы уже проголосовали против">-</a>

                                    @endif
                                    @else
                              <p> Вы не можете голосовать за свои статьи</p>
                                @endif




                            @if(Auth::user()->id == $article['user_id'])

                                <p>Панель управления:</p>
                                <a href="{{route('editArticle',['id' => $article->id])}}" class="btn btn-primary">Редактировать</a>
                                <button class="btn btn-danger" id="article__delete" data-toggle="modal" data-target="#myModal">Удалить</button>

                            @endif</div>

                        <p>Оставить комментарий:</p>
                        <form action="{{route('addComment',['id' => $article->id])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="article_id" value="{{$article->id}}" >
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
                            <textarea class="form-control" name="comment" cols="90" rows="4" style="resize: none;"></textarea><br>
                            <input type="submit" class="btn btn-default" value="Отправить">

                        </form>

                        <p ><b>Комментарии ({{$comments->count()}})</b></p>


                        <hr>

                        @foreach($comments as $comment)
                            <i>{{$comment->created_at}}</i><br>
                            <span class="label label-info"><b>{{$comment->user_id}}:</b></span><span>"{{$comment->comment}}"</span>
                            <hr>
                        @endforeach
                        <?php echo $comments->render(); ?>

                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="padding: 20px;">
                                   <p>Вы точно хотите удалить статью <b>{{$article['title']}}</b>?
                                    <hr>

                                    <a href="{{route('deleteArticle',['id' => $article->id])}}" class="btn btn-default">Да</a>
                                    <button class="btn btn-warning" data-dismiss="modal">Отмена</button>
                                </div>
                            </div>
                        </div>
                        <script>
                            $('#myModal').on('shown.bs.modal', function () {
                                $('#myInput').focus()
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection