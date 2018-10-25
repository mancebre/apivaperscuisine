<?php
namespace App\Http\Controllers;
use App\User;
use App\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function index() {
		$users = User::all();
		return response()->json($users);
	}

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
	public function create(Request $request) {
		$user = new User;
		$user->username = $request->username;
		$user->password = Hash::make($request->password);
		$user->email = $request->email;
		$user->firstname = $request->firstname;
		$user->lastname = $request->lastname;
		$user->active = 0;
		$user->newsletter = $request->newsletter;

		$user->save();

        $user->userRoles()->saveMany([
            new UserRoles([
                "user_id"=>$user->id,
                "role_id"=>3, // Regular user.
            ])
        ]);

		return response()->json($user);
	}

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
	public function show($id) {
		$user = User::find($id);
		return response()->json($user);
	}

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
	public function update(Request $request, $id) {
		$user = User::find($id);

		if ($request->input('username')) {
			$user->username = $request->input('username');
		}
		if ($request->input('password')) {
			$user->username = Hash::make($request->input('password'));
		}
		if ($request->input('email')) {
			$user->username = $request->input('email');
		}
		if ($request->input('firstname')) {
			$user->username = $request->input('firstname');
		}
		if ($request->input('lastname')) {
			$user->username = $request->input('lastname');
		}
		if ($request->input('active')) {
			$user->username = $request->input('active');
		}
		if ($request->input('newsletter')) {
			$user->username = $request->input('newsletter');
		}

		$user->save();
		return response()->json($user);
	}

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
	public function destroy($id) {
		$user = User::find($id);
		$user->delete();
		return response()->json('user removed successfully');
	}
}
