@extends('base_layout._clayout')
@section('body')
    <div class="row">

        <form action="{{route('catagory.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group " style="text-align: center">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                         style="width: 200px; height: 150px;"></div>
                    <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                            Remove </a>
                        <span class="error">{{$errors->first('image')}}</span>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Name <span class="required">*</span></label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                <span class="error">{{$errors->first('name')}}</span>
            </div>

            <div class="form-group">
                <label for="title">Language</label>
                  <select name="lang">
    <option value="en">Englis</option>
    <option value="ar">Arabic</option>
   </select>

                <span class="error">{{$errors->first('name')}}</span>
            </div>
             

            <div class="form-action">
                <input type="submit" class="btn btn-primary" value="Store">
                <input type="reset" class="btn btn-default" value="cancel">
            </div>

        </form>
    </div>
@endsection
    
