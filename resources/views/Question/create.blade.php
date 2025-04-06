<x-app-layout>
    <x-slot name="header"><h1>お問い合わせ入力フォーム</h1></x-slot>
        <form action="{{ route('question.store') }}" method="post">
            @csrf
            <dl>
                <dd class="text-center">氏名</dd>
                <x-input-error :messages="$errors->get('name')" />
                <dt><input class="form-control w-25 mx-auto" type="text" name="name"></dt>
                <dd class="text-center">メールアドレス</dd>
                <x-input-error :messages="$errors->get('email')" />
                <dt><input class="form-control w-25 mx-auto" type="email" name="email"></dt>
                <dd class="text-center">タイトル</dd>
                <x-input-error :messages="$errors->get('title')" />
                <dt><input class="form-control w-25 mx-auto" type="text" name="title"></dt>
                <dd class="text-center">お問い合わせ内容</dd>
                <x-input-error :messages="$errors->get('body')" />
                <dt><textarea class="form-control w-50 mx-auto" name="body" rows="5"></textarea></dt>
            </dl>

            <div class="text-center my-4">
                <button type="submit" class="btn btn-primary">送信する</button>
            </div>
        </form>
    <a class="text-primary" href="{{ route('question.index') }}">お問い合わせ一覧に戻る</a>

</x-app-layout>