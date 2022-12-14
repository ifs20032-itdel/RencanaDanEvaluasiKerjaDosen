<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DosenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $data = DB::table('table_periode')
            ->select('id', 'periode', 'status')
            ->where('periode', '=', str_replace('&', '/', $request->route("periode")))
            ->first();

            if (!(Auth::user()->role == "dosen")) {
            return response()->view('errors.404');
        } else if ($data == null || $data->status == "non-aktif") {
            return response()->view('errors.404');
        }

        Auth::user()->periode = $request->route("periode");
        return $next($request);
    }
}
    