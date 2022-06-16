<?php
   
namespace App\Http\Controllers\API;
 
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\StateResource;
use App\Models\State;
   
class StateController extends BaseController {
    public function index() {
        $data = State::all();
        return $this->sendResponse(StateResource::collection($data), 'States retrieved successfully.');
    }

    public function show($id) {
        $data = State::find($id);
        if (is_null($data)) {
            return $this->sendError('State not found.');
        }
        return $this->sendResponse(new StateResource($data), 'State retrieved successfully.');
    }
}