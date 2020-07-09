<? include "components/mainComponent.php" ?>
<?
$id=$_GET['id'];
editUser($id);
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="public/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="public/css/app.bundle.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="public/css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print" href="public/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="public/css/fa-brands.css">
</head>
<body>
<main id="js-page-content" role="main" class="page-content">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-plus-circle'></i> Contacts
            <small>
                Edit Basic Information
            </small>
        </h1>

    </div>
    <form action="components/edit.php" method="post">
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>General</h2>
                        </div>
                        <div class="panel-content">

                            <!-- username -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput"></label>
                                <input type="text" id="simpleinput" class="form-control" value="<?=$user->username?>" name="username">
                            </div>

                            <!-- title -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Job Title</label>
                                <input type="text" id="simpleinput" class="form-control" value="<?=$user->job_title?>" name="job_title">
                            </div>

                            <!-- tel -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Phone Number</label>
                                <input type="text" id="simpleinput" class="form-control" value="<?=$user->phone_number?>" name="phone_number">
                            </div>

                            <!-- address -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Address</label>
                                <input type="text" id="simpleinput" class="form-control" value="<?=$user->address?>" name="address">

                            </div>


                            <input type="hidden" name="id" value="<?=$user->id?>">

                            <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                <button class="btn btn-warning">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="public/js/vendors.bundle.js"></script>
<script src="public/js/app.bundle.js"></script>
<script>

    $(document).ready(function()
    {

        $('input[type=radio][name=contactview]').change(function()
        {
            if (this.value == 'grid')
            {
                $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-g');
                $('#js-contacts .col-xl-12').removeClassPrefix('col-xl-').addClass('col-xl-4');
                $('#js-contacts .js-expand-btn').addClass('d-none');
                $('#js-contacts .card-body + .card-body').addClass('show');

            }
            else if (this.value == 'table')
            {
                $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-1');
                $('#js-contacts .col-xl-4').removeClassPrefix('col-xl-').addClass('col-xl-12');
                $('#js-contacts .js-expand-btn').removeClass('d-none');
                $('#js-contacts .card-body + .card-body').removeClass('show');
            }

        });

        //initialize filter
        initApp.listFilter($('#js-contacts'), $('#js-filter-contacts'));
    });

</script>
</body>
</html>