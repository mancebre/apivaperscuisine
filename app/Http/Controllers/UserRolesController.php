<?php
namespace App\Http\Controllers;
use App\UserRoles;
use Illuminate\Http\Request;

class UserRolesController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index() {
        $userRoles = UserRoles::all();
        return response()->json($userRoles);
    }
    public function create(Request $request) {
        $userRole = new UserRoles;
        $userRole->user_id = $request->user_id;
        $userRole->role_id = $request->role_id;

        $userRole->save();
        return response()->json($userRole);
    }
    public function show($id) {
        $userRole = UserRoles::find($id);
        return response()->json($userRole);
    }
    public function update(Request $request, $id) {
        $userRole = UserRoles::find($id);

        if ($request->input('user_id')) {
            $userRole->user_id = $request->input('user_id');
        }
        if ($request->input('role_id')) {
            $userRole->role_id = $request->input('role_id');
        }

        $userRole->save();
        return response()->json($userRole);
    }
    public function destroy($id) {
        $userRole = UserRoles::find($id);
        $userRole->delete();
        return response()->json('User role removed successfully');
    }
}
