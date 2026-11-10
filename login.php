<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';

if (isset($_SESSION['rol'])) { header('Location: inicio.php'); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim(isset($_POST['usuario']) ? $_POST['usuario'] : '');
    $clave = isset($_POST['password']) ? $_POST['password'] : '';
    $tablas = array(
        array('secretario', 'secretario', 'documento', 'password', 'nombre'),
        array('docente', 'docente', 'documento', 'password', 'nombre'),
        array('mama', 'mama', 'documentom', 'passwordm', 'nombrem'),
        array('papa', 'papa', 'documentop', 'passwordp', 'nombrep'),
        array('estudiante', 'estudiante', 'documento', 'password', 'nombre'),
    );
    if (ctype_digit($usuario) && $clave !== '') {
        foreach ($tablas as $t) {
            list($rol, $tabla, $cDoc, $cPass, $cNom) = $t;
            $fila = db_one("SELECT $cDoc AS doc, $cPass AS pass, $cNom AS nom FROM $tabla WHERE $cDoc = ?", 's', array($usuario));
            if ($fila && verificar_password($clave, $fila['pass'])) {
                if (strpos($fila['pass'], '$2y$') !== 0 && columna_larga($tabla, $cPass)) {
                    db_exec("UPDATE $tabla SET $cPass = ? WHERE $cDoc = ?", 'ss', array(password_hash($clave, PASSWORD_DEFAULT), $usuario));
                }
                session_regenerate_id(true);
                $_SESSION['rol'] = $rol;
                $_SESSION['documento'] = (string)$fila['doc'];
                $_SESSION['nombre'] = $fila['nom'];
                header('Location: inicio.php');
                exit;
            }
        }
    }
    $error = 'Documento o contraseña incorrectos.';
}
if ($error) flash($error, 'error');
encabezado_form('Inicia sesión', 'centrado');
?>
<form action="login.php" method="POST" autocomplete="off">
<section>
  <p>Información personal</p>
  <input type="text" inputmode="numeric" pattern="[0-9]+" title="Escribe solo números" placeholder="Usuario (documento)" name="usuario" required autofocus value="<?php echo h(isset($_POST['usuario']) ? $_POST['usuario'] : ''); ?>"/>
  <input type="password" placeholder="Contraseña" name="password" required/>
</section>
<input type="submit" class="button" value="Entrar">
</form>
<?php pie_form();
