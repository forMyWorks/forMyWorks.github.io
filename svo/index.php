<?php
require_once('mailer/phpmailer/PHPMailerAutoload.php');
function sendEmail(string $email,string $name){
  
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'gover.yu@gmail.com';                 // Наш логин
$mail->Password = 'lzpbcpyteoskexjx';                           // Наш пароль от ящика
$mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
 
$mail->setFrom('gover.yu@gmail.com', 'ZakonRu');   // От кого письмо 
$mail->addAddress($email);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка';
$mail->Body    = '
  Спасибо '. $name.'  за заявку,<br>в ближайшее время мы с вами свяжемся.';

if(!$mail->send()) {
    return false;
} else {
    return true;
}


}

// $headers = 'From: webmaster@example.com' . "\r\n" .
// 'Reply-To: webmaster@example.com' . "\r\n" .
// 'X-Mailer: PHP/' . phpversion();

// mail(,'My Subject', 'dddddd'   ,$headers);

 if(!empty($_FILES)){

  $uploads_dir = "./Dir/infaa/".$_POST["email"];

  if (! is_dir($uploads_dir )) {
    mkdir("./Dir/infaa/".$_POST["email"], 0777);
  }

  foreach ($_FILES['file']['error'] as $key => $error) {

    if ($error == UPLOAD_ERR_OK || $error == 0) {

        $tmp_name = $_FILES["file"]["tmp_name"][$key];
        $name = basename($_FILES["file"]["name"][$key]);

        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}

} 

date_default_timezone_set("Europe/Kiev");
$timestamp = date('Y-m-d H:i:s');

$name=$_POST["name"];
$number=$_POST["number"];
$email=$_POST["email"];
$subdivision=$_POST["subdivision"];
$rank=$_POST["rank"];
$svo=$_POST["svo"];

if($svo){
  $svo='так';
}
if(!$svo){
  $svo='ні';
}
if(!empty($email)&&!empty($number)){
  file_put_contents("./Dir/info", "\n"."ПІП: ".  $name ."\n"."Телефон: ".$number."\n"."email: ".$email."\n"."Підрозділ: ".$subdivision."\n"."Звання: ".$rank."\n"."Учасник СВО: ".$svo."\n". $timestamp ."\n" 
  . "\n".print_r($_SERVER, true) . "================================================================================================\n"."\n" , FILE_APPEND);
 


}


?>
<!DOCTYPE html>

<html lang="ru">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="Landing PAGE Html5 Template" />

    <meta name="keywords" content="landing,startup,flat" />

    <meta name="author" content="Made By GN DESIGNS" />

    <title>ZakonRu</title>

    <!-- // PLUGINS (css files) // -->

    <link
      href="assets/js/plugins/bootsnav_files/skins/color.css"
      rel="stylesheet"
    />

    <link
      href="assets/js/plugins/bootsnav_files/css/animate.css"
      rel="stylesheet"
    />

    <link
      href="assets/js/plugins/bootsnav_files/css/bootsnav.css"
      rel="stylesheet"
    />

    <link
      href="assets/js/plugins/bootsnav_files/css/overwrite.css"
      rel="stylesheet"
    />

    <link
      href="assets/js/plugins/owl-carousel/owl.carousel.css"
      rel="stylesheet"
    />

    <link
      href="assets/js/plugins/owl-carousel/owl.theme.css"
      rel="stylesheet"
    />

    <link
      href="assets/js/plugins/owl-carousel/owl.transitions.css"
      rel="stylesheet"
    />

    <link
      href="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css"
      rel="stylesheet"
    />

    <!--// ICONS //-->

    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"
      rel="stylesheet"
    />

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <!--// BOOTSTRAP & Main //-->

    <link
      href="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

    <link href="assets/css/main.css" rel="stylesheet" />
  </head>

  <body>
    <!--======================================== 

           Preloader

    ========================================-->
<style>
@media (min-width: 1024px) {
  nav.navbar .navbar-brand img.logo {
    width: 77px;
  }
}
@media (max-width: 1023px){
  nav.navbar.bootsnav .navbar-brand img {
    width: 46px;
}
}
footer img {
    width: 83px;
}
</stYle>
    <div class="page-preloader">
      <div class="spinner">
        <div class="rect1"></div>

        <div class="rect2"></div>

        <div class="rect3"></div>

        <div class="rect4"></div>

        <div class="rect5"></div>
      </div>
     
    </div>
    

    <!--======================================== 

           Header

    ========================================-->

    <!--//** Navigation**//-->

    <nav
      class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy"
      data-minus-value-desktop="70"
      data-minus-value-mobile="55"
      data-speed="1000"
    >
      <div class="container">
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target="#navbar-menu"
          >
            <i class="fa fa-bars"></i>
          </button>

          <a class="navbar-brand" href="#brand">
            <img src="assets/img/logoru.png" class="logo" alt="logo" />
          </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">
            <li class="active scroll"><a href="#home">Главная</a></li>

            <li class="scroll"><a href="#about">О Нас</a></li>

            <li class="scroll"><a href="#services">Наша Помощь</a></li>

            <!-- <li class="scroll"><a href="#price">Price</a></li> -->

            <li class="scroll"><a href="#team">Одна Команда</a></li>

            <!-- <li class="scroll"><a href="#clients">Clients</a></li> -->

            <li class="scroll"><a href="#contact">
              Связаться с Нами</a></li>

            <!-- <li class="button-holder">
              <button
                type="button"
                class="btn btn-blue navbar-btn"
                data-toggle="modal"
                data-target="#SignIn"
              >
                Sign in
              </button>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <!--//** Banner**//-->

    <section style="padding-top: 90px;" id="home">
      <div class="container">
        <div class="row">
          <!-- Introduction -->

          <div class="col-md-6 caption">
            <h1>ZakonRu</h1>

            <p>
              Как контрактнику правильно уволиться из армии? <p> Заключив контракт,
                зачастую сталкиваются с совершенно иными условиями, которые рисуют
                призывные плакаты и листовки, местом службы становятся регионы,
                оторванные от благ цивилизации, а участие в реальных боевых
                действиях охлаждают максимализм и надежды на спокойное,
                размеренное прохождение службы. Возникает вопрос, как уволиться
                контрактнику из рядов вооруженных сил досрочно?</p>
            </p>
          </div>

          <!-- Sign Up -->

          <div class="col-md-5 col-md-offset-1">
            <form id="form" action="./index.php" method="post"  class="signup-form" enctype="multipart/form-data">

              <?php 
              
              if(!empty($email)&&file_exists("./Dir/".$email)){
                ?>
                <h4  class="text-center"> Вы уже отправили заявку, в ближайшее время мы с вами свяжемся</h4><?php
             }
             else{
                   if(!empty($_POST)){
                   ?><h4  class="text-center">  Спасибо за заявку, в ближайшее время мы с вами свяжемся</h4><?php 
                   } else{?>
                     <h3  class="text-center"> Получить Консультацию</h3><?php
                  }
             }
             if(!file_exists("./Dir/".$_POST['email'])){
              file_put_contents("./Dir/".$_POST['email'], "email: ".$email."\n"."ПІП: ". $name ."\n"."Телефон: ".$number."\n"."Підрозділ: ".$subdivision."\n"."Звання: ".$rank."\n"."Учасник СВО: ".$svo."\n". $timestamp ."\n" ."\n" ."\n" ."\n" ."\n" 
              , FILE_APPEND);
              sendEmail($email,$name);
            }
             ?>
            

              <hr />

              <div class="form-group">
                <input
                name="name"
                  type="text"
                  class="form-control"
                  placeholder="ФИО"
                  required="required"
                />
              </div>

              <div class="form-group">
                <input
                name="email"
                  type="email"
                  class="form-control"
                  placeholder="Электронная Почта"
                  required="required"
                />
              </div>

              <div class="form-group">
                <input
                name="number"
                  
                  class="form-control"
                  placeholder="Контактный Телефон"
                  required="required"
                />
              </div>

              <div class="form-group">
                <input
                
                  type="text"
                  class="form-control"
                  placeholder="Воинское Звание"
                  name="rank"
                  
                />
              </div> 

              <div class="form-group">
                <input
                  name="subdivision"
                  type="text"
                  class="form-control"
                  placeholder="Подразделение"
                 
                 
                />
              </div>

              <div class="form-group">
              <div class="wp">
                <input
                style="height:18px;width: 19px; margin-top: 0;font-size:18px"
                
                  id="svo"
                  name="svo"
                  type="checkbox"
                  class="inp-che"
                  
                
                 
                />
                <label class="labelsd" style="margin-left: 10px;margin-bottom: 0px; font-size:19px;font-weight:500;"
                       for="svo">Участник СВО</label>
                       </div>
              </div>

             
              <!-- <div class="form-group">
              <label for="file">Choose file to upload</label>
              <i class="fa fa-2x fa-camera"></i>
              <input  type="file" id="file" name="file" multiple> -->
              <div>

              <div  class="form-group">
             
                  <label style=" cursor: pointer;"  for="inputTag">
                  <div class="wp">
                  <i style="margin-right: 10px; cursor: pointer;"  class="fa fa-2x fa-camera"></i><br/>
                  <div class="dddd">Прикрепить фото документов, удостоверяющих личность </div> 
                  </div>
                    <input name="file[]" style=" display: none;" id="inputTag" type="file" multiple/>
                    <br/>
                    <span id="imageName"></span>
                             
                  </label>
                
                 
                    <script>
                      
                        let input = document.getElementById("inputTag");
                        let imageName = document.getElementById("imageName")

                        input.addEventListener("change", ()=>{
                            let inputImage = document.querySelector("input[type=file]").files;
                            let d=' ';
                            let file;
                          
                          // console.log(document.querySelector("input[type=file]").files)

                            for (let i = 0; i < inputImage.length; i++) {
                              file  =inputImage[i]
                            d+= file.name; 
                            d+= '\n'
                            }

                            imageName.innerText = d;
                            
                        })
                       
                    </script>

              </div>



              <div class="form-group text-center">
                <button type="submit" class="btn btn-blue btn-block">
                    Отправить Заявку
                </button>
               
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!--======================================== 

           About Us

    ========================================-->

    <section id="about" class="section-padding">
      <div class="container">
        <h2>О Нас</h2>

        <p>
           Мы юридическая компания. Наши юристы — эксперты в области военного права. Поэтому региональные и федеральные СМИ обращаются к нам за комментариями по данной теме.
           
        </p>

        <div class="row">
          <div class="col-md-4">
            <div class="icon-box">
              <img src="./assets/img/rbc.png" alt="">

              
            </div>
          </div>

          <div class="col-md-4">
            <div class="icon-box">
              <img width="120px" src="./assets/img/iz_ru.png" alt="">

        
            </div>
          </div>

          <div class="col-md-4">
            <div class="icon-box">
              <img width="170px" src="./assets/img/d_p.png" alt="">

            
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--======================================== 

           Story

    ========================================-->

    <section id="story">
      <div class="container-fluid">
        <div class="row">
          <!-- Img -->

          <div class="col-md-6 story-bg"></div>

          <!-- Story Caption -->

          <div class="col-md-6">
            <div class="story-content">
              <h2>ПЕРВИЧНАЯ КОНСУЛЬТАЦИЯ</h2>

      

              <div class="story-text">
                <p>
                  Не у всех военнообязанных есть право на освобождение от армии — это факт.
                  Основная цель консультации — определить шансы на получение военного билета в вашем конкретном случае. 
                  Если таких перспектив нет — объясним почему, и вам не нужно будет тратить время на то, что не принесёт 
                  результата. Если основания есть — будем готовы обсудить процесс и условия совместной работы.
                </p>
              </div>

        
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--======================================== 

           Services

    ========================================-->

    <section id="services" class="section-padding">
      <div class="container">
        <h2>Наша Помощь</h2>

        <p>
          Тысячи клиентов ZakonRu  получили освобождение от армии  не нарушая закон.
          У вас или есть право не служить, или его нет. Мы поможем вам в этом разобраться: 
          расскажите нам о своей ситуации. Если нет перспектив — прямо скажем об этом. Если сможем помочь — поговорим о деталях.
           У вас будут ответы на ваши вопросы.
        </p>

        <!-- <div class="row">
          <div class="col-md-3">
            <div class="icon-box">
              <i class="material-icons">thumb_up</i>

              <h4>Great Quality</h4>

              <p>
                Quality ipsum dolor sit amet, consectetur adipisicing elit.
                Beatae quod error quis.
              </p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="icon-box">
              <i class="material-icons">euro_symbol</i>

              <h4>Best Price</h4>

              <p>
                Price ipsum dolor sit amet, consectetur adipisicing elit. Beatae
                quod error quis.
              </p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="icon-box">
              <i class="material-icons">forum</i>

              <h4>24/7 Support</h4>

              <p>
                Support ipsum dolor sit amet, consectetur adipisicing elit.
                Beatae quod error quis.
              </p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="icon-box">
              <i class="material-icons">view_carousel</i>

              <h4>UX/UI Design</h4>

              <p>
                Quality ipsum dolor sit amet, consectetur adipisicing elit.
                Beatae quod error quis.
              </p>
            </div>
          </div>
        </div> -->
      </div>
    </section>

    <!--======================================== 

           Features

    ========================================-->

    <!-- <section id="features">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Awesome Features</h2>

            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Explicabo, repudiandae mollitia iure magni accusamus, alias
              veniam.
            </p>

            <hr />

            <div class="feat-media">
             

              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <i class="material-icons">monetization_on</i>
                  </a>
                </div>

                <div class="media-body">
                  <h4 class="media-heading">Easy On Your Wallet</h4>

                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Deleniti nam vel provident quae.
                  </p>
                </div>
              </div>

             

              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <i class="material-icons">access_time</i>
                  </a>
                </div>

                <div class="media-body">
                  <h4 class="media-heading">Time Saver</h4>

                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Deleniti nam vel provident quae.
                  </p>
                </div>
              </div>

            

              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <i class="material-icons">computer</i>
                  </a>
                </div>

                <div class="media-body">
                  <h4 class="media-heading">Fully Responsive</h4>

                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Deleniti nam vel provident quae.
                  </p>
                </div>
              </div>
            </div>
          </div>

      

          <div class="col-md-6 col-md-push-2">
            <img
              src="assets/img/dashboard.png"
              class="img-responsive"
              alt="feature"
            />
          </div>
        </div>
      </div>
    </section> -->

    <!--======================================== 

           Price

    ========================================-->

    <!-- <section id="price" class="section-padding">
      <div class="container">
        <h2>Choose Your Plan</h2>

        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.
        </p>

        <div class="row">
      

          <div class="pricing-container">
            <div class="col-md-4">
             

              <div class="plan">
                <div class="pricing-header">
                  <h3>Single User</h3>

                  <h3>
                    <span class="currency">$</span>

                    <span class="amount">20</span>

                    <span class="period">/mo</span>
                  </h3>
                </div>

                <div class="pricing-body">
                  <ul class="list-unstyled">
                    <li>
                      <i class="material-icons">done</i><b>265MB</b> Memory
                    </li>

                    <li><i class="material-icons">done</i><b>1</b> User</li>

                    <li><i class="material-icons">done</i><b>1</b> Website</li>

                    <li><i class="material-icons">done</i><b>1</b> Domain</li>

                    <li>
                      <i class="material-icons">done</i
                      ><b>Unlimeted</b> Bandwitch
                    </li>

                    <li>
                      <i class="material-icons">done</i><b>24/7</b> Support
                    </li>
                  </ul>
                </div>

                <div class="pricing-footer">
                  <a href="#" class="btn btn-blue">Select</a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
             

              <div class="plan active">
                <div class="pricing-header">
                  <h3>Multiple Users</h3>

                  <h3>
                    <span class="currency">$</span>

                    <span class="amount">40</span>

                    <span class="period">/mo</span>
                  </h3>
                </div>

                <div class="pricing-body">
                  <ul class="list-unstyled">
                    <li>
                      <i class="material-icons">done</i><b>512MB</b> Memory
                    </li>

                    <li><i class="material-icons">done</i><b>3</b> User</li>

                    <li><i class="material-icons">done</i><b>5</b> Website</li>

                    <li><i class="material-icons">done</i><b>7</b> Domain</li>

                    <li>
                      <i class="material-icons">done</i
                      ><b>Unlimeted</b> Bandwitch
                    </li>

                    <li>
                      <i class="material-icons">done</i><b>24/7</b> Support
                    </li>
                  </ul>
                </div>

                <div class="pricing-footer">
                  <a href="#" class="btn btn-blue">Select</a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
             

              <div class="plan">
                <div class="pricing-header">
                  <h3>Developer</h3>

                  <h3>
                    <span class="currency">$</span>

                    <span class="amount">60</span>

                    <span class="period">/mo</span>
                  </h3>
                </div>

                <div class="pricing-body">
                  <ul class="list-unstyled">
                    <li>
                      <i class="material-icons">done</i><b>1024MB</b> Memory
                    </li>

                    <li><i class="material-icons">done</i><b>5</b> User</li>

                    <li><i class="material-icons">done</i><b>10</b> Website</li>

                    <li><i class="material-icons">done</i><b>10</b> Domain</li>

                    <li>
                      <i class="material-icons">done</i
                      ><b>Unlimeted</b> Bandwitch
                    </li>

                    <li>
                      <i class="material-icons">done</i><b>24/7</b> Support
                    </li>
                  </ul>
                </div>

                <div class="pricing-footer">
                  <a href="#" class="btn btn-blue">Select</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!--======================================== 

           Team

    ========================================-->

    <section id="team" class="section-padding">
      <div class="container">
        <h2>Лучшие юристы нашей компании</h2>

        <p>
          Наш штат не меняется уже долгие годы. И сегодня при посещении офиса вы увидите тех же сотрудников, которых могли бы здесь встретить несколько лет назад. 
        </p>

        <div class="row">
          <div class="col-md-6 col-lg-3">
            <!--**Team-Member**-->

            <div class="thumbnail team-member">
              <img
                src="./assets/img/p_1.jpg"
                class="img-responsive img-circle"
                alt="team-1"
              />

              <div class="caption">
                <h4>Попов <br> Александр
                  </h4>

                <h6>Консультант Службы Помощи ZakonRu</h6>

               

                <hr />

               
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <!--**Team-Member**-->

            <div class="thumbnail team-member">
              <img
                src="./assets/img/p_2.jpg"
                class="img-responsive img-circle"
                alt="team-2"
              />

              <div class="caption">
                <h4>Цупреков <br> Артур
                  </h4>

                <h6>Консультант Службы Помощи ZakonRu</h6>

   
                <hr />

                
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <!--**Team-Member**-->

            <div class="thumbnail team-member">
              <img
                src="./assets/img/p_3.jpg"
                class="img-responsive img-circle"
                alt="team-3"
              />

              <div class="caption">
                <h4> Михеева<br> Анна
                  </h4>

               <h6>Юрист Службы Помощи ZakonRu</h6>

                <hr />

              
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <!--**Team-Member**-->

            <div class="thumbnail team-member">
              <img
                src="./assets/img/p_4.jpg"
                class="img-responsive img-circle"
                alt="team-4"
              />

              <div class="caption">
                <h4>Смалева <br> Елена</h4>

                <h6>
                  Юрист Службы Помощи ZakonRu</h6>

              
                <hr />

               
              </div>
            </div>
          </div>
         <!-- <div class="col-md-6 col-lg-3">
           

            <div class="thumbnail team-member">
              <img
                src="./assets/img/p_5.jpg"
                class="img-responsive img-circle"
                alt="team-4"
              />

              <div class="caption">
                <h4>Jarl Doe</h4>

                <h6>Photographer</h6>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                <hr />

               
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            

             <div class="thumbnail team-member">
              <img
                src="./assets/img/p_6.jpg"
                class="img-responsive img-circle"
                alt="team-4"
              />

              <div class="caption">
                <h4>Jarl Doe</h4>

                <h6>Photographer</h6>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                <hr />

               
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </section>

    <!--======================================== 

           Clients

    ========================================-->

    <!-- <section id="clients" class="section-padding">
      <div class="container">
        <div class="row">
          <h2>Clients Trust Us</h2>

          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio,
            optio.
          </p>

      

          <div class="clients-images">
            <div id="owl-clients">
              <div class="item">
                <img
                  src="assets/img/clients/c_logo01.png"
                  class="center-block"
                  alt="client"
                />
              </div>

              <div class="item">
                <img
                  src="assets/img/clients/c_logo02.png"
                  class="center-block"
                  alt="client"
                />
              </div>

              <div class="item">
                <img
                  src="assets/img/clients/c_logo03.png"
                  class="center-block"
                  alt="client"
                />
              </div>

              <div class="item">
                <img
                  src="assets/img/clients/c_logo04.png"
                  class="center-block"
                  alt="client"
                />
              </div>

              <div class="item">
                <img
                  src="assets/img/clients/c_logo05.png"
                  class="center-block"
                  alt="client"
                />
              </div>

              <div class="item">
                <img
                  src="assets/img/clients/c_logo06.png"
                  class="center-block"
                  alt="client"
                />
              </div>
            </div>
          </div>

          

          <div id="owl-testimonials">
            <div class="item">
              <i class="material-icons">mood</i>

              <p class="quote">
                Vivamus quam neque, aliquet ac faucibus ut, vestibulum. Nulla
                quis laoreet diam. Donec sed egestas ex, nec facilisis ante.
                Vivamus imperdiet odio. Cras luctus interdum sodales. Quisque
                quis odio dui.
              </p>

              <h4>-John Doe, Company inc.</h4>
            </div>

            <div class="item">
              <i class="material-icons">mood</i>

              <p class="quote">
                Vivamus quam neque, aliquet ac faucibus ut, vestibulum. Nulla
                quis laoreet diam. Donec sed egestas ex, nec facilisis ante.
                Vivamus imperdiet odio. Cras luctus interdum sodales. Quisque
                quis odio dui.
              </p>

              <h4>-Jarl Doe, Company inc.</h4>
            </div>

            <div class="item">
              <i class="material-icons">mood</i>

              <p class="quote">
                Vivamus quam neque, aliquet ac faucibus ut, vestibulum. Nulla
                quis laoreet diam. Donec sed egestas ex, nec facilisis ante.
                Vivamus imperdiet odio. Cras luctus interdum sodales. Quisque
                quis odio dui.
              </p>

              <h4>-Adam Doe, Company inc.</h4>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!--======================================== 

           Newsletter

    ========================================-->

    <!-- <section id="newsletter">
      <div class="container">
        <div class="row">
          <h3>Subscribe to get early access!</h3>

          <div class="form-container">
            <form class="form-inline">
              <input
                type="email"
                class="form-control"
                id="newsletter-form"
                placeholder="Email"
                required="required"
              />

              <button type="submit" class="btn btn-white">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </section> -->

    <!--======================================== 

           Contact

    ========================================-->

    <section id="contact" class="section-padding">
      <div class="container">
        <h2 class="with">
          Связатся с Нами</h2>

 
      </div>

      <!-- Contact Info -->

      <div class="container contact-info">
        <div class="row">
          <div class="col-md-4">
            <div class="icon-box">
              <i class="material-icons">place</i>

              <h4>
                Адрес</h4>

              <p>Бауманская ул., д. 35/1, Москва, Россия, 105082</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="icon-box">
              <i class="material-icons">phone</i>

              <h4>
                Позвоните Нам</h4>

              <p>0000000</p>

              <p>00000000</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="icon-box">
              <i class="material-icons">email</i>

              <h4>
                Наша Почта </h4>

              <p>хххххххххem@xyz.com</p>

              <p>ххххххххem@xyz.com</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Google Map -->

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17953.771419903132!2d37.64843889323256!3d55.772026037892886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414d141858069a31%3A0xbf3e13a1e8f6dd9a!2z0K7RgNC40YHRgtGLINC90LAg0JHQsNGD0LzQsNC90YHQutC-0Lk!5e0!3m2!1sru!2sua!4v1655382397677!5m2!1sru!2sua" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <!-- <div id="map"></div> -->

      <!-- Contact Form -->

      <!-- <div class="contact-forms">
        <div class="container">
          <h2>Drop us a Line</h2>

          <form class="contact-form">
            <div class="col-md-6">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Full Name"
                  required="required"
                />
              </div>

              <div class="form-group">
                <input
                  type="email"
                  class="form-control"
                  placeholder="Email"
                  required="required"
                />
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <textarea
                  class="form-control"
                  rows="3"
                  placeholder="Message"
                ></textarea>
              </div>
            </div>

            <button type="submit" class="btn btn-blue">Send Message</button>
          </form> -->
        </div>
      </div>
    </section>

    <!--======================================== 

           Footer

    ========================================-->

    <footer>
      <div class="container">
        <div class="row">
          <div class="footer-caption">
            <img
              src="assets/img/logoru.png"
              class="img-responsive center-block"
              alt="logo"
            />

            <hr />

            <div style=" text-align: justify;
  padding: 0 15px" class="pull-left">
              Отправляя любую форму на сайте, вы соглашаетесь с политикой конфиденциальности данного сайта.
 Мы не помогаем уклоняться от обязанностей по военной службе, так как это является нарушением ст. 21.5 КоАП РФ, а также ч.1 ст. 328 УК РФ. Мы защищаем всех военнообязанных от нарушения их прав, гарантированных федеральными законами, и побуждаем военкомат строго и неукоснительно соблюдать все призывные процедуры, что в конечном итоге приводит к абсолютно законным процессам призывных мероприятий.
Все публикации и материалы, размещенные на сайте, носят исключительно информационный характер и не являются публичной офертой. Актуальную информацию о сотрудничестве уточняйте в офисах компании.

© "ZakonRu", 2009-2022.
            </div>
<!-- 
            <ul class="liste-unstyled pull-right">
              <li>
                <a href="#facebook"><i class="fa fa-facebook"></i></a>
              </li>

              <li>
                <a href="#twitter"><i class="fa fa-twitter"></i></a>
              </li>

              <li>
                <a href="#linkedin"><i class="fa fa-linkedin"></i></a>
              </li>

              <li>
                <a href="#instagram"><i class="fa fa-instagram"></i></a>
              </li>
            </ul> -->
          </div>
        </div>
      </div>
    </footer>

    <!--======================================== 

           Modal

    ========================================-->

    <!-- Modal -->

    <div
      class="modal fade"
      id="SignIn"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>

            <h4 class="modal-title text-center" id="myModalLabel">Sign In</h4>
          </div>

          <div class="modal-body">
            <form class="signup-form">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="User Name"
                  required="required"
                />
              </div>

              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Password"
                  required="required"
                />
              </div>

              <div class="form-group text-center">
                <button type="submit" class="btn btn-blue btn-block">
                  Log In
                </button>
              </div>
            </form>
          </div>

          <div class="modal-footer text-center">
            <a href="#">Forgot your password /</a>

            <a href="#">Signup</a>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://use.fontawesome.com/3a2eaf6206.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>
    <!-- <script src = "http://code.jquery.com/jquery-latest.js"></script> -->
<script src="assets/js/jquerymaskedinput.js" type="text/javascript"></script>    

    <script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="assets/js/main.js"></script>
  </body>
</html>
