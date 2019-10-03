@extends('layouts.header')
@section('content')
    <a href="/api/messages/list" class="btn btn-primary btn-success">JSON</a>
    <form method="post" action="/message/create">
        {{csrf_field()}}
        <div class="form-group" id="user_form">
            <input type="hidden" value="<?php echo $_SERVER[ 'REMOTE_ADDR' ]?>" name="ip">
            <input type="hidden" value="<?php echo $_SERVER[ 'HTTP_USER_AGENT' ];?>" name="browser">
            <input type="text" name="userName" class="form-control" placeholder="Имя пользователя" required>
            <input type="email" name="email" class="form-control" placeholder="Почта" required>
            <input type="url" name="homepage" class="form-control" placeholder="Адрес страницы">
            <input name="captcha_code" id="captcha" class="form-control" type="text" placeholder="Введите код с картинки" required>
            <img src="captcha/captcha.php"/>
            <textarea class="form-control rounded-0" name="message" placeholder="Сообщение:"></textarea>
            <input type="submit" name="submit" class="form-control btn btn-primary btn-success"/>
        </div>
    </form>

    <div id="massages_list">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>@sortablelink('user_name','Имя пользователя')</th>
                <th> @sortablelink('email','Почта')</th>
                <th> @sortablelink('created_at','Дата добавления')</th>
                <th>Сообщение</th>
            </tr>
            </thead>

            <tbody>
            @foreach($messagesList as $item)
                <tr>
                    <td>{{$item->user_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->message}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div id="pagination">
        {{$messagesList->links()}}
    </div>

    @include('layouts.footer')
@endsection

