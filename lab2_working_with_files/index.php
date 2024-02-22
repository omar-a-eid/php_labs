<?php
require_once("vendor/autoload.php");
$desired_view = isset($_GET["view"]) ? $_GET["view"] : DEFAULT_VIEW;
$name = isset($_POST["name"]) ? $_POST["name"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$message = isset($_POST["message"]) ? $_POST["message"] : "";
$errMessage = "";
if (isset($_POST["submit"])) {
  if (strlen($name) > MAX_NAME_LENGTH || empty($name)) {
    $errMessage .= "Please enter a name less than 100 char";
  }
  if (strlen($message) > MAX_MESSAGE_LENGTH || empty($message)) {
    $errMessage .= " <br /> Please Enter A Message less than 255 Char";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errMessage .= " <br/> Please Enter A Vaild Email";
  }

}
if ($desired_view == "display") {
  display_user_data();
} else {

  if (isset($_POST["submit"]) && empty($errMessage)) {
    submit_data_to_files($name, $email);
    echo SUCCESS_MESSAGE;
    echo "<p><strong>Name: </strong> $name</p>";
    echo "<p><strong>Email: </strong> $email</p>";
    echo "<p><strong>Message: </strong> $message</p>";
    die("Contact saved successfully" . "<br /> to visit all contacts <a href='index.php?view=display'> Click Here </a>");
  }
}

?>


<html>

<head>
  <title> contact form </title>
</head>

<body>

  <h3>
    Contact Form </h3>
  <div id="after_submit">
    <h4>
      <?php if (!empty($errMessage))
        echo $errMessage; ?>
    </h4>
  </div>

  <form id="contact_form" action="index.php" method="POST" enctype="multipart/form-data">

    <div class="row">
      <label class="required" for="name">Your name:</label><br />
      <input id="name" class="input" name="name" type="text" value="<?php echo $name ?>" size="30" /><br />

    </div>
    <div class="row">
      <label class="required" for="email">Your email:</label><br />
      <input id="email" class="input" name="email" type="text" value="<?php echo $email ?>" size="30" /><br />

    </div>
    <div class="row">
      <label class="required" for="message">Your message:</label><br />
      <textarea id="message" class="input" name="message" rows="7" cols="30"><?php echo $message ?></textarea><br />

    </div>

    <input id="submit" name="submit" type="submit" value="Send email" />
    <input id="clear" name="clear" type="reset" value="clear form" />

  </form>
</body>

</html>

<?php

?>