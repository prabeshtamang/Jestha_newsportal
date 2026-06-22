<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function contact()
    {
        return view('Frontend.contact');
    }

    public function contact_store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->company_name = $request->company_name;
        $contact->service_type = $request->service_type;
        $contact->message = $request->message;
        $file = $request->banner;
        if ($file) {
            $file_name = time() . "." . $file->getClientOriginalExtension();   //hero.jpg
            $file->move('/storage', $file_name);
            $contact->banner = $file_name;
        }
        $contact->save();
        toast("Message sent successfully","success");


        return redirect('contact');
    }
}
