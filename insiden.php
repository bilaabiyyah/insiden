<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arimo&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/insiden.css">
    <link rel="icon" href="assets/icon/circle-transmart.ico" type="image/x-icon">
    <title>Home | Insiden</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <img src="assets/icon/logo.png" alt="logo" width="200" class="d-inline-block align-text-top">
                <div class="welcome-message flex-grow-1">You're logged in as, <?php echo $_SESSION['name']; ?>!</div>
                <button id="logoutButton" class="nav-link btn btn-link" data-bs-toggle="modal"
                    data-bs-target="#logoutModal">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </div>
        </nav>
    </header>
    <div class="data_table">
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" class="btn custom-btn report" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop"><i class="fa-solid fa-pencil"></i></button>
            <div id="example_wrapper" class="dataTables_wrapper">
            </div>
        </div>
        <table class="table table-striped" id="example">
            <thead class="custom-thead vertical-center">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Store/<br>HO/<br>DC</th>
                    <th>Location</th>
                    <th>Day Start</th>
                    <th>Date Start</th>
                    <th>Day Stop</th>
                    <th>Date Stop</th>
                    <th>Durasi</th>
                    <th>Downtime</th>
                    <th>Cause</th>
                    <th>Impact</th>
                    <th>Solution</th>
                    <th>Solved</th>
                    <th>Exec</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  $nomorUrut = 1;
                $conn = new mysqli("localhost", "root", "", "insiden");

                if ($conn->connect_error) {
                    die("Koneksi ke database gagal: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM list_insiden";
                $hasil = $conn->query($sql);
                if ($hasil === false) {
                    trigger_error("SQL Anda salah: " . $sql . " Error: " . $conn->error, E_USER_ERROR);
                } else {
                    while ($row = $hasil->fetch_assoc()) {
                        ?>
                <tr class="text-center">
                    <td>
                        <?php echo $nomorUrut ; ?>
                    </td>
                    <td>
                        <?php echo $row['kategori']; ?>
                    </td>
                    <td>
                        <?php echo $row['lokasi']; ?>
                    </td>
                    <td>
                        <?php echo $row['nama_lokasi']; ?>
                    </td>
                    <td>
                        <?php echo $row['hari_mulai']; ?>
                    </td>
                    <td>
                        <?php echo $row['waktu_mulai']; ?>
                    </td>
                    <td>
                        <?php echo $row['hari_berhenti']; ?>
                    </td>
                    <td>
                        <?php echo $row['waktu_berhenti']; ?>
                    </td>
                    <td>
                        <?php echo $row['durasi']; ?>
                    </td>
                    <td>
                        <?php echo $row['downtime']; ?>
                    </td>
                    <td>
                        <?php echo $row['cause']; ?>
                    </td>
                    <td>
                        <?php echo $row['impact']; ?>
                    </td>
                    <td>
                        <?php echo $row['detail_solution']; ?>
                    </td>
                    <td>
                        <?php echo $row['solved']; ?>
                    </td>
                    <td>
                        <?php echo $row['executor']; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal<?php echo $row['id'] ?>"><i
                                class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal<?php echo $row['id'] ?>" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <label for="store">Apakah Anda yakin ingin menghapus data ini?</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <a type="button" class="btn btn-danger btn-confirm-delete" href="javascript:void(0);"
                                    onclick="confirmDelete(<?php echo $row['id'] ?>)">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $nomorUrut++;  
                }
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="orderModal" style="z-index: 9999;" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:400px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New Report Incident</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="proses_create.php" method="POST" id="myForm">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" id="kategori" name="kategori" class="form-control" required>
                            </div>

                            <div class="col">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <select id="lokasi" name="lokasi" class="form-select">
                                    <option value="Store">Store</option>
                                    <option value="HO">HO</option>
                                    <option value="DC">DC</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-mb-3">
                            <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                            <input type="text" id="nama_lokasi" name="nama_lokasi" class="form-control" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="hari_mulai" class="form-label">Date Start</label>
                                <input type="text" id="hari_mulai" name="hari_mulai" class="form-control" required>
                            </div>

                            <div class="col">
                                <label for="waktu_mulai" class="form-label">Start Time</label>
                                <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="hari_berhenti" class="form-label">Date Stop</label>
                                <input type="text" id="hari_berhenti" name="hari_berhenti" class="form-control"
                                    required>
                            </div>

                            <div class="col">
                                <label for="waktu_berhenti" class="form-label">Stop Time</label>
                                <input type="time" id="waktu_berhenti" name="waktu_berhenti" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="row-mb-3">
                            <label for="durasi" class="form-label">Durasi</label>
                            <input type="text" id="durasi" name="durasi" class="form-control" readonly>
                        </div>

                        <div class="row-mb-3">
                            <label for="downtime" class="form-label">Downtime</label>
                            <select id="downtime" name="downtime" class="form-select">
                                <option value="yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="row-mb-3">
                            <label for="cause" class="form-label">Cause</label>
                            <textarea id="cause" name="cause" rows="1" cols="50" class="form-control"></textarea>
                        </div>

                        <div class="row-mb-3">
                            <label for="impact" class="form-label">Impact</label>
                            <textarea id="impact" name="impact" rows="1" cols="50" class="form-control"></textarea>
                        </div>

                        <div class="row-mb-3">
                            <label for="detail_solution" class="form-label">Detail Solution</label>
                            <input type="text" id="detail_solution" name="detail_solution" class="form-control"
                                required>
                        </div>

                        <div class="row-mb-3">
                            <label for="solved" class="form-label">Solved</label>
                            <input type="text" id="solved" name="solved" class="form-control" equired>
                        </div>

                        <div class="row mb-3">
                            <label for="executor" class="form-label">Executor</label>
                            <div class="input-group">
                                <span id="executor_display" class="form-control"><?php 
        if (isset($_SESSION['name'])){
            echo htmlspecialchars($_SESSION['name']);
        }else{
            echo 'name not set';
        }
        ?></span>
                                <input type="hidden" id="executor" name="executor" value="<?php 
        if (isset($_SESSION['name'])){
            echo htmlspecialchars($_SESSION['name']);
        }else{
            echo 'name not set';
        }
        ?>">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/datatables.min.js"></script>
        <script src="assets/js/pdfmake.min.js"></script>
        <script src="assets/js/vfs_fonts.js"></script>
        <script src="assets/js/script.js"></script>
        <script>
        function confirmDelete(id) {
            event.preventDefault();
            console.log(id);
            $.ajax({
                url: `hapus_data.php?action=deleteData&id=${id}`,
                method: "DELETE",
                success: function(response) {
                    console.log(response);
                    $('#deleteModal' + id).modal('hide');
                    $('#orderModal').modal('show');
                    var modalContent = document.querySelector('#orderModal .modal-content');
                    modalContent.innerHTML =
                        `
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-center text-light">Delete Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="text-center"><img src="./assets/icon/success.gif" alt="" style="height:100px;width:auto;"></div>
                        </div>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="text-center mb-4 mt-3 fw-bolder">${response}</div>
                        </div>
                    </div>`;
                    setTimeout(function() {
                        $('#orderModal').modal('hide');
                        location.reload();
                    }, 2000);
                },
                error: function(error) {
                    console.error("Error deleting customer:", error);
                }
            });
        }
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#example')) {
                $('#example').DataTable().destroy();
            }
            var table = $('#example').DataTable({
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            table.buttons().container()
                .appendTo('#example_wrapper .dataTables_filter')
                .addClass('d-inline-flex justify-content-start');
            $('.report').appendTo('#example_wrapper .dataTables_filter');
        });
        </script>

</body>
<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>


</html>