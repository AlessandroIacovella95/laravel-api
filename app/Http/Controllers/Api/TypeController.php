<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::select('id', 'color', 'label')
            ->where('id', $id)
            ->first();

        if (!$type)
            abort(404, "Type not found");
        return response()->json($type);
    }

}