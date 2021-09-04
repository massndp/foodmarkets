<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $type = $request->input('type');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');
        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if($id)
        {
            $food = Food::find($id);

            if($food){
                return ResponseFormatter::success(
                    $food, 'Data makanan berhasil diambil'
                );
            }else{
                return ResponseFormatter::error(
                    null, 'Data makanan tidak ada', 404
                );
            }
        }

        $food = food::query();

        if($food)
        {
            $food->where('name', 'like', '%' . $name . '%');
        }

        if($type)
        {
            $food->where('type', 'like', '%' . $type . '%');
        }

        if($price_from)
        {
            $food->where('price', '<=', $price_from);
        }

        if($price_to)
        {
            $food->where('price', '>=', $price_to);
        }

        if($rate_from)
        {
            $food->where('rate', '<=', $rate_from);
        }

        if($rate_to)
        {
            $food->where('rate', '>=', $rate_to);
        }

        return ResponseFormatter::success(
            $food->paginate($limit), 'Data list makanan berhasil diambil'
        );

    }
}
