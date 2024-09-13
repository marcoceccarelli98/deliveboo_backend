<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Http\Resources\TypeResource;
use Illuminate\Http\Request;

class TypeApiController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return TypeResource::collection($types);
    }
}
