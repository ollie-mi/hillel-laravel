<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use function Psy\sh;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        return redirect(
            route('user.index')
        );
    }

    /**
     * Show the form for select user by id
     *
     * @return \Illuminate\Http\Response
     */
    public function select_form()
    {
        return view('user.select');
    }

    /**
     * Get User Id from form
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show_user(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required|integer'
        ]);

        $userId = $request->get('userId');

        return redirect(
          route('user.show', ['id' => $userId])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show', ['userId' => $id]);
    }

    /**
     * Show the form for selecting user for update
     *
     * @return \Illuminate\Http\Response
     */
    public function select_user()
    {
        return view('user.select_user');
    }

    /**
     * Show the form for update user by id
     *
     * @return \Illuminate\Http\Response
     */
    public function update_form(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required|integer'
        ]);

        $userId = $request->get('userId');

        return redirect(
            route('user.edit', ['id' => $userId])
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit', ['userId' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param int $id
     * @return void
     */
    public function update(UserUpdateRequest $request, $id)
    {
        return redirect(
            route('user.index')
        );
    }

    /**
     * Show the form for selecting user for delete
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_form()
    {
        return view('user.delete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required|integer'
        ]);

        $userId = $request->get('userId');

        return redirect(
            route('user.index')
        );
    }
}
