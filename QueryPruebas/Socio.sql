-- Active: 1657846978215@@127.0.0.1@3306@saber_bd
/* Categoria de socio  indica el nivel a que pertenece el socio*/
INSERT INTO `categoriasocio`(`id_CategoriaSocio`, `nom_CategoriaSocio`, `valorCuota`) VALUES ('[value-1]','[value-2]','[value-3]');


/* Estado de Socio  indica la condicio frente a las deudas o al patrimonio adeudado 
MOROSO => Tiene solo cuotas impagas
Deudor Libros=> Los libros aduedados superaron la fecha de entrega
Moroso Deudor Libros=> Tiene  cuotas impagas y adeuda ibros
Activo=> El socio esta al dia

*/
INSERT INTO `estadosocio`(`id_EstadoSocio`, `nom_EstadoSocio`) VALUES ('[value-1]','[value-2]');


/* Persana */
SELECT `dni_Persona`, `tipoDNI_persona`, `nombre_Persona`, `apellido_persona`, `id_domicilio`, `id_usuario`, `fechaAlta_Persona`, `foto_socio` FROM `persona` WHERE 1




/* Socio */
INSERT INTO `socio`(`dni_Socio`, `idcategoria_Socio`, `id_socio`, `id_EstadoSocio`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]');

SELECT S.dni_Socio as Dni, S.id_socio as ID,P.nombre_Persona as Nombre,P.apellido_persona as Apellido, CS.nom_CategoriaSocio as Categoria, CS.valorCuota as Cuota, ES.nom_EstadoSocio as EstadoSocio
FROM socio as S , categoriasocio as CS ,persona as P, estadosocio as ES
WHERE CS.id_CategoriaSocio=S.idcategoria_Socio and P.dni_Persona=S.dni_Socio and ES.id_EstadoSocio=S.id_EstadoSocio;


"INSERT INTO `socio`(`dni_Socio`, `idcategoria_Socio`, `id_EstadoSocio`) VALUES ('35878790','1','1')";

INSERT INTO `socio` (`dni_Socio`, `idcategoria_Socio`, `id_socio`, `id_EstadoSocio`) VALUES ('36587456','1', NULL, '1');