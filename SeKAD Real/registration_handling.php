<?php
include("db_connection.php");

// Handle form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $mobilenumber = $_POST['mobilenumber'];
    $emergencymobilenumber = $_POST['emergencymobilenumber'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $ic_number = $_POST['ic_number'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $fname = $_POST['fname'];
    $fcontact = $_POST['fcontact'];
    $foccupation = $_POST['foccupation'];
    $mname = $_POST['mname'];
    $mcontact = $_POST['mcontact'];
    $moccupation = $_POST['moccupation'];
    $gname = $_POST['gname'];
    $gcontact = $_POST['gcontact'];
    $goccupation = $_POST['goccupation'];
    $blood_type = $_POST['blood_type'];
    $allergies = $_POST['allergies'];

    // Handle file upload for avatar
    $avatar = 'default.png';
    if (!empty($_FILES['avatar']['name'])) {
        $avatar = time() . '_' . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/' . $avatar);
    }

    $sql = "INSERT INTO users (name, email, password, mobilenumber, emergencymobilenumber, date_of_birth, gender, ic_number, nationality, address, fname, fcontact, foccupation, mname, mcontact, moccupation, gname, gcontact, goccupation, blood_type, allergies, avatar) 
            VALUES ('$name', '$email', '$password', '$mobilenumber', '$emergencymobilenumber', '$date_of_birth', '$gender', '$ic_number', '$nationality', '$address', '$fname', '$fcontact', '$foccupation', '$mname', '$mcontact', '$moccupation', '$gname', '$gcontact', '$goccupation', '$blood_type', '$allergies', '$avatar')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
