<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripPostRequest;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        //下書きじゃないTripのみ表示させる
        // $trips = Trip::where('status', Trip::PUBLISHED)->get();
        return response()->json($trips);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TripPostRequest $request)
    {
        //現在のログインユーザーを取得
        $user = auth()->user();

        $trip = new Trip;
        $trip->user_id = $user->id;
        $trip->category_id = $request->input('category_id');
        $trip->tripTitle = $request->input('tripTitle');
        // $trip->status = $request->input('status', Trip::DRAFT); //デフォルト値をDRAFTを指定

        //ファイルがアップデートされた場合の処理
        if($request->hasFile('image_url')){
            $file = $request->file('image_url');
            //タイムスタンプ＋ファイル名
            $filename = time().'.'.$file->getClientOriginalExtension();
            //保存先がstorageになるからsail art storage:linkする必要あり シンボリックリンク
            $path = $file->storeAs('images', $filename, 'public');
            $trip->image_url = $path;
        }


        $trip->save();

        return response()->json(['message' => 'Trip created successfully']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripPostRequest $request)
    {
        // $trip = Trip::create($request->all());
        // return response()->json(['message' => 'Trip stored successfully', 'trip' => $trip]);
    }

    /**
     * Display the specified resource.
     */
    public function show($trip_id)
    {
        $trip = Trip::with(['category', 'user'])->find($trip_id);

        if(!$trip) {
            //tripが見つからない場合、適切なエラーレスポンスを返す（例: 404 Not Found)
            return response()->json(['message' => 'アイテムが見つかりません'], 404);
        }

        return response()->json($trip);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //tripの情報を更新
        // $trip -> update($request->all());
        // return response()->json(['message' => 'Trip updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
