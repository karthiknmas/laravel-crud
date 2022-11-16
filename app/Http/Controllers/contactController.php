<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:5',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'subject' => 'required|max:100',
                'message' => 'required|max:100',
            ]
        );
        //     [
        //         'subject.required' => 'subject must be in contain a content',
        //         'message.required' => 'message should be more than 5 words',
        //         'email.required' => 'email must be valid',
        //         'email.required' => 'The email field is required',

        //     ]
        // );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $contacts = new Contact;
            $contacts->name = $request->get('name');
            $contacts->email = $request->get('email');
            $contacts->phone = $request->get('phone');
            $contacts->subject = $request->get('subject');
            $contacts->message = $request->get('message');
            $contacts->save();
            return response()->json([
                'status' => 200,
                'message' => 'Contact Added Successfully!',
            ]);
        }


        // $input = $request->all();
        // Contact::create($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        //
    }
}
