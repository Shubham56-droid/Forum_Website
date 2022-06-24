<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Let's Discuss</title>

    <!--------- Bootstrap CSS ------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <style>
        .footer{
            position: relative;
            margin-bottom: -20px;
        }

        .main-con{
            min-height: 85vh;
        }

              
    /*  login status display */
    .username{
       position: relative;
       display: inline-block;
       background-color: rgba(244, 244, 244, 0.274);
       color: #fff;
       margin-right: 10px;
       padding-left: 10px;
       padding-right: 10px;
       padding-top: 5px;
       border-radius: 15px;
       height: 45px;
       width: auto;
    }

    .username span{
        color: rgb(220, 0, 95);
        font-weight: 500;
        margin-top: 15px;
    }
    .username p{
        font-weight: 350;
        font-size: 15px;
    }

    .username .useremail{
        font-size: 12px;
        color: rgb(210, 210, 210);
        margin-left: 15px;
        margin-top: -20px;
    }
    </style>
</head>
<body>

<!--------header--------->
<?php
    include './partials/_header.php';
    include './partials/_dbconnect.php';
?>


<div class="main-con container">
    <h1 class="text-center my-3 text-muted">Contact Us</h1>
    <p class="my-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quo commodi nemo voluptate non incidunt doloribus rerum? Libero cum aliquam nisi, nam excepturi magni nesciunt possimus aut quaerat molestias voluptate recusandae totam autem voluptatum
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora et fuga, doloribus architecto asperiores ipsum neque alias totam consequuntur eaque? Molestiae sed itaque veritatis consequuntur reiciendis sunt atque sint, accusamus aut natus incidunt adipisci iure laboriosam pariatur odit voluptatum nulla amet numquam eius ipsam? Ea fuga modi consequatur libero cum iusto animi veniam aperiam omnis recusandae, dolores officia accusamus repudiandae quod debitis doloremque et eius voluptatum tempore, nam alias. Fuga dolore deserunt incidunt atque optio dignissimos modi quis!
    </p>

</div>




<!--------footer--------->
<?php
    include './partials/_footer.php';
?>

<!--------- Bootstrap JS ------------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>