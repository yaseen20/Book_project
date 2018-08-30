<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class librController extends Controller
{   

    /**
     *
     * show library's form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
    	return view('library.create');
    }

    /**
     *
     * Store new library
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request){

    	$library = new Library();
    	$library->fill($request->all());
    	$library->save();
        $result = $library->save();
        if ($result === TRUE) {
           return redirect()->back()->with('success', 'Library has been saved successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');

    }

     /**
     *
     * show all libraries
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){

        $library = Library::where([]);
        if($request->has('name')){
            $library = $library->where('name', 'Like' , '%' .$request->input('name') . '%');
        }if($request->has('lang')){
            $library = $library->where('lang', 'Like' , '%' .$request->input('lang') . '%');
        }if($request->has('adress')){
            $library = $library->where('adress', 'Like' , '%' .$request->input('adress') . '%');
        }

        $data['library'] = $library->paginate(10);
        return view('library.index',$data);
    }

     /**
     *
     * show update form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
     
     try{
     
        $library = Library::findOrFail($id);
        return view('library.edit',compact('library'));

     } catch(ModelNotFoundException $exception){

        return redirect()->route('catagory.index')->with('error', 'category is not found');
       
       }
  
    }

    /**
     *
     * Update library’s data
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request ,$id){
        try {
                $library = Library::findOrFail($id);
         } catch (ModelNotFoundException $exception) {
            return redirect()->route('library.index')->with('error', 'library is not found');
        }
        
    $request->validate($this->rules($id), $this->messages());
    $request['image'] = parent::uploadImage($request->file('image'));
      
    // $library->fill($request->all());
    //$library->update();
     return redirect()->route('library.index')->with('success','library has been updated successfully');         
    }

    /**
     *
     * SoftDelete Library
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id){
       
        try {
        $library = Library::findOrFail($id);
        $library->delete();
        return redirect()->back()->with('success', 'its done!');
        } catch(ModelNotFoundException $exception){
            echo'stats code : '.$exception->getMessage();
          }
    }

    /**
     *
     * show information for all Libraries
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_info(Request $request){

        $library = new Library();
        $data['library'] = $library->paginate(10);
        return view('library.show_info',$data);
    }





        private function rules($id = null){

        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'fax' => 'required',
            'address' => 'required',
            'lang' => 'required',
            'image'=>'required'
        ];
        if ($id) {

            $rules['image'] = 'required|mimes:jpeg,png,bmp,jpg';
        }
           return $rules;
        }


    private function messages() {
   
        return [
            'name.required' => 'name is required',
            'phone.required' => 'phone is required',
            'fax.required' => 'fax is required',
            'email.required' => 'email is required',
            'address.required' => 'address is required',
            'lang.required' => 'lang is required',
            'isbn.unique' => 'isbn key is duplicated',
            'image.required' => 'image is required',
            'image.mimes' => 'Invalid image',
        ];
    }
     
}
