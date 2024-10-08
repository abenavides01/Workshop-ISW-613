<?php 
include('../utils/functions.php');

/**
 * Summary of deleteUser
 * @param mixed $user_id
 * @return bool
 */
function deleteUser($user_id): bool {
    $sql = "DELETE FROM users WHERE id = '$user_id'";
    
    try {
        $conn = getConnection();
        mysqli_query($conn, $sql);
        $conn->close();
        $_SESSION['success_message'] = "¡El cambio se realizó exitosamente!";
        header('Location: /principal.php'); 
        exit();    
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
    return true;
}
