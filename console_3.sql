select ct.id, ct.role from crewmembertype as ct
    left join crewmember_crewmembertype_xref as cct on
ct.id = cct.crewmembertype_id
where  cct.crewmember_id = 89;
