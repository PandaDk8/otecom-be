<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ListProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"product"},
     *     summary="Get list products",
     *     operationId="getProducs",
     *     @OA\Parameter(
     *         name="keyword",
     *         in="query",
     *         description="Keyword",
     *         required=false,
     *     @OA\Schema (type="string")
     *     ),
     *     @OA\Parameter (
     *         name="category",
     *         in="query",
     *         description="Category slug",
     *         required=false,
     *          @OA\Schema(
     *                  type="string"
     *           )
     *      ),
     *     @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         description="Language for data. One of `en`,`vi`. Default `en`",
     *         required=false,
     *          @OA\Schema(
     *             default="en",
     *             type="string",
     *             enum={"en", "vi"},
     *         )
     *     ),
     *     @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="Length per page, default `8`",
     *          required=false,
     *          @OA\Schema(
     *                  type="integer"
     *           )
     *      ),
     *         @OA\Parameter(
     *          name="page",
     *          in="query",
     *          description="Page index ( for load more function ), default `1`",
     *          required=false,
     *          @OA\Schema(
     *                  type="integer"
     *           )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",     *
     *     ),
     *     @OA\Response(
     *     response=400,
     *         description="Bad Request",
     * )
     * )
     */
    public function getProducts(Request $request)
    {
        $query = Product::query();

        if ($keyword = $request->input('keyword')) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%")->orWhere("description", "like", "%$keyword%");
            });
        };
        if ($cSlug = $request->input('category')) {
            $productIDs = DB::table('categories')->where("slug", $cSlug)->pluck('id')->toArray();
            $query->whereIn("category_id", $productIDs);

        }
        $limit = $request->input('limit', 4);
        if ($page = $request->input("page")) {
            $data = $query->paginate($limit);
            return response()->json([
                "currentPage" => $data->currentPage(),
                "data" => ProductResource::collection($data),
                "next_page" => $data->currentPage() < $data->lastPage()
            ]);
        }
        $data = $query->take($limit)->get();
        return ProductResource::collection($data);
//        Hết ùiiii
    }
}
