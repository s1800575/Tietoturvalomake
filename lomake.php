<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="0; URL='./kiitos.html'" />

<?php
if(isset($_POST['email'])) {

    // osoite minne posti lähetetään ja postin osoite
    $email_to = "@";
    $email_subject = "Harjoituslomake Burpsuite tai Wiresharkkiavarten";

    function died($error) {
        // Virheilmoitukset lomakkeen käytössä
        echo ".php suoritettu";
              echo $error."<br /><br />"; // tämä tulostaa mahdolliset virheet
        echo "Paine BURBSUITEN Forward -painiketta päästäksesi eteenpäin kokeilussa<br /><br />";
        die();
    }

			// määrittää lomakkeesta tulevat tiedot > kenttien nimet samat kuin lomakkeessa
			if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['password1']) ||
        !isset($_POST['password2']) ||
				!isset($_POST['message'])) {
				died('Virhe tietojen syöttämisessä, palaa edelliselle sivulle korjataksesi virheen.');
			}

			// määritellään lomakkeen kentistä postin tiedot
				$name = $_POST['name'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
				$message = $_POST['message'];


  // määrittää virheviestin ja mitä merkkejä hyväksytään
  // annetaan kaikkien merkkien mennä läpi tarkoituksella, koska Kyber
    $error_message = "Käytä hyväksyttyjä kirjaimia";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= 'Syöttämäsi email-osoite ei ole kelvollinen.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$nimi)) {
    $error_message .= 'Syöttämäsi nimi ei ole kelvollinen.<br />';
  }


    $email_message = "Lomakkeen tiedot seuraavana:\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

	// liittää lomakkeen tiedot määritettynä lähetettävään sähköpostiin + tyhjäväli

    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "password1: ".clean_string($password1)."\n";
    $email_message .= "password2: ".clean_string($password2)."\n";
	$email_message .= "Message: ".clean_string($message)."\n";


// luo sähköpostin tiedot ja otsikoinnin

$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>
 
<!-- uudelleen ohjaus kiitos -sivulle -->



<?php

}
?>
