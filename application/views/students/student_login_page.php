<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Login</h1>
    <?php echo $this->session->flashdata("login_error") ?>
    <form action='../students/login' method='post'>
        <input type='hidden' name='action' value='login'>
        Email Address: <input type='text' name='email'><br>
        Password: <input type='password' name='password'><br>
        <input type='submit'><br>
    </form>
    <h1>Register</h1>
    <?php echo $this->session->flashdata("register_error") ?>
    <?php echo $this->session->flashdata("register_success") ?>
    <form action='../students/register' method='post'>
        <input type='hidden' name='action' value='register'>
        First Name: <input type='text' name='first_name'><br>
        Last Name: <input type='text' name='last_name'><br>
        Email Address: <input type='text' name='email'><br>
        Password: <input type='password' name='password'><br>
        Confirm Password: <input type='password' name='confirm_password'><br>
        <input type='submit'>
    </form>

</body>
</html>