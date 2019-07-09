<!DOCTYPE html>
<head>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href ="footer.css">
<title>Loan</title>
<script type = "text/javascript">
function calculate()
{
	var principle = document.myform.pri.value;
	var rate = document.myform.rate.value;
	var val = document.getElementById("val");
	val.value = Number(principle)+Number(rate);
} 
</script>

<style type="text/css">
body {
  background: url(https://dl.dropboxusercontent.com/u/23299152/Wallpapers/wallpaper-22705.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: 'Roboto', sans-serif;
}
#logo
{
	margin-left:640px;
	
}
.login-card {
	padding: 70px;
	
  width: 874px;
  background-color: #F7F7F7;
  margin: 0 auto 10px;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  
}
.login-card input[type=text], input[type=number],select{
  height: 38px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}
.foot{
		position:fixed;
		left:0;
		bottom:0;
		text-align:center;
		width:100%;
		background-color:#212121;
		box-shadow: 0 -1px 2px #111111;
		display:block;
		height:85px;
		line-height:20px;
		z-index:10;
		}
	#b
	 {
		color:white;		
	 }
	 #c
	 {
		 color:white;
	 }
	 #d
	 {
		 color:white;
	 }
.fa {
 padding: 5px;
  font-size: 15px;
  width: 13px;
  text-align: center;
  text-decoration: none;
  margin: 3px 2px;
 }

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {

  background: #3B5998;
  color:white;
  
}
</style>

</head>
<body>
<img id="logo" src = "image/logo.png"/>
<div class="login-card">

<form name = "myform" action = "loan2.php" method = "post"  enctype = "multipart/form-data" onsubmit = "return(validate());">


<table align = "center" border="0" cellspacing="17" cellpadding="2">
<tr>
<th>
<input type="number" placeholder = "Account Number" name="accno"required>
</th>
<th>
<input type="text" placeholder = "Customer Name" name="name"required>
</th>
</tr>
<tr>
<th>

<input type="number" placeholder = "Principle Amount"onKeyPress="calculate()"onKeyUp = "calculate()" name="pri"required>
</th>
<th>
<input type="number" placeholder = "Period(Months)" onKeyPress="calculate()"onKeyUp = "calculate()" name="time"required>
</th>

<th>
<input type="number" placeholder = "Interest Rate/Month" onKeyPress="calculate()"onKeyUp = "calculate()" name="rate"required>
</th>
</tr>
<tr>
<th>

<input type="text" placeholder = "Purpose" name="pur" maxlength="400"required>
</th>
<th>
<input type="text" placeholder = "Security1" name="sec1">
</th>
<th>
<input type="text" placeholder = "Security2" name="sec2">
</th>
</tr>

<tr>
<th>
<input type="text" placeholder = "Guarantor1" name="g1">
</th>
<th>
<input type="text" placeholder = "Guarantor2" name="g2">
</th>
<th>
<input type="text" placeholder = "Guarantor3" name="g3">
</th>
</tr>

<tr>
<td>
<font face="Arial, Helvetica, sans-serif">EMI</font>
</td>
<th>
<input type="text" readonly= "readonly" id ="val" name ="emi">
</th>
</tr>
<tr>
<td>
<font face="Arial, Helvetica, sans-serif">Repay Total</font>
</td>
<th>
<input type="text"  readonly= "readonly" id="vals" name ="total">
</th>
</tr>

<tr>
<td>
<font face="Arial, Helvetica, sans-serif">Issue Date</font>
</td>
<th>
<input type = "date"name="date"/>
</th>
</tr>

<tr>
<td>
<font face="Arial, Helvetica, sans-serif">Loan Type</font>
</td>
<th>
<select name ="type">
<option>Fixed</option>
<option>Floating</option>
</select>
</th>
<th>
<input type="submit"  name="login" class="login login-submit" value="Continue">
<th>
</tr>
</div>
</form>
</div>
<div class="foot">
			<p id="b">| Work by all members of <span id="c">Team Creator's.&trade; |</span></p>
			<p id="d">| Team Creator's &copy; -- All Rights Reserved.|For more information <span id="e">CREATOR'S.&trade; |</span><span id="f"><a href="#" class="fa fa-facebook"></a></span></p>
			</div>
</body>
</html>
