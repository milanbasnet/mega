<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        // joining tables using query builder and with eloquent orm(tala ko method) we worked in category model
        // $categories=DB::table('categories')
        //                 ->join('users', 'categories.user_id', 'users.id') // join categories with users table(categories ko user_id filed and users ko id field)
        //                 ->select('categories.*', 'users.name') //select category ko all and users ko name 
        //                 ->latest()->paginate(5);

        $categories=Category:: latest()->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function addCategory(Request $request){
        $this->validate($request, [
            'categoryName'=> 'required'
        ],
        [
            'categoryName.required'=>'Please input category name',  // customized error message for catName of required
        ]
        );

        $store= new Category();
        $store->category_name=$request->categoryName;
        $store->user_id=Auth::User()->id;
        $store->save();

        return back()->with('success', 'Category Inserted Successfully');
    }

    public function categoryEdit($id){
        $edit= Category:: find($id);
        return view('admin.category.edit', compact('edit'));
    }
    public function updateCategory(Request $request, $id){
        $this->validate($request,[
            'categoryName'=> 'required'
        ]);
        $update= Category::find($id);
        $update->category_name=$request->categoryName;
        $update->user_id=Auth::User()->id;
        $update->save();
          return redirect()->route('category')->with('success', 'Category updated successfully');
        
    }

        // // to update we can do this way also
        // public function updateCategory(Request $request, $id){
        //   $update= Category::find($id)->update([
        //       'category_name'=>$request->categoryName,
        //       'user_id'=>Auth::User()->id
        //   ]);
        //   return redirect()->route('category')->with('success', 'Category updated successfully');
        // }
}
