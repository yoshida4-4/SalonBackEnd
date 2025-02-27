<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // OPTIONS メソッドの場合は、即座にレスポンスを返す
         if ($request->isMethod('OPTIONS')) {
            return response()->noContent(200)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Accept, X-Requested-With, Origin, Content-Type');
        }

        // レスポンスオブジェクトを取得
        $response = $next($request);

        // ヘッダーを追加
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Accept, X-Requested-With, Origin, Content-Type');

        return $response;
    }
}
