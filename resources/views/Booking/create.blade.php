<x-app-layout>
    <x-slot name="header"><h1>予約フォーム</h1></x-slot>
    <form action="{{ route('booking.confirm') }}" method="post">
    @csrf
      <div class="mx-20 my-4">  
        <dl>
        <dt>氏名</dt>
<x-input-error :messages="$errors->get('name')" />
<dd>
    <input type="text" name="name" value="{{ old('name') }}">
</dd>

<dt>メールアドレス</dt>
<x-input-error :messages="$errors->get('email')" />
<dd>
    <input type="text" name="email" value="{{ old('email') }}">
</dd>

<dt>電話番号</dt>
<x-input-error :messages="$errors->get('phone_number')" />
<dd>
    <input type="text" name="phone_number" value="{{ old('phone_number') }}">
</dd>

<dt>住所</dt>
<x-input-error :messages="$errors->get('address')" />
<dd>
    <input type="text" name="address" value="{{ old('address') }}">
</dd>

<dt>プラン選択</dt>
<x-input-error :messages="$errors->get('plan_id')" />
<dd>
    <select name="plan_id">
    <option value="" selected>プランを選択してください</option>
        @foreach($plans as $plan)
            <option value="{{ $plan->id }}" {{ old('plan_id', $selectedPlanId) == $plan->id ? 'selected' : '' }}>
                {{ $plan->title }}
            </option>
        @endforeach
    </select>
</dd>

<dt>チェックイン日</dt>
<x-input-error :messages="$errors->get('check_in')" />
<dd>
    <input type="date" name="check_in" value="{{ old('check_in') }}">
</dd>

<dt>チェックアウト時間</dt>
<x-input-error :messages="$errors->get('check_out')" />
<dd>
    <input type="date" name="check_out" value="{{ old('check_out') }}">
</dd>

<dt>部屋タイプ</dt>
<x-input-error :messages="$errors->get('room_id')" />
<dd>
  <select name="room_id">
      <option value="" selected>部屋を選択してください</option>
      @foreach($rooms as $room)
          <option value="{{ $room->id }}" {{ old('room_id', $selectedRoomId) == $room->id ? 'selected' : '' }}>
              {{ $room->room_type }}
          </option>
      @endforeach
  </select>
</dd>
<dt>予約人数</dt>
<x-input-error :messages="$errors->get('people')" />
<dd>
    <select name="people">
    <option value="" selected>人数を選択してください</option>
        @for($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ old('people') == $i ? 'selected' : '' }}>{{ $i }}人</option>
        @endfor
    </select>
</dd>

        <button type="submit" class="btn btn-primary my-4">登録</button>
      </div>
    </form>
    <a href="{{ route('plan.index') }}" class="mx-4 my-4 text-primary">プラン一覧に戻る</a>
    <a href="{{ route('room.index') }}" class="mx-4 my-4 text-primary">部屋一覧に戻る</a>

</x-app-layout>

<script>

</script>