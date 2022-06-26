<!DOCTYPE html>
<html lang="en">

<head>
    <title>Weather App</title>
    <style>
        #city-input,
        #weather-output {
            max-width: 400px;
            margin: 0 auto;
        }
        
        .banner {
            color: #95ff3f;
            font-family: sans-serif;
        }
        
        main {
            background-color: #3fa2ff;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css">
    <script>
        /**
         * Weather App
         */

        // API_KEY for maps api
        let API_KEY = "583bd50af182a48e58f2cac713657251";

        /**
         * Retrieve weather data from openweathermap
         */
        getWeatherData = (city) => {
                const URL = "https://api.openweathermap.org/data/2.5/weather";
                const FULL_URL = `${URL}?q=${city}&appid=${API_KEY}&units=imperial`;
                const weatherPromise = fetch(FULL_URL);
                return weatherPromise.then((response) => {
                    return response.json();
                })
            }
            /**
             * Retrieve city input and get the weather data
             */
        searchCity = () => {
                const city = document.getElementById('city-input').value;
                getWeatherData(city)
                    .then((res) => {
                        showWeatherData(res);
                    }).catch((error) => {
                        console.log(error);
                        console.log("Something happend");
                    })
            }
            /**
             * Show the weather data in HTML
             */
        showWeatherData = (weatherData) => {
            document.getElementById("city-name").innerText = weatherData.name;
            document.getElementById("weather-type").innerText = weatherData.weather[0].main;
            document.getElementById("temp").innerText = weatherData.main.temp;
            document.getElementById("min-temp").innerText = weatherData.main.temp_min;
            document.getElementById("max-temp").innerText = weatherData.main.temp_max;
            document.getElementById("weather-output").classList.add('visible');
        }
    </script>
</head>

<body class="text-center">
    <main>
        <h1 class="banner p-3">Rich's Weather Page</h1>
        <div class="form-group">
            <input id="city-input" class="form-control form-control-lg" type="text" placeholder="Search city">
        </div>
        <button type="button" onclick="searchCity()" class="btn btn-lg btn-dark">Search</button>
        <div id="weather-output" class="mt-3">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 id="city-name" class="my-0 font-weight-normal">----</h4>
                    </div>
                    <div class="card-body">
                        <h1 id="weather-type" class="card-title">----</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Temp: <span id="temp">--</span>°</li>
                            <li>Min Temp: <span id="min-temp">--</span>°</li>
                            <li>Max Temp: <span id="max-temp">--</span>°</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>