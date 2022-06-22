<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Data products</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <!-- <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Home</a> -->
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Login</a> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- Add student form -->
        <div class="card mb-5">
            <!-- <div class="card-header">
            </div> -->
            <!-- add data -->
            <div class="card-body">
                <h3 class="card-title">Add Data to products</h3>
                <p class="card-text">This is the admin panel. Here you can : <br><b>1. Create product</b><br><b>1. Edit product</b><br><b>1. Delete product</b><br><b>1. View product</b> </p>

                <!-- show success message added -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'success')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Success!</strong> Data added successfully!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong>Data failed to add!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="create.php" method="POST">
                    <div class="col-12">
                        <label for="prodName" class="form-label">Product name</label>
                        <input type="text" name="prodName" class="form-control" placeholder="Product name" required>
                    </div>
                    <div class="col-12">
                        <label for="descriptions" class="form-label">Description</label>
                        <input type="text" name="descriptions" class="form-control form-control-lg" placeholder="Product Description" required>
                    </div>
                    <div class="col-md-4">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Product price" required>
                    </div>
                    <div class="col-4 md-4">
                        <label for="images" class="form-label">Images</label>
                        <input type="text" name="images" class="form-control" placeholder="Upload images" required>
                    </div>
                    <div class="col-4 md-4">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" name="qty" class=" form-control" placeholder="Quantity" required>
                    </div>
                    <div class="col-12 mb-5 ">
                        <button type="submit" class="btn btn-primary" value="daftar" name="create"><i class="fa fa-plus"></i><span class="ms-2">Add Data</span></button>
                    </div>
                </form>

            </div>
        </div>


        <!-- table title -->
        <h5 class="mb-3">My Student List</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Show Entries</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- show message deleted success -->
        <?php if (isset($_GET['delete'])) : ?>
            <?php
            if ($_GET['delete'] == 'success')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Success!</strong> Data deleted successfully!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong>Data failed to delete!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- show success message in edit-->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'success')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>success!</strong> Data updated successfully!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data failed to update!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>Product name</th>";
            echo "<th scope='col'>Price</th>";
            echo "<th scope='col'>Descriptions</th>";
            echo "<th scope='col'>Images</th>";
            echo "<th scope='col'>Quantity</th>";
            echo "<th scope='col' class='text-center'>Opsi</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "SELECT * FROM products");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_mhs = mysqli_query($db, "SELECT * FROM products LIMIT $halaman_awal, $batas");
            $no = $halaman_awal + 1;

            // $sql = "SELECT * FROM products";
            // $query = mysqli_query($db, $sql);




            while ($products = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $products['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $products['prodName'] . "</td>";
                echo "<td>" . $products['price'] . "</td>";
                echo "<td>" . $products['descriptions'] . "</td>";
                echo "<td>" . $products['images'] . "</td>";
                echo "<td>" . $products['qty'] . "</td>";
                // echo "<td>" . $products[''] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol delete
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>No data available in this table</p>";
            } else {
                echo "<p>Total $jumlah_data Entries</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman > 1) ? "href='?halaman=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman < $total_halaman) ? "href='?halaman=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal Edit-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Edit Data products</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM products";
                    $query = mysqli_query($db, $sql);
                    $products = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_prodName" class="form-label">Product Name</label>
                                <input type="text" name="edit_prodName" id="edit_prodName" class="form-control" placeholder="Product name" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_price" class="form-label">Price</label>
                                <input type="text" name="edit_price" id="edit_price" class="form-control" placeholder="Product price" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_descriptions" class="form-label">Description</label>
                                <input type="text" name="edit_descriptions" id="edit_descriptions" class="form-control" placeholder="Product description" required>
                            </div>

                            <!-- <div class="col-12 mb-3">
                                <label for="edit_descriptions" class="form-label">Description</label>
                                <select class="form-select" name="edit_descriptions" id="edit_descriptions" aria-label="Default select example">
                                    <option value="Islam">Islam</option>
                                </select>
                            </div> -->


                            <!-- <div class="col-12 mb-3">
                                <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <div class="col-md-12" id="gender">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            <input class="form-check-input" type="radio" name="edit_jenis_kelamin" value="Laki-Laki" id="cowok">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            <input class="form-check-input" type="radio" name="edit_jenis_kelamin" value="Perempuan" id="cewek">Perempuan</label>
                                    </div>
                                </div>
                            </div> -->



                            <div class="col-12 mb-3">
                                <label for="edit_images" class="form-label">Images</label>
                                <input type="text" name="edit_images" class="form-control" id="edit_jurusan" placeholder="Upload Image" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_qty" class="form-label">Quantity</label>
                                <input type="number" step=0.01 name="edit_qty" id="edit_qty" class=" form-control" placeholder="Quantity" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Save</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmation</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <form action='delete.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>Are you sure you want to delete this data?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // don't use it, because it only adds to the amount
                // $('#no').val(data[1]);
                $('#edit_prodName').val(data[2]);
                $('#edit_price').val(data[3]);
                $('#gender').val(data[4]);
                // gender checked
                if (data[4] == "Laki-Laki") {
                    $("#cowok").prop("checked", true);
                } else {
                    $("#cewek").prop("checked", true);
                }

                $('#edit_jurusan').val(data[5]);
                $('#edit_descriptions').val(data[6]);
                $('#edit_qty').val(data[7]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>