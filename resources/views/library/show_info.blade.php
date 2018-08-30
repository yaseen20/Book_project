 @extends('base_layout._Llayout')
@section('style')
    <style>
        .fa-book, .fa-search {
            margin-right: 5px;
        }
     </style>
@endsection
@section('body')
    
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-book"></i>Library</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th  style="text-align: center">Name</th>
                            <th  style="text-align: center">Phone</th>
                            <th  style="text-align: center">Address</th>
                            <th  style="text-align: center">Email</th>
                            <th  style="text-align: center">Fax</th>
                            <th style="text-align: center">Language</th>
                            <th style="text-align: center">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($library as $lib)
                            <tr>
                                <td  style="text-align: center">{{$lib->name}}</td>
                                <td  style="text-align: center">{{$lib->phone}}</td>
                                <td  style="text-align: center">{{$lib->address}}</td>
                                <td  style="text-align: center">{{$lib->email}}</td>
                                <td  style="text-align: center">{{$lib->fax}}</td>
                                <td  style="text-align: center">{{$lib->lang}}</td>
                                 
                              <td style="text-align: center">
                                    <a href="{{route('library.edit',['id' => $lib->id])}}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger remove-book"
                                       title="Remove"
                                       data-value="{{$lib->id}}"
                                              href="{{route('library.destroy',['id' => $lib->id])}}" 
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








  