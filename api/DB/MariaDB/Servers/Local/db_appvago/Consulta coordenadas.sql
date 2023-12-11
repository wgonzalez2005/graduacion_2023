SELECT
	id,
	NAME,
	(
		6371 * ACOS(
			COS( RADIANS( 19.426347) ) * COS( RADIANS( latitud ) ) * COS( RADIANS( longitud ) - RADIANS( -70.712011 ) ) + SIN( RADIANS( 19.426347 ) ) * SIN( RADIANS( latitud ) ) 
		) 
	) AS distancia 
FROM
	deposito_negocios 
HAVING
	distancia >5
ORDER BY
	distancia ASC