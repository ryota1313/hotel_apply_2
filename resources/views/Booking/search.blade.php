<x-app-layout>
    <x-slot name="header"><h1>予約検索</h1></x-slot>
    <div class="mx-20 my-4">
        <form action="{{ route('booking.index') }}" method="get">
            @csrf
            <dl>
                <dt>メールアドレス</dt>
                <x-input-error :messages="$errors->get('email')" />
                <dd class="mx-4 required"><input type="text" name="email" placeholder="メールアドレス" value="{{ old('email') }}"></dd>
                <dt>予約番号</dt>
                <x-input-error :messages="$errors->get('id')" />
                <dd class="mx-4 required"><input type="text" name="id" placeholder="予約番号" value="{{ old('id') }}"></dd>
            </dl>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md my-4">検索</button>
        </form>
        <a href="{{ route('booking.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md my-4">新規予約</a>
        <a href="{{ route('top.index') }}" class="bg-secondary text-white px-4 py-2 rounded-md my-4">TOPへ戻る</a>
    </div>
</x-app-layout>
