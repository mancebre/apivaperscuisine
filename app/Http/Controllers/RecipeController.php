<?php
namespace App\Http\Controllers;
use App\Recipe;
use App\RecipeFlavors;
use Illuminate\Http\Request;
//use App\Http\Controllers\AuthController;

class RecipeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function index() {
        $recipes = Recipe::with('recipeFlavors')->get();

		return response()->json($recipes);
	}

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
	public function userRecipes(Request $request) {
	    // TODO Continue here after user roles are implemented.
        $user = AuthController::getCurrentUser($request);

        return response()->json($user);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
	public function create(Request $request) {
        $nicotine = json_decode($request->nicotine);
        $flavors = json_decode($request->flavor);
		$recipe = new Recipe;
		$recipe->name = $request->name;
		$recipe->desired_strength = $request->desired_strength;
		$recipe->pg = $request->pg;
		$recipe->vg = $request->vg;
		$recipe->nicotine_strength = $nicotine->strength;
		$recipe->nicotine_pg = $nicotine->pg;
		$recipe->amount = $request->amount;
		$recipe->nicotine_vg = $nicotine->vg;
		$recipe->wvpga = $request->wvpga;
		$recipe->sleep_time = $request->sleep_time;
		$recipe->vape_ready = $request->vapeReady;
		$recipe->comment = $request->comment;

		$recipe->save();

		// Not sure this is right way to do this.
		foreach ($flavors as $flavor) {

            $recipe->recipeFlavors()->saveMany([
                new RecipeFlavors([
                    "recipe_id"=>$recipe->id,
                    "percentage"=>$flavor->percentage,
                    "amount"=>$flavor->amount,
                    "grams"=>$flavor->grams,
                    "type"=>$flavor->type,
                    "name"=>$flavor->name
                ])
            ]);

        }

		return response()->json($recipe);
	}

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
	public function show($id) {
		$recipe = Recipe::with('RecipeFlavors')->find($id);
		// Why do I have to do this??
//		$recipe->flavors = RecipeFlavors::owned($id);
		return response()->json($recipe);
	}

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
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

        $recipe->save();
		return response()->json($recipe);
	}

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
	public function destroy($id) {
		$recipe = Recipe::find($id);
		$recipe->delete();
		return response()->json('recipe removed successfully');
	}
}
