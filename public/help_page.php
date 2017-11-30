<?php
    require("../includes/config.php");
    render("../templates/help.php");

    function phpAlert($msg) {
      echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if($_POST["name"] == NULL){
        print ("Please enter a name");
      }
      else if($_POST["subject"] == NULL){
        print ("Please enter a subject");
      }
      else if($_POST["feedback"] == NULL){
        print ("Please enter your feedback");
      }
      else {
        query("INSERT INTO feedback (name, subject, response) VALUES(?, ?,
          ?)", $_POST["name"], $_POST["subject"], $_POST["feedback"]);
          phpAlert(   "Your feedback was Successfully submitted"   );


      }
    }









 ?>
