@extends('layout')

@section('content')
  <div class="row">
    <div class="col-10 mx-auto">
      <h3 class="text-center">プロジェクトに支援</h3>
      <h5 class="text-center" style="color: red">必ず以下の説明をお読みになってからプロジェクトに支援して下さい。</h5>

      <hr>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <hr>
      @endif

      <div class="card border-danger">
        <div class="card-header">
          <i class="fas fa-angle-double-right"></i>
          プロジェクトへの支援時の注意事項
        </div>
        <div class="card-body">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-angle-double-right"></i>
              当サイトのシステムに関して
            </div>
            <div class="card-body">
              当サイトは、プロジェクトを作成するプレイヤーとそのプロジェクトを支援したいプレイヤーを繋げる役割をするクラウドファンディングサイトです。<br>
              プロジェクト作成者に代わって、支援者の資金(ガチャ券)を回収しプロジェクト作成者にお渡しします。<br>
              クラウドファンディングの流れは次のようになります。
              <ol>
                <li>プロジェクトが作成される。</li>
                <li>プロジェクト一覧にプロジェクトが記載され、支援者が支援を行うことができる状態になる。</li>
                <li>プロジェクト作成時に指定した日時になると、プロジェクトへの支援が終了する。</li>
                <li>当サイト運営者がプロジェクトの支援者から資金(ガチャ券)を回収する。</li>
                <li>当サイト運営者がプロジェクト作成者にDiscordにて資金の受け渡し方法を質問し、資金を受け渡す。</li>
              </ol>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <i class="fas fa-angle-double-right"></i>
              支援するガチャ券に関して
            </div>
            <div class="card-body">
              <span style="color: red;">支援するガチャ券はチェストに入れてあり、プレイヤー名「karayuu」がチェストを開けられる必要があります。</span><br>
              そのチェストの座標を以下のフォームに入力して下さい。<br>
              盗難防止のため、ガチャ券を入れたチェストにはガチャ券以外を入れないようにして下さい。<br>
              保護へのメンバー追加・チェストの使用許可のやり方はは<a href="https://www.seichi.network/worldguard" target="_blank">こちらから</a>。
              座標の見方は<a href="https://kazzblog.com/2016/07/09/439874269-html/" target="_blank">こちら</a>を参照して下さい。
            </div>
          </div>
        </div>
      </div>

      <hr>

      {!! Form::open(['route' => ['crowdfunding.support_store', $funding->id], 'method' => 'post']) !!}
      <div class="form-group">
        {!! Form::label('donation_amount', '支援額(ガチャ券何枚か)') !!}
        <span class="badge badge-danger">入力必須</span>
        {!! Form::number('donation_amount', old('donation_amount'), ['class' => 'form-control', 'placeholder' => '支援するガチャ券枚数を入力して下さい。']) !!}
      </div>

      <hr>

      <h5>・ガチャ券回収に関する情報</h5>
      <small class="text-muted">当サイトがガチャ券を回収するために必要な情報です。</small>

      <div class="form-group">
        {!! Form::label('server_id', '設置チェストの存在するサーバー') !!}
        <span class="badge badge-danger">選択必須</span>
        {!! Form::select('server_id', $servers, old('server_id'), ['class' => 'form-control'] ) !!}
      </div>

      <div class="form-group">
        {!! Form::label('x', 'チェストのx座標') !!}
        <span class="badge badge-danger">入力必須</span>
        {!! Form::number('x', old('x'), ['class' => 'form-control', 'placeholder' => 'x座標を入力してください。']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('y', 'チェストのy座標') !!}
        <span class="badge badge-danger">入力必須</span>
        {!! Form::number('y', old('y'), ['class' => 'form-control', 'placeholder' => 'y座標を入力してください。']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('z', 'チェストのz座標') !!}
        <span class="badge badge-danger">入力必須</span>
        {!! Form::number('z', old('z'), ['class' => 'form-control', 'placeholder' => 'z座標を入力してください。']) !!}
      </div>

      <hr>

      <div class="form-group">
        {!! Form::label('minecraft_id', 'Minecraft ID') !!}
        <span class="badge badge-danger">入力必須</span>
        {!! Form::text('minecraft_id', old('minecraft_id'), ['class' => 'form-control', 'placeholder' => 'Minecraft IDを入力してください。']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('discord_id', 'Discord ユーザー名') !!}
        <span class="badge badge-danger">入力必須</span>
        <span class="badge badge-danger">非公開</span>
        {!! Form::text('discord_id', old('discord_id'), ['class' => 'form-control', 'placeholder' => 'Discord ユーザー名を#の後の4桁の数を含めて入力してください。']) !!}
        <small class="text-muted">Discordのユーザー名を入力します。必ず#のあとの数字4桁まで入力してください。</small>
      </div>

      <div class="form-group">
        {!! Form::submit('送信', ['class' => 'btn btn-primary form-control']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection