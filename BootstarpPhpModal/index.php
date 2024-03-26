<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <!-- Modal for add user here id has been changed of main div and the id of all the (inputTag and for of label) and a adduser() fn has been called in submit button on lineNo 44. -->
    <div class="modal fade" id="completeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- ...form -->
                    <div class="mb-3">
                        <label for="completename" class="form-label">Name</label>
                        <input type="name" class="form-control" id="completename" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label for="completemail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="completemail" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="completemobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="completemobile" placeholder="Enter your mob.no">
                    </div>

                    <div class="mb-3">
                        <label for="completeplace" class="form-label">Place</label>
                        <input type="text" class="form-control" id="completeplace" placeholder="Enter your palce">
                    </div>

                    <div class="modal-footer">
                        <!-- here we have used an onclick and called adduser() fn which we have made in lineNo 131.  -->
                        <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- UPDATE MODAL for update user here id has been changed of main div and the id of all the (inputTag and for of label) and a updateDetails() fn has been called in submit button on lineNo 83   -->
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- ...form -->
                    <div class="mb-3">
                        <label for="updatename" class="form-label">Name</label>
                        <input type="name" class="form-control" id="completename" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label for="updateemail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="updateemail" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="updatemobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="updatemobile" placeholder="Enter your mob.no">
                    </div>

                    <div class="mb-3">
                        <label for="updateplace" class="form-label">Place</label>
                        <input type="text" class="form-control" id="updateplace" placeholder="Enter your palce">
                    </div>

                    <div class="modal-footer">
                        <!-- here we have used an onclick and called updateDetails() fn which we have made in  -->
                        <button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <input type="hidden" id="hiddendata">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <h1>Hello, world!</h1> -->
    <div class="container my-3">
        <h1 class="text-center">PHP CRUD operations using Bootstrap Modal</h1>
        <button type="button" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModal">
            Add new users
        </button>
        <!-- taken this so that with the help of id of this div we will show the entire table see line no 127 -->
        <div id="displayDataTable"></div>
    </div>




    <!-- BOOTSTRAP JAVASCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" ></script> -->

    <script>
        // TO DIPLAY THE DATA WITHOUT LOOSING IT OR REFRESHING IT
        $(document).ready(function() {
            displayData();
        });
        //display function
        function displayData() {
            var displayData = "true";
            $.ajax({
                url: "display.php",
                type: 'post',
                data: {
                    displaySend: displayData
                },
                success: function(data, status) {
                    $('#displayDataTable').html(data);//adding result in line no 100.
                }
            });
        }
            
        function adduser() {
            //fetching the value through id and storing it into the variable
            var nameAdd = $('#completename').val();
            var emailAdd = $('#completemail').val();
            var mobileAdd = $('#completemobile').val();
            var placeAdd = $('#completeplace').val();

            // $.ajax takes 4 parameter url,type,data,success:function(data,status)
            $.ajax({
                url: "insert.php",//where it will see the query
                type: "post",     
                data: {           //takes data in key value format
                    nameSend: nameAdd,
                    emailSend: emailAdd,
                    mobileSend: mobileAdd,
                    placeSend: placeAdd,
                },
                success: function(data, status) {
                    //function to display data
                    console.log(status);
                    $('#completeModal').modal('hide');
                    displayData();
                }
            });
        }

        //DELETE RECORD
        function DeleteUser(deleteid) {
            $.ajax({
                url: "delete.php",
                type: "post",
                data: {
                    deleteSend: deleteid
                },
                success: function(data, success) {
                    console.log(status);
                    displayData();
                }
            });
        }
        // UPDATE RECORDS taking the fn name getdetails() from display.php onclick
        function GetDetails(updateid) {
            $('#hiddendata').val(updateid);//hiddendata used in line number 86 so that the id will get storeed
// instead of $.ajax here using $.post it takes only 3 parameter(url,data,and function)
            $.post("update.php", {
                updateid: updateid
            }, function(data, status) {
                var userid = JSON.parse(data);
                $('updatename').val(userid.name);
                $('updateemail').val(userid.email);
                $('updatemobile').val(userid.mobile);
                $('updateplace').val(userid.place);
            });

            $('#updateModal').modal("show");

        }

        //ONCLICK UPDATE EVENT FUNCTION
        function updateDetails() {
            var updatename = $('#updatename').val();
            var updateemail = $('#updateemail').val();
            var updatemobile = $('#updatemobile').val();
            var updateplace = $('#updateplace').val();
            var hiddendata = $('#hiddendata').val();

            $.post("update.php", {
                updatename: updatename,
                updateemail: updateemail,
                updatemobile: updatemobile,
                updateplace: updateplace,
                hiddendata: hiddendata
            }, function(data, status) {
                $('#updateModal').modal('hide');
                displayData();
            });
        }
    </script>

</body>

</html>