<?php

namespace App\Http\Controllers\api;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends BaseController {
  
    public function index(Request $request) {
        $data = City::paginate($request->get('limit', 15));
        return $this->sendResponsePaginate(new CityResource($data), 'Cities retrieved successfully.');
    }
    
    public function show($id) {
        $data = City::find($id);
        if (is_null($data)) {
            return $this->sendError('City not found.');
        }
        return $this->sendResponse(new CityResource($data), 'City retrieved successfully.');
    }
   
    public function showByState(Request $request, $id) {
        $data = City::where('state_id', $id)->paginate($request->get('limit', 15));
        if (is_null($data)) {
            return $this->sendError('City not found to state['.$id.'].');
        }
        return $this->sendResponsePaginate(new CityResource($data), 'Cities from state retrieved successfully.');
    }
}
