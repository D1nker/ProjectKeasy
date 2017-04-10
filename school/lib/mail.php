<?php 
function sendmail($email_expediteur, $nom_expediteur, $email_reply, $destinataire, $bcc, $objet, $texte, $html, $fichiers) {
         

     //Génération de la frontière entre texte, html et pièce jointe
        $frontiere = md5(uniqid(mt_rand()));

       

        //Headers du mail
        $Headers = 'From : "'.$nom_expditeur.'" <'.$email_expediteur.'>'."\n";
        $Headers .= 'Return-Path: <'.$email_reply.'>'."\n";
        $Headers .= 'MIME-Veersion: 1.0'."\n";
        if ($bcc != '') {
            $Headers .= "Bcc: ".$bcc."\n";
        }
        $Headers .= 'Content-Type : multipart/mixed; boundary="'.$frontiere.'"';

        //Début de construction du message
	    $message = '';

        //Partie du texte brute
        if ($texte != '') {
             $message .= '--'.$frontiere."\n";
	         $message .= 'Content-Type: text/plain; charset="utf-8"'."\n";
	         $message .= 'Content-Transfer-Encoding: 8bit'."\n\n";
	         $message .= $texte."\n\n";
        }
	   

	    //Message html 
        if ($html != '') {
             $message .= '--'.$frontiere."\n";
	         $message .= 'Content-Type: text/html; charset="utf-8"'."\n";
	         $message .= 'Content-Transfer-Encoding: 8bit'."\n\n";
	         $message .= $html."\n\n";
        }
	   
        
        // PIECE jointe
        if ($fichiers != '') {
                $tab_fichiers = explode(';', $fichiers);
                $nb_fichiers = count($tab_fichiers);
          for($i = 0; $i < $nb_fichiers; $i++) {
            $message .= '--' . $frontiere . "\n";
            $message .= 'Content-Type: image/jpeg; name="'. $tab_fichiers[$i] . '"' . "\n";
            $message .= 'Content-Transfert-Encoding: base64'."\n";
            $message .= 'Content-Disposition:attachement; filename="' . $tab_fichiers[$i] . '"' . "\n\n";
            $message .= chunk_split(base64_encode(file_get_contents($tab_fichiers[$i])))."\n";
          }
        $message .= '--' .$frontiere."\n";
        };

  return mail($destinataire, $objet, $message, $Headers);
}