$(document).ready(function()
{
    $("#szopran").click(function()
    {
        $("#hely").html("");

        $("#hely").append("<h1>Teszt sor kívül</h1>");

        $.getJSON("tagok.json", function(data)
        {

            $("#hely").append("Teszt sor belül");

            for ( let i = 0; i < data.tagok.length; i ++)
            {
                $("#hely").append("Név: " + data.tagok[i].nev);
            }

            if ( data.tagok.szolam = "szoprán")
            {
                $("#hely").append("Név: " + data.tagok.nev);
            }


            
        });
    });
});