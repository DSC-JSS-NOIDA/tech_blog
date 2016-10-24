$("#active").hide();

$(document).ready(function(){
    function checkevent(){
        // console.log(1);
        $.ajax({
            type: 'GET',
            url: 'home/checkevent',
            data: '',
            success: function(data){
                console.log('1');
                if(data==1)
                {
                    $("#inactive").hide();
                    $("#active").show();
                }
                else
                {
                    $("#active").hide();
                    $("#inactive").show();
                }
            }
        });
    }
    setInterval(checkevent,500);
});