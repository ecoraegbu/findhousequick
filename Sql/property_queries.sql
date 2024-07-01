-- GET A TENANTS OF A PARTICULAR PROPERTY
SELECT 
    u.email AS tenant_email,
    ud.first_name,
    ud.last_name,
    ud.phone,
    ud.address AS tenant_address,
    ud.age,
    ud.sex,
    ud.marital_status,
    ud.employment_status,
    t.tenancy_start_date,
    t.tenancy_end_date,
    p.address AS property_address,
    p.city,
    p.state,
    p.lga,
    p.type AS property_type,
    p.bedrooms,
    p.bathrooms
FROM 
    users u
JOIN 
    user_details ud ON u.id = ud.user_id
JOIN 
    tenants t ON u.id = t.tenant_id
JOIN 
    property p ON t.property_id = p.id
WHERE 
    p.id = ?;  -- Replace ? with the specific property ID

--GET ALL THE TENANTS OF A PARTICULAR LANDLORD INCLUDING LANDLORDS DETAILS
SELECT 
    -- Tenant details
    u_tenant.email AS tenant_email,
    ud_tenant.first_name AS tenant_first_name,
    ud_tenant.last_name AS tenant_last_name,
    ud_tenant.phone AS tenant_phone,
    ud_tenant.address AS tenant_address,
    ud_tenant.age AS tenant_age,
    ud_tenant.sex AS tenant_sex,
    ud_tenant.marital_status AS tenant_marital_status,
    ud_tenant.employment_status AS tenant_employment_status,
    
    -- Property details
    p.address AS property_address,
    p.city,
    p.state,
    p.lga,
    p.type AS property_type,
    p.bedrooms,
    p.bathrooms,
    
    -- Tenancy details
    t.tenancy_start_date,
    t.tenancy_end_date,
    
    -- Landlord details
    u_landlord.email AS landlord_email,
    ud_landlord.first_name AS landlord_first_name,
    ud_landlord.last_name AS landlord_last_name,
    ud_landlord.phone AS landlord_phone,
    ud_landlord.address AS landlord_address,
    ud_landlord.age AS landlord_age,
    ud_landlord.sex AS landlord_sex,
    ud_landlord.marital_status AS landlord_marital_status,
    ud_landlord.employment_status AS landlord_employment_status
FROM 
    users u_tenant
JOIN 
    user_details ud_tenant ON u_tenant.id = ud_tenant.user_id
JOIN 
    tenants t ON u_tenant.id = t.tenant_id
JOIN 
    property p ON t.property_id = p.id
JOIN 
    users u_landlord ON p.landlord_id = u_landlord.id
JOIN 
    user_details ud_landlord ON u_landlord.id = ud_landlord.user_id
WHERE 
    p.landlord_id = 4;

--GET TENANTS OF A LANDLORD WITHOUT LANDLORD'S DETAILS
SELECT 
    u.email AS tenant_email,
    ud.first_name,
    ud.last_name,
    ud.phone,
    ud.address AS tenant_address,
    ud.age,
    ud.sex,
    ud.marital_status,
    ud.employment_status,
    p.address AS property_address,
    p.city,
    p.state,
    p.lga,
    p.type AS property_type,
    p.bedrooms,
    p.bathrooms,
    t.tenancy_start_date,
    t.tenancy_end_date
FROM 
    users u
JOIN 
    user_details ud ON u.id = ud.user_id
JOIN 
    tenants t ON u.id = t.tenant_id
JOIN 
    property p ON t.property_id = p.id
WHERE 
    p.landlord_id = 4;
ORDER BY t.tenancy_start_date DESC;