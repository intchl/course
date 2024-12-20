<?php

$conn = mysqli_connect("localhost", "root", "", "course");

function login($data)
{
    global $conn;
    // Variabel data
    $username = $data["username"];
    $password = $data["password"];
    
    // Pengecekan login dengan query
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    
    // Mengecek apakah data pengguna ditemukan
    $cek = mysqli_num_rows($result);
    
    if ($cek > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["login"] = true;
        
        // Pengecekan role pengguna
        if ($row['role'] == 'admin') {
            header("Location: admin/pages/index.php");
        } elseif ($row['role'] == 'student') {
            header("Location: user/index.php");
        } else {
            echo "<script>
                    alert('Peran pengguna tidak dikenali.');
                    document.location.href = 'login.php';
                    </script>";
        }
        exit; // Pastikan untuk menghentikan eksekusi setelah header redirect
    } else {
        echo "<script>
                alert('Username atau Password anda salah');
                document.location.href = 'login.php';
              </script>";
    }
}
// if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
// }
// echo "Koneksi berhasil!";

function tampil($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $data = [];
    while ($data2 = mysqli_fetch_assoc($result)) {
        $data[] = $data2;
    }
    return $data;
}

?>