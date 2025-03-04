<x-app-layout>
    <x-slot name="header"><h1>予約確認</h1></x-slot>
    <div class="mx-20 my-4">

        <div class="container">
            <p>予約ID: {{ $booking->id }}</p>
            <p>名前: {{ $booking->name }}</p>
            <p>メールアドレス: {{ $booking->email }}</p>
            <p>電話番号: {{ $booking->phone_number }}</p>
            <p>住所: {{ $booking->address }}</p>
            <p>プラン: {{ $booking->plan->title }}</p>
            <p>部屋タイプ: {{ $booking->room->room_type }}</p>
            <p>チェックイン: {{ $booking->check_in }}</p>
            <p>チェックアウト: {{ $booking->check_out }}</p>
            <p>予約人数: {{ $booking->people }}人</p>
            <p>合計金額: {{ number_format($booking->total_price) }}円</p>
        </div>
    <a href="{{ route('booking.edit', ['booking' => $booking->id]) }}" class="btn btn-primary">予約内容の変更</a>

    <a href="{{ route('booking.search') }}" class="btn btn-secondary">検索に戻る</a>

    <form action="{{ route('booking.destroy', ['booking' => $booking->id]) }}" method="post" class="my-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">予約の削除</button>
    </form>

    </div>
</x-app-layout>

