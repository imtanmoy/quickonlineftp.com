


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Quickonlineftp.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php include 'include_top.php';?>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#category').change(function () {
                var selDpto = $(this).val();
                console.log(selDpto);
                $.ajax({
                    url: "<?php echo base_url();?>admin/subcategory",
                    async: false,
                    type: "POST",
                    data: "id="+selDpto,
                    dataType: "html",

                    success: function(data) {
                        $('#scategory').html(data);
                    }
                })
            });
        });
    </script>


</head>
<body style="background:#000000;">

<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <div class="registration-title">
            <h1>
                Upload Form
            </h1>
        </div>
        <div class="registration-form-wrapper">
            <div style="margin-top: 40px;" class="col-lg-offset-3 col-lg-6">
                <div class="col-lg-12 center-block text-center">
                    <form method="post" action="insert" enctype="multipart/form-data">
                        <input type="text" name="name" class="input-box" placeholder="Name">
                        <select id="category" class="category" name="category" required>
                            <option disabled selected>Select Category</option>
                            <?php
                            foreach($category as $key) {
                                echo "<option value='".$key->cid."'>" .$key->cname. "</option>>";
                            }
                            ?>
                        </select>
                        <select id="scategory" class="scategory" name="scategory">
                            <option value="">Select Sub Category</option>
                        </select>

                        <input type="file" name="poster" style="margin-left: 20px;" placeholder="Select Movie Poster">

                        <div class="input-radio">
                            <div class="col-lg-4">
                                <h4>status</h4>
                            </div>
                            <div class="col-lg-4">
                                <input type="radio" name="status" class="input-radio-btn" placeholder="Gender" value="New">New
                            </div>
                            <div class="col-lg-4">
                                <input type="radio" name="status" class="input-radio-btn" placeholder="Gender" value="Old">Old
                            </div>
                        </div>
                        <input type="text" name="link" class="input-box" placeholder="Paste the link here">
                        <input style="background-color: #1bbc9b; color: white!important;" type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>



        </div>

    </div>
</div>






<?php include 'include_bottom.php'?>



</body>
</html>