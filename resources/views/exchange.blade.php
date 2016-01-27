<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Currency converter</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
    <p>Current rates are: <?= $model ?></p>
    <form action="{{ asset('/') }}">
        <p><input type="radio" name="model" value="ECB">European Central Bank</p>
        <p><input type="radio" name="model" value="NBU">National Bank of Ukraine</p>
        <p><input type="submit" value="apply"></p>
    </form>
        <center>
            <div class="form">
                <p>Simple converter</p>
                <div class="amount">
                    <input type="input" id="amount" placeholder="quantity">
                </div>
                <select id="cur_init">
                    <?php
                        for ($i=0; $i<count($data->rate); $i++){
                            echo '<option value="' . $data->rate[$i]
                                    . '">' . $data->currency[$i] . '</option>';
                        }
                    ?>
                </select>

                <a> => </a>

                <select id="cur_final">
                    <?php
                        for ($i=0; $i<count($data->rate); $i++){
                            echo '<option value="' . $data->rate[$i]
                                    . '">' . $data->currency[$i] . '</option>';
                        }
                    ?>
                </select>
                <div class="result">
                    <a id="result"></a>
                </div>
            </div>
        </center>
        <script>
            (function(){
                $('#rate_init').text($('#cur_init option:selected').val());
                $('#amount').on('change', Calculate);
                $('#cur_init').on('change', Calculate);
                $('#cur_final').on('change', Calculate);
                $('#btn').on('click', Calculate);

            })();
            function Calculate(){
                var rate_init = $('#cur_init option:selected').val();
                var amount = $('#amount').val();
                var result_init = amount / rate_init;

                var rate_final = $('#cur_final option:selected').val();
                var result_final = result_init * rate_final;

                if(result_final > 0) {
                    $('#result').text(result_final.toFixed(2));
                }
            }
        </script>
    </body>