<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  @yield('style')

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
    body {
      padding-top: 4.5rem;
    }
  </style>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144234149-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
          dataLayer.push(arguments);
      }

      gtag('js', new Date());

      gtag('config', 'UA-144234149-1');
  </script>

  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
      (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-7904110007301903",
          enable_page_level_ads: true
      });
  </script>
</head>

<body>
<div id="main-div" class="float-container">
  <!-- navbarの設定 -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <!-- ブランド表示 -->
      <a class="navbar-brand" href="#">整地鯖・クラウドファンディング(非公式)</a>
      <!-- 画面が小さい時の右に表示されるボタン -->
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse"
              aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- navbarの中身 -->
      <div class="collapse navbar-collapse" id="navbar-collapse" aria-expanded="false">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">ホーム</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="#">一覧</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">クラウドファンディングとは</a>
          </li>
          -->
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">プライバシーポリシー</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="main-container" class="container">
    @yield('content')
  </div>
</div>
</body>
</html>
