<?php
namespace App\Http\Controllers;
use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function index() {
		$recipes = Recipe::all();
		return response()->json($recipes);
	}
	public function create(Request $request) {
		$recipe = new Recipe;
		$recipe->name = $request->name;
		$recipe->desired_strength = $request->desired_strength;
		$recipe->pg = $request->pg;
		$recipe->vg = $request->vg;
		$recipe->nicotine_strength = $request->nicotine_strength;
		$recipe->nicotine_pg = $request->nicotine_pg;
		$recipe->amount = $request->amount;
		$recipe->nicotine_vg = $request->nicotine_vg;
		$recipe->wvpga = $request->wvpga;
		$recipe->sleep_time = $request->sleep_time;
		$recipe->vape_ready = $request->vape_ready;
		$recipe->comment = $request->comment;

		$recipe->save();
		return response()->json($recipe);
	}
	public function show($id) {
		$recipe = Recipe::find($id);
		return response()->json($recipe);
	}
	public function update(Request $request, $id) {
		$recipe = Recipe::find($id);

		if ($request->input('name')) {
			$recipe->name = $request->input('name');
		}
		if ($request->input('username')) {
			$recipe->username = $request->input('username');
		}
		if ($request->input('desired_strength')) {
			$recipe->desired_strength = $request->input('desired_strength');
		}
		if ($request->input('pg')) {
			$recipe->pg = $request->input('pg');
		}
		if ($request->input('vg')) {
			$recipe->vg = $request->input('vg');
		}
		if ($request->input('nicotine_strength')) {
			$recipe->nicotine_strength = $request->input('nicotine_strength');
		}
		if ($request->input('nicotine_pg')) {
			$recipe->nicotine_pg = $request->input('nicotine_pg');
		}
		if ($request->input('amount')) {
			$recipe->amount = $request->input('amount');
		}
		if ($request->input('nicotine_vg')) {
			$recipe->nicotine_vg = $request->input('nicotine_vg');
		}
		if ($request->input('wvpga')) {
			$recipe->wvpga = $request->input('wvpga');
		}
		if ($request->input('sleep_time')) {
			$recipe->sleep_time = $request->input('sleep_time');
		}
		if ($request->input('comment')) {
			$recipe->comment = $request->input('comment');
		}

		$user->save();
		return response()->json($recipe);
	}
	public function destroy($id) {
		$recipe = Recipe::find($id);
		$recipe->delete();
		return response()->json('recipe removed successfully');
	}
}
