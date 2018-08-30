@extends('base_layout._Llayout')
@section('body')
    <div class="row">

     <form action="{{route('library.store')}}" method="POST" enctype="multipart/form-data">
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
                <label for="name">Name <span class="required">*</span></label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                <span class="error">{{$errors->first('name')}}</span>
            </div>
            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                <span class="error">{{$errors->first('email')}}</span>
            </div>
            <div class="form-group">
                <label for="fax">Fax <span class="required">*</span></label>
                <input type="text" class="form-control" name="fax" value="{{old('fax')}}">
                <span class="error">{{$errors->first('fax')}}</span>
            </div>
            <div class="form-group">
                <label for="phone">Phone <span class="required">*</span></label>
                <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                <span class="error">{{$errors->first('Phone')}}</span>
            </div>
            <div class="form-group">
                <label for="address">Address <span class="required">*</span></label>
                <input type="text" class="form-control" name="address" value="{{old('address')}}">
                <span class="error">{{$errors->first('address')}}</span>
            </div>
            <div class="form-group">
                <label for="lang">Lang <span class="required">*</span></label>
                <select name="lang">Languge
                    <option value="en">English</option>
                    <option value="ar">Arabic</option>
                </select>
                <span class="error">{{$errors->first('lang')}}</span>
            </div>
            <div class="form-action">
                <input type="submit" class="btn btn-primary" value="Store">
                <input type="reset" class="btn btn-default" value="cancel">
            </div>

        </form>
    </div>
@endsection
    
