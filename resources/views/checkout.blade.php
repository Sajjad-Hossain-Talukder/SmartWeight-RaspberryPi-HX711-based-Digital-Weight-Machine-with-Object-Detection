<!DOCTYPE html>
<html lang="en">

<head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <title>CheckOut</title>

</head>
    
    
<body>





    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center m-5">
                <h3> INVOICE </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th> SL NO. </th>
                            <th>Product</th>
                            <th>Weight (gram/s)</th>
                            <th>Price (TK)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $k = 1 ; 
                        ?> 
                        @foreach($row as $p)
                        <tr>
                            <td> <?php echo $k; ?> </td>
                            <td>{{ $p->product }}</td>
                            <td>{{ number_format($p->weight,2) }}</td>
                            <td>{{ number_format($p->price,2) }}</td>
        
                        </tr>
                        <?php
                            $k += 1 ; 
                        ?> 
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td> Subtotal : </td>
                            <td>{{ number_format($sum,2) }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ url('print') }}" target="_blank" class="btn btn-success">Print Invoice</a>
                <a href="{{ url('weight') }}" class="btn btn-warning">Return Home</a>

            </div>
            <div class="col-lg-2">
            
            </div>

        </div>
    </div>

    


                    
    

</body>
</html>
