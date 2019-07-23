@extends('layout')

@section('content')
  <h3 class="text-center">お問い合わせ・ご意見ご感想フォーム</h3>
  <p>入力事項を確認してください。</p>
  <hr>

  {!! Form::open(['route' => 'process', 'method' => 'post']) !!}
  <div class="form-group">
    {!! Form::label('type_id', '送信する内容の種類') !!}
    <span class="badge badge-danger">選択必須</span>
    {!! Form::select('type_id', $inquiry_types, $inquiry->inquiry_type()->first()->name, ['class' => 'form-control'] ) !!}
  </div>

  <div class="form-group">
    {!! Form::label('minecraft_id', 'Minecraft ID') !!}
    <span class="badge badge-danger">入力必須</span>
    {!! Form::text('minecraft_id', $inquiry->minecraft_id, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('discord_id', 'Discord ユーザー名') !!}
    {!! Form::text('discord_id', $inquiry->discord_id, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('content', 'お問い合わせ内容') !!}
    <span class="badge badge-danger">入力必須</span>
    {!! Form::textarea('content', $inquiry->content, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    <span style="color: red">取り消しボタンを押すと、入力項目が削除されます。</span>
    <input class="btn btn-secondary form-control mb-3" type="submit" name="action" value="取り消し">
    <input class="btn btn-primary form-control" type="submit" name="action" value="送信">
  </div>
  {!! Form::close() !!}
@endsection