- **Un solo inicio de sesión** con documento y contraseña: el sistema detecta si eres secretaría, docente, madre, padre o estudiante. Las contraseñas antiguas (sin cifrar) siguen funcionando y se cifran solas en el primer ingreso. Todas las páginas revisan quién eres y qué puedes ver.
- **Secretaría**: crea, edita, busca y elimina estudiantes, docentes, madres, padres, secretarios y grados; administra anecdotario, pensiones y formatos.
- **Docente**: ve solo los estudiantes de su grado, crea fichas y observaciones del anecdotario.
- **Madre/padre/estudiante**: ven a sus hijos y descargan certificado de estudio, paz y salvo y anecdotario; consultan pensiones y descargan formatos.
- **Anecdotario**: ficha (se prellena con los datos ya registrados) + lista de observaciones con fecha, comportamiento y firma; PDF con la tabla.
- **Pensiones**: la secretaría genera las 11 mensualidades del año (enero a noviembre) y registra o anula pagos.
- **Paz y salvo (PDF)**: solo se expide si no hay meses vencidos sin pagar; si los hay, muestra cuáles faltan.
- **Formatos**: se descargan los de la tabla `documentos` (busca en `imageness/` y en `formatos/`); la secretaría puede subir y eliminar (Word, Excel, PDF o imagen, máx. 5 MB).


## Para probar

1. Entra como secretaría → crea una madre, un padre y un estudiante → edítalo → búscalo.
2. Abre **Anecdotario** del estudiante → crea la ficha → agrega una observación → descarga el PDF.
3. En **Pensiones**: genera las mensualidades → registra pagos hasta el mes actual → descarga el **paz y salvo**.
4. Desde **Estudiantes → Certificado** descarga el certificado de estudio.
5. Cierra sesión y entra como madre/padre/docente/estudiante y confirma que solo ves lo tuyo.
6. En **Formatos** descarga uno y (como secretaría) sube uno nuevo.

## Notas

- Eliminar una madre, un padre o un grado **elimina en cascada** a los estudiantes asociados (así estaban definidas las llaves foráneas de tu base); el sistema te avisa antes de confirmar.
- Los datos que estan en datos_prueba.sql son completamente ficticios.
