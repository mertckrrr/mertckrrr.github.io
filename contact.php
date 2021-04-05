<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$gittiMesaji = " ";



$currentRequestMethod = $_SERVER['REQUEST_METHOD'];
 
//İzin verilen yöntemleri içeren bir PHP dizisi tanımlayalım.
$allowedRequestMethods = array('GET', 'HEAD');
 
// Geçerli istek yönteminin izinli olup olmadığını kontrol edelim.
if(!in_array($currentRequestMethod, $allowedRequestMethods)){
    //Send a "405 Method Not Allowed" header to the client and kill the script
    header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
    exit;
}
if (isset($_POST["submit"])) {
	
	require("class.phpmailer.php");
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mesaj = $_POST['message'];
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
    $mail->CharSet  ="utf-8";
	$mail->Host = "smtp.gmail.com";
	$mail->Username = "mertckrrr@gmail.com";
	$mail->Password = "Galatasaray63.";
	$mail->FromName ="$name";
	$mail->SetFrom("mertckrrr@gmail.com");
	$mail->AddAddress("mertckrrr@gmail.com");
	$mail->Subject = "SİTE MESAJI -> $name";
	$mail->Body = "$message"; 
	
	if(!$mail->Send()){
		
		echo "Hata: ".$mail->ErrorInfo;
	} else {
		
		$gittiMesaji = "<br><p class='bg-success'>Sayın $name, 
mesajınız gönderildi...</p>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>İletişim</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <link rel="shortcut icon" type="image/png" href="logo1.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d755b7edb1.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container" class="container-fluid">
             <a class="navbar-brand" href="index.html">
               <img src="logo1.png" alt="" width="100" height="80">
             </a>
             <a href="index.html" class="navbar-brand">Mert Çakır</a>
               
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMc" aria-controls="navbarMc" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>
               <div class="collapse navbar-collapse" id="navbarMc">
                 <ul id="menu" class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 1000px;">
                   <li class="nav-item px-3">
                     <a class="nav-link active" aria-current="page" href="index.html">Anasayfa</a>
                   </li>
                   <li class="nav-item px-3">
                     <a class="nav-link active" aria-current="page" href="hakkımda.html">Hakkımda</a>
                   </li>
                   <li class="nav-item px-3">
                     <a class="nav-link active" aria-current="page" href="studies.html">Özgeçmiş</a>
                   </li>
                   <li class="nav-item px-3">
                     <a class="nav-link active" aria-current="page" href="contact.html">İletişim</a>
                   </li>
                 </ul>
                 <form class="d-flex">
                   <input class="form-control me-2" type="search" placeholder="Arama" aria-label="Arama">
                   <button class="btn btn-outline-success" type="submit">Search</button>
                 </form>
               </div>
             </div>
           </nav>
  
    <section id="contact">
        <div class="container">
            <h1 class="title">How May We Help You</h1>
            <div class="contact-area">
                <div class="cont-left">
                    <div class="cont-top">
                        <div class="cont-element">
                            <i class="far fa-address-card"></i>
                            <address>Samsun / Turkey</address>
                        </div>
                        <div class="cont-element">
                            <i class="far fa-envelope"></i>
                            <a href="mailto:mertckrrr@gmail.com">mertckrrr@gmail.com</a>
                        </div>
                        <div class="cont-element">
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:+905386978864">538-697-8864</a>
                        </div>
                    </div>
                    <div class="cont-bottom">
                        <a href="https://www.facebook.com/profile.php?id=100028981816505"><i class="fab fa-facebook-f"></i></a> 
                        <a href="https://twitter.com/mertckr"><i class="fab fa-twitter"></i></a> 
                        <a href="https://instagram.com/mertckrrr"><i class="fab fa-instagram"></i></a> 
                        <a href="https://linkedin.com/in/mertckrrr"><i class="fab fa-linkedin-in"></i></a> 
                    </div>
                </div>
                <div class="cont-right">
                    <!-- <form action="">
                        <input type="text" name="text" id="text" placeholder="Name Surname">
                        <input type="email" name="email" id="email" placeholder="Email">
                        <textarea name="message" id="message" rows="10" placeholder="Message"></textarea>
                        <button>Send</button>
                    </form> -->

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
                       <form id="contactform" action="https://formspree.io/mertckrrr@gmail.com" method="post" class="row g-0 needs-validation" novalidate>
                         <div class="col-md-12 position-relative">
                           <input type="text"  name="name" id="name" placeholder="İsim" class="form-control" id="validationTooltip01" required>
                         </div>
                        <div class="col-md-12 position-relative">
                          <div class="input-group has-validation">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control" id="validationTooltipEmail" required>
                          </div>
                        <textarea name="message" id="message" rows="10" placeholder="Message"></textarea>
                        <button type="submit">Send</button>
                       </form>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>