
/* Consulta de Incidencias */


SELECT I.id_Incidencias AS Id, I.titulo_incidencias AS Titulo, I.desc_incidencias AS Descripcion, U.nomb_Usuario As Nombre, U.apell_Usuario AS Apellido,A.nomb_Area AS Area,fechaCarga_incidencias AS Fecha,I.id_prioridad AS Prioridad_Id, P.descr_Prioridades AS Prioridad, I.id_Estados AS Estado_Id, EI.desc_Estados AS Estado
FROM
 incidencias I, usuarios U, prioridades P, estados_incidencias EI, areas A
WHERE
I.id_Usuario=U.id_Usuario AND U.id_Area=A.id_Area AND I.id_prioridad=P.id_prioridades AND I.id_Estados=EI.id_Estados
ORDER BY 
Fecha;


/* Consulta por usuario */
SELECT I.id_Incidencias AS Id, I.titulo_incidencias AS Titulo, I.desc_incidencias AS Descripcion, U.nomb_Usuario As Nombre, U.apell_Usuario AS Apellido,A.nomb_Area AS Area,fechaCarga_incidencias AS Fecha,I.id_prioridad AS Prioridad_Id, P.descr_Prioridades AS Prioridad, I.id_Estados AS Estado_Id, EI.desc_Estados AS Estado
FROM
 incidencias I, usuarios U, prioridades P, estados_incidencias EI, areas A
WHERE
I.id_Usuario=U.id_Usuario AND U.id_Area=A.id_Area AND I.id_prioridad=P.id_prioridades AND I.id_Estados=EI.id_Estados AND I.id_Usuario=3
ORDER BY 
Fecha;


/* Consulta todas las no finalizadas */
SELECT I.id_Incidencias AS Id, I.titulo_incidencias AS Titulo, I.desc_incidencias AS Descripcion, U.nomb_Usuario As Nombre, U.apell_Usuario AS Apellido,A.nomb_Area AS Area,fechaCarga_incidencias AS Fecha,I.id_prioridad AS Prioridad_Id, P.descr_Prioridades AS Prioridad, I.id_Estados AS Estado_Id, EI.desc_Estados AS Estado
FROM
 incidencias I, usuarios U, prioridades P, estados_incidencias EI, areas A
WHERE
I.id_Usuario=U.id_Usuario AND U.id_Area=A.id_Area AND I.id_prioridad=P.id_prioridades AND I.id_Estados=EI.id_Estados AND I.id_Estados!=3
ORDER BY 
Fecha;

