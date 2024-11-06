<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Services\PostService;
use App\Services\ProfileService;
use DateTime;

class ProfileController extends Controller
{
    protected $postService;
    protected $profileService;
    protected $userController;
    public function __construct(ProfileService $profileService, PostService $postService, UserController $userController)
    {
        $this->profileService = $profileService;
        $this->postService = $postService;
        $this->userController = $userController;
    }

    /**
     * Return to Profile page
     */
    public function profilePage(int $id): View
    {
        return $this->userController->show($id);
    }

    /**
     * Summary of editProfile
     */
    public function editProfile(): View
    {
        $user = auth()->user();
        return view('pages.profile.edit-profile', compact('user'));
    }

    /**
     * Summary of updateProfile
     */
    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = auth()->user();
        if (!$user instanceof User) {
            return back()->withErrors(['error' => 'Authentication required.']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }

        try {
            $this->profileService->updateProfile($user, $request->validated());
            return redirect()->route('user.profile', ['id' => auth()->id()])->with('success', 'Your profile has been successfully updated!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show posts in the user profile
     */
    public function profileNav(int $id,int $x): View
    {
        $user = User::findOrFail($id);
        $view = $this->userController->show($id);
        $birthdate = new DateTime($user->profile->birth_date);
        $today = new DateTime();
        $age = $today->diff($birthdate)->y;

        return $view->with(compact('x', 'user', 'age'));
    }
}
