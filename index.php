<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .m-div {
            width: 100%;
            height: 100px;
            border: 2px solid blue;
            background-color: brown;
            /* border-style: none; */
            border-color: brown;
            border-radius: 10px;
        }

        .m {
            margin: 35px 20px;
        }

        .b {
            width: 100px;
            height: 40px;
            background-color: skyblue;
            border-radius: 10px;
            border-style: none;
        }

        .d {
            width: 100px;
            height: 40px;
            background-color: red;
            border-radius: 10px;
            border-style: none;
            color: white;
            margin-left: 20px;
        }

        .in {
            width: 200px;
            height: 40px;
            border-radius: 10px;
            text-align: center;
            border-style: none;
        }

        label {
            width: 150px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class="text-center text-primary mt-3 col-sm-12">
            <h2> Student form </h2>
            <hr>
        </div>
        <div class="m-div col-sm-12">
            <div class="m text-white">
                <form action="" id="main-form" class="col-12 col-sm-12">
                    Student Name : &nbsp; <input type="text" name="name" id="name" class="me-4 in" placeholder="Enter your name">
                    Student Email : &nbsp;<input type="text" name="email" id="email" class="me-4 in" placeholder="Enter your Email">
                    Student Password :&nbsp; <input type="text" name="password" id="password" class="me-5 in" placeholder="Enter your Password">
                    <input type="submit" id="submit" class=" b" value="submit">
                </form>
            </div>


            <!-- Edit form -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update student form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="" id="upd-form">
                                <label for="Student Name">Student Name :</label>
                                <input type="text" name="name" id="up-name" class="me-4 in " placeholder="Enter your name"> <br>
                                <label for="Student Email">Student Email :</label>
                                <input type="text" name="up-email" id="up-email" class="me-4 in" placeholder="Enter your Email"> <br>
                                <label for="Student Email"> Student Password :</label>
                                <input type="text" name="up-password" id="up-password" class="me-5 in" placeholder="Enter your Password">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="text" id="hidden_id" hidden>
                                    <button type="button" class="btn btn-primary" id="update_btn">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sucess_message" class="text-success"> </div>
        <div id="error_message" class="text-danger"> </div>

        <div class="col-4">
            <form action="" id="search_form">
                <input type="text" name="search" id="search" placeholder="Search by name" class="mt-3 form-control">
                <input type="submit" name="submit" id="submit" class="btn">
            </form>
        </div>

        <div id="table-data col-sm-12">
            <h3 class="text-center mt-4 text-primary">Table data</h3>
            <table class="mt-2 table table-striped  table-hover table-primary">
                <thead class="table-dark">
                    <tr>
                        <th> Sl no.</th>
                        <th> Student Name</th>
                        <th> Student Email</th>
                        <th> Student Password</th>
                        <th colspan="2"> Student Operation</th>
                    </tr>
                </thead>
                <tbody id="load_table">

                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <?php include 'jquery.php' ?>
</body>

</html>