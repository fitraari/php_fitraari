<?php

// Soal 3A

$conn = mysqli_connect("localhost", "root", "", "testdb");

function read($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// $data = read("SELECT * FROM person LEFT JOIN hobi ON person.id=hobi.person_id UNION SELECT * FROM person RIGHT JOIN hobi ON person.id=hobi.person_id");
$data = read("SELECT * FROM person JOIN hobi ON person.id=hobi.person_id");

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    // $data = read("SELECT * FROM person LEFT JOIN hobi ON person.id=hobi.person_id UNION SELECT * FROM person RIGHT JOIN hobi ON person.id=hobi.person_id WHERE nama LIKE '%$search%' OR alamat LIKE '%$search%' OR hobi LIKE '%$search%'");
    $data = read("SELECT * FROM person JOIN hobi ON person.id=hobi.person_id WHERE nama LIKE '%$search%' OR alamat LIKE '%$search%' OR hobi LIKE '%$search%'");
}

$no = 1;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soal 3A</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">

                <form action="soal3a.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Cari nama/alamat/hobi.." autocomplete="off" autofocus>
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Hobi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $item) : ?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $item['nama'] ?? '-' ?></td>
                                    <td><?= $item['alamat'] ?? '-' ?></td>
                                    <td><?= $item['hobi'] ?? '-' ?></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="8" class="text-center"><?= "Data tidak ditemukan"; ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>