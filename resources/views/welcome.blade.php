<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head> 
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather Forcast</title>

        <!-- Styles -->
        <style>
        body {
        background-image: url("http://backgroundcheckall.com/wp-content/uploads/2017/12/weather-background-images-9.jpg");
        }
        .center {
            margin: auto;
            width: 60%;
            padding: 10px;
            text-align: center;

        }

            html, body {
                background-color: #fff;
                color: 'black';
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }


            .title {
                font-size: 84px;
            }

            
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="center" id="m">

         <div class="title m-b-md">
                    Weather Forcast
                </div>
                <div class="center">
                    Enter your city name or your country name to know today's weather forcast
                </div>
        <input id="city">
        <button id="get">Get Weather</button>
        <div id="show"></div>
        <script type="text/javascript">
            $(document).ready(function(){
            $("#get").click(function(){
                var city = $("#city").val();
                var key = '02b5836ab2b9aa062f2352fe20935b2a';

                $.ajax({
                    url:'http://api.openweathermap.org/data/2.5/weather',
                    dataType:'json',
                    type:'Get',
                    data:{q:city, appid: key, units: 'metric'},

                    success: function(data){
                        var weatherForcast= '';
                        $.each(data.weather,function(index, val) {
                            weatherForcast += '<p><b>' + data.name + "</b></p>"+
                            data.main.temp + '&deg;c ' + ' | ' + val.main + ", " + val.description
                        });
                        $("#show").html(weatherForcast);
                    }
                });
            });
            });
            </script>
        
        </div>

    </body>
</html>
