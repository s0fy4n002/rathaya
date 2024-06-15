<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use Illuminate\Http\JsonResponse;

class ChooseareaController extends Controller
{
    public function fetchRegency(Request $request): JsonResponse
    {
        $data['regencies'] = Regency::where("province_id", $request->province_id)
                                ->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchDistrict(Request $request): JsonResponse
    {
        $data['districts'] = District::where("regency_id", $request->regency_id)
                                    ->get(["name", "id"]);
        return response()->json($data);
    }
}
