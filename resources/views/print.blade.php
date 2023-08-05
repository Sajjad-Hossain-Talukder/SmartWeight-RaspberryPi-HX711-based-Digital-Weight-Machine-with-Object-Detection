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
        th {
            border-bottom: 1px solid black; 
        }
    </style>

</head>
    
    
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 text-center">
                <div class="logo mt-5 mb-2">
                    <img src="data:image/png;base64,{{ base64_encode($image->encode('png')) }}" alt="Image">
                </div>
                <div class="p-2">
                    <h1 > <b> Premier University </b> </h1>
                    
                    <h6>Department of  EEE </h6>
                </div>
                <div>
                    <h3> SMART Weight Machine </h3>
                </div>
                
                    <p class="text-right"> Supervised By : Tuton Chandra Mallick</p>
                
            </div>
        <div class="col-lg-2"></div>
    </div>
</div>




    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center">
                <h3> INVOICE </h3>
                <div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th> SL NO.</th>
                                <th>Product</th>
                                <th>Weight (gram/s)</th>
                                <th>Price (TK)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $k = 1 ; ?>
                            @foreach($row as $p)
                            <tr>
                                <td> <?php echo $k; ?> </td>
                                <td>{{ $p->product }}</td>
                                <td>{{ number_format($p->weight,2) }}</td>
                                <td>{{ number_format($p->price,2) }}</td>
                            </tr>
                            <?php $k+=1; ?>
                        
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td> Subtotal : </td>
                                <td>{{ number_format($sum,2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-2">
            
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <div>
                    <p> Thank You</p>

                </div>
            </div>
            <div class="col-sm-4">
            <div>
                    
                    <h6> <u> <b>Developed By</b> </u> </h6>
                    <p>Md Abu Sayed Siddike <br> Md Shakib Udiin</p>
                
            </div>
            </div>
        </div>
    </div>

</body>
</html>
