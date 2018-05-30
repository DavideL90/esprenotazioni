<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
      <title></title>
   </head>
   <body>
      <?php

         $pren_id = $_GET['id'];

         $conn = new mysqli('localhost', 'root', 'ciao', 'hotel_prova');

         if($conn -> connect_error){
            echo 'Errore';
            die();
         }

         $sql = "SELECT * FROM prenotazioni_has_ospiti JOIN ospiti ON prenotazioni_has_ospiti.ospite_id = ospiti.id WHERE prenotazioni_has_ospiti.id =" . $pren_id;
         $result = $conn -> query($sql);

         if($result -> num_rows > 0){ ?>
            <div id="details_cnt">
               <ul>
                  <?php while($row = $result -> fetch_assoc()){ ?>

                     <li>
                        <span class="val_desc">Nome:</span> <?php echo $row["name"] ?> ,
                        <span class="val_desc">Cognome:</span>  <?php echo $row["lastname"] ?>
                     </li>
                  <?php } ?>

               </ul>
            </div>

      <?php } ?>

   </body>
</html>
