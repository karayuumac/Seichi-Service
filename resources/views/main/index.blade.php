@extends('layout')

@section('content')
  <div class="row">
    <div class="col-12 col-lg-10">
      <div class="card border-primary">
        <div class="card-header">
          <i class="fa fa-info-circle fa-fw"></i>
          お知らせ
        </div>

        <div class="card-body">
          <!-- お知らせの中身 -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-info fa-fw"></i>
              プライバシーポリシーを修正しました。<br>
              <span class="small">posted 2019/7/29(Mon) 11:43 by karayuu</span>
            </div>
            <div class="card-body">
              <p>
                プライバシーポリシーにIPアドレスの扱いに関して記載しました。
              </p>
            </div>
          </div>

          <div class="mb-3">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- メイン文章中広告 -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-7904110007301903"
                 data-ad-slot="8784623876"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-info fa-fw"></i>
              クラウドファンディング機能が完成しました<br>
              <span class="small">posted 2019/7/27(Sat) 02:25 by karayuu</span>
            </div>
            <div class="card-body">
              <p>
                クラウドファンディング機能が完成しました。<br>
                どんな些細なことでも(自分で使うためのような寄付の形でも)大歓迎です！<br>
                皆さんでクラウドファンディングを盛り上げていきましょう！
              </p>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-info fa-fw"></i>
              「お問い合わせ・ご意見ご感想フォーム」を作成しました<br>
              <span class="small">posted 2019/7/24(Wed) 01:18 by karayuu</span>
            </div>
            <div class="card-body">
              <p>
                利用者の皆様がお問い合わせ・ご意見ご感想を送信できるようにフォームを追加しました。<br>
                なお、荒らし行為に関しては、IPアドレスによる接続規制を行う場合がございます。<br>
                <a href="{{ route('contact') }}">フォームはこちら</a>
              </p>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-info fa-fw"></i>
              「クラウドファンディングとは」を作成しました<br>
              <span class="small">posted 2019/7/21(Sun) 21:25 by karayuu</span>
            </div>
            <div class="card-body">
              <p>
                「クラウドファンディングとは」を作成しました。<br>
                当サイトのコンテンツである整地鯖・クラウドファンディングについて解説したものになります。<br>
                <a href="{{ route('crowdfunding.about') }}">ページはこちら</a>
              </p>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-info fa-fw"></i>
              プライバシーポリシーを作成しました<br>
              <span class="small">posted 2019/7/21(Sun) 03:08 by karayuu</span>
            </div>
            <div class="card-body">
              <p>
                プライバシーポリシーを作成しました。<br>
                当サイト利用前に一度見ていただければ幸いです。<a href="{{ route('policy') }}">こちらをクリック</a><br>
                この内容は適宜見直しを行い、更新する予定です。変更点はこちらのお知らせにてお知らせいたします。<br>
              </p>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <i class="fa fa-info fa-fw"></i>
              ホームページを開設しました<br>
              <span class="small">posted 2019/7/20(Sat) 17:35 by karayuu</span>
            </div>
            <div class="card-body">
              <p>
                ホームページを開設しました。<br>
                現在制作中のため、<a href="#">このページ</a>のみが完成しています。<br>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-2">
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- メイン右側広告 -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-7904110007301903"
           data-ad-slot="2470496969"
           data-ad-format="auto"
           data-full-width-responsive="true"></ins>
      <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </div>
  </div>
@endsection