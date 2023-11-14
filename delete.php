<?php include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM formulario WHERE id = $id";
    $result = mysqli_query($conn ,$query);
    if (!$result) {
        die('delete not succefully');
    }
    $SESSION ['message'] = 'Comment Removed Succefully';
    $SESSION ['message_type'] = 'danger';

    header('Location:ver.php');
}
?>