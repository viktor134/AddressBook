<? require_once "components/mainComponent.php" ?>
<?php
$id=$_GET['id'];
//var_dump($id);
$statuses=getStatus();
$user=editUser($id);
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
                    Change User Status
                </small>
            </h1>

        </div>
        <form action="components/status.php" method="post">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>General</h2>
                            </div>
                            <div class="panel-content">
                                <div class="panel-tag">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, hic.
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- status -->
                                        <div class="form-group">
                                            <label class="form-label" for="example-select">Choose Status</label>
                                           
                                            <select class="form-control" id="example-select" name="status_id">
                                            <?foreach($statuses as $status):?>
                                                <?if($status->id==$user->status_id):?>
                                                    <option selected value="<?=$status->id?>"><?=$status->name?></option>
                                                <?else:?>
                                                <option value="<?=$status->id?>"><?=$status->name?></option>
                                                <?endif;?>
                                            <?endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?=$user->id?>">
                                    <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                        <button class="btn btn-warning">Set Status</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="js/vendors.bundle.js"></script>
    <script src="js/app.bundle.js"></script>
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