find the total tenants each agent has.

SELECT agents.id,  COUNT(DISTINCT tenants.id) AS total_tenants
FROM agents
JOIN property ON agents.agent_id = property.agent_id
JOIN tenants ON property.id = tenants.property_id
GROUP BY agents.id;

find the total tenants each landlord has
SELECT landlords.id, COUNT(DISTINCT tenants.id) AS total_tenants
FROM landlords
JOIN property ON landlords.landlord_id = property.landlord_id
JOIN tenants ON property.id = tenants.property_id
GROUP BY landlords.id;

find the total tenants a single specific agent has
SELECT agents.id, agents.agency_name, COUNT(DISTINCT tenants.id) AS total_tenants
FROM agents
JOIN property ON agents.agent_id = property.agent_id
JOIN tenants ON property.id = tenants.property_id
WHERE agents.id = <agent_id>
GROUP BY agents.id;


find the total tenants a single specific landlord has
SELECT landlords.id, COUNT(DISTINCT tenants.id) AS total_tenants
FROM landlords
JOIN property ON landlords.landlord_id = property.landlord_id
JOIN tenants ON property.id = tenants.property_id
WHERE landlords.id = <landlord_id>
GROUP BY landlords.id;

find the total number of properties a tenant has occupied
SELECT COUNT(DISTINCT property.id) AS total_properties
FROM property
JOIN tenants ON property.id = tenants.property_id
WHERE tenants.id = <tenant_id>; (replace <tenant_id> with the ID of the tenant you want to query. )

find the total number of properties listed by a particular agent
SELECT COUNT(DISTINCT property.id) AS total_properties
FROM property
WHERE property.agent_id = <agent_id>;

find the total number of properties listed by a landlord
SELECT COUNT(DISTINCT property.id) AS total_properties
FROM property
WHERE property.landlord_id = <landlord_id>; (replace <landlord_id> with the id of the landlord you want to query)






