<x-app-layout>
    <x-slot name="header"><h1>お問い合わせ完了ページ</h1></x-slot>
    <p>送信完了しました。</p>
    <p>これ以降はメールでのやり取りになります。</p>
    <a href="{{ route('top.index') }}" class="text-primary mt-3">トップページへ戻る</a>
</x-app-layout>