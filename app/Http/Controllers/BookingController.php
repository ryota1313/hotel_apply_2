<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Plan;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('booking.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $plans = Plan::all();
    $selectedPlanId = $request->input('plan_id');

    $rooms = Room::all();
    $selectedRoomId = $request->input('room_id');
    
    return view('booking.create', compact('plans','rooms','selectedPlanId','selectedRoomId'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // セッションから予約データを取得
                $data = $request->session()->get('booking_data');
        
                if (!$data) {
                    return redirect()->route('booking.create')->withErrors('予約データがありません。');
                }
        
                // 宿泊日数を計算
                $checkIn = new \DateTime($data['check_in']);
                $checkOut = new \DateTime($data['check_out']);
                $nights = $checkOut->diff($checkIn)->days;
        
                // プランの料金を取得
                $plan = Plan::find($data['plan_id']);
                
                // 合計金額を計算（プラン料金 × 泊数 × 人数）
                $data['total_price'] = $plan->price * $nights * $data['people'];
                
                // 予約データをデータベースに保存
                $booking = Booking::create($data);
        
                // セッションの予約データを削除
                $request->session()->forget('booking_data');
        
                return redirect()->route('booking.show', $booking->id);
    }

    /**
     * Display the specified resource.
     */
    public function confirm(Request $request)
{
    // フォームからのデータをバリデーション
    $validated = $request->validate([
        'name' => 'required|max:20',
        'email' => 'required|email',
        'phone_number' => 'required|regex:/^0\d{9,10}$/',
        'address' => 'required|max:100', // adress → address に修正
        'plan_id' => 'required|exists:plans,id',
        'check_in' => 'required|date_format:Y-m-d',
        'check_out' => 'required|date_format:Y-m-d|after:check_in',
        'people' => 'required|integer|min:1|max:5',
        'room_id' => 'required|exists:rooms,id',
    ]);

    // 確認ページで使うためにデータをセッションに保存
    $request->session()->put('booking_data', $validated);

    // 確認ページへリダイレクト
    return redirect()->route('booking.confirm.show');
}

    public function showConfirmPage(Request $request)
    {
        // セッションから予約データを取得
        $data = $request->session()->get('booking_data');

        if (!$data) {
            return redirect()->route('booking.create')->withErrors('予約データがありません。');
        }

        // 関連データの取得
        $plan = Plan::find($data['plan_id']);
        $room = Room::find($data['room_id']);

        return view('booking.confirm', compact('data', 'plan', 'room'));
    }

    public function show(Booking $booking)
    {
        return view('booking.show', compact('booking'));
    }

    public function search()
    {
        return view('booking.search');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
