 @extends('base_layout._clayout')
@section('style')
    <style>
        .fa-book, .fa-search {
            margin-right: 5px;
        }
     </style>
@endsection
@section('body')
   <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-search"></i>Search</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">                            
                            <form action="" method="GET">
                                 <div class="col-sm-6 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{app('request')->get('name')}}">
                                </div>
                                
                                <div class="col-sm-7 form-group">
                                  <select name="lang">
                                    <option value="en">Englis</option>
                                    <option value="ar">Arabic</option>
                                  </select>
                                </div>
                                <div class="col-sm-3 form-action text-right">
                                    <input type="submit" class="btn btn-primary" value="Search">
                                    <a href="{{route('catagory.index')}}" class="btn btn-default">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-book"></i>Categories</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th  style="text-align: center">Name</th>
                             <th style="text-align: center">Language</th>
                             <th style="text-align: center">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($catagory as $cat)
                            <tr>
                                <td  style="text-align: center">{{$cat->name}}</td>
                                <td  style="text-align: center">{{$cat->lang}}</td>
                                 
                              <td style="text-align: center">
                                    <a href="" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger remove-book"
                                       title="Remove"
                                       data-value="{{$cat->id}}"
                                             href="{{route('catagory.destroy',['id' => $cat->id])}}" 
                                        >
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                     
                </div>
            </div>
        </div>
    </div>
@endsection







  