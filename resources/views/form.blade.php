@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создание новой статьи</div>

                    <div class="panel-body">


                        <form action="" method="post">

                            <div class="form-group">
                                {{ csrf_field() }}
                                <label for="title">Заголовок</label>
                                <input type="text" class="form__input form-control" placeholder="Введите заголовок статьи" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="text">Текст статьи</label>
                                <textarea class="form__input form-control" placeholder="Введите текст статьи" name="text" rows="10" style="resize: none;" required>
            </textarea>
                            </div>
                            <input type="submit" class="btn btn-success" value="Добавить">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




