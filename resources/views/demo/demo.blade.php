<!DOCTYPE html>
<html lang="en">
<script>
var url_request = "{{url('demo1')}}";
var csrf = "{{csrf_token()}}";
</script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
   <button id ='btn1'>button</button>
</body>

<script>
$('#btn1').click(function(){
    var url = url_request;

    $.ajax({
        type: "post",
        url: url,
        data: {"_token": csrf,bien1:'bbb',bien2:'ccc'},
        cache: false,
        success: function(data){
            if(data.status == 1){
                alert(data.var2);
            }else {
                alert('can them tien');
            }
            
        },
        error: function(){
            alert('ajax call error');
        }
    });
});
</script>
</html>