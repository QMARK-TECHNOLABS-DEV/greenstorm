<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Competition;
class CheckCompetitionStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          // Retrieve the current competition
          $currentCompetition = Competition::where('status', 'active')->latest()->first();
          if (!$currentCompetition) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Sorry! Competition expired.'], 400);
            } else {
                return redirect('/profile/photo-competition-expired');
            }
          }
        return $next($request);
    }
}
