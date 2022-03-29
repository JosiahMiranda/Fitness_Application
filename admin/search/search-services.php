<?php
    require_once('../../includes/functions.php');

    // Extract and trim the email variable from the URL.
    $name = trim(isset($_GET['name']) ? $_GET['name'] : '');

    // If email is empty then all users are returned.
    $services = getServices($name);
?>

<?php if(count($services) === 0) { ?>
    <br>
    <p class="alert alert-info">No service matches the search <strong>'<?php echo $name; ?>'</strong>.</p>
<?php } else { ?>

    <div class="row">
            <?php foreach($services as $service) { ?>
                <div class="col-3 text-center">
                    <a href="#" id=<?php echo $service['service_id']; ?>>
                        <img src="<?php echo "../".$service['image_path']; ?>" width="75%"/>
                        <h3><?php echo $service['name']; ?></h3>
                    </a>
                </div>
            <?php } ?>
        </div>
<?php } ?>

<div id="graphs"></div>

<script>

    function createAnalytics(serviceId) {
        const userName = $("#user-select").val();
        console.log(userName);
        console.log(serviceId);
        $.get("search/analytics.php", { userName, serviceId }).done(function (data) {
            // Update the document with the returned HTML.
            $("#graphs").html(data);
            $('#graphs').show();
        });
    }


    $(document).ready(function () {   

        $('#graphs').hide();

        // Perform AJAX request and update the page when the form is submitted.
        $("#1").click(function (e) {
            // Prevent the form from submitting.
            e.preventDefault();

            // Send AJAX request.
            createAnalytics('1');
        });

        // Perform AJAX request and update the page when the form is submitted.
        $("#2").click(function (e) {
            // Prevent the form from submitting.
            e.preventDefault();

            // Send AJAX request.
            createAnalytics('2');
        });

        // Perform AJAX request and update the page when the form is submitted.
        $("#3").click(function (e) {
            // Prevent the form from submitting.
            e.preventDefault();

            // Send AJAX request.
            createAnalytics('3');
        });

        // Perform AJAX request and update the page when the form is submitted.
        $("#4").click(function (e) {
            // Prevent the form from submitting.
            e.preventDefault();

            // Send AJAX request.
            createAnalytics('4');
        });


    });
</script>
