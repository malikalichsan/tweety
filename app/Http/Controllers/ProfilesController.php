<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        $tweets = $user->tweets;

        return view('profiles.show', compact(['user', 'tweets']));
    }

    public function edit(User $user)
    {
        // abort_if($user->isNot(current_user()), 404);
        // $this->authorize('edit', $user); // authorization has been moved to route using middleware

        return view('profiles.edit', compact('user'));
    }

    public function update()
    {

    }
}
