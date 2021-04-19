<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <?php echo $this->session->userdata('student_first_name'); ?></h1>
    <p>First name: <?php echo $this->session->userdata('student_first_name'); ?></p>
    <p>Last name: <?php echo $this->session->userdata('student_last_name'); ?></p>
    <p>Email Address: <?php echo $this->session->userdata('student_email'); ?></p>
    <a href='logout'>Log Off</a>
</body>
</html>