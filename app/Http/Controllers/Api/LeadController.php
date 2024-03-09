<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\NewContact;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class LeadController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request using a validator
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:50',
            'surname' => 'required|max:70',
            'email' => 'required|max:100',
            'phone' => 'required|max:20',
            'content' => 'required'
        ]);

        // Check  if validation fails and return an error message
        if ($validator->fails()) {
            return response()->json([
                "error" => $validator->errors(),
                "success" => false,
            ]);
        }

        // if everything is correct create new data from the Lead model and send email
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('info@boolpress.it')->send(new NewContact($new_lead));

        return  response()->json([
            "success" => true
        ]);
    }
}
