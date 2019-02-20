SELECT * FROM (
  SELECT u.id, u.name, a.username AS email, a.secondary_email,
  (SELECT
     CASE
      WHEN u.user_type_id = 1 THEN cu.title
      WHEN u.user_type_id = 2 THEN iu.title
      WHEN u.user_type_id = 3 THEN ivu.title
      END) as title,
  (SELECT
     CASE
      WHEN u.user_type_id = 1 THEN cu.phone
      WHEN u.user_type_id = 2 THEN iu.office_phone
      WHEN u.user_type_id = 3 THEN ivu.phone
      END) as phone,
  (SELECT
     CASE
      WHEN u.user_type_id = 1 THEN cu.cell_phone
      WHEN u.user_type_id = 2 THEN iu.cell_phone
      WHEN u.user_type_id = 3 THEN ivu.cell_phone
      ELSE null
      END) as cell_phone,
  null as token, null as refresh_token, null as invite_key,
  (SELECT
     CASE
      WHEN u.user_type_id = 1 THEN
        IF (cu.company_id = 18, 2, cu.company_id)
      ELSE null
      END) as company_id,
  u.user_type_id,
  (SELECT
     CASE
      WHEN u.user_type_id = 2 THEN
        iu.installer_company_id
      ELSE null
      END) as installer_company_id,
  now() AS created_at, now() AS updated_at,
  if (a.active=0, now(),NULL) AS deleted_at
  FROM User u
  LEFT JOIN CompanyUser cu ON cu.user_id = u.id
  LEFT JOIN InstallerUser iu ON iu.user_id = u.id
  LEFT JOIN IvieUser ivu ON ivu.user_id = u.id
  LEFT JOIN AuthUser a ON u.auth_user_id = a.id
  WHERE u.id NOT IN (
    SELECT u.id
    FROM User u
    LEFT JOIN CompanyUser cu ON cu.user_id = u.id
    WHERE cu.company_id NOT IN (1, 18)
  )
  ORDER BY u.id
  ) AS users
  GROUP BY id
