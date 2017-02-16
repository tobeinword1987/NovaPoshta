<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script language="JavaScript">
        $( document ).ready(function() {
            $('#ajax').click(function () {
                var data = $('#data').val();
                var days = $('#days').val();
                var sign = $('#sign').val();
                $.ajax({
                    type: "POST",
                    url: "",
                    data: "data="+data+"&days="+days+"&sign="+encodeURIComponent(sign),
                    success: function(msg){
//                        alert( "Data Saved: " + msg );
                        $('#calc').val(msg[0]);
                        $('.message').html(msg[1]);
                    },
                    async: true,
                    dataType: "json"
                });
            });
        });
    </script>
    <style>
        #days, #data{
            width:150px;
            display: inline-block;
        }

        #sign{
            width: 50px;
            display: inline-block;
        }

        body{
            padding: 10px;
        }
    </style>
</head>
<body>
<form role="form" method="post">
    <div class="alert alert-success" id="success-alert">
        <div class="message"><?= $userInfo['error']?></div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <input type="text" class="form-control" id = "data" name = "data" value="<?= $_POST['data'] ?>" placeholder="YYYY/mm/dd">
            <input pattern="[+-]{1}" type="text" class="form-control" id="sign"  name = "sign" value="<?= $_POST['sign'] ?>" placeholder="+/-">
            <input type="text" class="form-control" id="days"  name = "days" value="<?= $_POST['days'] ?>" placeholder="days">
        </div>
    </div>
    <div class="col-sm-6">
        <input type="submit" class="btn btn-success" name="submit" value="POST"/><br><br>
        <input type="button" class="btn btn-success" value="AJAX" id = "ajax"/>
    </div>
    <div class="col-sm-12">
        <label for="result">Result</label>
        <input type="text" class="form-control" id="calc"  name = "result" value="<?= $userInfo['result'] ?>">
    </div>
</form>
</html>