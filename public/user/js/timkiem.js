$(document).ready(function(){
    $('#timkiem').keyup(function(){
        timkiem = $(this).val();
        if(timkiem != ''){
            $.get('tim-kiem', {timkiem:timkiem}, function(data){
                $('#result').html(data);
            });
        }
        else
        {
            $('#result').html();
        }
    });
});