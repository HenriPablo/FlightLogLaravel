select first_name, ARRAY(
	select crewmembertype_id
		from crewmember_crewmembertype_xref
			where crewmember_crewmembertype_xref.crewmember_id = crewmember.id) as "role_ids"
			from crewmember
