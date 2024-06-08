    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040039');

        function query($query) {
            global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            }
            return $rows;
        }

    function tambah($data) {
        global $conn;

        $name = htmlspecialchars($data["name"]);

        $image = upload();
        if(!$image) {
            return false;
        }
        $artist = htmlspecialchars($data["artist"]);
        $details = htmlspecialchars($data["details"]);


        $query = "INSERT INTO art VALUES
                (NULL, '$name', '$image', '$artist', '$details')
                ";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
        
    }

    function upload() {
        $namafile = $_FILES['image']['name'];
        $ukuranfile = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmpName = $_FILES['image']['tmp_name'];

        if ( $error === 4) {
            echo "
            <script>
                alert('pilih gambar terlebih dahulu!);
            </script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.' , $namafile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "
            <script>
                alert('yang anda upload bukan gambar!);
            </script>";
            return false;
        }

        if ($ukuranfile > 1000000000000) {
            echo "
            <script>
                alert('pilih gambar terlebih dahulu!);
            </script>";
            return false;
        } 

        $namafileBaru = uniqid();
        $namafileBaru .= '.';
        $namafileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, '../img/' . $namafileBaru);
        
        return $namafile;
    }

        function hapus($id) {
            global $conn;
            mysqli_query($conn, "DELETE FROM art WHERE id = $id");

            return mysqli_affected_rows($conn);
        }

        function edit($data) {
            global $conn;

            $id = $data["id"];
            $name = htmlspecialchars($data["name"]);
            $gambarLama = htmlspecialchars($data["gambarLama"]);
            if($_FILES['image']['error'] === 4) {
                $image = $gambarLama;
            } else {
                $image = upload();
            }
            $artist = htmlspecialchars($data["artist"]);
            $details = htmlspecialchars($data["details"]);


            $query = "UPDATE art SET
                    name = '$name',
                    image = '$image',
                    artist = '$artist',
                    details = '$details'
                    WHERE id = $id
                    ";

            mysqli_query($conn, $query);

            return mysqli_affected_rows($conn);
        }

        function cari($keyword) {
            global $conn;
            $query = "SELECT * FROM art WHERE
                    name LIKE '%$keyword%' OR
                    image LIKE '%$keyword%' OR
                    artist LIKE '%$keyword%'
                    ";
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
        return $rows;

        }

        function login($data) {
            global $conn;

            $username = htmlspecialchars($data["username"]);
            $password = htmlspecialchars($data["password"]);

            // cek dulu usernamenya
            if ($user = query ("SELECT * FROM user WHERE username = '$username'")[0]) {
                if(password_verify($password, $user['password'])) {

                    $_SESSION['login'] = true;
                    header("Location: index.php");
                    exit;
                }
            }
        }

        function registrasi($data)  {
            global $conn;
        
            $username = htmlspecialchars(strtolower($data['username']));
            $password1= mysqli_real_escape_string($conn, $data['password1']);
            $password2 = mysqli_real_escape_string($conn, $data['password2']);
        
            if(empty($username) || empty($password1) || empty($password2) ) {
                echo "<script>
                        alert('username /password tidak boleh kosong!')
                        document.location.href = 'registrasi.php'
                    </script>";
                return false;
            }

            // kalo username udah ada
            if(query("SELECT * FROM user WHERE username = '$username'")) {
                echo "<script>
                    ('username sudah terdaftar!')
                    document.location.href = 'registrasi.php'
                    </script>";
                    return false;
            }
            if ($password1 !== $password2) {
                echo "<script>
                    alert('konfirmasi password tidak sesuai!')
                    document.location.href = 'registrasi.php'
                    </script>";
                    return false;
            }

            // jika password kurang dari 5
            if(strlen($password1)< 5) {
                echo "<script>
                    alert('password terlalu pendek!')
                    document.location.href = 'registrasi.php'
                    </script>";
                    return false;
            }
            // jika username dan password sudah sesuai
            $password_baru = password_hash($password1, PASSWORD_DEFAULT);
            // insert ke table
            $query = "INSERT INTO user VALUES
                    (null, '$username', '$password_baru')";
                mysqli_query($conn, $query) or die (mysqli_error($conn));
                return mysqli_affected_rows($conn);
        } 
    ?>