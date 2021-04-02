<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category() {
        $categories = (object)DB::select("select * from sections");
        return view('admin.category')->with(['categories' => $categories]);
    }
    public function add_category(Request $request) {
        $category = new Section();
        $category -> title = $request->get('title');
        $category -> type = "category";
        $category -> save();

        return back()->with('success', 'Category added succesfully');
    }

    public function destroy_category($id)
    {
        $category = (object)DB::select("select * from sections where test_id=".$id);
        $category->delete();

        return redirect('/admins/categories')->with('success', 'Category deleted!');
    }
    public function update_category_page($id) {
        $category = (object)DB::select("select * from sections where test_id=".$id);

        return view('admin.updatecategory')->with(compact('category'));
    }
    public function update_category(Request $request,$id) {
        $category = (object)DB::select("select * from sections where test_id=".$id);
        $category -> title = $request->get('title');
        $category -> save();

        return redirect('/admins/categories')->with('success', 'Contact updated!');
    }
}