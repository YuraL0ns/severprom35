<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/login'); // Редирект на страницу входа, если пользователь не аутентифицирован.
        }

        $user = auth()->user();

        if (in_array('admin', $roles) && $user->isAdmin()) {
            return $next($request);
        }

        if (in_array('moderator', $roles) && $user->isModerator()) {
            return $next($request);
        }

        if (in_array('user', $roles) && $user->isUser()) {
            return $next($request);
        }

        return abort(403); // Доступ запрещен
    }
}
