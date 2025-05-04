<x-app-layout>
    <x-slot name="header"><h1>お問い合わせ入力フォーム</h1></x-slot>
        <form action="{{ route('question.store') }}" method="post">
            @csrf
            <dl>
                <dd class="text-center">氏名</dd>
                <x-input-error :messages="$errors->get('name')" class="text-center"/>
                <dt><input class="form-control w-25 mx-auto" type="text" name="name" value="{{ old('name') }}"></dt>
                <dd class="text-center">メールアドレス</dd>
                <x-input-error :messages="$errors->get('email')" class="text-center" />
                <dt><input class="form-control w-25 mx-auto" type="email" name="email" value="{{ old('email') }}"></dt>
                <dd class="text-center">タイトル</dd>
                <x-input-error :messages="$errors->get('title')" class="text-center" />
                <dt><input class="form-control w-25 mx-auto" type="text" name="title" value="{{ old('title') }}"></dt>
                <dd class="text-center">お問い合わせ内容</dd>
                <x-input-error :messages="$errors->get('body')" class="text-center" />
                <dt><textarea class="form-control w-50 mx-auto" name="body" rows="5">{{ old('body') }}</textarea></dt>
            </dl>
            <div class="border p-3" style="width: 300px; word-wrap: break-word;">
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
            </div>
            <div  class="text-wrap" style="word-break: break-word;">
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
            </div>
            <div class="text-center my-4">
                <button type="submit" class="btn btn-primary">送信する</button>
            </div>
        </form>
    <a class="text-primary" href="{{ route('question.index') }}">お問い合わせ一覧に戻る</a>

</x-app-layout>