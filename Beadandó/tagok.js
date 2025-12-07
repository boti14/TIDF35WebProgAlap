$(document).ready(function()
{
    $("#szopran").click(function()
    {
        $("#hely").html("");

        $("#hely").append("<h1>Szoprán kórustagok</h1>");

        $.getJSON("tagok.json", function(data)
        {

            $("#hely").append("Teszt sor belül");

            for ( let i = 0; i < data.tagok.szopran.length; i ++)
            {
            
                $("#hely").append("<b> Név: </b> &nbsp;" + data.szopran[i] + "<br><br>");
                
                $("hely").append("<li>" + data.tagok["szopran"][i].nev + ":&nbsp;" + data.tagok["szopran"][i].szolam + "</li>");
            }

            if ( data.tagok.szolam = "szoprán")
            {
                $("#hely").append("Név: " + data.tagok.nev);
            }


            
        });
    });
});