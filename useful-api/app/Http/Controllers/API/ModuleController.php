<?php

namespace App\Http\Controllers\API;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::all();

        return response()->json([
            $modules,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $module = Module::findOrFail($id);

        $getActiveModule = DB::table('user_modules')->select('active')->where([
            'user_id' => $user->id,
            'module_id' => $module->id,
        ]);

        if (!$getActiveModule) {
            return response()->json([
                'error' => "Module inactive. Please activate this module to use it."
            ], 403);
        }
        
        return response()->json([
            $module,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function activate(Request $request, string $id)
    {
        $user = Auth::user();
        $module = Module::findOrFail($id);

        if (!$module) {
            return response()->json(404);
        }

        $inserOrUpdate = DB::table('user_modules')->updateOrInsert(
            ['user_id' => $user->id, 'module_id' => $module->id],
            ['active' => true],
        );

        if($inserOrUpdate) {
            return response()->json([
                "message" => "Module activated",
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function desactivate(Request $request, string $id)
    {
        $user = Auth::user();
        $module = Module::findOrFail($id);

        if (!$module) {
            return response()->json(404);
        }

        $inserOrUpdate = DB::table('user_modules')->updateOrInsert(
            ['user_id' => $user->id, 'module_id' => $module->id],
            ['active' => false],
        );

        if($inserOrUpdate) {
            return response()->json([
                "message" => "Module desactivated",
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
