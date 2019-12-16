@extends('ad.layout.index')
@section('content')
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                      {{session('thongbao')}}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên KH</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($users as $kh)
                           <tr class="odd gradeX" align="center">   
                            <td>{{$kh->id}}</td>
                            <td>
                            <input class="form-control" type="text" name="id" id="id" value="{{$kh->full_name}}">
                            </td>
                            <td>
                            <input class="form-control" type="text" name="id" id="id" value="{{$kh->email }}">
                            </td>
                            <td>
                            <input class="form-control" type="text" name="id" id="id" value=" {{$kh->phone }}">
                            </td>
                            <td>
                            <input class="form-control" type="text" name="id" id="id" value=" {{$kh->address }}">
                            </td>  
                            <td >
                                @if ($kh->isOnline())
                               <li class="text-success">
                                   Online
                               </li>
                               @else
                               <li class="text-muted">
                                Offline
                            </li>
                            @endif
                        </td>  
                           <!-- <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="ad/users/xoa/{{$kh->id}}">Delete</a></td> -->
                           <!-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="ad/users/sua/{{$kh->id}}">Edit</a></td> -->
                           <td class="center">  <button id="btn2" class="btn2" value="{{$kh->id}}" name="but2">Delete</button>
                           <td class="center">  <button id="btn1" value="{{$kh->id}}" name="but1">Edit</button>
                         
                           @endforeach
                       </tr>
                        </tbody>

                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        
        <script>    
        var url_request = "{{url('ad/users/suaajax')}}";
        var csrf = "{{csrf_token()}}";
        var id = $("#btn1").val();
        var nameKH = 'abc';
        var Email = 'abc@gmail.com';
        var Phone = '123456789';
        var Address = 'abcabc';
         $("#btn1").click(function() {
            var url = url_request;
            $.ajax({
            type: "POST",
            url: url_request,
            data: {
                "_token": csrf,
                id:id,
                fullname:nameKH,
                email:Email,
                phone:Phone, 
                address:Address
            },
            success: function(result) {
                alert('ok');
            },
            error: function(result) {
                alert('error');
            }
            });
        });
        var url_requestDelete = "{{url('ad/users/xoaajax')}}";
        var idDelete = $("#btn2").val();
        $(".btn2").click(function() {
            var url = url_requestDelete;
            alert("abc");
            $.ajax({
                
            type: "POST",
            url: url_requestDelete,
            data: {
                "_token": csrf,
                id:idDelete
            },
            success: function(result) {
                alert('ok');
            },
            error: function(result) {
                alert('error');
            }
            });
        });
        </script>
@endsection