<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gorditas&family=Indie+Flower&family=Kaisei+Decol:wght@400;500&family=Noto+Serif+JP:wght@900&family=Playpen+Sans:wght@100&family=Zen+Maru+Gothic:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__title">
                FashionablyLate
            </h1>
            <div class="link-button">
                <a href="/register">register</a>
            </div>
        </div>
    </header>

    <main>
        <div class="title">
            <div class="title-inner">
                <h2>Login</h2>
            </div>
        </div>
        <div class="login-content">
            <div class="login-content__inner">
                <form class="login-form" action="/login" method="post">
                    @csrf
                    <div class="login-form__input-title">
                        メールアドレス
                    </div>
                    <input class="login-form__input" type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com">
                    @if ($errors->has('name'))
                        <p style="color: red">
                            メールアドレスを入力してください
                        </p>
                    @endif
                    <div login-form__input-title>
                        パスワード
                    </div>
                    <input class="login-form__input" type="password" name="password" placeholder="例:coachtech1106">
                    @if ($errors->has('name'))
                        <p style="color: red">
                            パスワードを入力してください
                        </p>
                    @endif


                    <div class="login-form__button">
                        <button class="login-form__button-submit" type="submit">
                            ログイン
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
