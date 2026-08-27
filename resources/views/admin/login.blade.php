<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in — LinkingWordz Studio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600&family=Fraunces:ital,opsz,wght@0,9..144,500;1,9..144,500&family=Outfit:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="ad-login">
    <div class="ad-login__glow" aria-hidden="true"></div>
    <main class="ad-login__card">
        <img src="{{ asset('images/live/live-logo.png') }}" alt="LinkingWordz">
        <p class="ad-kicker">Private studio</p>
        <h1>Welcome back</h1>
        <p class="ad-login__lead">Sign in to manage the journal, comments, and inquiries.</p>
        <form method="post" action="{{ route('admin.login.submit') }}">
            @csrf
            <label>Email
                <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </label>
            @error('email')<p class="ad-error">{{ $message }}</p>@enderror
            <label>Password
                <input type="password" name="password" required autocomplete="current-password">
            </label>
            <label class="ad-check"><input type="checkbox" name="remember" value="1"> Remember this device</label>
            <button type="submit">Enter studio</button>
        </form>
    </main>
</body>
</html>
