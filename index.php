<!DOCTYPE html>
<html>
<style>
</style>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>


<!--  THIS  IS  A WEATHER  FORECAST  FOT  9  DAYS-->



<!--START  Variant  3 Json  for  16  days  WORKING!!!!!!!!!!!!!------------------------------------------------------------------------------->
<?php
//This  is   working-  fetching  just  JSON FORMAT***************************************************
echo htmlspecialchars(file_get_contents('http://api.openweathermap.org/data/2.5/forecast/daily?q=Kyiv&mode=json&units=metric&cnt=7&appid=2de143494c0b295cca9337e1e96b00e0')); 
?>


<!------------------------------------- VARIANT 4  Shows  eaither  temperure  or    condition THE  BEST---------------------------------------------->
<hr style="width:98%;background:black;height:8px;">
<div ><h1>Weather  in Kyiv  for  9 days</h1></div>
<div id="weather"></div>
<div id="weather2"></div>
<div id="weather3"></div>

<script>
var data_url="http://api.openweathermap.org/data/2.5/forecast/daily?q=Kyiv&mode=json&units=metric&cnt=7&appid=2de143494c0b295cca9337e1e96b00e0";

//function to pull information out of the json file and stick it into an HTML element
getWeather(function (data) {



//Getting date
var d=new Date();
var x=d.getDate(); var y=d.getMonth()+1;   wDate=x+"."+y;
//END  getting  date


//getting  tem  to  var  and  to  Celcium
//var t=data.main.temp; t=t-272; t=Math.round(t);

//First  DAY
    var weather_html = wDate+" "+data.city/*[0]*/.name/*description*/ +" t:  "+ data.list[0].temp.day+" "+data.list[0].weather[0].main;
    document.getElementById('weather').innerHTML = weather_html;

//Second  DAY
var d1=new Date(new Date().getTime() + 24 * 60 * 60 * 1000); var x1=d1.getDate(); if(x1<10){x1='0'+x1;} var y1=d1.getMonth()+1;   wDate1=x1+"."+y1;
 var weather_html2 =wDate1+" "+ data.city.name +" t:  "+ data.list[1].temp.day+" "+data.list[1].weather[0].main;
    document.getElementById('weather2').innerHTML = weather_html2;
//END  SECOND  DAY


//3rd  DAY
var d2=new Date(new Date().getTime() + 48 * 60 * 60 * 1000); var x2=d2.getDate(); if(x2<10){x2='0'+x2;} var y2=d2.getMonth()+1;   wDate2=x2+"."+y2;
 var weather_html3 =wDate2+" "+ data.city.name +" t:  "+ data.list[2].temp.day+" "+data.list[2].weather[0].main;
    document.getElementById('weather3').innerHTML = weather_html3;
//END  3rd




});
// function to use jsonp to get weather information
function getWeather(callback) {
    $.ajax({
        dataType: "jsonp",
        url: data_url,
        success: callback
    });
};
</script>

<!--END  Variant  3 Json  for  16  days ------------------------------------------------------------------------------->









</body>
</html>