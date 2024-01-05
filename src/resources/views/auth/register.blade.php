<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
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
                <a href="/login">login</a>
            </div>
        </div>
    </header>

    <main>
        <div class="title">
            <div class="title-inner">
                <h2>Register</h2>
            </div>
        </div>
        <div class="register-content">
            <div class="register-content__inner">
                <form class="create-form" action="/register" method="post">
                    @csrf
                    <div class="create-form__input-title">
                        お名前
                    </div>
                    <input class="create-form__input" type="text" name="name" value="{{ old('name') }}" placeholder="例:山田　太郎">
                    @error('name')
                        <p style="color: red">
                            {{$errors->first('name')}}
                        </p>
                    @enderror
                    <div class="create-form__input-title">
                        メールアドレス
                    </div>
                    <input class="create-form__input" type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com">
                    @error('name')
                        <p style="color: red">
                            {{$errors->first('email')}}
                        </p>
                    @enderror
                    <div class="create-form__input-title">
                        パスワード
                    </div>
                    <input class="create-form__input" type="password" name="password" placeholder="例:coachtech1106">
                    @error('name')
                        <p style="color: red">
                            {{$errors->first('password')}}
                        </p>
                    @enderror
                    <div class="create-form__button">
                        <button class="create-form__button-submit" type="submit">
                            登録
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

