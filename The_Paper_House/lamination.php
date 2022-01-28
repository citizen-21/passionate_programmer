<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lamination Form</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <div class="form">
        <div class="contact-info">
        <h3 class="title" style="text-align: center;">THE PAPER HOUSE 🖨️</h3>
          <p class="text" style="color: #000;">
          Hell yes...<br> Finally You made till here... I hope you would love the future journey with us...
          <br><span style="margin-left: 270px;"> -Nirvana</span>
          </p>

          <div class="info">
            <img src="img/lamination.svg" style="height: 370px; width: 350px;" alt="" />
          </div>

        </div>

        <div class="contact-form" >
          <form action="" method="post" autocomplete="off" style="margin-top: 90px;">
            <h3 class="title" style="text-align: center;">Lamination Form</h3>
            <div class="input-container">
              <select name="type" class="input">
			  	<option style="color: black;" value="Select size">Select size</option>
			    <option style="color: black;" value="A3">A3</option>
			    <option style="color: black;" value="A4">A4</option>
				<option style="color: black;" value="A5">A5</option>
				<option style="color: black;" value="A6">A6</option>
			  </select>
            </div>
		    <div class="input-container">
              <input type="file" name="filename" placeholder="Select your file" class="input" />
            </div>
			<div class="input-container">
              <input type="number" name="number" placeholder="Enter number of Laminations" class="input" />
            </div>
            <input type="submit" name="submit" class="btn" />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
