/* find the total tenants each agent has. */

SELECT agents.id,  COUNT(DISTINCT tenants.id) AS total_tenants
FROM agents
JOIN property ON agents.agent_id = property.agent_id
JOIN tenants ON property.id = tenants.property_id
GROUP BY agents.id;

 or use

SELECT a.agent_id, COUNT(*) AS total_tenants
FROM agents a
JOIN users u ON u.id = a.agent_id
JOIN property p ON p.agent_id = u.id
JOIN tenants t ON t.property_id = p.id
GROUP BY a.agent_id

/* find the total tenants a single specific agent has */
SELECT COUNT(*) as total_tenants
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN agents a ON a.agent_id = p.agent_id
WHERE a.agent_id = <agent_id>;


/* get the details of all the tenants the agent has
 */
SELECT u.email, u.joined, ud.first_name, ud.last_name, ud.phone, t.tenancy_start_date, t.tenancy_end_date
FROM users u
JOIN agents a ON a.agent_id = u.id
JOIN property p ON p.agent_id = a.agent_id
JOIN tenants t ON t.property_id = p.id
JOIN users u2 ON u2.id = t.tenant_id
JOIN user_details ud ON ud.user_id = u2.id
WHERE a.agent_id = <agent_id>; or use 

or use

SELECT ud.*
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN agents a ON a.agent_id = p.agent_id
JOIN user_details ud ON ud.user_id = t.tenant_id
WHERE a.agent_id = <agent_id>;

/* find the total number of properties listed by a particular agent */
SELECT COUNT(*) AS total_properties
FROM property p
JOIN agents a ON a.agent_id = p.agent_id
WHERE a.agent_id = <agent_id>;
or use

SELECT COUNT(*) AS property_count
FROM property
WHERE agent_id = <agent_id>;

/* get the details of properties listed by a particular agent */
SELECT * FROM property WHERE agent_id = <agent_id>;


/* find the total tenants each landlord has */
SELECT landlords.id, COUNT(DISTINCT tenants.id) AS total_tenants
FROM landlords
JOIN property ON landlords.landlord_id = property.landlord_id
JOIN tenants ON property.id = tenants.property_id
GROUP BY landlords.id; 

or use

SELECT ld.id AS landlord_id, COUNT(*) AS total_tenants
FROM landlords ld
JOIN users u ON u.id = ld.landlord_id
JOIN property p ON p.landlord_id = u.id
JOIN tenants t ON t.property_id = p.id
GROUP BY ld.id

/* find the total number of tenants assigned to an agent with their rents due */
SELECT COUNT(*) AS total_tenants_with_rents_due
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN agents a ON a.agent_id = p.agent_id
WHERE a.agent_id = <agent_id>
AND t.tenancy_end_date > DATE_SUB(CURDATE(), INTERVAL 1 MONTH);

/* the details of all tenants of an agent with due rents */
SELECT ud.*
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN agents a ON a.agent_id = p.agent_id
JOIN user_details ud ON ud.user_id = t.tenant_id
WHERE a.agent_id = <agent_id>
AND t.tenancy_end_date > DATE_SUB(CURDATE(), INTERVAL 1 MONTH)


/* find the total tenants a single specific landlord has
 */
SELECT ud.*
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN landlords l ON l.landlord_id = p.landlord_id
JOIN user_details ud ON ud.user_id = t.tenant_id
WHERE l.landlord_id = <landlord_id>;

/* get the details of all the tenants a landlord has
 */
SELECT COUNT(*) as total_tenants
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN landlords l ON l.landlord_id = p.landlord_id
WHERE l.landlord_id = <landlord_id>;

or use

SELECT u.email, u.joined, ud.first_name, ud.last_name, ud.phone, t.tenancy_start_date, t.tenancy_end_date
FROM users u
JOIN landlords l ON l.landlord_id = u.id
JOIN property p ON p.landlord_id = l.landlord_id
JOIN tenants t ON t.property_id = p.id
JOIN users u2 ON u2.id = t.tenant_id
JOIN user_details ud ON ud.user_id = u2.id
WHERE l.landlord_id = <landlord_id>;

/* find the total number of properties listed by a particular landlord
 */
SELECT COUNT(*) AS property_count
FROM property
WHERE landlord_id = <landlord_id>;

or use

SELECT COUNT(*) AS total_properties
FROM property p
JOIN landlords l ON l.landlord_id = p.landlord_id
WHERE l.landlord_id = <landlord_id>;
 or use
SELECT COUNT(DISTINCT property.id) AS total_properties
FROM property
WHERE property.landlord_id = <landlord_id>; (replace <landlord_id> with the id of the landlord you want to query)

/* find the details of properties listed by a particular landlord */
SELECT * FROM property WHERE landlord_id = <landlord_id>;

/* the total number of tenants a landlord has with their rents due */
SELECT COUNT(*) as total_tenants_with_rents_due
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN landlords l ON l.landlord_id = p.landlord_id
WHERE l.landlord_id = <landlord_id>
AND t.tenancy_end_date > DATE_SUB(CURDATE(), INTERVAL 1 MONTH);

/* the details of all tenants with due rents assigned to a landlord*/
SELECT ud.*
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN landlords l ON l.landlord_id = p.landlord_id
JOIN user_details ud ON ud.user_id = t.tenant_id
WHERE l.landlord_id = <landlord_id>
AND t.tenancy_end_date > DATE_SUB(CURDATE(), INTERVAL 1 MONTH);

/* sum of all rents overdue for a landlord*/
SELECT SUM(p.price) AS total_overdue_rent
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN landlords l ON l.landlord_id = p.landlord_id
WHERE l.landlord_id = <landlord_id>
AND t.tenancy_end_date < CURDATE()

/* details of tenants with overdue rent for a landlord */
SELECT ud.*, p.address, p.city, p.state, t.tenancy_end_date
FROM tenants t
JOIN property p ON p.id = t.property_id
JOIN landlords l ON l.landlord_id = p.landlord_id
JOIN user_details ud ON ud.user_id = t.tenant_id
WHERE l.landlord_id = <landlord_id>
AND t.tenancy_end_date < CURDATE()


/* find the total number of properties a tenant has occupied
 */
SELECT COUNT(DISTINCT p.id) AS total_properties
FROM tenants t
JOIN property p ON p.id = t.property_id
WHERE t.tenant_id = <tenant_id>;

or use

SELECT COUNT(DISTINCT property.id) AS total_properties
FROM property
JOIN tenants ON property.id = tenants.property_id
WHERE tenants.id = <tenant_id>;







