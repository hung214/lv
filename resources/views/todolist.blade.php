<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo-List</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="/assets/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <style>
        table button {
            margin-left: 20px
        }
    </style>
</head>
<body id="app-layout">

{{-- @dump($list) --}}
    <nav class="navbar navbar-default">
         <div class="container">
            <a class="navbar-brand" href="#">Todolist</a>
        </div>
    </nav>
    <div class="container">

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">New Task</h5>
                <form class="form-inline" action="{{env('APP_URL')}}/todolist" method="POST">

                    <div class="form-group col-md-10 col-lg-10 col-sm-10">
                        <input type="text" name="taskname" class="form-control col-md-12 col-sm-12" id="task" placeholder="Task Name" >
                    </div>
                    <button class="btn btn-primary">save</button>

                    {{ csrf_field() }}


                </form>
            </div>
        </div>
        <!-- Current Tasks -->
        <div class="card card-default">
            <div class="card-body" id="card">
                <table class="table table-striped task-table" >
                    <tbody>
                        @if($list AND count($list))
                            @foreach($list as $i=>$v)
                            <tr k="{{ $v->id }}">
                                <td>
                                    <span class="list">
                                        @if($v->doen)
                                            <del>{{ $v->name }}</del>
                                        @else
                                            {{ $v->name }}
                                        @endif
                                    </span>
                                <input type="text" name="e_{{ $v->id }}" id="list{{ $v->id }}" v-show="false"  class="form-control" value="{{ $v->name }}" required="required" pattern="" title="">

                                </td>
                                <!-- Task Buttons -->
                                <td class="text-md-right text-sm-right">
                                        <button class="btn btn-success" <?=($v->doen==1)?'disabled':''?> onclick="completed({{ $v->id}})">completed</button>
                                    <a href="/todolist/{{ $v->id }}/edit"> <button class="btn btn-primary" >edit</button></a>
                                        {{-- <button class="btn btn-primary" onclick="edit('list{{ $v->id }}')">edit</button> --}}
                                        <button class="btn btn-danger" onclick="del({{$v->id}})">delete</button>
                                </td>
                            </tr>
                            {{-- @dump(); --}}
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <div id="root">
        <h1>Hello,@{{name}},@{{address}}</h1>
    </div> --}}
     <script>
    Vue.config.productionTip=false ;//以阻止 vue 在启动时生成生产提示。
    // Vue.config.devtools = true;
    Vue.config.devtools = true
    new Vue({
        el:'#card',
        data:{
            isShow:false,
            name:'44564',
            address:'好東西'
        }
    })
    </script>
    <script>
    function edit(e){
        console.log(this);
        console.log(e);
        $('#'+e).css("display","")


    }
    function completed(id){
        $.ajax({
          url:"{{env('APP_URL')}}/todolist/"+id,
          method:'put',
          dataType:'json',
          data:{
              'id':id,
              'doensw':1,
              '_token':'<?php echo csrf_token() ?>',
          },
          success:function(res){
            console.log(res)
            location.reload()
          },
          error:function(err){
            console.log(err)
          },
        });

    }
    function del(e) {
    var msg = "您真的確定要刪除嗎？\n\n請確認！";
        if (confirm(msg)==true){
            // return true;
            delete1(e);
        }else{
            return false;
        }
    }
    function delete1(id){
        $.ajax({
          url:'/todolist/'+id,
          method:'delete',
          dataType:'json',
          data:{
            //   'id':id,
            //   'doensw':1,
              '_token':'<?php echo csrf_token() ?>',
          },
          success:function(res){
            console.log(res)
            location.reload()
          },
          error:function(err){
            console.log(err)
          },
        });

    }
</script>

</body>




        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>
