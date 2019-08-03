@extends('layout')

@section('content')
  <div class="row">
    <div class="col-10 mx-auto">
      <h3 class="text-center">新規プロジェクト作成</h3>
      <h5 class="text-center" style="color: red">必ず以下の説明をお読みになってからプロジェクトを作成して下さい。</h5>

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
          プロジェクト作成時の注意事項
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
              プロジェクト作成に関して
            </div>
            <div class="card-body">
              プロジェクトの作成者は、プロジェクトの名前・説明欄にプロジェクトの具体的な内容をなるべく詳しく書くようにしてください。<br>
              <span style="color: red">特に以下の事項については記載するようにしてください。</span>
              <ul>
                <li>プロジェクトの具体的な説明(例えば、イベントならば何を行うのか、いつどこで行うのか、規模はどのくらいを予定しているか等)</li>
                <li>(もし行うならば)支援者に対する返礼(例えば、特別なアイテムをあげる、看板・頭などで支援を行なってくれたことを公表する等)</li>
                <li>資金(ガチャ券)を何に使う予定なのか(例えば、イベントにおける景品として利用する、イベント運営のお手伝いをしてくれた方に払う等)</li>
              </ul>
              通常、クラウドファンディングでは支援者に対する返礼を設けますが、当サイトにおけるクラウドファンディングでは、返礼の有無は問いません。<br>
              <span style="color: red">
                支援者からの資金援助があったのにも関わらず、プロジェクトが進行していない、または進行していない状態であると当サイトの運営者が判断した場合、資金の返済を行なっていただく場合があります。<br>
                尚、当サイトから資金援助の返済を命じられたにも関わらず、返済を行わないプレイヤーに関しては、利用制限等を行うことが出来るものとします。<br>
              </span>
              不適切なプロジェクトは当サイトの判断で削除させていただきますので、あらかじめご了承下さい。<br>
              <br>
              現在、プロジェクトの内容を後から修正する機能が未開発の状態です。
              <span style="color: red">後から項目を修正したいという方は<a href="{{ route('crowdfunding.support') }}">お問い合わせフォーム</a>
                からお問い合わせ下さい。(整地鯖のお問い合わせフォームには投稿しないようにお願い致します。)</span>
            </div>
          </div>
        </div>
      </div>

      <hr>

      {!! Form::open(['route' => 'crowdfunding.store', 'method' => 'post']) !!}
      <div class="form-group">
        {!! Form::label('name', 'プロジェクト名') !!}
        <span class="badge badge-danger">入力必須</span>
        <span class="badge badge-success">公開</span>
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'プロジェクト名を入力して下さい。'] ) !!}
        <small class="text-muted">プロジェクト名を入力します。わかりやすい名前をつけると良いでしょう。</small>
      </div>

      <div class="form-group">
        {!! Form::label('description', 'プロジェクトの説明') !!}
        <span class="badge badge-danger">入力必須</span>
        <span class="badge badge-success">公開</span>
        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'プロジェクトの説明を入力してください。']) !!}
        <small class="text-muted">プロジェクトの説明を入力します。一覧では、文章の前半の一部が表示されるので、始めに強調したい点を記載すると良いでしょう。</small>
      </div>

      <div class="form-group">
        {!! Form::label('target_amount', '必要支援額(ガチャ券何枚か)') !!}
        <span class="badge badge-danger">入力必須</span>
        <span class="badge badge-success">公開</span>
        {!! Form::number('target_amount', old('target_amount'), ['class' => 'form-control', 'placeholder' => '必要ガチャ券枚数を入力して下さい。']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('deadline', '期限') !!}
        <span class="badge badge-danger">入力必須</span>
        <span class="badge badge-success">公開</span>
        {!! Form::datetimeLocal('deadline', old('deadline'), ['class' => 'form-control']) !!}
        <small class="text-muted">支援を募集する期限を設定します。</small>
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