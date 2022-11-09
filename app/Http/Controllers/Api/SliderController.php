<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SliderController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/slider",
     *     tags={"slider"},
     *     summary="Get list slider",
     *     operationId="getAllSlider",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     )
     * )
     */
    public function index()
    {
        $sliders = Slider::all();
        $obj = (object)[
            'status' => true,
            'message' => "Success",
            'data' => $sliders
        ];
        return response()->json($obj, 200);
    }

}
