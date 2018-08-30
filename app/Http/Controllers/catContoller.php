<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use File;

class catContoller extends Controller
{


    /**
     *
     * show category's form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_cat(){
       
       return view('catagory.catagory');

    } 
    
    /**
     *
     * Store new category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request){
       
        $cat = new category();
        $cat->fill($request->all());
        $cat->save();

        $result = $cat->save();
        if ($result === TRUE) {
            return redirect()->back()->with('success', 'book has been saved successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');

    }

    /**
     *
     * show update form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            $catagory = category::findOrFail($id);
            return view('catagory.edit', compact('catagory'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('category.index')->with('error', 'catagory is not found');
        }
    }
 
    /**
     *
     * Update category’s data
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id){
    
        try {
            $catagory = category::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('catagory.index')->with('error', 'category is not found');
        }
        $request->validate($this->rules($id), $this->messages());
        
           $request['image'] = parent::uploadImage($request->file('image'));
      
        $catagory->fill($request->all());
        $catagory->update();
        return redirect()->route('catagory.index')->with('success', 'category has been updated successfully');
    }
     

     /**
     *
     * show all categories
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $catagory = category::paginate(10);
        $catagory = category::where([]);
        if ($request->has('name'))
        $catagory = $catagory->where('name', 'like', '%' . $request->input('name') . '%');
        if ($request->has('lang'))
        $catagory = $catagory->where('lang', 'like', '%' . $request->input('lang') . '%');
 
         $data['catagory'] = $catagory->paginate(10);
        return view('catagory.index', $data);

    }
    

    /**
     *
     * SoftDelete category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id){
    
        try{
         
             $category = category::findOrFail($id);
             $category->delete();
             return redirect()->back()->with('success', 'its done!');
         
         }catch(ModelNotFoundException $exception){
            echo'stats code : '.$exception->getMessage();
        }
        
    }


    private function rules($id = null)
    {
        $rules = [
            'name' => 'required',
            
        ];
        if ($id) {
            
             $rules['image'] = 'required|mimes:jpeg,png,bmp,jpg';
        }

        return $rules;
    }


    private function messages()
    {
        return [
            'name.required' => 'Name is required',
            
            'image.required' => 'category image is required',
            'image.mimes' => 'Invalid image',
        ];
    }




}