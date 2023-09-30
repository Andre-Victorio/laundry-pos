
$('#signinForm').submit(function(e){
    var data = $("#signinForm").serialize();
    $.ajax({
        type : 'POST',
        url : '../src/php/signin_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            if(res["status"] == 200){
                if(res["role"] == "Employee")
                    window.location.replace('../public/user/dashboard.php'); 
                else 
                    window.location.replace('../public/admin/dashboard.php');
            } else{
                alert(res["message"]);
                $('#signinForm')[0].reset();
            }
        }
    });
    e.preventDefault();
})