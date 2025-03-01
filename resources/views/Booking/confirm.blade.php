<x-app-layout>
    <x-slot name="header"><h1>入力情報の確認</h1></x-slot>
    <form action="{{ route('booking.store') }}" method="post">
    @csrf
      <div class="mx-20 my-4">  
        <dl>
            <dt>氏名</dt>
                <dd>
                    <p class="mx-8">{{ $data['name'] }}</p>
                </dd>
            <dt>メールアドレス</dt>
                <dd>
                    <p class="mx-8">{{ $data['email'] }}</p>
                </dd>

            <dt>電話番号</dt>
                <dd>
                    <p class="mx-8">{{ $data['phone_number'] }}</p>
                </dd>
            <dt>住所</dt>
                <dd>
                    <p class="mx-8">{{ $data['address'] }}</p>
                </dd>
            <dt>プラン選択</dt>
                <dd>
                    <p class="mx-8">{{ $data['plan_id'] }}</p>
                </dd>
            <dt>チェックイン時間</dt>
                <dd>
                    <p class="mx-8">{{ $data['check_in'] }}</p>
                </dd>
            <dt>チェックアウト時間</dt>
                <dd>
                    <p class="mx-8">{{ $data['check_out'] }}</p>
                </dd>
            <dt>部屋タイプ</dt>
                <dd>
                    <p class="mx-8">{{ $data['room_id'] }}</p>
                </dd>
            <dt>予約人数</dt>
                <dd>
                    <p class="mx-8">{{ $data['people'] }}</p>
                </dd>

            <button type="submit" class="btn btn-primary my-4">予約する</button>
            <a href="{{ route('booking.create') }}" class="btn btn-secondary my-4">戻る</a>
        </dl>
    </form>
</x-app-layout>