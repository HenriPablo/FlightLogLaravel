select first_name, ARRAY(
	select crewmembertype_id
		from crewmember_crewmembertype_xref
			where crewmember_crewmembertype_xref.crewmember_id = crewmember.id) as "role_ids"
			from crewmember


-- stored proc



CREATE OR REPLACE PROCEDURE select_crewmembers_with_roles()
LANGUAGE plpgsql
AS $$
    begin

        select
            first_name,
            last_name,
            ARRAY(
                select crewmembertype_id
                from crewmember_crewmembertype_xref
                where crewmember_crewmembertype_xref.crewmember_id = crewmember.id
                ) as "roles"
        from
            crewmember

    end;
$$;



-- list of crew members qualified to play certain role
-- take a ROLE ID as param

CREATE OR REPLACE PROCEDURE select_crewmembers_by_role( INT)
LANGUAGE plpgsql
AS $$
    begin

        select
            first_name,
            last_name,
        from
            crewmember

    end;
$$;
