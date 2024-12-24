<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ResumeController extends Controller
{
    public mixed $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $id = $request->route('id');
            $this->user = $user = User::with([
                'avatar',
                'studentProfile',
                'addresses.province',
                'addresses.district',
                'educations',
                'skills',
                'certificates',
                'experiences',
                'awards',
                'projects',
                'products',
                'socialActivities',
                'courses'
            ])->findOrFail($id);

            if ($user->studentProfile && $user->studentProfile->payload['allowPublishing'] == 'publish'
                || $user->id == Auth::id()) {
                return $next($request);
            }

            abort(403);
        });
    }

    public function __invoke(string|int  $id): View
    {
        return view('pdf.resume', [
            'user' => $this->user,
        ]);
    }
}
