@extends('layout')

@section('content')
  <h3 class="text-center">お問い合わせ・ご意見ご感想フォーム</h3>
  <hr>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::open(['route' => 'process', 'method' => 'post']) !!}
  <div class="form-group">
    {!! Form::label('type_id', '送信する内容の種類') !!}
    <span class="badge badge-danger">選択必須</span>
    {!! Form::select('type_id', $inquiry_types, old('type_id'), ['class' => 'form-control'] ) !!}
    <small class="text-muted">お問い合わせは返信が必要な場合に、ご意見ご感想は返信が不要の場合に選択してください。</small>
  </div>

  <div class="form-group">
    {!! Form::label('minecraft_id', 'Minecraft ID') !!}
    <span class="badge badge-danger">入力必須</span>
    {!! Form::text('minecraft_id', old('minecraft_id'), ['class' => 'form-control', 'placeholder' => 'Minecraft IDを入力してください。']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('discord_id', 'Discord ユーザー名') !!}
    {!! Form::text('discord_id', old('discord_id'), ['class' => 'form-control', 'placeholder' => 'Discord ユーザー名を#の後の4桁の数を含めて入力してください。']) !!}
    <small class="text-muted">返信が必要な場合は入力してください。</small>
  </div>

  <div class="form-group">
    {!! Form::label('content', 'お問い合わせ内容') !!}
    <span class="badge badge-danger">入力必須</span>
    {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'placeholder' => '内容を入力してください。']) !!}
  </div>

  <div class="form-group">
    {!! Form::submit('送信', ['class' => 'btn btn-primary form-control']) !!}
  </div>
  {!! Form::close() !!}
@endsection