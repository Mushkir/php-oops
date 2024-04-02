<?
// View (MVC)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD App</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Data Table CDN -->
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.3/datatables.min.css" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand text-light " href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="#">Contact</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class=" text-center text-danger fw-normal my-3">CRUD Application using Bootstrap, PHP - OOPs, PDO - MySQL, Ajax, DataTable & SweetAlert</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary ">All Users in database</h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-end" data-bs-toggle="modal" data-bs-target="#addModal">Add New User</button>
                <a href="#" class=" btn btn-success m-1 float-end "> Export to Excel</a>
            </div>
        </div>

        <hr class="my-1 ">


        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">

                </div>
            </div>
        </div>
    </div>


    <!-- Add new user modal -->
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 ">
                    <form action="" method="post" id="form-data">
                        <div class="form-group mb-3">
                            <input type="text" name="fname" id="" placeholder="First Name" required class="form-control ">
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="lname" id="" placeholder="Last Name" required class="form-control ">
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" name="email" id="" placeholder="Email" required class="form-control ">
                        </div>
                        <div class="form-group mb-3">
                            <input type="tel" name="phone" id="" placeholder="Phone" required class="form-control ">
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" name="insert" class="btn btn-danger w-100 " value="Add User">
                        </div>


                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>




    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Data Table JS CDN -->
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.3/datatables.min.js"></script>

    <!-- Sweet Alert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            showAllUsers();

            function showAllUsers() {
                $.ajax({
                    url: 'action.php',
                    type: 'POST',
                    data: {
                        action: "view"
                    },
                    success: function(response) {
                        // console.log(response);
                        $("#showUser").html(response);
                        $("table").DataTable();
                    }


                })
            }

            // Insert JQuery
            $(document).on("submit", "#form-data", function(e) {

                e.preventDefault();

                $.ajax({

                    url: 'action.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),
                    success: function(response) {
                        console.log(response);
                    }
                })
            })
        })
    </script>


</body>

</html>