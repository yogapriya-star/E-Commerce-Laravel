<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use Illuminate\Support\Str;
use toastr;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
         return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $subCategories = SubCategory::all();
         return view('admin.child-category.create', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subCategory' => ['required'],
            'name' => ['required', 'max:200', 'unique:child_categories,name'],
            'status' => ['required']
        ]);

        $childCategory = new ChildCategory();

        $childCategory->sub_category_id = $request->subCategory;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.child-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategories = SubCategory::all();
        $childCategory = ChildCategory::findOrFail($id);
        return view('admin.child-category.edit', compact('childCategory','subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           'subCategory' => ['required'],
           'name' => ['required', 'max:200', 'unique:child_categories,name,'.$id],
           'status' => ['required']
       ]);

        $childCategory = ChildCategory::findOrFail($id);

         $childCategory->sub_category_id = $request->subCategory;
         $childCategory->name = $request->name;
         $childCategory->slug = Str::slug($request->name);
         $childCategory->status = $request->status;
         $childCategory->save();

        toastr('Updated Successfully!', 'success');

        return redirect()->route('admin.child-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childCategory = ChildCategory::findOrFail($id);
        $childCategory->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

     public function changeStatus(Request $request){
        $childCategory = ChildCategory::findOrFail($request->id);

        $childCategory->status = $request->status == "true" ? 1 : 0;

        $childCategory->update();

        return response(['message' => 'Status has been updated!']);
     }
}
