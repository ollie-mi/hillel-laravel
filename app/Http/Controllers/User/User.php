<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\UserProfile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $search = $request->get('search');

        $query = UserModel::with(['profile', 'orders'])
            ->where('status', '=', 'ON');

        if (!empty($search)) {
            $query
                ->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
                ->where('status', '=', 'ON')
                ->where(static function ($query) use ($search) {
                    $query->where('login', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('first_name', 'like', "%$search%")
                        ->orWhere('last_name', 'like', "%$search%");
                });
        }

        $users = $query->paginate(20);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(UserCreateRequest $request)
    {
        DB::transaction(static function () use ($request) {
            $user_data = $request->only('login', 'password', 'email');
            $user_data['password'] = Hash::make($user_data['password']);
            $profile_data = $request->only('phone', 'first_name', 'last_name', 'birthday');

            $user = UserModel::create($user_data);
            $user->profile()->create($profile_data);
        }, 3);

        return redirect(
            route('user.index')
        );
    }

    /**
     * Show the form for select user by id
     *
     * @return View
     */
    public function select_form(): View
    {
        return view('user.select');
    }

    /**
     * Get User Id from form
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function show_user(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required|integer'
        ]);

        $userId = $request->get('userId');

        return redirect(
          route('user.show', $userId)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param UserModel $user
     * @return View
     */
    public function show(UserModel $user): View
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for selecting user for update
     *
     * @return View
     */
    public function select_user(): View
    {
        return view('user.select_user');
    }

    /**
     * Show the form for update user by id
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update_form(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required|integer'
        ]);

        $userId = $request->get('userId');

        $model = new UserModel();
        $user = $model::find($userId);

        return redirect(
            route('user.edit', compact('user'))
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UserModel $user
     * @return View
     */
    public function edit(UserModel $user): View
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param UserModel $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UserUpdateRequest $request, UserModel $user)
    {
        $data = $request->only('first_name', 'last_name', 'birthday');
        $user->profile()->update($data);
        return redirect(
            route('user.index')
        );
    }

    /**
     * Show the form for selecting user for delete
     *
     * @return View
     */
    public function delete_form(): View
    {
        return view('user.delete');
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required|integer'
        ]);

        $userId = $request->get('userId');
        $user = (new UserModel())->find($userId);

        $user->delete();

        return redirect(
            route('user.index')
        );
    }
}
