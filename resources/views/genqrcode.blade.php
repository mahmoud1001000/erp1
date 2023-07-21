<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>AZHA ERP</title>
</head>
<style>
    .form-group{
        margin-bottom: 20px;
    }
    .test{
        margin: auto;
        margin-bottom: 20px;
        text-align: center;
    }
</style>
<body>

<div class="container">

    <div style=" padding: 20px;margin: auto">
        {{--  <div class="row">
             <div class="col-lg-12 mb-10" style="width: 100%;
   margin: auto;
   margin-top: auto;
   background-color: #392a2a;
   margin-top: 20px;
   height: 50px;
   color: #FFF;
   font-size: 20px;
   text-align: center;
   padding-top: 10px;
   font-weight: 600;">

                   <p>AZHA ERP </p>
               </div>

               <div class="col-lg-6">
                   <form action="/qrcode" method="post">
                       @csrf
                       <div class="form-group">
                           <label>Seller’s name :</label>
                           <input type="text" class="form-control" name="sellare" value="{{$seller}}">
                       </div>

                       <div class="form-group">
                           <label>VAT registration number :</label>
                           <input type="text" class="form-control" name="taxnumber" value="310122393500003">
                       </div>


                       <div class="form-group">
                           <label>Time stamp :</label>
                           <input type="text" class="form-control" name="timestamp" value="2022-04-25T15:30:00Z">
                       </div>

                       <div class="form-group">
                           <label>Invoice total (with VAT) :</label>
                           <input type="text" class="form-control" name="invoictotal" value="{{$invoictotal}}">
                       </div>

                       <div class="form-group">
                           <label>VAT total :</label>
                           <input type="text" class="form-control" name="valtotal" value="150.00">
                       </div>


                       <button type="submit" class=" btn btn-danger"> get </button>
                   </form>
               </div>
               <div class="col-lg-6">
                   <p>{{$seller}}</p>
                   <p>{{$invoictotal}}</p>
                   <p>{{$encoded1}}</p>
                   <p>{{$encoded2}}</p>
                   <p>{{$encoded3}}</p>
                   <p>{{$encoded4}}</p>
                   <p>{{$encoded5}}</p>
                   <p style=" word-wrap: break-word;" >{{$encoded}}</p>
                   <p style=" word-wrap: break-word;">{{$decoded}}</p>--}}

                <?php
                $decoded="ASXZhdmH2YbYr9izINmF2K3ZhdivINi52YTZiiDYp9mE2LPZitivAgswMTAyNDY0OTg0NAMUMjAyMi0wNC0yNVQxMi0zNC0yOFoEBzEwMDAuMDAFBjE1MC4wMA==";
              $num=1;
                ?>

        <div class="test">
            <h3>1</h3>
            <img class="center-block mt-5"  src="data:image/png;base64,{{DNS2D::getBarcodePNG($decoded, 'QRCODE',5,5)}}">
        </div>

            <div class="test">
                <h3>2</h3>
                <img class="center-block mt-5" style="image-rendering: pixelated;" src="data:image/png;base64,{{DNS2D::getBarcodePNG($decoded, 'QRCODE',5,5)}}">
            </div>
            <div class="test">
                <h3>3</h3>
                <img class="center-block mt-5" style="image-rendering:auto;" src="data:image/png;base64,{{DNS2D::getBarcodePNG($decoded, 'QRCODE',5,5)}}">
            </div>
            <div class="test">
                <h3>4</h3>
                <img class="center-block mt-5" style="image-rendering:crisp-edges" src="data:image/png;base64,{{DNS2D::getBarcodePNG($decoded, 'QRCODE',5,5)}}">
            </div>
            <div class="test">
                <h3>5</h3>
                <img class="center-block mt-5" style="image-rendering:optimizeQuality" src="data:image/png;base64,{{DNS2D::getBarcodePNG($decoded, 'QRCODE',5,5)}}">
            </div>

            <div class="test">
                <h3>6</h3>
                <img class="center-block mt-5" style="image-rendering:optimizeSpeed" src="data:image/png;base64,{{DNS2D::getBarcodePNG($decoded, 'QRCODE',5,5)}}">
            </div>

            <div class="test">
                <h3>7</h3>
                <img class="center-block mt-5" style="image-rendering:initial" src="data:image/png;base64,{{DNS2D::getBarcodePNG($decoded, 'QRCODE',5,5)}}">
            </div>
        </div>

    </div>






    <div style="margin: auto;width: 500px" >

    </div>
    <br>
    <br>
    <br>
    <br>

</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->

</body>
</html>







