<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = Item::all();
       return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png'
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->input('name'));

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/items'))
            {
                mkdir('uploads/items', 0777 , true);
            }
            $image->move('uploads/items',$imageName);
        }else{
            $imageName = 'default.png';
        }

        $item = new Item();
        $item->name = $request->input('name');
        $item->category_id = $request->input('category');
        $item->price = $request->input('price');
        $item->description = $request->input('description');
        $item->image = $imageName;
        $item->save();
        return redirect()->route('item.index')->with('successMsg', 'Item Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
