<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
	
	* {
	margin: 0;
	padding: 0;
}
body {
	font-family: 'Poppins', sans-serif;
}
.wrapper {
	width: 1170px;
	margin: auto;
}
header {
	background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(https://i.postimg.cc/QtQc2zn2/pexels-negative-space-33999.jpg);
	height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.nav-area {
	float: right;
	list-style: none;
	margin-top: 30px;
        padding: 20px 20px;
}
.nav-area li {
	display: inline-block;
}
.nav-area li a {
	 margin-bottom: 30px;
	color: #fff;
	text-decoration: none;
	padding: 5px 20px;
	font-family: poppins;
	font-size: 20px !important;
	text-transform: uppercase;
}
.nav-area li a:hover {
	background: #fff;
	color: #333;
}
.logo {
	float: left;
}
.logo img {
	width: 100%;
	padding: 15px 0;
}
.welcome-text {
	position: absolute;
	width: 600px;
	height: 300px;
	margin: 20% 30%;
	text-align: center;
}
.welcome-text h1 {
	text-align: center;
	color: #fff;
	text-transform: uppercase;
	font-size: 60px;
}
.welcome-text h1 span {
	color: #45abff;
}
.welcome-text a {
	border: 1px solid #fff;
	padding: 10px 25px;
	text-decoration: none;
	text-transform: uppercase;
	font-size: 14px;
	margin-top: 20px;
	display: inline-block;
	color: #fff;
}
.welcome-text a:hover {
	background: #fff;
	color: #333;
}
.contact {
    position: relative;
    min-height: 100vh;
    padding: 50px 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.contact .content{
    max-width: 800px;
    text-align: center;
}
.contact .content h2{
    font-size: 36px;
    font-weight: 500;
    color: #45abff;
}
.contact .content p{
    font-weight: 300;
    color: #fff;
}
.container {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
}
.container .contactInfo{
    width: 50%;
    display: flex;
    flex-direction: column;
}
.container .contactInfo .box{
    position: relative;
    padding: 20px 0;
    display: flex;
}
.container .contactInfo .box .icon{
    min-width: 60px;
    height: 60px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;
}
.container .contactInfo .box .text{
    display: flex;
    margin-left: 20px;
    color: #fff;
    flex-direction: column;
    font-size: 16px;
    font-weight: 300;
}
.container .contactInfo .box .text h3{
    font-weight: 500;
    color: #45abff;
}
/*resposive*/

@media (max-width:600px) {
	.wrapper {
		width: 100%;
	}
	.logo {
		float: none;
		width: 50%;
		text-align: center;
		margin: auto;
	}
	
	}
	.nav-area {
		float: none;
		margin-top: 0;
	}
	.nav-area li a {
		padding: 5px;
		font-size: 11px;
	}
	.nav-area {
		text-align: center;
	}
	.welcome-text {
		width: 100%;
		height: auto;
		margin: 30% 0;
	}
	.welcome-text h1 {
		font-size: 30px;
	}


	
	</style>
	
</head>
<body>
    <header>
    
<section class="contact">
    <div class="content">
        <h2>The Paper House</h2>
        <p>Hello There...!! You can contact Us through</p>
    </div>
    <div class="container">
        <div class="contactInfo">
            <!-- <div class="box">
                <div class="icon"><i class="fa fa-tint" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Water Department</h3>
                    <p>Mr.Swapnil Sawant</p>
					<p>+91 9436748347</p>
                </div>
            </div> -->
            <div class="box">
                <div class="icon"><i class="fa fa-free-code-camp" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Owner Department</h3>
                    <p>Mrs.Pranjali Satpute</p>
					<p>+91 9832476583</p>
                </div>
            </div>
            <!-- <div class="box">
                <div class="icon"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Street Light Department</h3>
                    <p>Mr.Shraddesh Shelkande</p>
					<p>+91 9439854920</p>
                </div>      
            </div>
            <div class="box">
                <div class="icon"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Electricity Department</h3>
                    <p>Mr.Omkar Paithankar</p>
					<p>+91 9639205873</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fa fa-video-camera" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>CCTV Department</h3>
                    <p>Mr.Pritam Patil</p>
					<p>+91 9503965829</p>
                </div>
            </div> -->
			<div class="box">
                <div class="icon"><i class="fa fa-leaf" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Service Department</h3>
                    <p>Mr.Indrajeet Katke</p>
					<p>+91 9792045984</p>
                </div>
            </div>
			<!-- <div class="box">
                <div class="icon"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Garbage Department</h3>
                    <p>Mr.Sameer Kshirsagar</p>
					<p>+91 9602398576</p>
                </div>
            </div> -->
			<div class="box">
                <div class="icon"><i class="fa fa-eercast" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Manager Department</h3>
                    <p>Mr. Kapil Sharma</p>
					<p>+91 9320597384</p>
                </div>
            </div>
        </div>
    </div>
</section>
</header>


</body>
</html>