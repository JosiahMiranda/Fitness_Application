<?php require_once('../includes/functions.php'); ?>
<?php $services = getServices(); ?>
<?php $users = getUsers(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal</title>
        <?php require_once('includes/header.php'); ?>
  
    </head>
    <body>

    <?php require_once('includes/navbar.php'); ?>

    <div class="container">
        <h1>Admin Dashboard</h1>

        <select id="user-select" name="user-select" class="form-select" aria-label="Default select example">
            <option selected value="default">Select a User</option>
            <?php foreach($users as $user) { ?>
                <option value=<?php echo $user["email"]; ?>><?php echo $user["email"]; ?></option>
            <?php } ?>
        </select>

        <br>

        <div id="service-search">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="name" class="control-label">Search for Service</label>
                        <input id="name" class="form-control" />
                    </div>
                </div>
                <br>
            <div id="services"></div>
        </div>
        
        <!-- <div id="service-search">
            <form id="search">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="name" class="control-label">Search for Service</label>
                        <input id="name" class="form-control" />
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Search" />
                </div>
            </form>
            <div id="services"></div>
        </div> -->
        
    </div>

    </body>

    <script>
            function searchServices() {
                const name = $("#name").val();
                $.get("search/search-services.php", { name }).done(function (data) {
                    // Update the document with the returned HTML.
                    $("#services").html(data);
                });
            }

            $(document).ready(function () {   
                

                $('#service-search').hide();

                if($('#user-select').val() != 'default') {
                    $('#service-search').show();
                }

                $('#user-select').change(function(){
                    if($(this).val() != 'default'){
                        $('#service-search').show();
                    } else {
                        $('#service-search').hide();
                    }
                    $('#graphs').hide();
                });

                // Load the initial page data.
                searchServices();

                // Perform AJAX request and update the page when a key is released.
                $("#name").keyup(function (e) {
                    // Prevent the form from submitting.
                    e.preventDefault();

                    // Send AJAX request.
                    searchServices();
                });

                // // Perform AJAX request and update the page when the form is submitted.
                // $("#search").submit(function (e) {
                //     // Prevent the form from submitting.
                //     e.preventDefault();

                //     // Send AJAX request.
                //     searchServices();
                // });

            });

        </script>

</html>