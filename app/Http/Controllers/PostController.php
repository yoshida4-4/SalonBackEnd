<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation; // モデルをインポート

class PostController extends Controller
{
    public function store(Request $request)
    {
        // // バリデーション
        // $validated = $request->validate([
        //     'selectedOption' => 'required|string|max:255',
        // ]);

        // // データベースに格納
        // $reservation = new Reservation();
        // $reservation->option_name = $request;
        // $reservation->save();

        \App\Models\Reservation::create([
            'user_id' => $request['user_id'],
            'stylist_id' => $request['stylist_id'],
            'service_id' => $request['service_id'],
            'date' => $request['date'],
            'start_flame' => $request['start_flame'],
        ]);

        return response()->json([
            'message' => '予約が正常に作成されました。',
        ], 200);
    }

    // public function create(Request $request)
    // {
    //     $post = new Post;
    //     $post->user_id = $request->user_id;
    //     $post->stylist_id = $request->stylist_id;
    //     $post->service_id = $request->service_id;
    //     $post->date = $request->date;
    //     $post->start_flame = $request->start_flame;
    //     $post->end_flame = $request->end_flame;

    //     $post->save();
    //     return response()->json($post, 200);
    // }

}
