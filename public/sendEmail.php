<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Atur penerima email
    $to = "bufafamjayaabadi@gmail.com";

    // Atur subjek email
    $email_subject = "New Contact Form Submission: $subject";

    // Bangun isi email
    $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nMessage:\n$message";

    // Atur header email
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Kirim email
    mail($to, $email_subject, $email_body, $headers);

    // Kirim balasan JSON ke klien
    echo json_encode(array('message' => 'Success'));
} else {
    // Kirim balasan JSON jika bukan metode POST
    echo json_encode(array('message' => 'Error: Method not allowed'));
}
?>
