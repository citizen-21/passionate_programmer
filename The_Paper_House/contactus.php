<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
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
          <h3 class="title" style="text-align: left;">THE PAPER HOUSE 🖨️</h3>
          <p class="text" style="color: #000;">
          How can we help ? <br>
          We'd love to here from You <br>
          Whenever you need us, we're here for You !
          </p>

          <div class="info">
            <img src="img/contact.svg" style="height: 400px; width: 350px;" alt="" />
          </div>

        </div>

        <div class="contact-form" >


          <form id="myForm" style="margin-top: 50px;">
            <h3 class="title" style="text-align: center;">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" id="name" placeholder="Name" class="input" required/>
            </div>
            <div class="input-container">
              <input type="email" name="email" id="email" placeholder="Email" class="input" required/>
            </div>
            <div class="input-container">
              <input type="text" name="phone" id="subject" placeholder="Regarding" class="input" required/>
            </div>
            <div class="input-container textarea">
              <textarea name="message" id="body" placeholder="Describe here..." class="input" required></textarea>
            </div>
            <button type="button" onclick="sendEmail()" class="btn" value="Submit">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        alert ("We Received your mail successfully, will contact you shortly !");
                        window.location.href = "http://localhost/thepaperhouse/index.html";  
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

  </body>
</html>
