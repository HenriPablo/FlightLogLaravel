select first_name, ARRAY(
	select crewmembertype_id
		from crewmember_crewmembertype_xref
			where crewmember_crewmembertype_xref.crewmember_id = crewmember.id) as "role_ids"
			from crewmember


-- stored proc



CREATE OR REPLACE PROCEDURE select_crewmembers_with_roles()
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
            crewmember;
end $$
LANGUAGE plpgsql;



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

create or replace function select_crew_members_with_roles()
	returns SETOF record
	as $$
        select
            crewmember.first_name,
            crewmember.last_name,
            ARRAY(
                select crewmembertype_id
                from crewmember_crewmembertype_xref
                where crewmember_crewmembertype_xref.crewmember_id = crewmember.id
                ) as "roles"
        from
            crewmember
	$$
	language sql
