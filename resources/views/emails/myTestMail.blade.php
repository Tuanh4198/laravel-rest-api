<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h3>Hello <?php echo ($details['name']) ?> </he>

    <?php if ($details['link'] == true) { ?>
        <p> Thank you for taking your first step towards Solar with <strong> Aumadi </strong>. Someone
        from our team will contact you to confirm the Site Inspection date and time. </p>

        <p> Meanwhile, you can setup an account at <strong> Aumadi </strong> using the link below. You
        will be able to track the progress of your system installation using our online project
        tracker. </p>

        <p>Your account: <?php echo ($details['mail']) ?></p>
        <p>Your password: <?php echo ($details['pass']) ?></p>
        
        <a href="{{ url('/active-account/'.$details['id'].'/'.$details['rand']) }}"> <b> Link to Activate Account </b> </a>
    <?php } else { ?>
        
        <p> Thank you for contacting <strong> Aumadi </strong>. As of now, we are not serving in your area. We will get in touch with you as soon as we start serving in your area. </p>

    <?php }  ?>

    <br>
    <p>Thank you</p>
</body>
</html>