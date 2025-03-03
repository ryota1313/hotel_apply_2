<x-app-layout>
    <x-slot name="header"><h1>予約検索</h1></x-slot>
    <div class="mx-20 my-4">
        <form action="{{ route('booking.index') }}" method="get">
            @csrf
            <dl>
                <dt>予約者名</dt>
                <dd class="mx-4"><input type="text" name="name" placeholder="予約者名"></dd>
                <dt>メールアドレス</dt>
                <dd class="mx-4"><input type="text" name="email" placeholder="メールアドレス"></dd>
                <dt>予約番号</dt>
                <dd class="mx-4"><input type="text" name="id" placeholder="予約番号"></dd>
            </dl>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md my-4">検索</button>
        </form>
    </div>
</x-app-layout>
