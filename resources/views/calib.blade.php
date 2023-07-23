<!DOCTYPE html>
<html lang="en">

<head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <style>
    </style>
    <title>Calibrate</title>

</head>
    
    
<body>

    <div class="container p-5">
        <div class="row">
            <div class="col-lg-2"></div>
            <?php
                if($suc!=1){
            ?>
            <div class="col-lg-8">
                <p>
                Put known weight on the scale and Write how many grams it was: 
                </p>

                <?php
                    if( $suc == 'u' ){
                ?>
                    <div class="alert alert-warning" role="alert">
                        Tare is Unsuccessful !!! Try Again.
                    </div>
                <?php
                    }
                ?>
                <form method='post' action="{{url('check-calibration')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="number" step="0.0000001" placeholder="Enter known weight" required class="form-control border-1 shadow-sm form-control" name="val">
                    </div>
                    <div class="text-center">                     
                        <button type="submit" class="btn btn-primary btn-block text-uppercase m-2 shadow-sm"> Enter </button>
                    </div>  
                </form>


            </div>
            <?php
                }
                else {
            ?>
                <div class="col-lg-8">
                    <div class="alert alert-success">
                        <p> Successfully Calibrated. <a href="{{ url('weight') }}">Let's weight</a>  </p>
                    </div>
                </div>

            <?php 
                }
            ?>

            <div class="col-lg-2"></div>
        </div>
    </div>


</body>
</html>


