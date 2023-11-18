<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <p>Dear Mr./Ms. <?php echo e($name); ?></p>
    <p>Thank you for registering!</p>
    <p>To start, please access the site <a href="<?php echo e($appUrl); ?>">here</a>.</p>
    <p>Thank you!</p>
</body>
</html>
<?php /**PATH /work/resources/views/users/emails/register-confirmation.blade.php ENDPATH**/ ?>