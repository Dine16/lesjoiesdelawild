<?php
if ($_POST) {
    $errors = array();

    //Part Lastname

    if(empty($_POST["lastname"])) {
        $errors['lastname'] = "lastname is required";
    }
    if(strlen($_POST["lastname"]) < 2 || strlen($_POST["lastname"]) > 30) {
        $errors['lastname2'] = "Lastname must be atleast between 3 and 30 characters long";
    }

    //Part Firstname

    if(empty($_POST["firstname"])) {
        $errors['firstname'] = "<p>firstname is required<p>";
    }
    if(strlen($_POST["firstname"]) < 2 || (strlen($_POST["firstname"])) > 30) {
        $errors['firsystname2'] = "<p>firstName must be at least 3 characters long<p>";
    }

    //Part email

    if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#',$_POST['email'])) {
        $errors['email'] = "<p>email is not valid</p>";
    }
    if(strlen($_POST["email"]) < 4) {
        $errors['email2'] = "<p>email must have at least 6 characters long</p>";
    }

    //Part text

    if(empty($_POST["text"])) {
        $errors['text'] = "text is required";
    }
    if(strlen($_POST["text"]) > 100) {
        $errors['text2'] = "<p>Your comment must have less 100 characters</p>";
    }

    //Part Succes

    $contenu = $_POST['lastname'] . " " . $_POST['firstname'] . " " . $_POST['email'] . " " .  $_POST['question'] . " " .  $_POST['text'];

    if(count($errors) == 0){
        echo "<center><h1>Successfull</h1></center>";
        echo$_POST['lastname'] = " ";
        echo$_POST['firstname'] = " ";
        echo$_POST['email'] = " ";
        echo$_POST['text'] = " ";
        mail('julemaire01@gmail.com','Form Send' ,$contenu);
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="author" content="Louis Bruge, Lucas Poirier, Julien Lemaire et Amandine Claude">
        <meta name="description" content="First project Wild Code School">
        <meta name="keywords" content="First project">
 
        <!-- Title of the page -->
        <title>Page de contact</title>

        <!-- Bootstrap library CSS v. 3.3.7 -->
        <link rel="stylesheet" media="all" type="text/css" href="../js/bootstrap-3.3.7-dist/css/bootstrap.css">
        
        <!-- Links to the top_10.css file -->
        <link rel="stylesheet" media="all" type="text/css" href="../css/top_10.css">
        
        <!-- Links to the header.css file for the navbar -->
        <link rel="stylesheet" media="all" type="text/css" href="../css/header.css">

        <!-- link to the footer.css -->
        <link rel="stylesheet" media="all" type="text/css" href="../css/footer.css">

        <!-- Font -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="/public/assets/img/favicon.ico">
        <link rel="apple-touch-icon" type="image/x-icon" href="/public/assets/img/favicon.ico">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    </head>
    <body>

    <!-- PHP navabar include -->
    <?php include('../html/header.php');?>


		<!-- Form section -->
		<section class="form" id="contact_form">


        <!--Section Contact Us-->
    <section class="form" id="contact_form">
    <div class="container-fluid">
        <div class="row">
            <h1 class="blue text-center">Contactez-nous</h1>
        </div>

            <!-- Name input -->
            <div class="form-group">
                <label for="lastname" class="col-ms-2 col-xs-3 control-label">Votre nom</label>
                <div class="col-xs-8 col-ms-9">
                    <input type="text" name="lastname" id="lastname" maxlength="30"
                           placeholder="<?php if(isset($_POST['lastname'])) echo "ex: Bond"; ?>"
                           value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>" class="form-control" />
                    <p><?php if(isset($errors['lastname'])) echo $errors['lastname']; ?></p>
                    <p><?php if(isset($errors['lastname2'])) echo $errors['lastname2']; ?></p>
                </div>

            </div>

            <!-- First Name input -->
            <div class="form-group">
                <label for="firstname" class="col-xs-3 col-ms-2 control-label">Votre prénom</label>
                <div class="col-xs-8 col-ms-9">
                    <input type="text" name="firstname" id="firstname" maxlength="30"
                           placeholder="<?php if(isset($_POST['firstname'])) echo "ex: James"; ?>"
                           value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>" class="form-control">
                    <p><?php if(isset($errors['firstname'])) echo $errors['firstname']; ?></p>
                    <p><?php if(isset($errors['firstname2'])) echo $errors['firstname2']; ?></p>
                </div>
            </div>

            <!-- Email input -->
            <div class="form-group">
                <label for="email" class="col-ms-2 col-xs-3 control-label">Votre email</label>
                <div class="col-xs-8 col-ms-9">
                    <input type="email" name="email" id="email"
                           placeholder="<?php if(isset($_POST['email'])) echo "ex: toto@gmail.com"; ?>"
                           value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" class="form-control">
                    <p><?php if(isset($errors['email'])) echo $errors['email']; ?></p>
                    <p><?php if(isset($errors['email2'])) echo $errors['email2']; ?></p>
                </div>
            </div>
            
            <!-- Subject selector -->
           <div class="form-group">
                <label for="question" class="col-ms-2 col-xs-3 control-label">Quel est votre objet ?</label>

                <div class="col-xs-8 col-ms-9">
                    <select name="question" id="question" class="form-control">
                        <option value="integration">Integration à la Wild code School</option>
                        <option value="microwave">Un micro-onde supplémentaire</option>
                        <option value="dojo">Avoir les réponses du prochain dojo</option>
                        <option value="othersubject">Autre</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-offset-3 col-xs-8 col-ms-9 col-ms-offset-2">
                <textarea name="text" rows="5" class="form-control" placeholder="<?php if(isset($_POST['text'])) echo "Don't forget to put a message"; ?>">
                <?php if(isset($_POST['text'])) echo $_POST['text']; ?></textarea>
                <p><?php if(isset($errors['text'])) echo $errors['text']; ?></p>
            </div>

            <div class="col-xs-offset-3 col-xs-8 col-ms-9 col-ms-offset-2 text-center">
                <input type="submit" value="submit" class="form-control btn btn-orange btn-lg">
            </div>
        </form>
    </div>
    </section>

        <!--End section Contact Us-->
        <!-- PHP include for the footer -->
        <?php include('../html/footer.php'); ?>

        <!-- JQuery library v. 3.3.1 -->
        <script src="../js/jquery-3.3.1.js"></script>

        <!-- Bootstrap library JS v. 3.3.7 -->
        <script src="../js/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    </body>
</html>

