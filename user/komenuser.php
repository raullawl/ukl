<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="comment-form.css">
</head>
<body>
    <div class="comment-box">
        <h2>Comments</h2>
        <form action="komenuser.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="email" placeholder="Email">
            <textarea name="isi_komentar" placeholder="Type Your Comment"></textarea>
            <button type="submit" name="submit">Submit Comment</button>
            <!-- php komen -->
            <?php
            //check if form submitted, insert form data into users table.
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $isi_komentar = $_POST['isi_komentar'];
                //echo($judul);
                //include database connection file
                include_once("../koneksi.php");
                
                //insert user data table
                $result = mysqli_query($mysqli,
                "INSERT INTO komentar(username,email,isi_komentar) VALUES('$username','$email','$isi_komentar')");

                //show message when user added
                //echo "Data added successfully. <a href='index.php'>View data</a>
                header("location:komentar.php");
            }
            ?> 
        </form>
    </div>
</body>
</html>