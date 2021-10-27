<html>
    <head>
    <style>
    .error {color: #FF0000;}
    
    .tabel tr td{
        text-align:center;
    }

    </style>
    </head>

        <body>
        <div class="form">
            <?php
                // define variables and set to empty values
                $namaErr = $emailErr = $genderErr = $websiteErr = "";
                $nama = $email = $gender = $comment = $website = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["nama"])) {
                $namaErr = "Nama harus diisi";
                }else {
                $nama = test_input($_POST["nama"]);
                }

                if (empty($_POST["email"])) {
                $emailErr = "Email harus diisi";
                }else {
                $email = test_input($_POST["email"]);

                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email tidak sesuai format";
                }
                }

                if (empty($_POST["website"])) {
                $website = "";
                }else {
                $website = test_input($_POST["website"]);
                }

                if (empty($_POST["comment"])) {
                $comment = "";
                }else {
                $comment = test_input($_POST["comment"]);
                }

                if (empty($_POST["gender"])) {
                $genderErr = "Gender harus dipilih";
                }else {
                $gender = test_input($_POST["gender"]);
                }
                }

                function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data); 
                return $data;
                }
            ?>
        <h2>Posting Komentar </h2>

        <p><span class = "error">* Harus Diisi.</span></p>
        
        <form method = "post" action = "<?php
        echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" action="proses.php">
            <table>
            <tr>
            <td>Nama:</td>
            <td><input type = "text" name = "nama" id="nama">
            <span class = "error">* <?php echo $namaErr;?></span>
            </td>
            </tr>

            <tr>
            <td>E-mail: </td>
            <td><input type = "text" name = "email" id="email">
            <span class = "error">* <?php echo $emailErr;?></span>
            </td>
            </tr>

            <tr>
            <td>Website:</td>
            <td> <input type = "text" name = "website" id="website">
            <span class = "error"><?php echo $websiteErr;?></span>
            </td>
            </tr>

            <tr>
            <td>Komentar:</td>
            <td> <textarea name = "comment" id="comment" rows = "5" cols = "40"></textarea></td>
            </tr>

            <tr>
            <td>Gender:</td>
            <td>
            <input type = "radio" name = "gender" id="gender" value = "L">Laki-Laki
            <input type = "radio" name = "gender" id="gender" value = "P">Perempuan
            <span class = "error">* <?php echo $genderErr;?></span>
            </td>
            </tr>

            <td>
            <input type = "submit" name = "submit" value = "Submit">
            </td>
                        
            </table>


</div>

<div class="tabel">
    <table width='50%' hight="50%" border="1" cellspacing="0" cellpadding="3" >
    
     <?php echo "<h2>Data yang anda isi:</h2>"; ?>

     <tr>
         <td>Nama</td>
         <td>E-mail </td>
         <td>Website</td>
         <td>Komentar</td>
         <td>Gender</td>
     </tr>
     <tr>
         <td><?php echo $nama; echo "<br>"; ?></td>
         <td><?php echo $email; echo "<br>"; ?></td>
         <td><?php echo $website; echo "<br>"; ?></td>
         <td><?php echo $comment; echo "<br>"; ?></td>
         <td><?php echo $gender; ?></td>
     </tr>

</table>
</div>
    </body>
</html>
