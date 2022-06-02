<?php
    session_start();
    // input value error variables
    $nama_error = $NIM_error = $email_error = $dateBirth_error = $gender_error = $hobi_error = $deskripsi_error = "";
    // input value readiness variables
    $nama_ready = $NIM_ready = $email_ready = $dateBirth_ready = $gender_ready = $hobi_ready = $deskripsi_ready = false;
    // error format
    $_error = "is required";
    // checked checkbox variables
    $check_hobi1 = $check_hobi2 = $check_hobi3 = "";
    // checked checkbox format
    $_check = "checked";

    // input value validation statements
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["nama"])) $nama_error = "Nama " . $_error;
        else $nama_ready = true;

        if(empty($_POST["NIM"])) $NIM_error = "NIM " . $_error;
        else {
            if(!preg_match("/^[0-9]*$/",$_POST["NIM"])){
                $NIM_error = "NIM must integer number";
            }else $NIM_ready = true;
        }

        if(empty($_POST["email"])) $email_error = "Email  " . $_error;
        else {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $email_error = "Invalid email format";
            }else $email_ready = true;
        }

        if(empty($_POST["dateBirth"])) $dateBirth_error = "Tanggal lahir  " . $_error;
        else $dateBirth_ready = true;

        if(empty($_POST["gender"])) $gender_error = "Jenis-kelamin  " . $_error;
        else {
            $gender = test_input($_POST["gender"]);
            $gender_ready = true;
        }

        if(empty($_POST["hobi"])) $hobi_error = "Hobi  " . $_error;
        else {
            foreach($_POST["hobi"] as $h){
                if(!empty($h) && $h == "Hobi 1")$check_hobi1 = $_check;
                if(!empty($h) && $h == "Hobi 2")$check_hobi2 = $_check;
                if(!empty($h) && $h == "Hobi 3")$check_hobi3 = $_check;
            }
            $hobi_ready = true;
        }

        if(empty($_POST["deskripsi"])) $deskripsi_error = "Deskripsi  " . $_error;
        else $deskripsi_ready = true;
    }

    // all input expression for result page and redirect to it
    if($nama_ready && $NIM_ready && $email_ready && $dateBirth_ready && $gender_ready && $hobi_ready && $deskripsi_ready){
        $_SESSION["nama"] = $_POST["nama"];
        $_SESSION["NIM"] = $_POST["NIM"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["dateBirth"] = $_POST["dateBirth"];
        $_SESSION["gender"] = $_POST["gender"];
        $_SESSION["hobi"] = $_POST["hobi"];
        $_SESSION["deskripsi"] = $_POST["deskripsi"];
        header("Location: result.php");
        exit();
    }

    // checked for radio answer value
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tugas 3</title>
</head>
<body>
    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <!-- input for nama -->
		<label>Nama : </label>
		<input type="text" id="nama" name="nama" 
            value=<?= isset($_POST["nama"]) ? $_POST["nama"] : ""; ?>>
        <!-- error message -->
        <span class="error"><?= $nama_error; ?></span>
        <br>

        <!-- input for NIM -->
        <label>NIM : </label>
		<input type="text" id="NIM" name="NIM" 
            value=<?= isset($_POST["NIM"]) ? $_POST["NIM"] : ""; ?>>
        <!-- error message -->
        <span class="error"><?= $NIM_error; ?></span>
        <br>

        <!-- input for email -->
		<label>Masukkan Email : </label>
		<input type="text" id="email" name="email"
            value=<?= isset($_POST["email"]) ? $_POST["email"] : "";?>>
        <!-- error message -->
        <span class="error"><?= $email_error; ?></span>
        <br>

        <!-- input for Tanggal Lahir -->
        <label>Tanggal Lahir : </label>
		<input type="date" id="dateBirth" name="dateBirth"
            value=<?= isset($_POST["dateBirth"]) ? $_POST["dateBirth"] : ""; ?>>
        <!-- error message -->
        <span class="error"><?= $dateBirth_error; ?></span>
        <br>

        <!-- input for Jenis Kelamin -->
        <label>Jenis Kelamin : </label>
        <br>
        <input type="radio" id="Laki-laki" name="gender" value="Laki-laki" 
            <?php if(isset($gender) && $gender=="Laki-laki") echo "checked"; 
            ?> >Laki-laki
        <input type="radio" id="Perempuan" name="gender" value="Perempuan"
            <?php if(isset($gender) && $gender=="Perempuan") echo "checked"; 
            ?> >Perempuan
        <!-- error message -->
        <span class="error"><?= $gender_error; ?></span>
        <br>

        <!-- input for Hobi -->
        <label>Hobi : </label>
        <br>
        <input type="checkbox" id="hobi1" name="hobi[]" value="Hobi 1" <?= $check_hobi1?>>Hobi 1
        <input type="checkbox" id="hobi2" name="hobi[]" value="Hobi 2" <?= $check_hobi2?>>Hobi 2
        <input type="checkbox" id="hobi3" name="hobi[]" value="Hobi 3" <?= $check_hobi3?>>Hobi 3
        <!-- error message -->
        <span class="error"><?= $hobi_error; ?></span>
        <br>

        <!-- input for Deskripsi -->
        <label>Deskripsi : </label>
        <br>
        <textarea id="deskripsi" name="deskripsi" rows="4" cols="50"><?= isset($_POST["deskripsi"]) ? $_POST["deskripsi"] : ""; ?></textarea>
        <!-- error message -->
        <span class="error"><?= $deskripsi_error; ?></span>
        <br>

		<button type="submit" name="submit">Submit</button>
	</form>
</body>
</html>