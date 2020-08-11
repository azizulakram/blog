<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the update profile page.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request)
    {
        return view('admin.edit-profile', [
            'user' => $request->user()
        ]);
    }

    public function update(Request $request)
{
    $request->user()->update(
        $request->all()
    );

    return redirect()->route('profile.edit');
}
}
