<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{

    public function admin()
    {
        $contacts = Contact::with("category")->get();
        $contacts = Contact::paginate(7);
        $categories = Category::all();
        return view("admin", compact("contacts", "categories"));
    }

    public function login()
    {
        return view("admin.login");
    }

    public function search(Request $request)
    {
        $contacts = Contact::with("category")
                    ->KeywordSearch($request->keyword)
                    ->GenderSearch($request->gender)
                    ->CategorySearch($request->category_id)
                    ->DateSearch($request->created_at)
                    ->get();
                    //検索結果が反映されない
                    $contacts = Contact::paginate(7);
        $categories = Category::all();

        return view("admin", compact("contacts", "categories"));
    }
    //
}
