<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('|', $role);

        foreach ($roles as $rolename) {
            if ($request->user()->hasRole($rolename)) {
                return $next($request);
            }
        }

        if (Auth::user()->hasRole('direktur')) {
            $message['message'] = 'Maaf, Anda hanya dapat melihat. Anda tidak memiliki akses untuk melakukan ini.';
        } elseif (Auth::user()->hasRole('karyawan')) {
            return abort(403, 'Anda tidak diizinkan masuk halaman ini');
        }

        return abort(403, 'Anda tidak diizinkan masuk halaman ini');
    }
}
