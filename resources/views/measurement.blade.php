<!DOCTYPE html>
<html lang="en">

<head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    
    <title>Measurement</title>

</head>
    
    
<body>


    <div class="container m-5">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center">
                <?php
                    if( $detect == '0' ) {
                ?>
                    <div class="alert alert-danger">
                        <p> Error in Object detection or Measurement. <a href="{{url('weight')}}">Try Again.</a> </p>
                    </div>

                <?php 
                    }
                    else {
                ?>
                    <div class="alert alert-success">
                       <p>Detected Object : {{ $detect }}</p>
                       <p>Measured Weight : {{ $weight }} gram/s</p>
                       <form method='post' action="{{url('add-to-cart')}}">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="detect" value="{{ $detect }}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="weight" value="{{ $weight}}">
                        </div>
                            <button type="submit" class="btn btn-success">Add to Cart</button>
                        </form>
                    </div>

                <?php 
                    }
                ?>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

</body>
</html>