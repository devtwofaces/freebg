 <?php

session_start();


?>

<!DOCTYPE HTML>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 15px 0;
        background: #EBF0F5;
      }
      #orderButton {
          display: flex;
          margin-top: 15px;
          align-items: center;
          justify-content: center;
          flex-flow: column;
      }
      a.buttonON{
        display:inline-block;
        padding:0.7em 1.4em;
        margin:0 0.3em 0.3em 0;
        border-radius:0.15em;
        box-sizing: border-box;
        text-decoration:none;
        font-family:'Roboto',sans-serif;
        text-transform:uppercase;
        font-weight:400;
        color:#ffffff;
        background-color:#88B04B;
        box-shadow:inset 0 -0.6em 0 -0.35em rgba(0,0,0,0.17);
        text-align:center;
        position:relative;
    }

    
    a.buttonON:active{
        top:0.1em;
    }


    @media all and (max-width:30em){
        a.buttonON{
        display:block;
        margin:0.4em auto;
        }
    }

    a:not([href]):not([tabindex]){
        color: rgb(255, 255, 255, 0.8);
    }


    
    a:not([href]):not([tabindex]):hover{
        color: rgb(255, 255, 255, 1);
    }

        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Order Already Exists</h1>
        <p>We have already received your order request for this mobile number.<br/> We will be in touch with you soon to confirm the order.</p>
      </div>
   
      <div class="row">
        <div class="col-md-12" id="orderButton">
            <a  href="../" class="buttonON"> MAIN PAGE </a>
        </div>
      </div>


    </body>
</html>
