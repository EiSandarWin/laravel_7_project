
<!DOCTYPE html>
<html>



<head>
<title>Laravel Signature Pad Tutorial Example - ItSolutionStuff.com </title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
  
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
 <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<style>
.wrapper {
  position: relative;
  width: 500px;
  height: 200px;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
img {
  position: absolute;
  left: 0;
  top: 0;
}

.signature-pad {
  position: absolute;
  left: 0;
  top: 0;
  width:500px;
  height:200px;
  
}
canvas {
    border:3px solid #000;
}
}
</style>
</head>
<body >
    <h1>Signature</h1>
<div class="wrapper ">
  
  <canvas id="signature-pad" class="signature-pad"  width=500 height=200></canvas>
</div>
<div >
  <button id="save">Save</button>
  <button id="clear">Clear</button>
</div>

<script type="text/javascript">
var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
  backgroundColor: 'rgba(255, 255, 255, 0)',
  penColor: 'rgb(0, 0, 0)'
});
var saveButton = document.getElementById('save');
var cancelButton = document.getElementById('clear');

saveButton.addEventListener('click', function (event) {
  var data = signaturePad.toDataURL('image/png');

// Send data to server instead...
  window.open(data);
});

cancelButton.addEventListener('click', function (event) {
  signaturePad.clear();
});
</script>
</body>
</html>

