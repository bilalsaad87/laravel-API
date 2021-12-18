<?php

namespace App\Http\Controllers;

// use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Category::all();
        return DB::table('categories')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'Parent_ID' => 'required'
        ]);

        //return Category::create($request->all());
        return DB::table('categories')->insert([
            'name' => $request->name,
            'Parent_ID' => $request->Parent_ID,
            'Created_at' => \Carbon\Carbon::now(),
            'Updated_at' => \Carbon\Carbon::now()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Category::find($id);
        return DB::table('categories')->where('id', $id)->get();
    }

    public function categoryParent($parent_id)
    {

        $query = DB::table('categories')
                        ->where('Parent_ID', $parent_id)
                        ->orderBy('id', 'asc')
                        ->get();
      
        
        return $query;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $category = Category::find($id);
        // $category->update($request->all());
        // return $category;

        $request->validate([
            'name' => 'required',
            'Parent_ID' => 'required'
        ]);

        // check for fields
        return DB::table('categories')
                ->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'Parent_ID' => $request->Parent_ID,
                    'Updated_at' => \Carbon\Carbon::now()
                ]);
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = Category::findOrFail($id);
        // return $category->delete();

        return DB::table('categories')->where('id', $id)->delete();
    }
}
