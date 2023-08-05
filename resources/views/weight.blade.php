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
    <title>Let's Weight</title>

</head>
    
    
<body>

<?php 
    if( $cal == 0 ){
?>
<div class="text-center m-5">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="alert alert-danger p-2">
                <p>System is not Calibrated.</p>
            </div>
            <a href="{{url('calibration')}}" class="btn btn-outline-dark" style="width:11rem;">Calibrate Once</a>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<?php
}
else {
?>

<div class="container text-center p-2">
    <div class="alert alert-success">
        <p> System is calibrated. Start Adding Product !! </p>
    </div>
</div>

<div class="container text-center p-2">
    <a href="{{ url('calibration') }}"  class="btn btn-success">Re-calibrate</a>
    <a href="{{ url('decalibrate') }}" class="btn btn-warning">De-calibrate</a>
</div>

 <div class="container text-center p-2">
    <p class="p-2">To add new product, put product on weight and press <b>Measure</b> </p>
    <a href="{{url('measure')}}" class="btn btn-outline-dark" style="width:11rem;">Measure</a>
 </div> 
 
 
 <div class="container text-center p-5 border-bottom">
    <div class="border border-bottom"> 
        <h4 > Cart </h4>
    </div>
    

    <?php
        if( $sz == 0 ){
    ?>
        <div class='alert alert-danger text-center'>
            <p> Cart is Empyty.</p>
        </div>
    <?php 
        } else {
    ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>SL NO. </th>
                        <th>Product</th>
                        <th>Weight (gram/s)</th>
                        <th>Price (TK)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $k = 1 ; ?>
                    @foreach($row as $p)
                    
                    <tr>
                        <td> <?php echo $k; ?></td>
                        <td>{{$p->product}}</td>
                        <td>{{number_format($p->weight, 2)}}</td>
                        <td>{{number_format($p->price,2)}}</td>

                        <td>
                            
                            <form action="{{  url('delete', $p->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </td>

                    </tr>
                    <?php $k+=1; ?>
                    @endforeach
                </tbody>
            </table>
            <a href="{{url('checkout')}}" class="btn btn-outline-dark" style="width:11rem;">Checkout</a>
    <?php 
        } 
    ?>



 </div>




<?php
}
?>

</body>
</html>
