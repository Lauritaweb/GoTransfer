<?php
// Verificar si se reciben datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = test_input($_POST["name"]);
    $phone = test_input($_POST["phone"]);
    $message = test_input($_POST["message"]);

    // Configurar el destinatario del correo
    $to = "vg.traslados@gmail.com";

    // Configurar el asunto del correo
    $subject = "Nuevo mensaje de contacto de Go Transfer";

    // Construir el cuerpo del correo
    $email_body = "Nombre: $name\n";
    $email_body .= "Teléfono: $phone\n\n";
    $email_body .= "Mensaje:\n$message";

    // Configurar los encabezados del correo
    $headers = "From: $name\n";
    $headers .= "Reply-To: $to";

    // Intentar enviar el correo
    if (mail($to, $subject, $email_body, $headers)) {
        // Si el correo se envió con éxito, responder con un mensaje JSON
        $response = [
            "success" => true,
            "message" => "¡Formulario enviado con éxito!"
        ];
    } else {
        // Si hubo un error al enviar el correo, responder con un mensaje JSON
        $response = [
            "success" => false,
            "message" => "Error al enviar el formulario"
        ];
    }

    // Devolver la respuesta como JSON
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Si la solicitud no es de tipo POST, responder con un mensaje JSON de error
    $response = [
        "success" => false,
        "message" => "Solicitud no válida"
    ];

    // Devolver la respuesta como JSON
    header("Content-Type: application/json");
    echo json_encode($response);
}

// Función para limpiar y validar datos del formulario
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
