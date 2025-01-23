<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with("category")->get();
        $categories = Category::all();
        return view("index", compact("contacts", "categories"));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(["last_name", "first_name", "gender", "email", "tel-1", "tel-2", "tel-3", "address", "building", "category_id", "detail",]);

        return view("confirm", compact("contact"));
    }

    public function store(Request $request)
    {
        if($request->input("back") == "back")
        {
            return redirect("/")->withInput();
        }

        $contact = $request->only(["last_name", "first_name", "gender", "email", "tel", "address", "building", "category_id", "detail",]);
        Contact::create($contact);

        return view("thanks");
    }
}
