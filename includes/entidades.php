<?php

function opciones_comunes($nombre) {
    $o = array(
        'sexo' => array('femenino' => 'Femenino', 'masculino' => 'Masculino', 'nobinario' => 'No binario'),
        'civil' => array('soltero' => 'Soltero/a', 'casado' => 'Casado/a', 'separado' => 'Separado/a', 'unionlibre' => 'Unión libre', 'divorciado' => 'Divorciado/a', 'viudo' => 'Viudo/a'),
        'rh' => array('A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-'),
    );
    return $o[$nombre];
}

function fk_grado()  { return array('tabla' => 'grados', 'v' => 'codigo', 'x' => 'nombre'); }
function fk_mama()   { return array('tabla' => 'mama', 'v' => 'documentom', 'x' => "CONCAT(documentom, ' - ', nombrem, ' ', apellidosm)"); }
function fk_papa()   { return array('tabla' => 'papa', 'v' => 'documentop', 'x' => "CONCAT(documentop, ' - ', nombrep, ' ', apellidosp)"); }

function campos_padre($s) {
    return array(
        array('n' => "nombre$s", 'l' => 'Nombre', 't' => 'text', 'r' => 1),
        array('n' => "apellidos$s", 'l' => 'Apellidos', 't' => 'text', 'r' => 1),
        array('n' => "sexo$s", 'l' => 'Sexo', 't' => 'select', 'r' => 1, 'o' => opciones_comunes('sexo')),
        array('n' => "estadocivil$s", 'l' => 'Estado civil', 't' => 'select', 'r' => 1, 'o' => opciones_comunes('civil')),
        array('n' => "fecha$s", 'l' => 'Fecha de nacimiento', 't' => 'date', 'r' => 1),
        array('n' => "expedicion$s", 'l' => 'Lugar de expedición del documento', 't' => 'text', 'r' => 1),
        array('n' => "lugar$s", 'l' => 'Lugar de nacimiento', 't' => 'text', 'r' => 1),
        array('n' => "direccion$s", 'l' => 'Dirección', 't' => 'text', 'r' => 1),
        array('n' => "barrio$s", 'l' => 'Barrio', 't' => 'text', 'r' => 1),
        array('n' => "eps$s", 'l' => 'EPS', 't' => 'text', 'r' => 1),
        array('n' => "rh$s", 'l' => 'Tipo de sangre', 't' => 'select', 'r' => 1, 'o' => opciones_comunes('rh')),
        array('n' => "profesion$s", 'l' => 'Profesión', 't' => 'text', 'r' => 1),
        array('n' => "telefono$s", 'l' => 'Teléfono', 't' => 'tel', 'r' => 1),
        array('n' => "correo$s", 'l' => 'Correo electrónico', 't' => 'email', 'r' => 1),
    );
}

function entidades() {
    $sexo = opciones_comunes('sexo'); $civil = opciones_comunes('civil'); $rh = opciones_comunes('rh');
    return array(
        'estudiante' => array(
            'tabla' => 'estudiante', 'pk' => 'documento', 'pk_l' => 'Documento', 'pass' => 'password',
            'titulo' => 'Estudiante', 'plural' => 'Estudiantes',
            'campos' => array(
                array('n' => 'nombre', 'l' => 'Nombre', 't' => 'text', 'r' => 1),
                array('n' => 'apellidos', 'l' => 'Apellidos', 't' => 'text', 'r' => 1),
                array('n' => 'sexo', 'l' => 'Sexo', 't' => 'select', 'r' => 1, 'o' => $sexo),
                array('n' => 'fecha', 'l' => 'Fecha de nacimiento', 't' => 'date', 'r' => 1),
                array('n' => 'expedicion', 'l' => 'Lugar de expedición del documento', 't' => 'text', 'r' => 1),
                array('n' => 'lugar', 'l' => 'Lugar de nacimiento', 't' => 'text', 'r' => 1),
                array('n' => 'direccion', 'l' => 'Dirección', 't' => 'text', 'r' => 1),
                array('n' => 'barrio', 'l' => 'Barrio', 't' => 'text', 'r' => 1),
                array('n' => 'eps', 'l' => 'EPS', 't' => 'text', 'r' => 1),
                array('n' => 'rh', 'l' => 'Tipo de sangre', 't' => 'select', 'r' => 1, 'o' => $rh),
                array('n' => 'mama', 't' => 'fk', 'l' => 'Madre', 'r' => 1, 'fk' => fk_mama()),
                array('n' => 'papa', 't' => 'fk', 'l' => 'Padre', 'r' => 1, 'fk' => fk_papa()),
                array('n' => 'grado', 't' => 'fk', 'l' => 'Grado', 'r' => 1, 'fk' => fk_grado()),
            ),
            'sql' => "SELECT e.documento AS pk, e.nombre, e.apellidos, g.nombre AS grado, CONCAT(m.nombrem, ' ', m.apellidosm) AS madre, CONCAT(p.nombrep, ' ', p.apellidosp) AS padre, e.grado AS gcod FROM estudiante e LEFT JOIN grados g ON g.codigo = e.grado LEFT JOIN mama m ON m.documentom = e.mama LEFT JOIN papa p ON p.documentop = e.papa",
            'cols' => array('pk' => 'Documento', 'nombre' => 'Nombre', 'apellidos' => 'Apellidos', 'grado' => 'Grado', 'madre' => 'Madre', 'padre' => 'Padre'),
            'buscar' => array('pk', 'nombre', 'apellidos', 'grado'),
            'filtro_docente' => 'gcod',
            'extra' => array(
                array('Certificado', 'certificado.php?doc={pk}', array('secretario', 'docente')),
                array('Anecdotario', 'anecdotario.php?doc={pk}', array('secretario', 'docente')),
                array('Pensiones', 'pensiones.php?doc={pk}', array('secretario')),
            ),
        ),
        'docente' => array(
            'tabla' => 'docente', 'pk' => 'documento', 'pk_l' => 'Documento', 'pass' => 'password',
            'titulo' => 'Docente', 'plural' => 'Docentes',
            'campos' => array(
                array('n' => 'nombre', 'l' => 'Nombre', 't' => 'text', 'r' => 1),
                array('n' => 'apellidos', 'l' => 'Apellidos', 't' => 'text', 'r' => 1),
                array('n' => 'sexo', 'l' => 'Sexo', 't' => 'select', 'r' => 1, 'o' => $sexo),
                array('n' => 'fecha', 'l' => 'Fecha de nacimiento', 't' => 'date', 'r' => 1),
                array('n' => 'lugar', 'l' => 'Lugar de nacimiento', 't' => 'text', 'r' => 1),
                array('n' => 'direccion', 'l' => 'Dirección', 't' => 'text', 'r' => 1),
                array('n' => 'barrio', 'l' => 'Barrio', 't' => 'text', 'r' => 1),
                array('n' => 'eps', 'l' => 'EPS', 't' => 'text', 'r' => 1),
                array('n' => 'rh', 'l' => 'Tipo de sangre', 't' => 'select', 'r' => 1, 'o' => $rh),
                array('n' => 'grado', 't' => 'fk', 'l' => 'Grado que dicta', 'r' => 1, 'fk' => fk_grado()),
            ),
            'sql' => "SELECT d.documento AS pk, d.nombre, d.apellidos, g.nombre AS grado, d.eps FROM docente d LEFT JOIN grados g ON g.codigo = d.grado",
            'cols' => array('pk' => 'Documento', 'nombre' => 'Nombre', 'apellidos' => 'Apellidos', 'grado' => 'Grado', 'eps' => 'EPS'),
            'buscar' => array('pk', 'nombre', 'apellidos', 'grado'),
        ),
        'mama' => array(
            'tabla' => 'mama', 'pk' => 'documentom', 'pk_l' => 'Documento', 'pass' => 'passwordm',
            'titulo' => 'Madre', 'plural' => 'Madres',
            'campos' => campos_padre('m'),
            'sql' => "SELECT documentom AS pk, nombrem AS nombre, apellidosm AS apellidos, telefonom AS telefono, correom AS correo FROM mama",
            'cols' => array('pk' => 'Documento', 'nombre' => 'Nombre', 'apellidos' => 'Apellidos', 'telefono' => 'Teléfono', 'correo' => 'Correo'),
            'buscar' => array('pk', 'nombre', 'apellidos'),
        ),
        'papa' => array(
            'tabla' => 'papa', 'pk' => 'documentop', 'pk_l' => 'Documento', 'pass' => 'passwordp',
            'titulo' => 'Padre', 'plural' => 'Padres',
            'campos' => campos_padre('p'),
            'sql' => "SELECT documentop AS pk, nombrep AS nombre, apellidosp AS apellidos, telefonop AS telefono, correop AS correo FROM papa",
            'cols' => array('pk' => 'Documento', 'nombre' => 'Nombre', 'apellidos' => 'Apellidos', 'telefono' => 'Teléfono', 'correo' => 'Correo'),
            'buscar' => array('pk', 'nombre', 'apellidos'),
        ),
        'secretario' => array(
            'tabla' => 'secretario', 'pk' => 'documento', 'pk_l' => 'Documento', 'pass' => 'password',
            'titulo' => 'Secretario/a', 'plural' => 'Secretarios',
            'campos' => array(
                array('n' => 'nombre', 'l' => 'Nombre', 't' => 'text', 'r' => 1),
                array('n' => 'apellidos', 'l' => 'Apellidos', 't' => 'text', 'r' => 1),
                array('n' => 'sexo', 'l' => 'Sexo', 't' => 'select', 'r' => 1, 'o' => $sexo),
                array('n' => 'estadocivil', 'l' => 'Estado civil', 't' => 'select', 'r' => 1, 'o' => $civil),
                array('n' => 'fecha', 'l' => 'Fecha de nacimiento', 't' => 'date', 'r' => 1),
                array('n' => 'telefono', 'l' => 'Teléfono', 't' => 'tel', 'r' => 1),
                array('n' => 'correo', 'l' => 'Correo electrónico', 't' => 'email', 'r' => 1),
            ),
            'sql' => "SELECT documento AS pk, nombre, apellidos, telefono, correo FROM secretario",
            'cols' => array('pk' => 'Documento', 'nombre' => 'Nombre', 'apellidos' => 'Apellidos', 'telefono' => 'Teléfono', 'correo' => 'Correo'),
            'buscar' => array('pk', 'nombre', 'apellidos'),
        ),
        'grados' => array(
            'tabla' => 'grados', 'pk' => 'codigo', 'pk_l' => 'Código', 'pass' => null,
            'titulo' => 'Grado', 'plural' => 'Grados',
            'campos' => array(
                array('n' => 'nombre', 'l' => 'Nombre', 't' => 'text', 'r' => 1, 'max' => 100),
                array('n' => 'descripcion', 'l' => 'Descripción', 't' => 'text', 'r' => 1, 'max' => 100),
            ),
            'sql' => "SELECT codigo AS pk, nombre, descripcion FROM grados",
            'cols' => array('pk' => 'Código', 'nombre' => 'Nombre', 'descripcion' => 'Descripción'),
            'buscar' => array('pk', 'nombre', 'descripcion'),
        ),
    );
}

function entidad($clave) {
    $todas = entidades();
    return isset($todas[$clave]) ? $todas[$clave] : null;
}

function opciones_fk($fk) {
    $sql = "SELECT {$fk['v']} AS v, {$fk['x']} AS x FROM {$fk['tabla']} ORDER BY x";
    return db_all($sql);
}
