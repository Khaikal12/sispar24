<?php

namespace App\Http\Middleware;

use App\Models\Pemesanan;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPemesananStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $pemesanan = Pemesanan::findOrFail($request->id);

        if ($pemesanan->status == 'proses' || $pemesanan->status == 'selesai') {
            return redirect()->route('pemesanan.detail')->with('error', 'Pemesanan sudah dalam status proses atau selesai.');
        }

        return $next($request);
    }
}
