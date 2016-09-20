$(document).ready(function(){
    function checkevent(){
        console.log(1);
        $.ajax({
            type: 'POST',
            url: 'http://localhost/tech_blog/checkevent',
            data: "val=100",
            success: function(data){
                console.log(data);
         		console.log("Good");
            }
        });
    }
    setInterval(checkevent,5000);
});