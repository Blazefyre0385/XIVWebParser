CREATE OR ALTER VIEW vw_FFXIV_Parse
AS
SELECT
	ally,
	UPPER(job) AS job, 
	CASE
		WHEN name = 'YOU' THEN 'Blaze'
		ELSE LEFT(name, CHARINDEX(' ', name))
	END AS name,
	FORMAT(damage, 'N0') AS damage,
	damageperc,
	FORMAT(healed, 'N0') AS healed,
	encdps AS encdpsnum,
	FORMAT(encdps, 'N0') AS encdps,
	FORMAT(enchps, 'N0') AS enchps,
	crithits,
	deaths,
	critdamperc,
	directhitpct
FROM
	current_table
WHERE
	ally='T'
	AND ISNULL(job,'')<>''
	AND (damage > 0 OR healed > 0)
GO