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
        //
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
        'adress' => 'required|max:100', // adress → address に修正
        'plan_id' => 'required|exists:plans,id',
        'check_in' => 'required|date_format:H:i',
        'check_out' => 'required|date_format:H:i|after:check_in',
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
        $bookingData = $request->session()->get('booking_data');

        if (!$bookingData) {
            return redirect()->route('booking.create')->withErrors('予約データがありません。');
        }

        // 関連データの取得
        $plan = Plan::find($bookingData['plan_id']);
        $room = Room::find($bookingData['room_id']);

        return view('booking.confirm', compact('bookingData', 'plan', 'room'));
    }

    public function show(Booking $booking)
    {
        //
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
