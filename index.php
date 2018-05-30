<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
      <title></title>
   </head>
   <body>

      <?php
         $conn = new mysqli('localhost', 'root', 'ciao', 'hotel_prova');
         if($conn -> connect_error){
            echo 'Errore';
            die();
         }
         $sql = "SELECT * FROM prenotazioni";
         $sql1 = "SELECT * FROM prenotazioni_has_ospiti";
         $result = $conn -> query($sql);
         $result1 = $conn -> query($sql1);
         if($result1 -> num_rows > 0){ ?>

            <form action="index.html" method="post">
               <select class="" name="prenotazione_id">
                  <?php while($row1 = $result -> fetch_assoc()){ ?>
                        <option <?php echo $row1["prenotazione_id"]?> > Cod. Pren: <?php echo $row1["prenotazione_id"] ?></option>
                     <?php } ?>
               </select>
            </form>

         <?php } ?>

      <?php
         if($result -> num_rows > 0){ ?>
            <div id="book_cnt">
               <ul>
                  <?php while($row = $result -> fetch_assoc()){ ?>
                     <a href= <?php echo 'dettagli.php/?id='. $row["id"] ?> >
                        <li>
                           <span class="val_desc">Id prenotazione:</span> <?php echo $row["id"] ?> ,
                           <span class="val_desc">Id Stanza:</span>  <?php echo $row["stanza_id"] ?> ,
                           <span class="val_desc">Id Configurazione:</span>  <?php echo $row["configurazione_id"] ?> ,
                        </li>
                     </a>
                  <?php } ?>

               </ul>
            </div>

         <?php } ?>


   </body>
</html>
