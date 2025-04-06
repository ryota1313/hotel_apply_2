<x-app-layout>
    <x-slot name="header"><h1>お問い合わせフォーム</h1></x-slot>
    <div class="mx-4 my-4">
    <a class="text-primary" href="{{ route('question.create') }}">お問い合わせフォーム</a>
    <a class="text-primary" href="#">よくあるご質問</a>
    <a class="text-primary" href="{{ route('top.index') }}">トップに戻る</a>
</x-app-layout>