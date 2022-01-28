<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flex Form</title>
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
            <img src="img/flex.svg" style="height: 370px; width: 350px;" alt="" />
          </div>

        </div>

        <div class="contact-form" >
          <form action="" method="post" autocomplete="off" style="margin-top: 90px;">
            <h3 class="title" style="text-align: center;">Flex Form</h3>
            <div class="input-container">
              <select name="type" class="input">
			  	<option style="color: black;" value="Select flex size">Select flex size</option>
			    <option style="color: black;" value="3 x 2 feet">3 x 2 feet</option>
			    <option style="color: black;" value="6 x 5 feet">6 x 5 feet</option>
				<option style="color: black;" value="8 x 2.5 feet">8 x 2.5 feet</option>
				<option style="color: black;" value="10 x 5 feet">10 x 5 feet</option>
			  </select>
            </div>
			<div class="input-container">
              <select name="type" class="input">
			    <option style="color: black;" value="Select flex type">Select flex type</option>
			    <option style="color: black;" value="frontlit flex">Frontlit Flex</option>
				<option style="color: black;" value="backlit flex">Backlit Flex</option>
				<option style="color: black;" value="mesh flex">Mesh Flex</option>
			  </select>
            </div>
		    <div class="input-container">
              <input type="file" name="filename" placeholder="Select your file" class="input" />
            </div>
			<div class="input-container">
              <input type="number" name="number" placeholder="Enter number of Prints" class="input" />
            </div>
            <input type="submit" name="submit" class="btn" />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
