<h1>ログインフォーム</h1>
<form action="{{ route('admin.login.post') }}" method="post">
    @csrf
    <input type="text" name="email" placeholder="メールアドレス">
    <input type="password" name="password" placeholder="パスワード">
    <button type="submit">ログイン</button>
</form>