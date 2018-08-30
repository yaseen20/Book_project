 
@extends('base_layout._clayout')
@section('body')
    <div class="row">

        <form action="{{route('catagory.update',['id' => $catagory->id])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group " style="text-align: center">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                         style="width: 200px; height: 150px;">
                        <img src="{{$catagory->image}}" alt="">

                    </div>
                    <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>

                                                                <input type="file" name="image"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                            Remove </a>


                    </div>
                    <span class="error">{{$errors->first('cat_image')}}</span>
                </div>
            </div>
            
             
            
             
            <div class="form-group">
                <label for="isbn">Name<span class="required">*</span></label>
                <input type="text" class="form-control" name="name" value="{{$catagory->name}}">
                <span class="error">{{$errors->first('name')}}</span>

            </div>
            

            <div class="form-action text-center">
                <input type="submit" class="btn btn-primary" value="Edit">
                <a href="{{route('catagory.index')}}" class="btn btn-default">Cancel</a>
            </div>

        </form>
    </div>
@endsection